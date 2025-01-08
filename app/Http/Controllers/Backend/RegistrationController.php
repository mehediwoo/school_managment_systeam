<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\EducationYear;
use App\Models\RegistrationSession;
use App\Models\stRegAvlableAmount;
class RegistrationController extends Controller
{
    public function Session_time(){


        $session = Session::with('eduyear')->where('status','Active')->get();
        // dd($session->eduyear);
        $education = EducationYear::where('status','Active')->first();
        $dataRegistration = RegistrationSession::get();

        return view('Backend.admin.Registration.RegisterLimit',compact('session','education','dataRegistration'));
    }

    public function register_time_insert(Request $request){

        // dd($request->all());
        $getSession = Session::where('id',$request->session_id)->first();
        $education  = EducationYear::where('status','Active')->first();

        $registration = new RegistrationSession();
        $registration->session_id = $request->session_id;
        $registration->time_setup_type=$request->time_setup_type;
        $registration->start_date=$request->starting_date;
        $registration->ending_date=$request->ending_date;
        $registration->status=$request->status;
        $registration->eduyear_id=$education->id;
        $registration->save();
        toastr()->success('Successfully Register Time Setup Done');
        return redirect()->back();
    }

    public function register_time_edit($id){
        $registration=RegistrationSession::find($id);
        $session=Session::with('eduyear')->get();
        // dd($session->eduyear);
        $education=EducationYear::where('status','Active')->first();


        return view('Backend.admin.Registration.RegistrationEdit',compact('session','education','registration'));
    }

    public function update(Request $request,$id){
        
        $education=EducationYear::where('status','Active')->first();

        $registration=RegistrationSession::find($id);
        $registration->eduyear_id=$education->id;
        $registration->time_setup_type=$request->time_setup_type;
        $registration->session_id=$request->session_id;
        $registration->start_date=$request->starting_date;
        $registration->ending_date=$request->ending_date;


        $registration->status=$request->status;
        $registration->save();
        toastr()->success('Successfully Update Time Setup');
        return redirect()->route('session.time');
    }
    public function delete($id){
        $registration=RegistrationSession::find($id);
        $registration->delete();
        toastr()->success('Successfully Delete Time Setup');
        return redirect()->route('session.time');
    }
}
