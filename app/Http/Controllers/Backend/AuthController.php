<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
  public function loginCheck(Request $request){
    $request->validate([
    // 'registration_id'=>'required',
      'email'=>'required',
      'password'=>'required',
    ]);
    $email = $request->email;
    $password = $request->password;
    $registration_id = $request->registration_id;


    if($request->registration_id != null){
        $registration = Branch::where('registration_id',$request->registration_id)->first();
      if($registration==null){
        toastr()->warning('Opps! Something Wrong Please Try Again!!!!');
        return redirect('Login/log');
      }
          if($registration->status=='Expired'){
            Auth::logout();
            toastr()->warning('Your Registration Time Is Over Please Contact with Authorization');
            return redirect()->back();
            
          }

        if($registration->status=='Approved'){
          if(Auth::attempt(['email' => $email, 'password' => $password]) && Auth::user()->branch_id == $registration->id){
            if(Auth::user()){
            return redirect('institute/dashboard');
            }
        }
      }

}

    if(Auth::attempt(['email' => $email, 'password' => $password]) && Auth::user()->admin_role=='superadmin'){
        if(Auth::user()){
            return redirect('admin/dashboard');
        }
    }else{
        Auth::logout();
        toastr()->warning('Your Credential Does not Match please insert registration no ');
        return redirect()->route('institute.login');
    }
}

public function login(){
    return view('auth.login');
}
public function adminlogin(){
  return view('admin.login');
}
public function logout(){
   // Auth::guard('admin')->logout();  //admin guard
   if(Auth::user()->admin_role=='superadmin'){
        Auth::logout();
        return redirect()->route('admin.login');
   }else{
    Auth::logout();
    return redirect()->route('institute.login');
   }
}

}
