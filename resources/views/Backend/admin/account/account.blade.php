@extends('layouts.master')
@section('title','Account Managment')
@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Office Accounting</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('institute.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Office Accounting Managment</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Account List</div>
                <button type="button" class="btn btn-primary-gradient ml-auto" data-bs-toggle="modal" data-bs-target="#add_account">Create +</button>
            </div>
            <div class="card-body">

                <div class="table-responsive mt-2">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                              <th scope="col">SL</th>
                              <th scope="col">Account Name</th>
                              <th scope="col">Account Number</th>
                              <th scope="col">Description</th>
                              <th scope="col">Date</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                        <tbody>
                            @if (!empty($account) && $account->count() > 0)
                            @foreach ($account as $key=>$row)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $row->acc_name }}</td>
                                <td>{{ $row->acc_number }}</td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->date_time }}</td>
                                <td>
                                    @if ($row->status=='enable')
                                    <a href="{{ route('account.status',$row->id) }}" class="badge bg-success">Enable</a>
                                    @else
                                    <a href="{{ route('account.status',$row->id) }}" class="badge bg-danger">Desable</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('account.edit',$row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('account.destroy',$row->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this iteam ?')"><i class="fa fa-trash"></i></a>
                                </td>
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

