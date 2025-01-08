@extends('layouts.master')
@section('title','All Transaction')
@section('styles')
<style>
    body {
        font-family: 'Noto Sans Bengali', sans-serif;
        }
</style>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali&display=swap" rel="stylesheet">
@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Office Accounting</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('institute.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Transaction List</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Transaction List</div>
                <div class="card-title">
                    <form action="{{ route('all.transaction') }}" style="display: inline-flex; align-items: center;">
                        @csrf

                        <div class="form-group" style="margin-right: 10px;">
                            <label for="start_date" style="margin-right: 5px;">Start date</label>
                            <input type="date" name="start_date" class="form-control" max="{{ date('Y-m-d') }}" min="1992-01-01">
                        </div>

                        <div class="form-group" style="margin-right: 10px;">
                            <label for="end_date" style="margin-right: 5px;">End date</label>
                            <input type="date" name="end_date" class="form-control" max="{{ date('Y-m-d') }}" min="1992-01-01">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Filter</button>
                    </form>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive mt-2">
                    <table class="table table-bordered text-nowrap key-buttons border-bottom" id="file-datatable">
                        <thead>
                            <tr>
                              <th scope="col">Serial No</th>
                              <th scope="col">Branch Name</th>
                              <th scope="col">Course Name</th>
                              <th scope="col">Session Name</th>
                              <th scope="col">Pay For</th>
                              <th scope="col">Payment method</th>
                              <th scope="col">Transaction Id</th>
                              <th scope="col">Ammount</th>
                              <th scope="col">Curent Blance</th>
                              <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($transaction_list) && $transaction_list->count() > 0)
                            @foreach ($transaction_list as  $dataReg)

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dataReg->user->name ??'' }}</td>
                                <td>{{$dataReg->course->course_name}}</td>
                                <td>{{$dataReg->session->session_name ?? ''}}</td>
                                <td>{{ $dataReg->pay_for ? ucfirst($dataReg->pay_for) : '' }}</td>
                                <td>{{ ucfirst($dataReg->pay_mode) }}</td>
                                <td>{{ $dataReg->trnx_id }}</td>
                                <td>TK {{number_format($dataReg->amount)}}</td>
                                <td>TK {{ number_format($dataReg->total_earn, 2, '.', ',') }}</td>
                                <td>{{ $dataReg->created_at->setTimezone('Asia/Dhaka')->format('Y-m-d h:i A') }}</td>
                            </tr>

                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@include('Backend.admin.account.modal')
<!-- ROW-1 CLOSED -->
@endsection
@section('scripts')

@endsection
