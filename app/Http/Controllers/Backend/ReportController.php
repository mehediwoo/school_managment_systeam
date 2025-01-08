<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CourseModel;
use App\Models\Student;
use App\Models\EducationYear;
use Auth;

class ReportController extends Controller
{
    public function addmision_index()
    {
        $institute = User::where('admin_role','instituteadmin')->get();
        $course    = CourseModel::all();
        return view('Backend.admin.reports.addmision_report.index')->with([
            'institute'=>$institute,
            'course'=>$course,
        ]);
    }

    public function get_addmision_report(Request $request)
    {
        $institute = $request->input('institute');
        $own = Auth::user()->id;
        $course = $request->input('course');
        $session = $request->input('session');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if (Auth::user()->admin_role=='superadmin') {

            if ($institute==true) {

                if ($institute==true && $course==null && $session==null && $start_date==null && $end_date==null) {

                    $student = Student::where('created_by',$institute)->Where('status','Admited')->get();
                    return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));

                }else if ($course==true && $session==null && $start_date==null && $end_date==null) {

                    $student = Student::where('created_by',$institute)->where('course_id',$course)->Where('status','Admited')->get();
                    return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));

                }else if($course==true && $session==true && $start_date==null && $end_date==null){

                    $student = Student::where('created_by',$institute)->where('course_id',$course)->where('session_id',$session)->where('status','Admited')->get();
                    return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));

                }else if($course==true && $session==true && $start_date==true && $end_date==true){

                    $student = Student::where('created_by',$institute)->where('course_id',$course)
                    ->where('session_id',$session)
                    ->where('status','Admited')
                    ->whereBetween('created_at',[$start_date,$end_date.' 23:59:59'])
                    ->get();
                    return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));

                }else if($course==null && $session==null && $start_date==true && $end_date==true){
                    $student = Student::where('created_by',$institute)->where('status','Admited')
                    ->whereBetween('created_at',[$start_date,$end_date.' 23:59:59'])
                    ->get();
                    return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));
                }

            }else{

                if ($course==true && $session==null && $start_date==null && $end_date==null) {

                    $student = Student::where('course_id',$course)->Where('status','Admited')->get();
                    return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));

                }else if($course==true && $session==true && $start_date==null && $end_date==null){

                    $student = Student::where('course_id',$course)->where('session_id',$session)->where('status','Admited')->get();
                    return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));

                }else if($course==true && $session==true && $start_date==true && $end_date==true){

                    $student = Student::where('course_id',$course)
                    ->where('session_id',$session)
                    ->where('status','Admited')
                    ->whereBetween('created_at',[$start_date,$end_date.' 23:59:59'])
                    ->get();
                    return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));

                }else if($course==null && $session==null && $start_date==true && $end_date==true){
                    $student = Student::where('status','Admited')
                    ->whereBetween('created_at',[$start_date,$end_date.' 23:59:59'])
                    ->get();
                    return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));
                }

            }

        }else if(Auth::user()->admin_role=='instituteadmin'){

            if ($course==true && $session==null && $start_date==null && $end_date==null) {

                $student = Student::where('course_id',$course)->Where('status','Admited')->where('created_by',$own)->get();
                return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));

            }else if($course==true && $session==true && $start_date==null && $end_date==null){

                $student = Student::where('course_id',$course)->where('session_id',$session)->where('status','Admited')->where('created_by',$own)->get();
                return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));

            }else if($course==true && $session==true && $start_date==true && $end_date==true){

                $student = Student::where('course_id',$course)
                ->where('session_id',$session)
                ->where('status','Admited')
                ->whereBetween('created_at',[$start_date,$end_date.' 23:59:59'])
                ->where('created_by',$own)
                ->get();
                return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));

            }else if($course==null && $session==null && $start_date==true && $end_date==true){
                $student = Student::where('status','Admited')
                ->whereBetween('created_at',[$start_date,$end_date.' 23:59:59'])
                ->where('created_by',$own)
                ->get();
                return view('Backend.admin.reports.addmision_report.ajax.admi_table_body',compact('student'));
            }

        }

    }


    public function register_index()
    {
        $institute = User::where('admin_role','instituteadmin')->get();
        $course    = CourseModel::all();
        return view('Backend.admin.reports.register_report.index')->with([
            'institute'=>$institute,
            'course'=>$course,
        ]);
    }

    public function get_register_report(Request $request)
    {
        $institute = $request->input('institute');
        $own = Auth::user()->id;
        $course = $request->input('course');
        $session = $request->input('session');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if (Auth::user()->admin_role=='superadmin') {

            if ($institute==true) {

                if ($institute==true && $course==null && $session==null && $start_date==null && $end_date==null) {

                    $student = Student::where('created_by',$institute)->Where('status','registered')->get();
                    return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));

                }else if ($course==true && $session==null && $start_date==null && $end_date==null) {

                    $student = Student::where('created_by',$institute)->where('course_id',$course)->Where('status','registered')->get();
                    return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));

                }else if($course==true && $session==true && $start_date==null && $end_date==null){

                    $student = Student::where('created_by',$institute)->where('course_id',$course)->where('session_id',$session)->where('status','registered')->get();
                    return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));

                }else if($course==true && $session==true && $start_date==true && $end_date==true){

                    $student = Student::where('created_by',$institute)->where('course_id',$course)
                    ->where('session_id',$session)
                    ->where('status','registered')
                    ->whereBetween('created_at',[$start_date,$end_date.' 23:59:59'])
                    ->get();
                    return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));

                }else if($course==null && $session==null && $start_date==true && $end_date==true){
                    $student = Student::where('created_by',$institute)->where('status','registered')
                    ->whereBetween('created_at',[$start_date,$end_date.' 23:59:59'])
                    ->get();
                    return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));
                }

            }else{

                if ($course==true && $session==null && $start_date==null && $end_date==null) {

                    $student = Student::where('course_id',$course)->Where('status','registered')->get();
                    return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));

                }else if($course==true && $session==true && $start_date==null && $end_date==null){

                    $student = Student::where('course_id',$course)->where('session_id',$session)->where('status','registered')->get();
                    return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));

                }else if($course==true && $session==true && $start_date==true && $end_date==true){

                    $student = Student::where('course_id',$course)
                    ->where('session_id',$session)
                    ->where('status','registered')
                    ->whereBetween('created_at',[$start_date,$end_date.' 23:59:59'])
                    ->get();
                    return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));

                }else if($course==null && $session==null && $start_date==true && $end_date==true){
                    $student = Student::where('status','registered')
                    ->whereBetween('created_at',[$start_date,$end_date.' 23:59:59'])
                    ->get();
                    return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));
                }

            }

        }else if(Auth::user()->admin_role=='instituteadmin'){

            if ($course==true && $session==null && $start_date==null && $end_date==null) {

                $student = Student::where('course_id',$course)->Where('status','registered')->where('created_by',$own)->get();
                return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));

            }else if($course==true && $session==true && $start_date==null && $end_date==null){

                $student = Student::where('course_id',$course)->where('session_id',$session)->where('status','registered')->where('created_by',$own)->get();
                return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));

            }else if($course==true && $session==true && $start_date==true && $end_date==true){

                $student = Student::where('course_id',$course)
                ->where('session_id',$session)
                ->where('status','registered')
                ->whereBetween('created_at',[$start_date,$end_date.' 23:59:59'])
                ->where('created_by',$own)
                ->get();
                return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));

            }else if($course==null && $session==null && $start_date==true && $end_date==true){
                $student = Student::where('status','registered')
                ->whereBetween('created_at',[$start_date,$end_date.' 23:59:59'])
                ->where('created_by',$own)
                ->get();
                return view('Backend.admin.reports.register_report.ajax.admi_table_body',compact('student'));
            }

        }
    }

    public function course_session_index()
    {
        $institute = User::where('admin_role','instituteadmin')->get();
        return view('Backend.admin.reports.course_session.index')->with([

            'institute'=>$institute,

        ]);
    }

    public function course_session_report(Request $request)
    {
        $institute = $request->input('institute');
        $own = Auth::user()->id;
        $year = $request->input('year');
        $student_type = $request->input('student_type');

        $current_year = EducationYear::where('current','1')->first();

        if (Auth::user()->admin_role=='superadmin') {

            if ($student_type=='admited') {

                if ($year==null && $institute==true) {
                    $student = Student::select('course_id', 'session_id', DB::raw('count(*) as student_count'))
                        ->groupBy('course_id', 'session_id')->where('created_by',$institute)
                        ->where('status','Admited')
                        ->get();
                }else if($year==true && $institute==true){

                    $student = Student::select('course_id', 'session_id', DB::raw('count(*) as student_count'))
                        ->groupBy('course_id', 'session_id')->where('created_by',$institute)->whereYear('created_at',$year)
                        ->where('status','Admited')
                        ->get();
                }

            }else if($student_type=='registerd'){

                if ($year==null && $institute==true) {
                    $student = Student::select('course_id', 'session_id', DB::raw('count(*) as student_count'))
                        ->groupBy('course_id', 'session_id')->where('created_by',$institute)
                        ->where('status','registered')
                        ->get();
                }else if($year==true && $institute==true){
                    $student = Student::select('course_id', 'session_id', DB::raw('count(*) as student_count'))
                        ->groupBy('course_id', 'session_id')->where('created_by',$institute)->whereYear('updated_at',$year)
                        ->where('status','registered')
                        ->get();
                }

            }

        }else if(Auth::user()->admin_role=='instituteadmin'){

            if ($student_type=='admited') {

                if ($year==null && $own==true) {
                    $student = Student::select('course_id', 'session_id', DB::raw('count(*) as student_count'))
                        ->groupBy('course_id', 'session_id')->where('created_by',$own)
                        ->where('status','Admited')
                        ->get();
                }else if($year==true && $own==true){
                    $student = Student::select('course_id', 'session_id', DB::raw('count(*) as student_count'))
                        ->groupBy('course_id', 'session_id')->where('created_by',$own)->whereYear('created_at',$year)
                        ->where('status','Admited')
                        ->get();
                }

            }else if($student_type=='registerd'){

                if ($year==null && $own==true) {
                    $student = Student::select('course_id', 'session_id', DB::raw('count(*) as student_count'))
                        ->groupBy('course_id', 'session_id')->where('created_by',$own)
                        ->where('status','registered')
                        ->get();
                }else if($year==true && $own==true){
                    $student = Student::select('course_id', 'session_id', DB::raw('count(*) as student_count'))
                        ->groupBy('course_id', 'session_id')->where('created_by',$own)->whereYear('updated_at',$year)
                        ->where('status','registered')
                        ->get();
                }

            }

        }

        return view('Backend.admin.reports.course_session.ajax.admi_table_body',compact('student','current_year'));
    }
}
