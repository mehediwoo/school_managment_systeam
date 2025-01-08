<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Notice;
use App\Models\stRegAvlableAmount;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class adminController extends Controller
{
    public function dashboard(){
        $studentCount =Student::all()->count();
        $studentRegCount =Student::where('status','registered')->count();
        $admitStudentCount =Student::where('status','Admited')->count();
        $graduatedStudentCount =Student::where('status','Graduated')->count();
        $earning =stRegAvlableAmount::orderBy('id','desc')->first();

        $totalEarn = $earning ? $earning->total_earn : 0;

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $monthlyIncome = stRegAvlableAmount::select(
            DB::raw('SUM(CASE WHEN updated_at IS NOT NULL THEN amount ELSE 0 END) + SUM(CASE WHEN updated_at IS NULL THEN amount ELSE 0 END) as total_income')
        )
        ->where(function($query) use ($currentMonth, $currentYear) {
            $query->whereMonth('updated_at', $currentMonth)
                  ->whereYear('updated_at', $currentYear)
                  ->orWhere(function($query) use ($currentMonth, $currentYear) {
                      $query->whereMonth('created_at', $currentMonth)
                            ->whereYear('created_at', $currentYear)
                            ->whereNull('updated_at');
                  });
        })
        ->first();

        // dd($monthlyIncome);
        $yearlyIncome = stRegAvlableAmount::select(
            DB::raw('SUM(CASE WHEN updated_at IS NOT NULL THEN amount ELSE 0 END) + SUM(CASE WHEN updated_at IS NULL THEN amount ELSE 0 END) as total_income')
        )
        ->where(function($query) use ($currentYear) {
            $query->whereYear('updated_at', $currentYear)
                  ->orWhere(function($query) use ($currentYear) {
                      $query->whereYear('created_at', $currentYear)
                            ->whereNull('updated_at');
                  });
        })
        ->first();

        // Notice
        $notice = Notice::orderBy('id', 'desc')->where('status', 'Active')->get()->map(function ($notice)
       {
            $notice->time_ago = \Carbon\Carbon::parse($notice->date)->diffForHumans();
            return $notice;
        });


        $currentYear = Carbon::now()->year;


        $monthlyRevenue = DB::table('st_reg_avlable_amounts')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_earn) as total_revenue'))
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get()
            ->keyBy('month');


        $months = collect(range(1, 12))->map(function ($month) use ($monthlyRevenue) {
            return (object) [
                'month' => $month,
                'month_name' => Carbon::create()->month($month)->format('F'),
                'total_revenue' => $monthlyRevenue->get($month)->total_revenue ?? 0,
            ];
        });




        // $branches = Branch::orderBy('id')->get();

        $lastSevenDays = Carbon::now()->subDays(7);



        $branches = Student::where('created_at', '>=', $lastSevenDays)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('user.id')
            ->map(function ($students) {
                $user = $students->first()->user;

                $lastStudentAddedTime = $students->first()->created_at;


                return [
                    'user' => $user,
                    'last_student_added_time' => $lastStudentAddedTime,

                ];
            });


        return view('pages.index3',compact('studentCount','monthlyIncome','yearlyIncome','studentRegCount','notice','admitStudentCount','months','branches','graduatedStudentCount'));
    }


    public function latest_addmision()
    {
        $latestStudent =user::latest()->take(10)->get();
        return view('Backend.admin.include.ajax.ad_body',compact('latestStudent'));
    }


    public function filter(Request $request){
        $user=User::whereNotNull('branch_id')->get();
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');






        $studentCount =Student::all()->count();
        $studentRegCount =Student::where('status','registered')->count();
        $admitStudentCount =Student::where('status','Admited')->count();
        $graduatedStudentCount =Student::where('status','Graduated')->count();
        $earning =stRegAvlableAmount::orderBy('id','desc')->first();

        $totalEarn = $earning ? $earning->total_earn : 0;

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $monthlyIncome = stRegAvlableAmount::select(
            DB::raw('SUM(CASE WHEN updated_at IS NOT NULL THEN amount ELSE 0 END) + SUM(CASE WHEN updated_at IS NULL THEN amount ELSE 0 END) as total_income')
        )
        ->where(function($query) use ($currentMonth, $currentYear) {
            $query->whereMonth('updated_at', $currentMonth)
                  ->whereYear('updated_at', $currentYear)
                  ->orWhere(function($query) use ($currentMonth, $currentYear) {
                      $query->whereMonth('created_at', $currentMonth)
                            ->whereYear('created_at', $currentYear)
                            ->whereNull('updated_at');
                  });
        })
        ->first();

        // dd($monthlyIncome);
        $yearlyIncome = stRegAvlableAmount::select(
            DB::raw('SUM(CASE WHEN updated_at IS NOT NULL THEN amount ELSE 0 END) + SUM(CASE WHEN updated_at IS NULL THEN amount ELSE 0 END) as total_income')
        )
        ->where(function($query) use ($currentYear) {
            $query->whereYear('updated_at', $currentYear)
                  ->orWhere(function($query) use ($currentYear) {
                      $query->whereYear('created_at', $currentYear)
                            ->whereNull('updated_at');
                  });
        })
        ->first();

        // Notice
        $notice = Notice::orderBy('id', 'desc')->where('status', 'Active')->get()->map(function ($notice)
       {
            $notice->time_ago = \Carbon\Carbon::parse($notice->date)->diffForHumans();
            return $notice;
        });


        $currentYear = Carbon::now()->year;


        $monthlyRevenue = DB::table('st_reg_avlable_amounts')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_earn) as total_revenue'))
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get()
            ->keyBy('month');


        $months = collect(range(1, 12))->map(function ($month) use ($monthlyRevenue) {
            return (object) [
                'month' => $month,
                'month_name' => Carbon::create()->month($month)->format('F'),
                'total_revenue' => $monthlyRevenue->get($month)->total_revenue ?? 0,
            ];
        });


        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $branches = Student::whereBetween('created_at', [$startDate, $endDate])
        ->with('user')
        ->orderBy('created_at', 'desc')
        ->get()
        ->groupBy('user.id')
        ->map(function ($students) {
            $user = $students->first()->user;

            $lastStudentAddedTime = $students->first()->created_at;


            return [
                'user' => $user,
                'last_student_added_time' => $lastStudentAddedTime,

            ];
        });



        return view('pages.index3',compact('studentCount','monthlyIncome','yearlyIncome','studentRegCount','notice','admitStudentCount','months','branches','graduatedStudentCount'));








    }

}
