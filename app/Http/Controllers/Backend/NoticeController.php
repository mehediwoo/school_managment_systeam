<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use Carbon\Carbon;
class NoticeController extends Controller
{
    public function all(){

        $notice = Notice::latest()->paginate(10);
        return view('Backend.admin.notice.allNotice',compact('notice'));

    }

    public function index(){
        return view('Backend.admin.notice.index');
    }



    public function insert(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional
        ]);

        // Initialize the image variable
        $image = null;

        // Handle the uploaded image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = rand() . '.' . $extension;
            $path = 'Backend/image/notice/';
            $file->move($path, $filename);
            $image = $path . $filename; // Store the image path
        }

        // Insert data into the Notice model
        $notice = Notice::insert([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'date' => Carbon::now(),
            'status' => $validatedData['status'],
            'image' => $image, // Save the image path (or null if no image)
        ]);

        toastr()->success('Notice created successfully');
        return redirect()->back();
    }

        public function edit($id){
            $notice=Notice::find($id);
            return view('Backend.admin.notice.edit',compact('notice'));

        }


    public function noticeDetails($id){

        $notice=Notice::find($id);
        return view('Backend.admin.notice.noticeDetails',compact('notice'));
    }

    public function update(Request $request,$id){

        // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional
        ]);

        // Initialize the image variable
        $notice = Notice::find($id);
        $image = $notice->image;

        if ($request->hasFile('image')) {
            if($notice->image && file_exists($notice->image)){
                unlink($notice->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = rand() . '.' . $extension;
            $path = 'Backend/image/notice/';
            $file->move($path, $filename);
            $image = $path . $filename; // Store the image path
        }


        $notice->title=$request->title;
        $notice->description=$request->description;
        $notice->date=$request->date;
        $notice->status=$request->status;
        $notice->image=$image;
        $notice->date=Carbon::now();
        $notice->save();


        toastr()->success('Notice update successfully');
        return redirect()->back();
    }


    public function delete($id){
        $notice=Notice::find($id);
        $notice->delete();
        toastr()->success('Notice Deleted Successfully');
        return redirect()->back();

    }

    public function view_all_notice()
    {
        $notice = Notice::latest()->paginate(12);
        return view('Backend.admin.notice.view_all')->with([
            'notice'=>$notice
        ]);
    }
}
