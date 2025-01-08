<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamSetup;
use App\Models\exam_publish_date;
use Carbon\Carbon;

class ExamPublishController extends Controller
{
    public function index()
    {
        $all_exam = ExamSetup::latest('id')->get();
        $publish_date = exam_publish_date::latest('id')->get();
        return view('Backend.admin.exam.exam_publish.index',compact('all_exam','publish_date'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam' => 'required|exists:exam_setups,id',
            'publish_date' => 'required',
        ]);


        $exam_id = $request->input('exam');
        $date    = $request->input('publish_date');
        $publish_date = Carbon::createFromFormat('Y-m-d', $date)->format('d-m-Y');

        $data = new exam_publish_date;
        $data->exam_id = $exam_id;
        $data->publish_date = $publish_date;
        $data->save();
        toastr()->success("Data save Successfully");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = exam_publish_date::findOrFail($id);
        $data->delete();
        toastr()->success("Data Delete Successfully");
        return redirect()->back();
    }
}
