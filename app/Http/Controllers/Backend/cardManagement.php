<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\CourseModel;
use App\Models\Session;
use App\Models\ExamSetup;
use App\Models\Student;
use App\Models\EducationYear;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\AdmitCardSerialNumber;
use App\Models\RegistrationCardSerialNumber;
use App\Models\signature;
use App\Models\card_pdf_time;
use App\Models\certificate_signature;
use Auth;
use Carbon\Carbon;
class cardManagement extends Controller
{
    public function reg_svg(Request $request){

        $current_year = EducationYear::where('current','1')->first();

        $selectedStudents = $request->input('generate_card');

        $manual_date = $request->input('manual_date');

        if (isset($manual_date)) {
            $manual_date = Carbon::parse($request->input('manual_date'))->format('d-M-Y');
        }else{
            $manual_date = Carbon::now()->format('d-M-Y');
        }

        $date = $request->input('date');
        if($selectedStudents===null){
          toastr()->error('Please select at least one student');
          return redirect()->back();
        }else{
            $signature = signature::first();

            $students = Student::whereIn('id', array_keys($selectedStudents))->get();
            
            foreach( $students as $student){

                $exists_serial = RegistrationCardSerialNumber::where('student_id',$student->id)->first();
                $count = RegistrationCardSerialNumber::orderBy('id', 'desc')->first();

                if ($exists_serial == null) {
                    $serial = new RegistrationCardSerialNumber;
                    $serial->student_id = $student->id;
            
                    if ($count != null) {
                        $serial->serial_number = $count->serial_number + 1;
                    } else {
                        $serial->serial_number = 345;
                    }
            
                    $serial->save();
                }
            }
            return view('Backend.admin.CardManagement.reg_svg', compact('students', 'date','signature','current_year','manual_date'));
        }


    }

    public function registration_template(){
        $branch=Branch::where('status','Approved')->get();
        $year=EducationYear::all();
        $course=CourseModel::where('status','Active')->get();
        $session=Session::where('status','Active')->get();
        $current_Year=EducationYear::where('current',1)->first();
        // dd($exam);
        return view('Backend.admin.CardManagement.reg_template',compact('year','course','session','branch','current_Year'));
    }




    public function registration_generate_card(Request $request){
        $request->validate([
            'input' => 'nullable|string',
            'course' => 'nullable|string',
            'session' => 'nullable|string',
            'exam' => 'nullable|string',

        ]);
        $institute=User::where('branch_id',$request->branch_id)->first();
        $institute_id=$institute->id;
        $student=Student::where('created_by',$institute_id)->where('course_id',$request->course_id)->where('session_id',$request->session_id)->where('eduyear_id',$request->year_id)
        ->where('status','registered')
        ->get();
        $current_Year=EducationYear::where('current',1)->first();
        return view('Backend.admin.CardManagement.registerStudentTable',compact('student','current_Year'));
        // return response()->json($student);
    }



    public function admit_svg(Request $request)
    {
        $selectedStudents = $request->generate_card;

        $manual_date = $request->input('manual_date');
        $exam_date   = $request->input('exam_date');

        if (isset($manual_date)) {
            $manual_date = Carbon::parse($request->input('manual_date'))->format('d-M-Y');
        }else{
            $manual_date = Carbon::now()->format('d-M-Y');
        }

        if (isset($exam_date)) {
            $exam_date = Carbon::parse($request->input('exam_date'))->format('d-M-Y');
        }else{
            $exam_date = Carbon::now()->format('d-M-Y');
        }

        if ($selectedStudents === null) {
            toastr()->error('Please select at least one student');
            return redirect()->back();
        } else {
            $students = Student::whereIn('id', array_keys($selectedStudents))->get();

            $signature = signature::first();

            $serialNumbers = [];
            $serialRecord = AdmitCardSerialNumber::orderBy('id', 'desc')->first();

            $currentSerial = $serialRecord ? $serialRecord->serial_number : 0;

            foreach ($students as $student) {
                $currentSerial++;

                $serialRecord = new AdmitCardSerialNumber();
                $serialRecord->serial_number = $currentSerial;
                $serialRecord->save();


                $serialNumbers[$student->id] = '345' . $currentSerial;
            }

            $svgData = view('Backend.admin.CardManagement.admitCard_svg', compact('students', 'serialNumbers','signature','manual_date','exam_date'))->render();
        }



        return view('Backend.admin.CardManagement.viewAdmit', [
            'chunkedData' => $svgData,
        ]);
    }




    // public function saveAdmit(Request $request)
    // {
    //     // Validate the form data
    //     $request->validate([
    //         'branch_id' => 'required|integer',
    //         'svg_data' => 'required|string',
    //     ]);



    //     $svgData = $request->input('svg_data');
    //     $fileName = 'admit_card.svg';

    //     // Return the SVG file for download
    //     return response($svgData)
    //         ->header('Content-Type', 'image/svg+xml')
    //         ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    // }



