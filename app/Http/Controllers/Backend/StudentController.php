<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\Session;
use App\Models\Student;
use App\Models\EducationYear;
use App\Models\stRegAvlableAmount;
use App\Models\RegistrationSession;
use App\Models\User;
use Nette\Utils\Random;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
class StudentController extends Controller
{


    public function allStudent(){
        $data['student'] = Student::with('course','session')->get();

        $data['course']=CourseModel::all();
        $data['session']=Session::with('eduyear')->where('status','Active')->get();
        $data['year']=EducationYear::where('status','Active')->get();
        $data['institute'] = User::all();
        // dd($data['session']);
        if(Auth::user()->admin_role=='instituteadmin'){
            $data['student'] = Student::where('created_by',Auth::user()->id)->with('course','session')->paginate(10);
        }

        if(Auth::user()->admin_role=='superadmin'){
            $data['student'] = Student::with('course','session')->paginate(10);
        }
        return view('institute.student.all_student',$data);
    }

    public function getAllStudent()
    {
        $data['student'] = Student::with('course','session')->get();
        if(Auth::user()->admin_role=='instituteadmin'){
            $data['student'] = Student::where('created_by',Auth::user()->id)->with('course','session')->get();
        }

        if(Auth::user()->admin_role=='superadmin'){
            $data['student'] = Student::with('course','session')->get();
        }
        return view('institute.student.ajax.student_table',$data);
    }


    public function addmissionForm()
    {

        $data['course']=CourseModel::all();
        $data['session']=Session::where('status','Active')->get();
        $data['institute']=User::where('admin_role','instituteadmin')->get();
        return view('institute.student.addmision_form',$data);

    }

    public function insertStudent(Request $request){

        //    dd($request->all());
            $request->validate([
                'course_id' =>'required',
                'session_id' =>'required',
                'edu_qualification' =>'required',
                'roll_no' =>'required',
                'reg_no' =>'required',
               'passing_year' =>'required',

               'st_name' =>'required',
               'f_name' =>'required',
               'm_name' =>'required',
               'gender' =>'required',
              'id_type' =>'required',
              'reg_board' =>'required',
              'blood_group' =>'required',

              'id_number' =>'required',
               'Date_of_birth' =>'required',
               'religion' =>'required',

              'mobile_no' =>'required',
                'student_photo' =>'required',
               'id_document' =>'image',
               'edu_certificate' =>'image',
            ]);


            $register_session = RegistrationSession::where('session_id',$request->session_id)->where('time_setup_type','Addmission')->first();


            $student = new Student();
            $student->course_id = $request->course_id;
            $student->session_id = $request->session_id;

            if($request->edu_qualification=='others'){
                $student->edu_qualification = $request->other;
            }
            else{
                $student->edu_qualification = $request->edu_qualification;
            }

            $education=EducationYear::where('status','Active')->where('current','1')->first();
            $student->eduyear_id=$education->id;
            $student->roll_no = $request->roll_no;
            $student->reg_no = $request->reg_no;
            $student->result = $request->result;
            $student->reg_board = $request->reg_board;
            $student->passing_year = $request->passing_year;
            $student->st_name = $request->st_name;
            $student->f_name = $request->f_name;
            $student->m_name = $request->m_name;
            $student->blood_group = $request->blood_group;
            $student->gender = $request->gender;
            $student->status ='Admited';
            $student->class_roll = $request->class_roll;
            if (Auth::user()->admin_role=='superadmin') {
                $student->created_by= $request->input('institute');
            }else{
                $student->created_by=Auth::user()->id;
            }

            $student->id_type = $request->id_type;
            $student->id_number = $request->id_number;
            $student->Date_of_birth = $request->Date_of_birth;
            $student_id=Student::orderBy('id','desc')->first();
            if($student_id==null){
                $student->st_id_number=1;
            }
            else{
                $student->st_id_number=$student_id->id+1;
            }

            $student->religion = $request->religion;
            $student->mobile_no = $request->mobile_no;
            $student->comment = $request->comment;

                $student_photo=$request->student_photo;
                if(isset($student_photo)){
                $file = $request->file('student_photo');
                $extension = $file->extension();
                $filename = rand() .'student'. '.' . $extension;
                $path = 'Backend/image/Student/';
                $file->move($path, $filename);
                $student->student_photo = $path . $filename;

                }

                if(isset($request->id_document)){
                    $file = $request->file('id_document');
                    $extension = $file->extension();
                    $filename = time().'id'.'.'. $extension;
                    $path = 'Backend/image/Student/';
                    $file->move($path, $filename);
                    $student->id_document = $path . $filename;

                }

                if(isset($request->edu_certificate)){
                    $file = $request->file('edu_certificate');
                    $extension =  $file->extension();
                    $filename = time() .'edu'.'.'. $extension;
                    $path = 'Backend/image/Student/';
                    $file->move($path, $filename);
                    $student->edu_certificate = $path . $filename;
                }

                if ($register_session) {

                    $session_date = Carbon::parse($register_session->ending_date);
                    $today_date = Carbon::today();
                }else{
                    $session_date = null;
                    $today_date = null;
                }
                if ($register_session != true ) {

                    toastr()->error('This session are not registerd, please contact super admin!');
                    return redirect()->back();

                }else if($session_date->greaterThanOrEqualTo($today_date)){
                    $result = $student->save();
                    if ($result) {
                        // Redirect to the student list page
                        toastr()->success('Student added successfully');
                        return redirect()->to('Student/all');
                    }else{
                        // Redirect to the student list page
                        toastr()->success('Something went wrong...');
                        return redirect()->back();
                    }
                }else{

                    toastr()->error('This education session time is over. Please contact super admin or you can assign another session');
                    return redirect()->back();

                }


        }


