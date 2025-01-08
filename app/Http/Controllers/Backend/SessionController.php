<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CourseModel;
use App\Models\Session;
use App\Models\EducationYear;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function allSession(){
     // Fetch all sessions with pagination
    $sessions = Session::paginate(10);

    // Decode course IDs for each session and fetch course names
    foreach ($sessions as $session) {
        $session->course_names = CourseModel::whereIn('id', json_decode($session->course_id, true))->pluck('course_name');
    }

    return view('Backend.admin.Session.sessionAll', compact('sessions'));
    }


    public function addSession(){
        $data['getCourse']=CourseModel::orderBy('id','desc')->where('status','Active')->get();

        return view('Backend.admin.Session.sessionAdd',$data);
    }

    public function insertSession(Request $request){
        $session = new Session();
        $session->session_name = $request->session_name;
    
        // Store course IDs as a comma-separated string
        $session->course_id=json_encode($request->course_id); // Converts array to comma-separated string
    //   dd($session->course_id);
        $session->status = $request->status;
        $session->save();
    
        // Attach courses to the session
       
        toastr()->success('Session Add Successfully');
        return redirect()->back();
        }


        public function editSession($id){
            $data['sessionEdit']=Session::find($id);
            $data['getCourse']=CourseModel::where('status','Active')->get();
             $data['selectedCourses']=json_decode( $data['sessionEdit']->course_id);
            return view('Backend.admin.Session.SessionEdit',$data);
        }


        public function updateSession(Request $request,$id){
            // $getEduYear=EducationYear::where('status','Active')->get();
            $session=Session::find($id);
            $session->session_name=$request->session_name;
            // $session->eduyear_id=$getEduYear->id;
            $session->course_id=json_encode($request->course_id);
            $session->status=$request->status;
            $session->save();
            toastr()->success('Session Update Successfully');
            return redirect()->back();
            }


            public function deleteSession($id){
                $session=Session::find($id);
                $session->delete();
                toastr()->success('Session Deleted Successfully');
                return redirect()->back();
            }
}
