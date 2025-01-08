<?php

namespace App\Http\Controllers;

use App\Mail\BranchMail;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Branch;
use App\Models\branch_extra_file;
use App\Models\BranchDetails;
use App\Models\User;
use App\Models\Plan;
use Carbon\Carbon;
use App\Models\BranchSubscription;
use Illuminate\Support\Facades\Hash;
use Auth;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class BranchController extends Controller
{

public function all( Request $request){

    if(isset($request->search_branch)){
        $data['branchSubs'] = Branch::all();
        $data['plansubs'] = Plan::all();
        $data['branchSearch']=Branch::where('institute_name','Like','%'.$request->search_branch.'%')->with('branch_details')->paginate(10);
        // dd( $data['branchSearch']);

        $data['branchPaginate']=Branch::paginate(10);

        $query = $request->input('search_branch');
        $columns = ['institute_name', 'address','mobile_number','e_mail','Propietor_Name'];

        // Replace with your actual columns
        $data['branchSearch'] = Branch::where(function($q) use ($query, $columns) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'LIKE', '%' . $query . '%');
            }
        })->get();

        // dd( $data['branchSearch']);
        return view('Backend.admin.Branch.all_branch',$data);
    }
    else{


    // $data['branchPaginate']=Branch::paginate(10);

    $data['branchSearch'] = Branch::with('division', 'district', 'branch_details')
    ->has('division')
    ->has('district')
    ->paginate(10);

    $data['branchSubs']=Branch::all();

    $data['plansubs']=Plan::all();
    return view('Backend.admin.Branch.all_branch',$data);
    }
}

    //Add branch
    Public function Branch_add(){

        $get_division = Division::get();
        return view('Backend.admin.Branch.Add_branch',compact('get_division'));
    }

   public function insert(Request $request){
    // dd($request->all());
    $validator = $request->validate([

      'division_id'=>'required',
      'district_id'=>'required',
      'sub_district'=>'required',
      'thana'=>'required',
      'post_office'=>'required',
      'post_code'=>'required',
      'address'=>'required',
      'institute_name'=>'required',
      'Propietor_Name'=>'required',
      'fathers_name'=>'required',
      'mothers_name'=>'required',
      'institute_age'=>'required',
      'no_computer'=>'required',
      'e_mail' => 'required|unique:branches,e_mail',
      'mobile_number'=>'required',
      'blood_group'=>'required',
      'ceo_profile'=>'required',
      'national_id'=>'required',
      'educational_skill'=>'required',
      'institute_image'=>'required',
      'ceo_facebook'=>'required',

    ]);

     $branch=new Branch();
     $branch->institute_name=$request->institute_name;
     $branch->division_id=$request->division_id;
     if($request->district_id!=null){
        $branch->district_id=$request->district_id;
     }
    else{
        $branch->district_id=0;
    }
     $branch->sub_district=$request->sub_district;
     $branch->thana=$request->thana;
     $branch->post_office=$request->post_office;
     $branch->address=$request->address;
     $branch->post_code=$request->post_code;
     $branch->e_mail=$request->e_mail;
     $branch->mobile_number=$request->mobile_number;

    if( $branch->status=='confirmed'){
    $registration=Branch::orderBy('id','desc')->first();
    if($registration==null){
        $branch->registration_id='6521'.$branch->registration_id+1;
      }

       else if($registration!=null){
     $branch->registration_id='6521'.$registration->id+1;
      }
    }


     $branch->Propietor_Name=$request->Propietor_Name;
     $branch->save();

     //branch details
     $branch_dtls=new BranchDetails();
     $branch_dtls->branch_id=$branch->id;
     $branch_dtls->fathers_name=$request->fathers_name;
     $branch_dtls->mothers_name=$request->mothers_name;
     $branch_dtls->institute_age=$request->institute_age;
     $branch_dtls->no_computer=$request->no_computer;

     $branch_dtls->additional_rel_name=$request->additional_rel_name;
     $branch_dtls->blood_group=$request->blood_group;
     $branch_dtls->extra_rel_contact=$request->extra_rel_contact;
     $branch_dtls->additional_mobile_no=$request->additional_mobile_no;

     if(isset($request->ceo_profile)){
     $file = $request->file('ceo_profile');
     $extension = $file->getClientOriginalExtension();
     $filename = time() .'ceo'. '.' . $extension;
     $path = 'Backend/image/Branch/';
     $file->move($path, $filename);
     $branch_dtls->ceo_profile = $path . $filename;
     }


     if(isset($request->national_id)){
        $file = $request->file('national_id');
        $extension = $file->getClientOriginalExtension();
        $filename = time() .'national'. '.' . $extension;
        $path = 'Backend/image/Branch/';
        $file->move($path, $filename);
        $branch_dtls->national_id = $path . $filename;
     }

     if(isset($request->educational_skill)){
        $file=$request->file('educational_skill');
        $filename=time().'edu'.'.'.$file->getClientOriginalExtension();
        $path="Backend/image/Branch/";
        $file->move($path,$filename);
        $branch_dtls->educational_skill=$path .$filename;
     }
     if(isset($request->institute_image)){
        $file=$request->file('institute_image');
        $filename=time().'institute'.'.'.$file->getClientOriginalExtension();
        $path="Backend/image/Branch/";
        $file->move($path,$filename);
        $branch_dtls->institute_image=$path .$filename;
     }

     if(isset($request->trade_licence)){
        $file=$request->file('trade_licence');
        $filename=time().'trade'.'.'.$file->getClientOriginalExtension();
        $path='Backend/image/Branch/';
        $file->move($path,$filename);
        $branch_dtls->trade_licence=$path .$filename;
     }

     if(isset($request->extra_file)) {
        $imageData = [];

        if ($files = $request->file('extra_file')) {
            foreach ($files as $key => $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = $key . '-' . time() . '.' . $extension;
                $path = "Backend/image/Branch/";

                $file->move($path, $filename);

                $imageData[] = [
                    'branch_id' => $branch->id,
                    'extra_file' => $path . $filename,
                ];
            }
        } else {
            // Insert null for extra_file if no files are provided
            $imageData[] = [
                'branch_id' => $branch->id,
                'extra_file' => null,
            ];
        }

        branch_extra_file::insert($imageData);
    }
     $branch_dtls->ceo_facebook=$request->ceo_facebook;
     $branch_dtls->save();

     toastr()->success('Information saved successfully');
     return redirect()->back();


   }