    public function editStudent($id){

        $data['student'] = Student::find($id);
        $data['course']=CourseModel::all();
        $data['session']=Session::where('status','Active')->get();
        $data['institute'] = User::whereNotNull('branch_id')->get();



        return view('institute.student.edit',$data);
    }

    public function updateStudent(Request $request, $id) {

        $request->validate([

          'mobile_no' =>'required',
            'student_photo' =>'image',
           'id_document' =>'image',
           'edu_certificate' =>'image',
        ]);
    $student = Student::find($id);
    $student -> course_id = $request -> course_id;
    $student -> session_id = $request -> session_id;
    if ($request -> edu_qualification == 'others') {
        $student -> edu_qualification = $request -> other;

    } else {
        $student -> edu_qualification = $request -> edu_qualification;
    }
    $student -> reg_no = $request -> reg_no;
    $student -> result = $request -> result;
    $education = EducationYear::where('status', 'Active') -> first();
    $student -> eduyear_id = $education -> id;
    $student -> reg_board = $request -> reg_board;
    $student -> passing_year = $request -> passing_year;
    $student -> st_name = $request -> st_name;
    $student -> f_name = $request -> f_name;
    $student -> m_name = $request -> m_name;
    // $student->status = $request->status;
    $student -> blood_group = $request -> blood_group;
    $student -> gender = $request -> gender;
    if (Auth::user()->admin_role=='superadmin') {
        $student->created_by= $request->input('institute');
    }else{
        $student->created_by=Auth::user()->id;
    }
    $student -> class_roll = $request -> class_roll;
    $student -> id_type = $request -> id_type;
    $student -> id_number = $request -> id_number;
    $student -> Date_of_birth = $request -> Date_of_birth;
    $student_id = Student::orderBy('id', 'desc') -> first();
    if (isset($request -> st_id_number)) {
        $student -> st_id_number = $request -> st_id_number;
    } else {
        if ($student_id == null) {
            $student -> st_id_number = 1;
        } else {
            $student -> st_id_number = $student_id -> id + 1;
        }
    }

    $student -> religion = $request -> religion;
    $student -> mobile_no = $request -> mobile_no;
    $student -> comment = $request -> comment;

    if (isset($request -> student_photo)) {

        if ($student -> student_photo && file_exists($student -> student_photo)) {
            unlink($student -> student_photo);
        }

        $file = $request -> file('student_photo');
        $extension = 'student'.$file -> getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'Backend/image/Student/';
        $file -> move($path, $filename);
        $student -> student_photo = $path.$filename;
    }

    if (isset($request -> id_document)) {
        if ($student -> id_document && file_exists($student -> id_document)) {
            unlink($student -> id_document);
        }
        $file = $request -> file('id_document');
        $extension = 'id'.$file -> getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'Backend/image/Student/';
        $file -> move($path, $filename);
        $student -> id_document = $path.$filename;

        $student -> id_document;
    }

    if (isset($request -> edu_certificate)) {

        if ($student -> edu_certificate && file_exists($student -> edu_certificate)) {
            unlink($student -> edu_certificate);
        }

        $file = $request -> file('edu_certificate');
        $extension = 'edu'.$file -> getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'Backend/image/Student/';
        $file -> move($path, $filename);
        $student -> edu_certificate = $path.$filename;
    }

    $student -> update();

    // Redirect to the student list page
    toastr() -> success('Student Updated successfully');
    return redirect()->back();
}



