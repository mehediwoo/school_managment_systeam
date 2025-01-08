<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\exam_name;

class ExamNameController extends Controller
{
    public function index()
    {
        $exam_name = exam_name::latest()->get();
        return view('Backend.admin.exam.exam_name.index', compact('exam_name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_name' => 'required',
            'status' => 'required'
        ]);

        $ex_name = exam_name::latest()->first();

        $data = new exam_name;
        $data->exam_name = $request->input('exam_name');
        if ($ex_name==null) {
            $data->exam_code = 2021;
        }else{
            $data->exam_code = $ex_name->exam_code+1;
        }
        
        $data->status = $request->input('status');
        $result = $data->save();
        if (isset($result)) {
            toastr()->success("Data save Successfully");
            return redirect()->back();
        }else{
            toastr()->error("something went wrong, please try again !");
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $edit = exam_name::findOrFail($id);
        return view('Backend.admin.exam.exam_name.edit')->with([
            'edit'=>$edit,
        ]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'exam_name' => 'required',
            'status' => 'required'
        ]);

        $data = exam_name::findOrFail($id);
        $data->exam_name = $request->input('exam_name');
        $data->status = $request->input('status');
        $result = $data->save();
        if (isset($result)) {
            toastr()->success("Data save Successfully");
            return redirect()->route('exam.name.index');
        }else{
            toastr()->error("something went wrong, please try again !");
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $data = exam_name::findOrFail($id);
        if (isset($data)) {
            $data->delete();
            toastr()->success("delete Successfully");
            return redirect()->route('exam.name.index');
        }
    }

    public function status($id)
    {
        $data = exam_name::findOrFail($id);

        if ($data->status=='active') {

            $data->status ='deactive';
            $data->update();
            toastr()->success("Iteam status is de-activated successfully !");
            return redirect()->route('exam.name.index');

        }else if($data->status=='deactive'){

            $data->status ='active';
            $data->update();
            toastr()->success("Iteam status is activated successfully !");
            return redirect()->route('exam.name.index');

        }
    }
}
