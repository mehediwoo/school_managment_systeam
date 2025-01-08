<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\exam_type;

class ExamTypeController extends Controller
{
    public function index()
    {
        $exam_type = exam_type::latest()->get();
        return view('Backend.admin.exam.exam_type.index')->with(['exam_type'=>$exam_type]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_type' => 'required',
            'status' => 'required'
        ]);

        $data = new exam_type;
        $data->exam_type = $request->input('exam_type');
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
        $edit = exam_type::findOrFail($id);
        return view('Backend.admin.exam.exam_type.edit')->with([
            'edit'=>$edit,
        ]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'exam_type' => 'required',
            'status' => 'required'
        ]);

        $data = exam_type::findOrFail($id);
        $data->exam_type = $request->input('exam_type');
        $data->status = $request->input('status');
        $result = $data->update();
        if (isset($result)) {
            toastr()->success("Data updated Successfully");
            return redirect()->route('exam.type.index');
        }else{
            toastr()->error("something went wrong, please try again !");
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $data = exam_type::findOrFail($id);
        if (isset($data)) {
            $data->delete();
            toastr()->success("delete Successfully");
            return redirect()->route('exam.type.index');
        }
    }

    public function status($id)
    {
        $data = exam_type::findOrFail($id);

        if ($data->status=='active') {

            $data->status ='deactive';
            $data->update();
            toastr()->success("Iteam status is de-activated successfully !");
            return redirect()->route('exam.type.index');

        }else if($data->status=='deactive'){

            $data->status ='active';
            $data->update();
            toastr()->success("Iteam status is activated successfully !");
            return redirect()->route('exam.type.index');

        }
    }
}
