<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackendSettings;
use App\Models\Branch;
use App\Models\User;
use App\Models\Student;
use App\Models\ExamSetup;

class AttendanceController extends Controller
{
    public function index()
    {

        $branch = User::where('admin_role','instituteadmin')->get();
        $setting = BackendSettings::first();


        $all_exam = ExamSetup::latest()->where('status','publish')->get();

        return view('Backend.admin.attendance.index')->with([
            'setting' => $setting,
            'branch'  =>  $branch,
            'all_exam'=>  $all_exam
        ]);
    }

    public function pdf_generate(Request $request)
    {
        $request->validate([
            'institute'=>'required',
            'exam'=>'required'
        ]);

        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        $currentUrl = $protocol . $host;

        $institute  = $request->input('institute');
        $exam       = $request->input('exam');

        $check_exam = ExamSetup::where('id',$exam)->first();

        if( is_array(json_decode($check_exam->branch_id)) &&  in_array($institute, json_decode($check_exam->branch_id)) ){

            

            $institute_name = User::where('id',$institute)->first();
            $student = collect();
            $exam_session_array = [];
            foreach (json_decode($check_exam->session_id) as $session) {

                $data = Student::where('created_by',$institute)->where('session_id',$session)->where('status','registered')->get();
                $student = $student->merge($data);
                array_push($exam_session_array, $session);

            }


            return view('Backend.admin.attendance.pdf')->with([
                'student'=>$student,
                'currentUrl'=>$currentUrl,
                'institute_name'=>$institute_name,
                'exam_session_array'=>$exam_session_array,
            ]);

        }else{

            toastr()->error('Exam not exists for this institute');
            return redirect()->back();
        }


    }
}
