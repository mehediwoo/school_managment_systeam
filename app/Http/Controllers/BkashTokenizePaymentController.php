<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Karim007\LaravelBkashTokenize\Facade\BkashPaymentTokenize;
use Karim007\LaravelBkashTokenize\Facade\BkashRefundTokenize;
use Log;
use App\Models\createPayment;
use App\Models\amount;
use App\Models\Branch;
use App\Models\stRegAvlableAmount;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Backend\PaymentTemp;
use App\models\custompayment;
use App\Models\StRegistrationFund;
use Brian2694\Toastr\Facades\Toastr;

class BkashTokenizePaymentController extends Controller
{
    public function index()
    {
        // dd('hello');
        return view('bkashT::bkash-payment');
    }

    public function createPayment(Request $request)
    {




        // dd('hello');
        $amount   = $request->input('amount');

        $amountId = $request->input('amountId'); // Use input() method for consistency
        $auth     =  Auth::user()->id;
        // $branch_id=$auth->branch_id;
        $getAuth         = Auth::user()->where('id',$auth)->first();
        $getbranch       = Branch::where('id',$getAuth->branch_id)->first();
        $getInstitue     = $getbranch->institute_name;

        $Transaction_Fee = custompayment::where('id',1)->first();
        $t_fee           = $Transaction_Fee->transactionFee;
        $total_amount    = $amount+ $amount*$t_fee/100;
        $total_amount    = number_format((float)$total_amount, 2, '.', '');

        $inv = uniqid();

        $requestData = [
            'intent' => 'sale',
            'mode' => '0011',
            'payerReference' => $inv,
            'currency' => 'BDT',
            'amount' => $total_amount,
            'merchantInvoiceNumber' => $inv,
            'callbackURL' =>route('bkash-callBack'),
        ];







        $request_data_json = json_encode($requestData);
        // return $request_data_json;

        // Call the bKash API
        $response = BkashPaymentTokenize::cPayment($request_data_json);

        //  dd($response);
        // Check if response is an array
        if (is_array($response)) {
            $paymentId = $response['paymentID'] ?? null;
            $bkashURL = $response['bkashURL'] ?? null;

            if($response['paymentID']==null){
                Toastr()->warning('Please Try Again');
                return redirect()->to('/Registration/student/all/fund/view');
            }
            else{
                $payment= new PaymentTemp();
                $payment->amount_id = $amountId;
                $payment->amount = $amount ;
                $payment->payment_id =$response['paymentID'];
                $payment->save();
            }
            // dd($paymentId); // Debug the payment ID
            if ($paymentId && $bkashURL) {
                return redirect()->away($bkashURL); // Redirect to bKash payment page
            } else {
                return response()->json(['status' => 'error', 'message' => 'Payment ID or bkashURL not received']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Invalid response format']);
        }
    }




    public function callBack(Request $request)
    {

        $paymentId = $request->input('paymentID'); // or however you are receiving the paymentID


        $temp = PaymentTemp::where('payment_id', $paymentId)->first();
        $amountId = $temp ? $temp->amount_id : null;

        $amount= $temp ? $temp->amount: null;

        if ($request->status == 'success'){
            $response = BkashPaymentTokenize::executePayment($request->paymentID);

            if (!$response){ //if executePayment payment not found call queryPayment
                $response = BkashPaymentTokenize::queryPayment($request->paymentID);
                // dd( $response);
                //$response = BkashPaymentTokenize::queryPayment($request->paymentID,1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
            }

            if (isset($response['statusCode']) && $response['statusCode'] == "0000" && $response['transactionStatus'] == "Completed") {
                /*
                 * for refund need to store
                 * paymentID and trxID
                 * */
                $payment=new createPayment();
                $payment->payment_id=$request->paymentID;
                $payment->transaction_id=$response['trxID'];
                $payment->amount=$response['amount'];

                   // toastr()->warning('Your transaction is failed');
                    $auth=Auth::user()->id;
                    //  $branch_id=$auth->branch_id;
                    $getAuth=Auth::user()->where('id',$auth)->first();
                    $getbranch=Branch::where('id',$getAuth->branch_id)->first();
                    $getInstitue= $getbranch->institute_name;

                $payment->branch_name=$getInstitue; // Assuming 'amount' is in the response
                $payment->status='Completed';
                $payment->save();

                //get amount id
                if ($amountId) {
                $amountRecord = StRegistrationFund::where('id', $amountId)->first();

                $getAvailableAmount=StRegistrationFund::where('course_id', $amountRecord->course_id)->where('session_id', $amountRecord->session_id)
                ->orderBy('id','desc')->first();
                if ($amountRecord) {
                    $amountRecord->status = 'Paid'; // Or any status indicating the payment process has started
                    $amountRecord->save();
                  }
                }

             //available amount insert
             $amountRecord = StRegistrationFund::where('id', $amountId)->first();
             $amount_instituteId=$amountRecord->institute_id;

             $getAvailableAmounts = stRegAvlableAmount::where('course_id', $amountRecord->course_id)->where('session_id', $amountRecord->session_id)
             ->orderBy('id','desc')->where('institute_id',$amountRecord->institute_id)->first();
             $availableAmount = $getAvailableAmounts ? $getAvailableAmounts->total_earn : 0;

             $total_earn = stRegAvlableAmount::orderBy('id','desc')->where('created_by',$amount_instituteId)->first();



             $total_earn_amount = $total_earn ? $total_earn->total_earn : 0;  // Ensure it's either the value or 0 if null

             // Check if no available amount records were found
             if ($getAvailableAmounts == null) {
                 $auth = Auth::user()->id;

                 // Fetch user and branch information
                 $getAuth = Auth::user()->where('id', $auth)->first();
                 $getbranch = Branch::where('id', $getAuth->branch_id)->first();

                 $Transaction_Fee = custompayment::where('id',1)->first();
                 $t_fee = $Transaction_Fee->transactionFee;
                //  dd($request->input('amount'));
                //  $total_amount=$response['amount']-$response['amount']*$t_fee/100;
                // //  dd($total_amount);
                //  $total_amount = number_format((float)$total_amount, 2, '.', '');
                 // Create a new stRegAvlableAmount record
                 $getAvailableAmount = new stRegAvlableAmount();
                 $getAvailableAmount->amountfund_id = $amountRecord->id;
                 $getAvailableAmount->course_id     = $amountRecord->course_id;
                 $getAvailableAmount->session_id    = $amountRecord->session_id;
                 $getAvailableAmount->amount        =  $amount; // Set default amount
                 $getAvailableAmount->available_amount = $availableAmount+$amount;
                 $getAvailableAmount->total_earn    =$total_earn_amount+$amount;  // Add 100 to the existing total earnings
                 $getAvailableAmount->institute_id  = $getAuth->branch_id;
                 $getAvailableAmount->created_by    = $auth;
                 $getAvailableAmount->invoice_number= $amountRecord->invoice_number;
                 $getAvailableAmount->pay_mode      = 'Bkash';
                 $getAvailableAmount->pay_for       = $amountRecord->pay_for;
                 $getAvailableAmount->trnx_id       =  $payment->transaction_id;
                 $getAvailableAmount->date =Carbon::createFromFormat('Y-m-d', '2024-10-02');

                 // Debugging purpose to check the created object


                 // Save the new record
                 $getAvailableAmount->save();
             }
          else{

             $auth  =   Auth::user()->id;
             //  $branch_id=$auth->branch_id;
               $getAuth=Auth::user()->where('id',$auth)->first();
               $getbranch=Branch::where('id',$getAuth->branch_id)->first();

                     $Transaction_Fee=custompayment::where('id',1)->first();
                 $t_fee= $Transaction_Fee->transactionFee;
                 $total_amount=$response['amount']-$response['amount']*$t_fee/100;
                  $total_amount = number_format((float)$total_amount, 2, '.', '');


               $getAvailableAmount=new stRegAvlableAmount();
               $getAvailableAmount->amountfund_id=$amountRecord->id;
               $getAvailableAmount->course_id=$amountRecord->course_id;
               $getAvailableAmount->session_id=$amountRecord->session_id;
               $getAvailableAmount->amount        =  $amount; // Set default amount
               $getAvailableAmount->available_amount = $availableAmount+$amount;
               $getAvailableAmount->total_earn =$total_earn_amount+$amount;
               $getAvailableAmount->institute_id=$getAuth->branch_id;
               $getAvailableAmount->created_by= $auth;
               $getAvailableAmount->date =Carbon::createFromFormat('Y-m-d', '2024-10-02');
              $getAvailableAmount->save();
          }
                Toastr()->success('Your transaction is Successfully done.');
                return redirect()->to('/Registration/student/all/fund/view')->with('message', 'Payment successful with transaction ID: ' . $response['trxID']);
                // return BkashPaymentTokenize::success('Thank you for your payment', $response['trxID']);
            }
            return BkashPaymentTokenize::failure($response['statusMessage']);
        }
        else if ($request->status == 'cancel'){





            toastr()->warning('Your transaction is Canceled');
            return redirect()->to('/Registration/student/all/fund/view');
        }else{

            toastr()->warning('Your transaction is failed');
            return redirect()->to('/Registration/student/all/fund/view');
            // return BkashPaymentTokenize::failure('Your transaction is failed');
        }
    }

    public function searchTnx($trxID)
    {
        //response
        return BkashPaymentTokenize::searchTransaction($trxID);
        //return BkashPaymentTokenize::searchTransaction($trxID,1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }

    public function refund(Request $request)
    {

        //response
        $paymentID = $request->input('paymentID');
        $trxID = $request->input('trxID');
        $amount = $request->input('amount');
        $reason = $request->input('reason');
        $sku = 'abc';

        // Call bKash API to process refund
        $response = BkashRefundTokenize::refund($paymentID, $trxID, $amount, $reason, $sku);
        if ($response){
             $refund=createPayment::where('payment_id',$paymentID)->first();
             $refund->refund_id=$response['refundTrxID' ];
             $refund->save();
        }
         // Redirect to another route with response data
              return redirect()->route('bkash-refund-status')
                           ->with('response', $response)
                            ->with('paymentID', $paymentID);
        // return BkashRefundTokenize::refund($paymentID,$trxID,$amount,$reason,$sku);

        //return BkashRefundTokenize::refund($paymentID,$trxID,$amount,$reason,$sku, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }
    public function refundStatus(Request $request)
    {
       // Retrieve the response and paymentID from the session
            $response = $request->session()->get('response');
            // dd($response);
            $paymentID = $request->session()->get('paymentID');

              // Pass the response data to the view
                return BkashPaymentTokenize::success('Your Refund Request is successfully reached', $response['refundTrxID' ]);
        //return BkashRefundTokenize::refundStatus($paymentID,$trxID, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }
}
