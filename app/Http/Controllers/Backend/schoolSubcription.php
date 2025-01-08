<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class schoolSubcription extends Controller
{
    public function allPlan(){
       $data['allPlan']=Plan::all();

        return view('Backend.admin.SchoolSubscription.Allplan',$data);
    }

    public function addPlan(){
        return view('Backend.admin.SchoolSubscription.AddPlan');
    }

    public function insertPlan(Request $request){
        $plan=new Plan();
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'subscription_period'  =>'required',
            'date'  => 'required',
            'status'  => 'required',
        ]);
        $plan->name=$request->name;
        $plan->price=$request->price;
        $plan->discount_price=$request->discount_price;
        $plan->subscription_period=$request->subscription_period;
        if($request->subscription_period=='Days'){
            $plan->period_limit=7;
        }
        if($request->subscription_period=='Monthly'){
            $plan->period_limit=3;
        }
        if($request->subscription_period=='Yearly'){
            $plan->period_limit=1;
        }

        if($request->subscription_period=='Lifetime'){
            $plan->period_limit="Unlimited";
        }
        $plan->date=$request->date;
        $plan->status=$request->status;
        $plan->save();
        toastr()->success('Plan saved successfully');
        return redirect()->back();
    }


    public function editPlan($id){
        $data['getPlan']=Plan::find($id);
        return view('Backend.admin.SchoolSubscription.PlanEdit',$data);
    }


    public function updatePlan(Request $request,$id){

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'subscription_period'  =>'required',
            'date'  => 'required',
            'status'  => 'required',
        ]);

        $plan=Plan::find($id);
        $plan->name=$request->name;
        $plan->price=$request->price;
        $plan->discount_price=$request->discount_price;
        $plan->subscription_period=$request->subscription_period;
        if($request->subscription_period=='Days'){
            $plan->period_limit=7;
        }
        if($request->subscription_period=='Monthly'){
            $plan->period_limit=3;
        }
        if($request->subscription_period=='Yearly'){
            $plan->period_limit=1;
        }

        if($request->subscription_period=='Lifetime'){
            $plan->period_limit="Unlimited";
        }
        $plan->date=$request->date;
        $plan->status=$request->status;
        $plan->save();
        toastr()->success('Plan Updated successfully');
        return redirect()->back();
    }

    public function deletePlan($id){
        $delete=Plan::find($id);
        $delete->delete();
        toastr()->success('Plan Deleted successfully');
        return redirect()->back();
    }

}