public function edit($id){
    $data['branches']=Branch::find($id);
    $data['branch_details']=BranchDetails::where('branch_id',$id)->first();
    $data['branch_file']=branch_extra_file::where('branch_id',$id)->get();
    // dd( $data['branch_file']);
    $data['get_division']=Division::get();
    $data['get_district']=District::get();
    $data['subscription']=BranchSubscription::where('branch_id', $data['branches']->id)->with('plan')->first();

    $data['plansubs']=Plan::all();
    return view('Backend.admin.Branch.edit_branch',$data);

}

public function update($id, Request $request)
{
    $validator = $request->validate([

        'division_id'=>'required',
        'district_id'=>'required',
        'sub_district'=>'required',
        'thana'=>'required',
        'post_office'=>'required',
        'post_code'=>'required',
        'address'=>'required',
        'institute_name'=>'required',
        'Propietor_Name'=>'required',
        'fathers_name'=>'required',
        'mothers_name'=>'required',
        'institute_age'=>'required',
        'no_computer'=>'required',
        'e_mail' => 'required|unique:branches,e_mail,'.$id,
        'mobile_number'=>'required',
        'blood_group'=>'required',
        'ceo_profile'=>'required',
        'national_id'=>'required',
        'educational_skill'=>'required',
        'institute_image'=>'required',
        'ceo_facebook'=>'required',

      ]);


    $branch=$branch=Branch::find($id);
     $branch->institute_name=$request->institute_name;
     $branch->division_id=$request->division_id;
     $branch->district_id=$request->district_id;
     $branch->sub_district=$request->sub_district;
     $branch->thana=$request->thana;
     $branch->post_office=$request->post_office;
     $branch->address=$request->address;
     $branch->post_code=$request->post_code;
     $branch->status=$request->status;
     $branch->e_mail=$request->e_mail;
     $branch->mobile_number=$request->mobile_number;

     if(isset($request->plan_id)){
        $subPlan=BranchSubscription::where('branch_id', $branch->id)->first();
        $subPlan->plan_id=$request->plan_id;
        $subPlan->save();
     }

     if($request->status=='Approved'){
        // $registration=Branch::orderBy('id','desc')->first();
        $registration= $branch->registration_id;
        // dd($registration);
        // dd($registration+1);
        if($registration==null){
                $branch->registration_id='6521'.$branch->registration_id+1;
        }

           else if($registration!=null){
                   $branch->registration_id=$request->registration_id;
            }

      //subscription date
       $subscription=BranchSubscription::where('branch_id',$branch->id)->with('plan')->first();

        $subscription->starting_date=Carbon::now();
        $now=Carbon::now();
        if($subscription->plan->subscription_period=='Lifetime'){

                $subscription->expired_date='unlimited';
                $subscription->save();
       }

       if($subscription->plan->subscription_period=='Days'){

        $subscription->expired_date=$now->addMinutes(2);
        $subscription->save();

       }

       if($subscription->plan->subscription_period=='Monthly'){

        $subscription->expired_date=$now->addMonths(3);
       $subscription->save();

       }

       if($subscription->plan->subscription_period=='Yearly'){

        $subscription->expired_date=$now->addYear(1);
        $subscription->save();

       }

}

       else{
            if(isset($request->registration_id)){
                $branch->registration_id=$request->registration_id;
                 }
        }



     $branch->Propietor_Name=$request->Propietor_Name;
     $branch->save();

     //branch details
     $branch_dtls=BranchDetails::where('branch_id',$id)->first();
     $branch_dtls->branch_id=$branch->id;
     $branch_dtls->fathers_name=$request->fathers_name;
     $branch_dtls->mothers_name=$request->mothers_name;
     $branch_dtls->institute_age=$request->institute_age;
     $branch_dtls->no_computer=$request->no_computer;

     $branch_dtls->additional_rel_name=$request->additional_rel_name;
     $branch_dtls->blood_group=$request->blood_group;
     $branch_dtls->extra_rel_contact=$request->extra_rel_contact;
     $branch_dtls->additional_mobile_no=$request->additional_mobile_no;

     if(isset($request->ceo_profile)){
        if($branch_dtls->ceo_profile && file_exists($branch_dtls->ceo_profile)){
            unlink($branch_dtls->ceo_profile); // delete old file
        }

        $file = $request->file('ceo_profile');
        $extension = $file->getClientOriginalExtension();
        $filename = time() .'ceo'. '.' . $extension;
        $path = 'Backend/image/Branch/';
        $file->move($path, $filename);
        $branch_dtls->ceo_profile = $path . $filename;
     }


     if(isset($request->national_id)){

        if($branch_dtls->national_id && file_exists($branch_dtls->national_id)){
            unlink($branch_dtls->national_id); // delete old file
        }
        $file = $request->file('national_id');
        $extension = $file->getClientOriginalExtension();
        $filename = time() .'national'. '.' . $extension;
        $path = 'Backend/image/Branch/';
        $file->move($path, $filename);
        $branch_dtls->national_id = $path . $filename;
     }

     if(isset($request->educational_skill)){

        if($branch_dtls->educational_skill && file_exists($branch_dtls->educational_skill)){
            unlink($branch_dtls->educational_skill); // delete old file
        }
        $file=$request->file('educational_skill');
        $filename=time().'edu'.'.'.$file->getClientOriginalExtension();
        $path="Backend/image/Branch/";
        $file->move($path,$filename);
        $branch_dtls->educational_skill=$path .$filename;
     }

     if(isset($request->institute_image)){

        if($branch_dtls->institute_image && file_exists($branch_dtls->institute_image)){
            unlink($branch_dtls->institute_image); // delete old file
        }
        $file=$request->file('institute_image');
        $filename=time().'institute'.'.'.$file->getClientOriginalExtension();
        $path="Backend/image/Branch/";
        $file->move($path,$filename);
        $branch_dtls->institute_image=$path .$filename;
     }

     if(isset($request->trade_licence)){

        if($branch_dtls->institute_image && file_exists($branch_dtls->trade_licence)){
            unlink($branch_dtls->trade_licence); // delete old file
        }
        $file=$request->file('trade_licence');
        $filename=time().'trade'.'.'.$file->getClientOriginalExtension();
        $path='Backend/image/Branch/';
        $file->move($path,$filename);
        $branch_dtls->trade_licence=$path .$filename;
     }

    if(isset($request->extra_file))
    {

        $branch_files=branch_extra_file::where('branch_id',$id)->get();
       foreach($branch_files as $branch_files){
        if($branch_files->extra_file && file_exists($branch_files->extra_file)){
            unlink($branch_files->extra_file); // delete old file
           // delete old file from database
        }
        $branch_files->delete();
       }
        $imageData = [];
        if($files = $request->file('extra_file')){

        foreach($files as $key => $file){

            $extension = $file->getClientOriginalExtension();
            $filename = $key.'-'.time(). '.' .$extension;

            $path = "Backend/image/Branch/";

            $file->move($path, $filename);

            $imageData[] = [
                'branch_id' => $branch->id,
                'extra_file' => $path.$filename,
            ];

       }
    }

    else{
        $imageData[] = [
            'branch_id' => $branch->id,
            'extra_file' => null,
        ];
    }
    branch_extra_file::insert($imageData);
    }


     $branch_dtls->ceo_facebook=$request->ceo_facebook;
     $branch_dtls->save();

     toastr()->success('Information updated successfully');
     return redirect()->back();

}


