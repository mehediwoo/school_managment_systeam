<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\BranchSubscription;
use App\Models\Branch;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\BranchMail;
use Illuminate\Support\Str;
class BranchSubsController extends Controller
{
    public function Branch_subscription(Request $request){
        //  dd($request->all());
        $request->validate([
             'branch_id'=>'required',
             'plan_id'=>'required',

        ]);
        $branchsubscription=new BranchSubscription();
        $branchsubscription->branch_id=$request->branch_id;
        $branchsubscription->plan_id=$request->plan_id;
        $getBranch=Branch::where('id', $branchsubscription->branch_id)->first();
        $getBranch->status='Pending';
        $getBranch->save();
        $branchsubscription->status='Pending';
        $branchsubscription->save();
        toastr()->success('subscription Done Successfully');

         return redirect()->back();

        }

        public function allSubscription(Request $request){
            if ($request->search_subscription) {
                $data['Allsubscription']=Plan::where('name','Like','%'.$request->search_subscription.'%')->paginate(10);

                $query = $request->input('search_subscription');
                $columns = ['name','price'];

                // Replace with your actual columns
                $data['Allsubscription'] = Plan::where(function($q) use ($query, $columns) {
                    foreach ($columns as $column) {
                        $q->orWhere($column, 'LIKE', '%' . $query . '%');
                    }
                })->paginate(10);
                //return $data;

                // Related data
                $data['Pendingsubscription'] = BranchSubscription::where('status', 'Pending')->paginate(10);
                $data['Approvedsubscription'] = BranchSubscription::where('status', 'Approved')->paginate(10);
                $data['Expiredsubscription'] = BranchSubscription::where('status', 'Expired')->paginate(10);
                return view('Backend.admin.SchoolSubscription.AllSubscription',$data);

            }else{
                $data['Allsubscription']=BranchSubscription::with('branch')->paginate(10);
                // dd( $data['Allsubscription']);
                $data['Pendingsubscription'] = BranchSubscription::where('status', 'Pending')->paginate(10);
                $data['Approvedsubscription'] = BranchSubscription::where('status', 'Approved')->paginate(10);
                $data['Expiredsubscription'] = BranchSubscription::where('status', 'Expired')->paginate(10);

                return view('Backend.admin.SchoolSubscription.AllSubscription',$data);
            }
        }




       public function editsubscription($id){
            $data['edit_subscription'] = BranchSubscription::find($id);
            $data['branchSubs']=Branch::all();
            $data['plansubs']=Plan::all();
            return view('Backend.admin.SchoolSubscription.editSubscription',$data);
       }

       public function updateSubscription(Request $request,$id)
       {
            $subscription = BranchSubscription::find($id);

            // $branchsubscription->branch_id=$request->branch_id;

            $subscription->plan_id  =   $request->plan_id;
            $subscription->status   =   $request->status;
            $branch =   Branch::where('id', $subscription->branch_id)->first();
            $branch->status =   $request->status;
            $branch->password = Str::random(10);
            $branch->save();

            if ($request->status=='Approved'){

                if(isset($request->registration_id)){
                    $branch->registration_id    =   $request->registration_id;
                }else{
                    $registration   = $branch->id;
                    if($registration==null){
                        $branch->registration_id='6521'.$gbranch->id+1;
                    }elseif($registration!=null){
                        $branch->registration_id  = '6521'.$registration+1;
                    }
                }
                $branch->save();

                if(isset($request->sub_reg)){
                    $subscription->subs_reg =   $request->sub_reg;
                }else{
                    $subs_reg_no=$subscription->id;

                    if($subs_reg_no==null){
                        $subscription->subs_reg =   $subscription->id+1;
                    }elseif($subs_reg_no != null){
                        $subscription->subs_reg = $subs_reg_no+1;
                    }
                }

                $getPlan=Plan::where('id', $subscription->plan_id)->first();

                if( $getPlan->subscription_period == 'Lifetime'){
                    $subscription->starting_date = $request->starting_date;
                    $subscription->expired_date = 'unlimited';
                }else{
                    $subscription->starting_date = $request->starting_date;
                    $subscription->expired_date  = $request->expired_date;
                }

                Mail::to($branch->e_mail)->send(new BranchMail($branch));

            }

            $subscription->save();

            // $user_exists = User::where('email', $branch->e_mail)->first();
            // if ($request->status=='Approved' && $user_exists->email == null) {
            //     $user = new User;
            //     $user->name       = $branch->institute_name;
            //     $user->email      = $branch->e_mail;
            //     $user->branch_id  = $branch->id;
            //     $user->admin_role = 'instituteadmin';
            //     $user->password   = Hash::make($branch->password);
            //     $user->save();
            // }

            toastr()->success('Subscription Status Updated Successfully');
            return redirect()->back();
        }



       public function deletesubscription($id){
        $delSub=BranchSubscription::find($id);
        $delSub->delete();
        toastr()->success('Subscription Status Deleted Successfully');
        return redirect()->back();
       }

    }