    public function admit_template(){
        $branch=Branch::where('status','Approved')->get();
        $year=EducationYear::all();
        $course=CourseModel::where('status','Active')->get();
        $session=Session::where('status','Active')->get();
        $current_Year=EducationYear::where('current',1)->first();
        // dd($exam);
        return view('Backend.admin.CardManagement.admitCard_template',compact('year','course','session','branch','current_Year'));
    }

    public function reg_template(){
        return view('Backend.admin.CardManagement.reg_template');
    }

    public function admit_generate_card(Request $request){
        $request->validate([
            'input' => 'nullable|string',
            'course' => 'nullable|string',
            'session' => 'nullable|string',
            'exam' => 'nullable|string',

        ]);

        $institute=User::where('branch_id',$request->branch_id)->first();
        $institute_id=$institute->id;
        $student=Student::where('created_by',$institute_id)->where('course_id',$request->course_id)->where('session_id',$request->session_id)->where('eduyear_id',$request->year_id)
         ->where('status','registered')
        ->get();
        $current_Year=EducationYear::where('current',1)->first();
        return view('Backend.admin.CardManagement.admitStudentTable',compact('student','current_Year'));
        // return response()->json($student);
    }

    public function signature()
    {
        $signature = signature::first();
        $certificate = certificate_signature::first();
        return view('Backend.admin.CardManagement.signature', compact('signature','certificate'));
    }

    public function signature_store(Request $request)
    {
        $request->validate([
            'signature_image'=>'required|image'
        ]);

        $data = signature::first();

        $folder = 'Backend/image/signature';

        if ($data->examination_signature_img==true && file_exists(public_path($data->examination_signature_img))) {
            unlink(public_path($data->examination_signature_img));
        }

        $file = $request->file('signature_image');
        $name = time().'.'.$file->extension();
        $file->move($folder,$name);
        $data->examination_signature_img = $folder.'/'.$name;
        $result = $data->update();

        if ($result) {
            toastr()->success('Signature Updated Successfully !');
            return redirect()->back();
        }else{
            toastr()->error('Something wrong, please try again !');
            return redirect()->back();
        }


    }

    public function card_time_index()
    {
        $card = card_pdf_time::get();
        return view('Backend.admin.CardManagement.generate_time', compact('card'));
    }