public function delete($id, Request $request) {
    $branch = Branch::find($id);
    $branch_dtls = BranchDetails::where('branch_id', $id)->first();
    $branch_suvcrip = BranchSubscription::where('branch_id', $id)->first();
    // Check if branch_dtls exists before proceeding
    if ($branch_dtls) {
        // Handle file deletion for ceo_profile
        if (isset($request->ceo_profile) && $branch_dtls->ceo_profile && file_exists($branch_dtls->ceo_profile)) {
            unlink($branch_dtls->ceo_profile);
        }

        // Handle file deletion for national_id
        if (isset($request->national_id) && $branch_dtls->national_id && file_exists($branch_dtls->national_id)) {
            unlink($branch_dtls->national_id);
        }

        // Handle file deletion for educational_skill
        if (isset($request->educational_skill) && $branch_dtls->educational_skill && file_exists($branch_dtls->educational_skill)) {
            unlink($branch_dtls->educational_skill);
        }

        // Handle file deletion for institute_image
        if (isset($request->institute_image) && $branch_dtls->institute_image && file_exists($branch_dtls->institute_image)) {
            unlink($branch_dtls->institute_image);
        }

        // Handle file deletion for trade_licence
        if (isset($request->trade_licence) && $branch_dtls->trade_licence && file_exists($branch_dtls->trade_licence)) {
            unlink($branch_dtls->trade_licence);
        }

        // Deleting extra files associated with the branch
        $branch_files = branch_extra_file::where('branch_id', $id)->get();
        foreach ($branch_files as $branch_file) {
            if ($branch_file->extra_file && file_exists($branch_file->extra_file)) {
                unlink($branch_file->extra_file);
            }
            $branch_file->delete();
        }

        // Delete branch details
        $branch_dtls->delete();
    }

    // Delete branch subscriptions if they exist
    if ($branch->branch_subscription()->exists()) {
        $branch->branch_subscription()->delete();
    }

    // Delete branch itself
    $branch->delete();
    $branch_suvcrip->delete();
    // Success message and redirect
    toastr()->success('Information Deleted successfully with subscription');
    return redirect()->back();
}



