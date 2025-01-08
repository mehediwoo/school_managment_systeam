<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamSetup;
use App\Models\User;
use App\Models\exam_center;
use App\Models\exam_type;
use App\Models\exam_subject;
use App\Models\exam_name;
use App\Models\Branch;
use App\Models\Session;
use App\Models\EducationYear;
use Carbon\Carbon;
class ExamSetUpController extends Controller
{
    public function index()
    {
        $exams = ExamSetup::latest()->get();
        $institute = User::latest()->get();
        return view('Backend.admin.exam.exam_setup.index', compact('exams','institute'));
    }

    public function create()
    {
        $branch = User::where('admin_role','instituteadmin')->get();
        $exam_center = exam_center::where('status','active')->get();
        $exam_subject = exam_subject::latest()->get();
        $exam_name = exam_name::where('status','active')->get();
        $session   = Session::where('status','Active')->get();
        $current_year = EducationYear::where('current',1)->first();
        
        return view('Backend.admin.exam.exam_setup.create',compact('branch','exam_center','exam_subject','exam_name','session','current_year'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'institute_id' => 'required',
            'session_id' => 'required',
            'exam_title' => 'required|string|max:255',
            'exam_date' => 'required',
            'exam_time' => 'required',
            'status' => 'required',
        ]);

        $time24 = $request->input('exam_time');
        $time12 = \Carbon\Carbon::createFromFormat('H:i', $time24)->format('h:i A');


        $exam = new ExamSetup();
        $exam->branch_id = json_encode($validated['institute_id']);
        $exam->session_id = json_encode($validated['session_id']);
        $exam->center_id = $request->input('exam_center');
        $exam->exam_name = $validated['exam_title'];
        $exam->exam_date = $request->input('exam_date');
        $exam->exam_time = $time12;
        $exam->status    = $validated['status'];
        $exam->save();

        toastr()->success('Exam setup created successfully!');
        return redirect()->route('exam.setup.index');
    }

    public function edit($id){
        $exam = ExamSetup::findOrFail($id);

        $institute   = User::where('admin_role','instituteadmin')->get();
        $exam_center = exam_center::where('status','active')->get();
        $exam_name   = exam_name::where('status','active')->get();
        $session     = Session::where('status','Active')->get();
        $current_year= EducationYear::where('current',1)->first();

        $exam_type_id = json_decode($exam->exam_type_id);
        $institute_id = json_decode($exam->branch_id);
        $session_id   = json_decode($exam->session_id);

        return view('Backend.admin.exam.exam_setup.edit',compact(
            'exam' ,
            'institute',
            'exam_center',
            'exam_name',
            'session',
            'current_year',

            'exam_type_id',
            'institute_id',
            'session_id'
        ));
    }

    public function update(Request $request,$id){

            // Validate the request
            $validated = $request->validate([
            'institute_id' => 'required',
            'session_id' => 'required',
            'exam_title' => 'required|string|max:255',
            'exam_date' => 'required',
            'exam_time' => 'required',
            'status' => 'required',
        ]);

        $time24 = $request->input('exam_time');
        $time12 = \Carbon\Carbon::createFromFormat('H:i', $time24)->format('h:i A');


        $exam = ExamSetup::findOrfail($id);
        $exam->branch_id = json_encode($validated['institute_id']);
        $exam->session_id = json_encode($validated['session_id']);
        $exam->center_id = $request->input('exam_center');
        $exam->exam_name = $validated['exam_title'];
        $exam->exam_date = $request->input('exam_date');
        $exam->exam_time = $time12;
        $exam->status    = $validated['status'];
        $exam->update();

        toastr()->success('Exam setup updated successfully!');
        return redirect()->route('exam.setup.index');
    }

    public function delete($id){
        $exam=ExamSetup::find($id);
        $exam->delete();
        toastr()->success('Exam setup deleted successfully!');
        return redirect()->back();

    }



    public function status($id)
    {
        $data = ExamSetup::findOrFail($id);

        if ($data->status=='publish') {
            $data->status = 'un-publish';
            $data->update();
            toastr()->success('Exam status Un-Published successfully!');
            return redirect()->back();
        }else{
            $data->status = 'publish';
            $data->update();
            toastr()->success('Exam status Published successfully!');
            return redirect()->back();
        }
    }

}

