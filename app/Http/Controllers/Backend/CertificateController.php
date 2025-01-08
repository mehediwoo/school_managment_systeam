<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamMarkDistri;
use App\Models\ExamSetup;
use App\Models\exam_publish_date;
use App\Models\certificate_signature;
use Carbon\Carbon;

class CertificateController extends Controller
{
    public function index()
    {
        $all_exam = ExamSetup::latest()->get();
        return view('Backend.admin.CardManagement.certificate.index', compact('all_exam'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'exam'=>'required',
            'branch'=>'required',
        ]);

        $exam       = $request->input('exam');
        $branch     = $request->input('branch');
        $issue_date = $request->input('issue_date');

        if (!isset($issue_date)) {
            
            $issue_date = Carbon::now()->format('d-m-Y');
        }else{
            $issue_date = Carbon::createFromFormat('Y-m-d', $issue_date)->format('d-m-Y');
        }
        $signature = certificate_signature::first();
        $publish_date = exam_publish_date::where('exam_id',$exam)->latest('id')->first();
        $allData = ExamMarkDistri::where('exam_id',$exam)->where('branch_id',$branch)->whereNot('is_absent',1)->get();
        
        if ( $allData->count() > 0) {
            return view('Backend.admin.CardManagement.certificate.certificate_svg',compact('allData','issue_date','exam','publish_date','signature'));
        }else{
            toastr()->error('Certificate not found in this credential !');
            return redirect()->back();
        }

        
    }

    public function certificate_signature(Request $request)
    {
        $request->validate([
            'controller_signature'=>'image',
            'chairman_signature'=>'image'
        ]);

        $data = certificate_signature::first();

        $folder = 'Backend/image/signature';
        $result;
        // controller signature
        if ($request->hasFile('controller_signature')) {
           
            if ($data->controller_signature == true && file_exists(public_path($data->controller_signature))) {
                unlink(public_path($data->controller_signature));
            }

            $file = $request->file('controller_signature');
            $name = 'controller'.time().'.'.$file->extension();
            $file->move($folder,$name);
            $data->controller_signature = $folder.'/'.$name;
            $result = $data->update();
        }

        // chairman signature
        if ($request->hasFile('chairman_signature')) {
           
            if ($data->chairman_signature == true && file_exists(public_path($data->chairman_signature))) {
                unlink(public_path($data->chairman_signature));
            }

            $file = $request->file('chairman_signature');
            $name = 'chairman'.time().'.'.$file->extension();
            $file->move($folder,$name);
            $data->chairman_signature = $folder.'/'.$name;
            $result = $data->update();
        }
        
        if ($result) {
            toastr()->success('Certificate Signature Updated Successfully !');
            return redirect()->back();
        }else{
            toastr()->error('Something wrong, please try again !');
            return redirect()->back();
        }
    }
}