    public function card_time_store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'card_type' => 'required',
            'status' => 'required',
        ]);

        $date      = $request->input('date');
        $time24    = $request->input('time');
        $card_type = $request->input('card_type');
        $status    = $request->input('status');

        $time12 = \Carbon\Carbon::createFromFormat('H:i', $time24)->format('h:i A');

        $card = card_pdf_time::where('card_type',$card_type)->first();

        if ($card != null && $card->card_type=='admit') {
            toastr()->error('Admit card time are allready exists, please remove it first then create !');
            return redirect()->back();
        }else if($card != null && $card->card_type=='registration'){

            toastr()->error('Registration card time are allready exists, please remove it first then create !');
            return redirect()->back();

        }elseif ($card != null && $card->card_type=='certificate') {

            toastr()->error('Certificate time are allready exists, please remove it first then create !');
            return redirect()->back();

        }else{

            $card_insert = new card_pdf_time;
            $card_insert->date = $date;
            $card_insert->time = $time12;
            $card_insert->card_type = $card_type;
            $card_insert->status = $status;

            $result = $card_insert->save();
            if ($result) {
                toastr()->success('Card Time is save successfully !');
                return redirect()->back();
            }else{
                toastr()->error('Something wrong, please try again !');
                return redirect()->back();
            }

        }

    }

    public function card_time_destroy($id)
    {
        $data = card_pdf_time::findOrFail($id)->delete();
        toastr()->success('Delete successfully !');
        return redirect()->back();
    }



    // Card generate for institute panel

    public function institute_card_index()
    {
        return view('institute.card_download.index');
    }

    // public function institute_admit_index()
    // {
    //     $year=EducationYear::all();
    //     $course=CourseModel::where('status','Active')->get();
    //     $session=Session::where('status','Active')->get();
    //     $current_Year=EducationYear::where('current',1)->first();

    //     return view('institute.card_generate.admit',compact('year','course','session','current_Year'));
    // }

    // public function institute_admit_generate_card(Request $request)
    // {
    //     $course   = $request->input('course');
    //     $session  = $request->input('session_id');
    //     $edu_year = EducationYear::where('current',1)->first();

    //     $students = Student::where('created_by',Auth::User()->id)
    //     ->where('course_id',$course)
    //     ->where('session_id',$session)
    //     ->where('eduyear_id',$edu_year)
    //     ->where('status','registered')
    //     ->get();
    //     return view('institute.card_generate.admit_student_table', compact('students'));

    // }

    public function institute_download_admit_svg(Request $request)
    {
        $manual_date = $request->input('manual_date');

        if (isset($manual_date)) {
            $manual_date = Carbon::parse($request->input('manual_date'))->format('d-M-Y');
        }else{
            $manual_date = Carbon::now()->format('d-M-Y');
        }

        $today_date = Carbon::today()->toDateString();
        $timeNow = Carbon::now('Asia/Dhaka')->format('h:i A');

        $time_check = card_pdf_time::where('card_type','admit')->where('status','enable')->first();

        if ($time_check == true && $time_check->date >= $today_date) {

            //$selectedStudents = $request->generate_card;
                $branch = (string)Auth::user()->id;
                $edu_year = EducationYear::where('current',1)->first();
                $exam_setup = ExamSetup::whereJsonContains('branch_id',$branch)->where('status','publish')->latest()->first();
                if (!empty($exam_setup)) {
                    $students = collect();

                    foreach(json_decode($exam_setup->session_id) as $session){

                        $get_student = Student::where('created_by',$branch)
                        ->where('session_id',$session)
                        ->where('eduyear_id',$edu_year->id)
                        ->where('status','registered')
                        ->get();
                        $students = $students->merge($get_student);

                    }

                    if ($students->count() > 0) {
                        $signature = signature::first();
                        $serialNumbers = [];
                        $serialRecord = AdmitCardSerialNumber::orderBy('id', 'desc')->first();

                        $currentSerial = $serialRecord ? $serialRecord->serial_number : 0;

                        foreach ($students as $student) {
                            $currentSerial++;

                            $serialRecord = new AdmitCardSerialNumber();
                            $serialRecord->serial_number = $currentSerial;
                            $serialRecord->save();


                            $serialNumbers[$student->id] = '345' . $currentSerial;
                        }

                        $svgData = view('Backend.admin.CardManagement.admitCard_svg', compact('students', 'serialNumbers','signature','manual_date','exam_setup'))->render();
                    }else{
                        toastr()->error('Student not found in this session !');
                        return redirect()->back();
                    }


                }else{
                    toastr()->error('Your institute exam not started soon!');
                    return redirect()->back();
                }


            return view('Backend.admin.CardManagement.viewAdmit', [
                'chunkedData' => $svgData,
            ]);

        }else{

            toastr()->error('Time is over, Please contact super admin !');
            return redirect()->back();

        }

    }

    public function institute_registration_template()
    {
        $branch = Branch::where('status','Approved')->get();
        $year = EducationYear::all();
        $course = CourseModel::where('status','Active')->get();
        $session = Session::where('status','Active')->get();
        $current_Year = EducationYear::where('current',1)->first();
        // dd($exam);
        //return view('Backend.admin.CardManagement.reg_template',compact('year','course','session','branch','current_Year'));
        return view('institute.card_download.reg', compact('year','course','session','branch','current_Year'));
    }

    public function institute_registration_generate_card(Request $request)
    {
        $course   = $request->input('course');
        $session  = $request->input('session_id');
        $edu_year = $request->input('year_id');

        $students = Student::where('created_by',Auth::User()->id)
        ->where('course_id',$course)
        ->where('session_id',$session)
        ->where('eduyear_id',$edu_year)
        ->where('status','registered')
        ->get();
        return view('institute.card_download.reg_student_table', compact('students'));
    }

    public function institute_download_reg_svg(Request $request)
    {
        $manual_date = $request->input('manual_date');

        if (isset($manual_date)) {
            $manual_date = Carbon::parse($request->input('manual_date'))->format('d-M-Y');
        }else{
            $manual_date = Carbon::now()->format('d-M-Y');
        }

        $today_date = Carbon::today()->toDateString();
        $timeNow = Carbon::now('Asia/Dhaka')->format('h:i A');

        $time_check = card_pdf_time::where('card_type','registration')->where('status','enable')->first();

        if ($time_check == true && $time_check->date >= $today_date) {

            $current_year = EducationYear::where('current','1')->first();
            $course  = $request->input('course_id');
            $session = $request->input('session_id');


            $students = Student::where('created_by',Auth::User()->id)
            ->where('course_id',$course)
            ->where('session_id',$session)
            ->where('status','registered')
            ->get();

            if (!empty($students) && $students->count() > 0) {

                

                $signature = signature::first();

                foreach( $students as $student){

                    $exists_serial = RegistrationCardSerialNumber::where('student_id',$student->id)->first();
                    $count = RegistrationCardSerialNumber::orderBy('id', 'desc')->first();
    
                    if ($exists_serial == null) {
                        $serial = new RegistrationCardSerialNumber;
                        $serial->student_id = $student->id;
                
                        if ($count != null) {
                            $serial->serial_number = $count->serial_number + 1;
                        } else {
                            $serial->serial_number = 345;
                        }
                
                        $serial->save();
                    }
                }
                return view('Backend.admin.CardManagement.reg_svg', compact('students','signature','current_year','manual_date'));

            }else{
                toastr()->error('Register student are not found !');
                return redirect()->back();
            }

        }else{

            toastr()->error('Time is over, Please contact super admin !');
            return redirect()->back();
        }

    }

}