    public function studentInfo($id){

        $data['student'] = Student::findOrFail($id);
        return view('institute.student.view',$data);
    }

    public function deleteStudent($id){
        $deleteStudent=Student::findOrFail($id);
        if($deleteStudent->student_photo != null && file_exists($deleteStudent->student_photo)){
            unlink($deleteStudent->student_photo);
        }
        $deleteStudent->delete();
        toastr()->success('Student deleted successfully');
        return redirect()->back();
    }

    public function Addmission_Registration(){

        return view('institute.student.admission_registration');
    }


    //ajax
    public function search_student(Request $request){

                if(Auth::user()->admin_role=='superadmin'){
                        $registration=$request->registration;
                        $course=$request->course_id;
                        $branch_id=$request->branch_id;

                        $auth_role=Auth::user()->admin_role;
                        $user=Auth::User()->where('branch_id',$branch_id)->first();
                        $user_id=$user->id;

                        $session_id=$request->session_id;
                        $eduyear_id=$request->eduyear_id;
                    if($registration=='Addmitted_List'){
                        $getstCourseWise=Student::with('course','session')->where('course_id',$course)->where('session_id',$session_id)->where('eduyear_id',$eduyear_id)->where('status','pending')->where('created_by',$user_id)->get();
                            return response()->json([

                                'data'=>$getstCourseWise,
                                'auth_role'=> $auth_role,

                            ]);
                    }elseif($registration=='Registered_Student'){
                        $getstCourseWise=Student::with('course','session')->where('course_id',$course)->where('session_id',$session_id)->where('eduyear_id',$eduyear_id)->where('status','registered')->where('created_by',$user_id)->get();
                        return response()->json([

                            'data'=>$getstCourseWise,
                            'auth_role'=> $auth_role,

                        ]);
                    }

                        else{
                            $getstCourseWise=Student::with('course','session')->where('course_id',$course)->where('session_id',$session_id)->where('eduyear_id',$eduyear_id)->where('status','pending')->where('created_by',$user_id)->get();
                            return response()->json([

                                'data'=>$getstCourseWise,
                                'auth_role'=> $auth_role,
                                'branch_id'=>$user_id,

                            ]);
                        }

                }else{
                    $registration=$request->registration;
                    $auth_role=Auth::user()->admin_role;
                    $course=$request->course_id;
                    $session_id=$request->session_id;
                    $eduyear_id=$request->eduyear_id;
                    if($session_id==null){
                        return response()->json('Data Not Found');
                    }
                    else{
                        if($registration=='Addmitted_List'){
                            $getstCourseWise=Student::with('course','session')->where('course_id',$course)->where('session_id',$session_id)->where('eduyear_id',$eduyear_id)->where('status','pending')->where('created_by',Auth::user()->id)->get();
                            return response()->json([

                                'data'=>$getstCourseWise,
                                'auth_role'=> $auth_role,

                            ]);
                        }

                        elseif($registration=='Registered_Student'){
                        $getstCourseWise=Student::with('course','session')->where('course_id',$course)->where('session_id',$session_id)->where('eduyear_id',$eduyear_id)->where('status','registered')->where('created_by',Auth::user()->id)->get();
                        return response()->json([

                            'data'=>$getstCourseWise,
                            'auth_role'=> $auth_role,

                        ]);
                        }

                        else{
                            $getstCourseWise=Student::with('course','session')->where('course_id',$course)->where('session_id',$session_id)->where('eduyear_id',$eduyear_id)->where('status','pending')->where('created_by',Auth::user()->id)->get();
                            return response()->json([
                                'data'=>$getstCourseWise,
                                'auth_role'=> $auth_role,

                            ]);
                        }
                    }

                }

    }

public function student_filtaring(Request $request)
{

    $registration = $request->input('registration');
    $institute = $request->input('institute');
    $course    = $request->input('course');
    $session   = $request->input('session');
    $edu_year  = $request->input('edu_year');
    $auth_role = Auth::user()->admin_role;

    if(Auth::user()->admin_role=='superadmin'){

        if ($registration=='Addmitted_List') {

            if ($institute ==true && $course==null && $edu_year==true) {

                $data['student'] = Student::with('course','session')->where('created_by',$institute)
                ->where('eduyear_id','=',$edu_year)
                ->where('status','Admited')
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if($institute == true && $course==true && $session==null && $edu_year==true){

                $data['student'] = Student::with('course','session')->where('created_by',$institute)
                ->where('course_id','=',$course)
                ->where('eduyear_id','=',$edu_year)
                ->where('status','=','Admited')
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if ($institute == null && $course==true && $session==null && $edu_year==true) {

                $data['student'] = Student::with('course','session')->where('course_id','=',$course)
                ->where('eduyear_id','=',$edu_year)
                ->where('status','=','Admited')
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if($course==true && $session==true && $institute == null && $edu_year==true){

                $data['student'] = Student::with('course','session')->where('course_id',$course)
                ->where('session_id',$session)
                ->where('eduyear_id','=',$edu_year)
                ->where('status','=','Admited')
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if($institute == true && $course==true && $session==true && $edu_year==true){

                $data['student'] = Student::with('course','session')->where('course_id',$course)
                ->where('session_id',$session)
                ->where('eduyear_id','=',$edu_year)
                ->where('created_by',$institute)
                ->where('status','=','Admited')
                ->get();

                return view('institute.student.ajax.student_table', $data);
            }else{
                $data['student'] = Student::with('course','session')
                ->where('eduyear_id','=',$edu_year)
                ->where('status','=','Admited')
                ->get();

                return view('institute.student.ajax.student_table', $data);
            }
        }else if($registration=='Registered_Student'){

            if ($institute ==true && $course==null && $edu_year==true) {

                $data['student'] = Student::with('course','session')->where('created_by',$institute)
                ->where('eduyear_id','=',$edu_year)
                ->where('status','registered')
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if($institute == true && $course==true && $session==null && $edu_year==true){

                $data['student'] = Student::with('course','session')->where('created_by',$institute)
                ->where('course_id','=',$course)
                ->where('eduyear_id','=',$edu_year)
                ->where('status','registered')
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if ($institute == null && $course==true && $session==null && $edu_year==true) {

                $data['student'] = Student::with('course','session')->where('course_id','=',$course)
                ->where('eduyear_id','=',$edu_year)
                ->where('status','registered')
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if($course==true && $session==true && $institute == null && $edu_year==true){

                $data['student'] = Student::with('course','session')->where('course_id',$course)
                ->where('session_id',$session)
                ->where('eduyear_id','=',$edu_year)
                ->where('status','registered')
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if($institute == true && $course==true && $session==true && $edu_year==true){

                $data['student'] = Student::with('course','session')->where('course_id',$course)
                ->where('session_id',$session)
                ->where('eduyear_id','=',$edu_year)
                ->where('created_by',$institute)
                ->where('status','registered')
                ->get();

                return view('institute.student.ajax.student_table', $data);
            }else{
                $data['student'] = Student::with('course','session')
                ->where('eduyear_id','=',$edu_year)
                ->where('status','registered')
                ->get();

                return view('institute.student.ajax.student_table', $data);
            }
        }else{
            if ($institute ==true && $course==null && $edu_year==true) {

                $data['student'] = Student::with('course','session')->where('created_by',$institute)
                ->where('eduyear_id','=',$edu_year)
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if($institute == true && $course==true && $session==null && $edu_year==true){

                $data['student'] = Student::with('course','session')->where('created_by',$institute)
                ->where('course_id','=',$course)
                ->where('eduyear_id','=',$edu_year)
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if ($institute == null && $course==true && $session==null && $edu_year==true) {

                $data['student'] = Student::with('course','session')->where('course_id','=',$course)
                ->where('eduyear_id','=',$edu_year)
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if($course==true && $session==true && $institute == null && $edu_year==true){

                $data['student'] = Student::with('course','session')->where('course_id',$course)
                ->where('session_id',$session)
                ->where('eduyear_id','=',$edu_year)
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if($institute == true && $course==true && $session==true && $edu_year==true){

                $data['student'] = Student::with('course','session')->where('course_id',$course)
                ->where('session_id',$session)
                ->where('eduyear_id','=',$edu_year)
                ->where('created_by',$institute)
                ->get();

                return view('institute.student.ajax.student_table', $data);
            }
        }

    }else{

        if ($registration=='Addmitted_List') {
            if ($course==true && $session==null && $edu_year==true) {

                $data['student'] = Student::with('course','session')->where('course_id','=',$course)
                ->where('created_by',Auth::user()->id)
                ->where('eduyear_id','=',$edu_year)
                ->where('status','Admited')
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if($course==true && $session==true && $edu_year==true){

                $data['student'] = Student::with('course','session')->where('course_id',$course)
                ->where('session_id',$session)
                ->where('eduyear_id','=',$edu_year)
                ->where('created_by',Auth::user()->id)
                ->where('status','Admited')
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else{
                $data['student'] = Student::with('course','session')
                ->where('eduyear_id','=',$edu_year)
                ->where('created_by',Auth::user()->id)
                ->where('status','Admited')
                ->get();

                return view('institute.student.ajax.student_table', $data);
            }
        }else if($registration=='Registered_Student'){
            if ($course==true && $session==null && $edu_year==true) {

                $data['student'] = Student::with('course','session')->where('course_id','=',$course)
                ->where('created_by',Auth::user()->id)
                ->where('eduyear_id','=',$edu_year)
                ->where('status','registered')
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if($course==true && $session==true && $edu_year==true){

                $data['student'] = Student::with('course','session')->where('course_id',$course)
                ->where('session_id',$session)
                ->where('eduyear_id','=',$edu_year)
                ->where('created_by',Auth::user()->id)
                ->where('status','registered')
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else{
                $data['student'] = Student::with('course','session')
                ->where('eduyear_id','=',$edu_year)
                ->where('created_by',Auth::user()->id)
                ->where('status','registered')
                ->get();

                return view('institute.student.ajax.student_table', $data);
            }
        }else{
            if ($course==true && $session==null && $edu_year==true) {

                $data['student'] = Student::with('course','session')->where('course_id','=',$course)
                ->where('created_by',Auth::user()->id)
                ->where('eduyear_id','=',$edu_year)
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }else if($course==true && $session==true && $edu_year==true){

                $data['student'] = Student::with('course','session')->where('course_id',$course)
                ->where('session_id',$session)
                ->where('eduyear_id','=',$edu_year)
                ->where('created_by',Auth::user()->id)
                ->get();

                return view('institute.student.ajax.student_table', $data);

            }
        }

    }
}

public function get_sessions(Request $request)
{
    // $course_id = $request->input('course_id');
    // $sessions = Session::whereJsonContains('course_id', $course_id)->where('status', 'Active')->get();

    // $year = EducationYear::all();

    // $combined = $sessions->map(function ($session) use ($year) {
    //     $year = $year->where('current', '1')->where('status','Active')->first();
    //     return [
    //         'id' => $session->id,
    //         's_name' => $session->session_name,
    //         'year' => $year->education_year,
    //     ];
    // });

    // return $combined;

    // return response()->json(['combined' => $combined]);
}

public function get_session(Request $request)
{
    // Decode the incoming course_id from the request
    $courseId = $request->course_id; // Assuming you are sending a single course_id
    $year = EducationYear::where('current', '1')->where('status','Active')->first();
    // Fetch sessions where the course_id exists in the session's course_id field
    $sessions = Session::whereJsonContains('course_id', $courseId)
                       ->where('status', 'Active') // Optional: Only fetch active sessions
                       ->get();

    // Prepare a variable to store the session options
    $sessionSelect = '';

    // Iterate through each session and generate the HTML options
    foreach ($sessions as $session) {
        $sessionSelect .= "<option value='" . $session->id . "'>" . $session->session_name .', '.$year->education_year. "</option>";
    }

    // Return or echo the session options (to be inserted into a <select> field)
    echo $sessionSelect;
}


public function newRegistration(Request $request)
{

    $data['student'] = Student::with('course','session')->get();
    $data['course']=CourseModel::all();
    $data['session']=Session::with('eduyear')->where('status','Active')->get();
    $data['year']=EducationYear::All();
    $data['get_reg_limit']=RegistrationSession::orderBy('id','desc')->with('session')->get();

    foreach($data['get_reg_limit'] as $limit){
        if($limit->time_setup_type=='Register'&& $limit->session->status=='Active'&& $limit->status=='Active'){
           $data['limit']= RegistrationSession::orderBy('id','desc')->with('session')->first();

        }
        else{
            $data['limit']= RegistrationSession::orderBy('id','desc')->with('session')->first();
        }

    }

    return view('institute.student.student_registration',$data);

}

public function getNewRegStudent()
{
    $data['student'] = Student::with('course','session')->get();
    if(Auth::user()->admin_role=='instituteadmin'){
        $data['student'] = Student::where('created_by',Auth::user()->id)->with('course','session')->get();
    }

    if(Auth::user()->admin_role=='superadmin'){
        $data['student'] = Student::with('course','session')->get();
    }
    return view('institute.student.ajax.register_student_table',$data);
}

public function newRegistrationInsert(Request $request) {

    $action = $request ->input('action');
    $all_student_id = $request->input('St_reg');

    if ($all_student_id != null) {
        foreach ($all_student_id as $single_student_id) {

            $student = Student::find($single_student_id);

            if ($student->status=='registered') {
                toastr() -> warning('This student allready registered !');
            }else{

            $registration = RegistrationSession::where('session_id', $student->session_id)
            ->where('time_setup_type','Registration')
            ->where('status', 'Active')->
            first();

            if ($registration) {

                $session_date = Carbon::parse($registration->ending_date);
                $today_date = Carbon::today();
            }else{
                $session_date = null;
                $today_date = null;
            }


            if ($registration == true && $session_date->greaterThanOrEqualTo($today_date)) {
                // Retrieve the student model by ID

                $availableAmount = stRegAvlableAmount::where('created_by',Auth::user()->id)
                ->latest()->first();
                $total_earn_amount = $availableAmount->total_earn;
                $totalFee = $student->course->course_amount;

                if ($total_earn_amount !=null && $total_earn_amount >= $totalFee) {
                    $balanceAmount = $total_earn_amount - $totalFee;
                    stRegAvlableAmount::where('id', $availableAmount -> id) -> update(
                        ['total_earn' => $balanceAmount]
                    );
                    $st_registration = '42700'. + $student -> id;
                    // Check if student exists Update the property
                    $student -> st_course_reg = $st_registration;
                    $student -> status = 'registered';
                    // Save the changes
                    $student -> update();
                    toastr() -> Success('Register successfully');

                } else {
                    toastr() -> error(
                        'Registration Failed. Not enough balance for your selected student.'
                    );
                }

            }else{
                toastr() -> error('This session time is over');
            }

            }
        }
        return redirect()->back();
    }else{
        toastr() -> error('Please select an admitted student first. ');
        return redirect()->back();
    }

}

public function CancelRegister(Request $request,$id){
    $student = Student::findOrFail($id);

    $registration = RegistrationSession::where('session_id', $student->session_id)
        ->where('time_setup_type','Registration')
        ->where('status', 'Active')->
        first();
    if ($registration) {

        $session_date = Carbon::parse($registration->ending_date);
        $today_date = Carbon::today();
    }else{
        $session_date = null;
        $today_date = null;
    }

    if ($student==true && $session_date==true && $session_date->greaterThanOrEqualTo($today_date)) {
        $student->st_course_reg=NULL;
        $student->status='Admited';
        $student->update();
        // refund student ammount
        $availableAmount = stRegAvlableAmount::where('created_by',Auth::user()->id)->latest()->first();

        $total_earn_amount = $availableAmount->total_earn;
        $totalFee = $student->course->course_amount;

        if ($total_earn_amount !=null) {
            $balanceAmount = $total_earn_amount + $totalFee;
            stRegAvlableAmount::where('id', $availableAmount -> id) -> update(
                ['total_earn' => $balanceAmount]
            );
            // Check if student exists Update the property
            // Save the changes
            $student -> update();
            toastr()->success('Register Cancel Successfully');

        }else{
            toastr()->error('Your blance is empty');
        }

        return redirect()->back();
    }else{
        toastr()->error('This session time is over');
        return redirect()->back();
    }
}

public function print_student(Request $request){

    $ids = $request->input('ids', '');
    $idsArray = explode(',', $ids);
    if($ids!=null){
        $students = Student::whereIn('id', $idsArray)->get();

        // Return view with students or handle print logic
        return view('institute.student.print_student',compact('students'));
    }
   else{
     toastr()->error('No Student Selected For Print');
     return redirect()->back();
   }

}


public function searchByInstituteId(Request $request)
{
    $instituteId = $request->institute_id;
    $auth_role=Auth::user()->admin_role;
    $institute=Auth::user()->where('branch_id',$instituteId)->first();
    $instituteStudent= $institute->id;
    // Fetch students by institute ID
    $students = Student::where('created_by',$instituteStudent) ->where('status', 'registered')
    ->with(['course', 'session'])->get();

    return response()->json([

        'data'=>$students,
        'auth_role'=> $auth_role,

    ]);
}

public function search(Request $request)
{
    $search = $request->input('search');
    $students = Student::where('st_name', 'LIKE', '%' .$search. '%' )
    ->orWhere('id_number', 'LIKE', '%' .$search. '%')
    ->orWhere('class_roll','LIKE', '%' .$search. '%')
    ->get();
    return view('Backend.admin.Student.table_body',compact('students'));
}


}
