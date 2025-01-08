<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\Session;
use App\Models\Student;
use App\Models\EducationYear;
use App\Models\RegistrationSession;
use App\Models\StRegistrationFund;
use App\Models\stRegAvlableAmount;
use App\Models\logoSet;
use App\Models\BackendSettings;


use Nette\Utils\Random;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class StudentRgisterFundController extends Controller
{
    public function add_fund(){

        return view('Backend.admin.Registration.AddFund');
    }

    public function allFund(){

        $data['course']  =CourseModel::all();
        $data['session'] =Session::with('eduyear')->where('status','Active')->get();
        //$data['available_payment'] = StRegistrationFund::where('institute_id',Auth::user()->id)->latest()->first();
        $data['avlable_amounts'] = stRegAvlableAmount::where('institute_id',Auth::user()->branch_id)->latest('id')->first();


        return view('Backend.admin.Registration.CreateFundView',$data);
    }


    public function getFund(Request $request)
    {
        $course_id = $request->input('course_id');
        $session_id = $request->input('session_id');
        $instituteOwner=Auth::user()->id;

        $getFund = StRegistrationFund::with('session','course')->where('created_by',$instituteOwner)->get();
        //$getAmount=stRegAvlableAmount::where('session_id',$session_id)->where('course_id',$course_id)->orderBy('id','desc')->with('StRegistrationFund')->where('created_by',$instituteOwner)->first();
        return response()->json([
          'data'=>$getFund,
          'amount'=>0,
        ]);

    }
    public function getFunds(Request $request)
    {
      $course_id = $request->input('course_id');
      $session_id = $request->input('session_id');
      $instituteOwner=Auth::user()->id;

      $getFund  =   StRegistrationFund::with('session','course')->where('created_by',$instituteOwner)->get();
      return view('Backend.admin.Registration.ajax.fund_table_body', compact('getFund'));
    }

    public function session(Request $request)
    {
      $course_id = $request->input('course_id');
      //$session = Session::where('course_id')->where('status','Active')->get();
      $session = Session::whereJsonContains('course_id', $course_id)->where('status', 'Active')->get();
      return response()->json($session);
    }

    public function fundInsert(Request $request){

        $request->validate([
            'amount' =>'required|numeric',
            'pay_for' =>'required',
            'session' =>'required',
            'course' =>'required',
          ]);

          $request->validate([
            'amount' =>'required|numeric',
            'pay_for' =>'required',
            'session' =>'required',
            'course' =>'required',
          ]);

          $regSession   =   RegistrationSession::where('session_id',$request->session)->orderBy('id','desc')->first();
          if($regSession==true){
            $data                 =  new StRegistrationFund();
            $data->session_id     = $request->session;
            $data->course_id      = $request->course;
            $data->institute_id   = Auth::user()->id;
            $data->reg_session_id = $regSession->id;
            $data->created_by     = Auth::user()->id;
            $data->amount         = $request->amount;
            $invoice = StRegistrationFund::orderBy('id', 'DESC')->first();

            if( $invoice==null){
              $data->invoice_number='1632'.+1;
            }
            else{
              $last_invoice_number=StRegistrationFund::orderBy('id', 'DESC')->first();
              $data->invoice_number=$last_invoice_number->invoice_number+1;
            }

            $data->pay_for = $request->pay_for;
            $data->status='Pending';
            $data->save();
            toastr()->success('Add Fund Successfully Done');
            return redirect()->back();

          }else{
            toastr()->error('This session is over !');
            return redirect()->back();
          }
    //   $av_amount=StRegistrationFund::where('course_id',$request->course_id)->where('session_id',$request->session_id)->orderBy('id', 'DESC')->where('created_by',Auth::user()->id)->first();

    //   if($av_amount==null){
    //     $data->available_amount=$request->amount;
    //   }
    //   else{
    //     $data->available_amount=$av_amount->available_amount+$request->amount;
    //    }
    }

    public function fund_delete($id)
    {
        $fund = StRegistrationFund::findOrFail($id);
        if ($fund) {
            $fund->delete();
            toastr()->success('Fund delete successfully !');
            return redirect()->back();
        }else{
            toastr()->error('Something went wrong, please try again now!');
            return redirect()->back();
        }
    }

    public function fundVoucherPdf($id){

        $data['voucher'] = StRegistrationFund::find($id);
        $data['year']    = EducationYear::where('status','Active')->first();
        $data['logo']    = logoSet::first();
        $data['admin']   = BackendSettings::first();

        return view('Backend.admin.Registration.FundVoucherPdf', $data);
        // return $pdf->stream('FundVoucher.pdf');
    }
}