//  public function Search_branch(Request $request){



// }
    public function BranchInfo($id){
        $data['branch'] = Branch::find($id);
        $data['branch_details'] = BranchDetails::where('branch_id', $id)->first();
        $data['branch_images'] = branch_extra_file::where('branch_id', $id)->get();
        $data['subscription'] = BranchSubscription::where('branch_id', $id)->first();

        return view('Backend.admin.Branch.branchInformation', $data);
    }

    public function genPass(Request $request){

        $getid=Auth::user()->where('branch_id',$request->id)->first();
        $branchPass=Branch::where('id',$request->id)->first();

        $branchPass->password=$request->password;
        $branchPass->save();


        if($getid!=null){
            $branch=User::find($getid->id);
            $branch->password= hash::make($request->password);
            $branch->save();
            toastr()->success('Password Generate Successfully');
            return redirect()->back();
        }
        else{
            $branch= new User();
            $branch->email  = $request->email;
            $branch->branch_id  =  $request->id;
            $branch->name   =   $request->name;
            $branch->password= hash::make($request->password);
            $branch->admin_role='instituteadmin';
            toastr()->success('Password Generate Successfully');
            $branch->save();
            return redirect()->back();
    }


    }

public function querypdf(Request $request){


    $branch = $request->input('branch'); // Get the selected checkbox IDs
    $data['branches'] = Branch::whereIn('id',$branch)->get();

    $pdf = PDF::loadView('Backend.admin.Branch.branchQueryPdf', $data);
    return $pdf->stream('branchQuery.pdf');


}

public function sendMail(Request $request,$id){

    $branch=Branch::find($id);

    // create user before send mail
    $user_exists = User::where('email', $branch->e_mail)->first();
    if (empty($user_exists->email) && $branch->status=='Approved') {
        $user = new User;
        $user -> name = $branch -> institute_name;
        $user -> email = $branch -> e_mail;
        $user -> branch_id = $id;
        $user -> admin_role = 'instituteadmin';
        $user -> password = Hash::make($branch->password);
        $user -> save();
    }

    if ($branch->status=='Approved') {
        Mail::to($branch->e_mail)->send(new BranchMail($branch));
        toastr()->success('mail send Successfully');
        return redirect()->back();
    }else{
        toastr()->error('Please approve first');
        return redirect()->back();
    }


}

}
