<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\ExamHall;
class ExamHallController extends Controller
{
    public function index(){
        $branch=Branch::where('status','Approved')->get();
        $examHall=ExamHall::with('branch')->get();

        return view('Backend.admin.examHall.index',compact('branch','examHall'));
    }

    public function insert(Request $request){
        $request->validate([
            'branch_id'=>'required',
            'hall_name'=>'required',
        ]);
        $examHall=new ExamHall();
        $examHall->branch_id=$request->branch_id;
        $examHall->hall_name=$request->hall_name;
        $examHall->Examiner_name=$request->examiner_name;
        $examHall->save();
        toastr()->success("Exam Hall Added Successfully");
        return redirect()->back();
    }

        public function edit($id){
            $branch=Branch::where('status','Approved')->get();
            $examHall=ExamHall::find($id);
            return view('Backend.admin.examHall.edit',compact('branch','examHall'));
        }

    public function update(Request $request,$id){

        $examHall=ExamHall::find($id);
        $examHall->branch_id=$request->branch_id;
        $examHall->hall_name=$request->hall_name;
        $examHall->Examiner_name=$request->examiner_name;

        $examHall->save();
        toastr()->success("Exam Hall Updated Successfully");
        return redirect()->back();
    }

    public function delete($id){
        $examHall=ExamHall::find($id);
        $examHall->delete();
        toastr()->success("Exam Hall Deleted Successfully");
        return redirect()->back();
    }
}
