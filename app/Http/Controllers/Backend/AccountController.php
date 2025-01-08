<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\stRegAvlableAmount;
use App\Models\bank_account;
use App\Models\Session;
use App\Models\CourseModel;
use App\Models\User;

class AccountController extends Controller
{

    public function account()
    {
        $account = bank_account::latest()->get();
        return view('Backend.admin.account.account',compact('account'));
    }

    public function account_store(Request $request)
    {
        $request->validate([
            'account_name'   => 'required|string',
            'account_number' => 'required|integer',
        ]);

        $acc = new bank_account;
        $acc->acc_name    = $request->input('account_name');
        $acc->acc_number  = $request->input('account_number');
        $acc->description = $request->input('description');
        $acc->date_time = Carbon::now()->toDateTimeString();

        $result = $acc->save();
        if ($result) {
            toastr()->success('Bank account created successfully !');
            return redirect()->back();
        }else{
            toastr()->error('Something went wrong, please try again !');
            return redirect()->back();
        }
    }



    public function account_edit($id)
    {
        $edit = bank_account::findOrFail($id);
        return view('Backend.admin.account.edit', compact('edit'));
    }



    public function account_update(Request $request,$id)
    {
        $request->validate([
            'account_name'   => 'required|string',
            'account_number' => 'required|integer',
        ]);

        $acc = bank_account::findOrFail($id);
        $acc->acc_name    = $request->input('account_name');
        $acc->acc_number  = $request->input('account_number');
        $acc->description = $request->input('description');
        $acc->date_time = Carbon::now()->toDateTimeString();

        $result = $acc->update();
        if ($result) {
            toastr()->success('Bank account updated successfully !');
            return redirect()->route('account.index');
        }else{
            toastr()->error('Something went wrong, please try again !');
            return redirect()->back();
        }
    }




    public function account_destroy($id)
    {
        $data = bank_account::findOrFail($id);

        if ($data) {
            $data->delete();
            toastr()->success('Bank account delete successfully !');
            return redirect()->back();
        }else{
            toastr()->error('Something went wrong, please try again !');
            return redirect()->back();
        }
    }

    public function status($id)
    {
        $data = bank_account::findOrFail($id);

        if ($data->status=='enable') {
            $data->status = 'disable';
            $data->update();
            toastr()->warning('Status disable successfully !');
            return redirect()->back();
        }else{
            $data->status = 'enable';
            $data->update();
            toastr()->success('Status enable successfully !');
            return redirect()->back();
        }
    }


    // new deposite
    public function new_deposite()
    {
        $institute = User::all();
        return view('Backend.admin.account.deposite')->with([
            'institute'=>$institute,
        ]);
    }


    public function all_transaction(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date   = $request->input('end_date');

        if ($start_date && $end_date) {
            $data['transaction_list']  = stRegAvlableAmount::whereBetween('created_at',[$start_date,$end_date])->latest()->get();
        }else{
            $data['transaction_list']  = stRegAvlableAmount::latest()->get();
        }

        return view('Backend.admin.account.all_transaction',$data);
    }
}
