<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\exam_center;

class ExamCenterController extends Controller
{
    public function index()
    {
        $exam_center = exam_center::latest()->get();
        return view('Backend.admin.exam.exam_center.index', compact('exam_center'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'center_name' => 'required|unique:exam_centers,center_name',
            'center_code' => 'required|unique:exam_centers,center_code',
            'examiner_name' => 'required',
            'status' => 'required'
        ]);

        $data = new exam_center;
        $data->center_name = $request->input('center_name');
        $data->center_code = $request->input('center_code');
        $data->examiner_name = $request->input('examiner_name');
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
        $edit = exam_center::findOrFail($id);
        return view('Backend.admin.exam.exam_center.edit')->with([
            'edit'=>$edit,
        ]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'center_name' => 'required|unique:exam_centers,center_name,'.$id,
            'center_code' => 'required|unique:exam_centers,center_code,'.$id,
            'status' => 'required'
        ]);

        $data = exam_center::findOrFail($id);
        $data->center_name = $request->input('center_name');
        $data->center_code = $request->input('center_code');
        $data->examiner_name = $request->input('examiner_name');
        $data->status = $request->input('status');
        $result = $data->update();
        if (isset($result)) {
            toastr()->success("Data updated Successfully");
            return redirect()->route('exam.center.index');
        }else{
            toastr()->error("something went wrong, please try again !");
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $data = exam_center::findOrFail($id);
        if (isset($data)) {
            $data->delete();
            toastr()->success("delete Successfully");
            return redirect()->route('exam.center.index');
        }
    }

    public function status($id)
    {
        $data = exam_center::findOrFail($id);

        if ($data->status=='active') {

            $data->status ='deactive';
            $data->update();
            toastr()->success("Iteam status is de-activated successfully !");
            return redirect()->route('exam.center.index');

        }else if($data->status=='deactive'){

            $data->status ='active';
            $data->update();
            toastr()->success("Iteam status is activated successfully !");
            return redirect()->route('exam.center.index');

        }
    }
}
