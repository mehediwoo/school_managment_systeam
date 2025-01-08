<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\CourseModel;
use App\Models\Session;
use App\Models\User;
use App\Models\Notice;
use App\Models\Branch;
use App\Models\stRegAvlableAmount;
use Auth;
class InstituteController extends Controller
{
    public function dashboard(){
        // Artisan auto command
        Artisan::call('optimize:clear');
        $ins_tute  =   Auth::user()->branch_id;
        $institute  =   Auth::user()->id;
        $now = Carbon::now();

        $data['total_students'] = Student::where('created_by',Auth::user()->id)->count();
        $data['all_admited_student'] = Student::where('created_by',Auth::user()->id)->where('status','Admited')->count();
        $data['all_register_student'] = Student::where('created_by',Auth::user()->id)->where('status','registered')->count();
        $data['blance'] =   stRegAvlableAmount::orderBy('id','desc')->where('institute_id', $ins_tute)->first();

        // male female chart
        $data['maleStudent']= Student::where('created_by',Auth::user()->id)->where('gender','male')->count();
        $data['femaleStudent']= Student::where('created_by',Auth::user()->id)->where('gender','female')->count();
        $data['other_student']= Student::where('created_by',Auth::user()->id)->where('gender','other')->count();

        $data['myStudent']=Student::orderBy('id','desc')->with('course','session')->where('created_by',Auth::user()->id)->take(10)->get();



        $data['jan'] = Student::where('created_by',$institute)->whereYear('created_at',$now->year)->whereMonth('created_at',1)->where('status','Admited')->count();
        $data['feb'] = Student::where('created_by',$institute)->whereMonth('created_at',2)->where('status','Admited')->count();
        $data['mar'] = Student::where('created_by',$institute)->whereMonth('created_at',3)->where('status','Admited')->count();
        $data['apr'] = Student::where('created_by',$institute)->whereMonth('created_at',4)->where('status','Admited')->count();
        $data['may'] = Student::where('created_by',$institute)->whereMonth('created_at',5)->where('status','Admited')->count();
        $data['jun'] = Student::where('created_by',$institute)->whereMonth('created_at',6)->where('status','Admited')->count();
        $data['july'] = Student::where('created_by',$institute)->whereMonth('created_at',7)->where('status','Admited')->count();
        $data['aug'] = Student::where('created_by',$institute)->whereMonth('created_at',8)->where('status','Admited')->count();
        $data['sep'] = Student::where('created_by',$institute)->whereMonth('created_at',9)->where('status','Admited')->count();
        $data['oct'] = Student::where('created_by',$institute)->whereMonth('created_at',10)->where('status','Admited')->count();
        $data['nov'] = Student::where('created_by',$institute)->whereMonth('created_at',11)->where('status','Admited')->count();
        $data['dec'] = Student::where('created_by',$institute)->whereMonth('created_at',12)->where('status','Admited')->count();

        //this year admited student
        $data['reg_jan'] = Student::where('created_by',$institute)->whereMonth('updated_at',1)->where('status','registered')->count();
        $data['reg_feb'] = Student::where('created_by',$institute)->whereMonth('updated_at',2)->where('status','registered')->count();
        $data['reg_mar'] = Student::where('created_by',$institute)->whereMonth('updated_at',3)->where('status','registered')->count();
        $data['reg_apr'] = Student::where('created_by',$institute)->whereMonth('updated_at',4)->where('status','registered')->count();
        $data['reg_may'] = Student::where('created_by',$institute)->whereMonth('updated_at',5)->where('status','registered')->count();
        $data['reg_jun'] = Student::where('created_by',$institute)->whereMonth('updated_at',6)->where('status','registered')->count();
        $data['reg_july'] = Student::where('created_by',$institute)->whereMonth('updated_at',7)->where('status','registered')->count();
        $data['reg_aug'] = Student::where('created_by',$institute)->whereMonth('updated_at',8)->where('status','registered')->count();
        $data['reg_sep'] = Student::where('created_by',$institute)->whereMonth('updated_at',9)->where('status','registered')->count();
        $data['reg_oct'] = Student::where('created_by',$institute)->whereMonth('updated_at',10)->where('status','registered')->count();
        $data['reg_nov'] = Student::where('created_by',$institute)->whereMonth('updated_at',11)->where('status','registered')->count();
        $data['reg_dec'] = Student::where('created_by',$institute)->whereMonth('updated_at',12)->where('status','registered')->count();





       $data['notice'] = Notice::orderBy('id', 'desc')->where('status', 'Active')->get()->map(function ($notice)
       {
            $notice->time_ago = \Carbon\Carbon::parse($notice->date)->diffForHumans();
            return $notice;
        });

        return view('pages.index2',$data);
    }

    public function welcome(){
        $branch = Branch::where('status','Approved')->get();

        return view('user.index',compact('branch'));
    }
}
