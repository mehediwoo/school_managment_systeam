@extends('layouts.master')
@section('title','New Deposit')
@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Office Accounting</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('institute.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">All New Deposit List</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">New Deposit</div>
            </div>
            <div class="card-body">

                <div class="table-responsive mt-2">
                    <table class="table table-bordered text-nowrap key-buttons border-bottom" id="file-datatable">
                        <thead>
                            <tr>
                              <th scope="col">SL</th>
                              <th scope="col">Branch Name</th>
                              <th scope="col">Account Name</th>
                              <th scope="col">Account Number</th>
                              <th scope="col">Description</th>
                              <th scope="col">Pay Via</th>
                              <th scope="col">Ammount</th>
                              <th scope="col">Date</th>
                              <th scope="col">Action</th>
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
                                <td>&#2547; {{number_format($dataReg->amount)}}</td>
                                <td>&#2547; {{ number_format($dataReg->total_earn, 2, '.', ',') }}</td>
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
@include('Backend.admin.account.deposite_modal')
<!-- ROW-1 CLOSED -->
@endsection
@section('scripts')
<script>

    $(document).ready(function(){

        // course on select
        $(document).on('change','#course',function(){

            let course = $(this).val();

        });



    });


</script>
@endsection
