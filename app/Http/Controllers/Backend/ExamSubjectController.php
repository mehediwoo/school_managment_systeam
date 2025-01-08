<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\exam_type;
use App\Models\exam_subject;
use App\Models\ExamSetup;

class ExamSubjectController extends Controller
{
    public function index()
    {
        $course    = exam_subject::latest()->get();
        return view('Backend.admin.exam.exam_subject.index', compact('course'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam' => 'required|exists:exam_setups,id',
            'course' => 'required|exists:course_models,id',
            'total_mark' => 'required|numeric',
        ]);

        $exam   = $request->input('exam');
        $course = $request->input('course');
        $mark   = $request->input('total_mark');

        $data = new exam_subject;
        $data->exam_id     = $exam;
        $data->course_id   = $course;
        $data->total_marks = $mark;
        $data->save();
        toastr()->success('Exam Course & marks created successfully.');
        return redirect()->back();    

    }

    public function edit($id)
    {
        $edit    = exam_subject::findOrFail($id);
        $course  = CourseModel::all();
        $type    = exam_type::all();
        $exam    = ExamSetup::all();

        return view('Backend.admin.exam.exam_subject.edit', compact('edit','type','course','exam'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'exam' => 'required|exists:exam_setups,id',
            'course' => 'required|exists:course_models,id',
            'total_mark' => 'required|numeric',
        ]);

        $course = $request->input('course');
        $mark   = $request->input('total_mark');

        $data = exam_subject::findOrFail($id);
        $data->course_id   = $course;
        $data->total_marks = $mark;
        $data->update();
        toastr()->success('Exam subject updated successfully.');
        return redirect()->route('exam.course.index');
    }

    public function destroy($id)
    {
        $data    = exam_subject::findOrFail($id);
        $data->delete();
        toastr()->success('Exam course deleted successfully.');
        return redirect()->back();
    }
}
