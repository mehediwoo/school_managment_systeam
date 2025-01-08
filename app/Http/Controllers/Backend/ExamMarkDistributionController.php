<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamMarkDistri;
use App\Models\Branch;
use App\Models\EducationYear;
use App\Models\ExamSetup;
use App\Models\Student;
use App\Models\certificate_serial_number;
use App\Models\User;

class ExamMarkDistributionController extends Controller
{
    public function index(){

        $exam_mark_distribution = ExamMarkDistri::with('branch','year')->get();

        $institutes = User::where('admin_role','instituteadmin')->get();

        $all_exam = ExamSetup::latest()->get();

        return view('Backend.admin.exam.exam_mark_distribution.index',compact('all_exam','institutes'));
    }



    public function exam_mark_assign(Request $request)
    {
        $exam_id = $request->input('exam');
        $branch  = $request->input('branch');

        $exam = ExamSetup::where('id',$exam_id)->first();

        if (!empty($exam)) {
            
            $all_students = collect();
            foreach (json_decode($exam->session_id) as $key => $session) {

                $students = Student::where('session_id',$session)->where('created_by',$branch)->where('status','registered')->get();
                $all_students = $all_students->merge($students);
            }
        }

        return view('Backend.admin.exam.student_assign.table',compact('all_students','exam_id','branch','exam')); 
    }




    public function exam_mark_filter(Request $request)
    {
        $exam_id = $request->input('exam');
        $branch  = $request->input('branch');

        $exam = ExamSetup::where('id',$exam_id)->first();
        
        $exam_marks = ExamMarkDistri::where('exam_id',$exam_id)->where('branch_id',$branch)->get();
        

        return view('Backend.admin.exam.exam_mark_distribution.table',compact('exam_marks','exam','exam_id','branch'));
    }

    public function store(Request $request)
    {
        $examId = $request->input('exam_id');
        $branch = $request->input('branch_id');

        $studentId = $request->input('student_id'); // is an array
        

        foreach ($studentId as $key => $value) {
            
            $exists = ExamMarkDistri::where('exam_id',$examId)->where('branch_id',$branch)->where('student_id',$value)->first();
            $student = Student::where('id',$value)->first();

            if ($exists == null) {
                $data = new ExamMarkDistri();
                $data->exam_id = $examId;
                $data->branch_id = $branch;
                $data->student_id = $value;
                $data->reg_no = $student->st_course_reg;
                $data->session_id = $student->session_id;
                $data->save();
            }else{
                toastr()->warning("Student already assigned for this exam");
            }

            $exists_serial = certificate_serial_number::where('student_id',$value)->first();
            $count         = certificate_serial_number::orderBy('id', 'desc')->first();

            if ($exists_serial==null) {
                
                $serial = new certificate_serial_number;
                $serial->student_id = $value;

                if ($count != null) {
                    $serial->serial_number = $count->serial_number + 1;
                } else {
                    $serial->serial_number = 191001;
                }
        
                $serial->save();
            }
        }

        
        toastr()->success("Student assign successfully!");
        return redirect()->back();

    }



    public function mark_update(Request $request)
    {
        $id   = $request->input('id');
        $mark = $request->input('marks');

        $data = ExamMarkDistri::findOrFail($id);
        $data->marks = $mark;
        $update = $data->update();
        if ($update) {
            return 1;
        }else{
            return 0;
        }

    }

    public function isAbsent_update(Request $request)
    {
        $id   = $request->input('id');
        $data = ExamMarkDistri::findOrFail($id);

        if ($data==true) {
            
            if ($data->is_absent=='1') {
                $data->is_absent='0';
                $data->update();
                return 0;
            }else{
                $data->is_absent='1';
                $data->update();
                return 1;
            }
        }

    }

    public function delete($id){
        $exam_mark_distribution=ExamMarkDistri::find($id);
        $exam_mark_distribution->delete();
        toastr()->success("Exam Mark Distribution Deleted Successfully");
        return redirect()->back();
    }

    public function student_assign_index()
    {
        $exam  = ExamSetup::latest()->get();
        return view('Backend.admin.exam.student_assign.index', compact('exam'));
    }

    public function get_branch_wise_exam(Request $request)
    {
        $exam_id = $request->input('branch');
        $get_exam = ExamSetup::where('id',$exam_id)->first();

        $branchIds = json_decode($get_exam->branch_id);
        $all_branch = User::whereIn('id', $branchIds)->get();

        return response()->json($all_branch);
    }
}
