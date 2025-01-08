<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CourseModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function allCourse(){

      $data['course'] =CourseModel::paginate(10);

      return view('Backend.admin.Course.AllCourse',$data);
    }

    public function addCourse(){
          return view('Backend.admin.Course.courseAdd');
    }

    public function insertCourse(Request $request){
        $course=new CourseModel();
        $course->course_name=$request->course_name;
        $course->course_code=$request->course_code;
        $course->course_duration=$request->course_duration;
        $course->course_amount=$request->course_amount;
          $course->status=$request->status;
          $course->save();
          toastr()->success('Course Save Successfully');
          return redirect()->back();
    }

   public function editCourse($id){
     $data['course'] = CourseModel::find($id);

     return view('Backend.admin.Course.courseEdit',$data);
   }

   public function updateCourse(Request $request, $id){

         $course = CourseModel::find($id);

          $course->course_name=$request->course_name;
          $course->course_code=$request->course_code;
          $course->course_duration=$request->course_duration;
          $course->course_amount=$request->course_amount;
          $course->status=$request->status;
          $course->save();
          toastr()->success('Course Update Successfully');
          return redirect()->back();
   }

   public function deleteCourse($id){
        $course = CourseModel::find($id);

        $course->delete();
        toastr()->success('Course Deleted Successfully');
        return redirect()->back();
   }

public function searchCourse(Request $request){

    if(isset($request->course_code)||isset($request->course_name)){
        $data['course'] = CourseModel::where('course_code', 'LIKE', '%'.$request->course_code.'%')->where('course_name','LIKE','%'.$request->course_name.'%')->get();
         return view('Backend.admin.Course.AllCourse', $data);
    }

else{
    $data['course'] = CourseModel::all();
    return view('Backend.admin.Course.AllCourse', $data);
}

}


public function index(){

    return view('Backend.admin.AcademicCurriculam.index');
}

}
