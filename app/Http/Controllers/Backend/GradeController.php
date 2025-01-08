<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\exam_grades;
use App\Models\User;

class GradeController extends Controller
{
    public function index()
    {
        $grade = exam_grades::latest()->get();
        return view('Backend.admin.exam.exam_grades.index', compact('grade'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_grade_name'=>'required',
            'exam_grade_point'=>'required',
            'min_percentance'=>'required',
            'max_percentance'=>'required',
            'remarks'=>'required',
        ]);

        $grade = new exam_grades;

        $grade->grade_name = $request->input('exam_grade_name');
        $grade->grade_point= $request->input('exam_grade_point');
        $grade->min_percent= $request->input('min_percentance');
        $grade->max_percent= $request->input('max_percentance');
        $grade->remarks    = $request->input('remarks');

        $result = $grade->save();
        if ($result) {
            toastr()->success('Exam systeam created successfully !');
            return redirect()->back();
        }else{
            toastr()->error('Something went wrong, please try again now !');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $edit = exam_grades::findOrFail($id);
        return view('Backend.admin.exam.exam_grades.edit', compact('edit'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'exam_grade_name'=>'required',
            'exam_grade_point'=>'required',
            'min_percentance'=>'required',
            'max_percentance'=>'required',
            'remarks'=>'required', 
        ]);

        $grade = exam_grades::findOrFail($id);

        $grade->grade_name = $request->input('exam_grade_name');
        $grade->grade_point= $request->input('exam_grade_point');
        $grade->min_percent= $request->input('min_percentance');
        $grade->max_percent= $request->input('max_percentance');
        $grade->remarks    = $request->input('remarks');

        $result = $grade->update();
        if ($result) {
            toastr()->success('Exam systeam updated successfully !');
            return redirect()->route('exam.grade.index');
        }else{
            toastr()->error('Something went wrong, please try again now !');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $delete = exam_grades::findOrFail($id)->delete();
        toastr()->success('Delete successfully !');
        return redirect()->back();
    }
}
