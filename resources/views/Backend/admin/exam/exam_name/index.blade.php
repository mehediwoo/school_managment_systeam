
@extends('layouts.master')
@section('title','Exam Name')
@section('styles')

@endsection
@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Exam Name</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Exam Name</li>
        </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Exam Name</div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#examTypeModal">
                    Add New +
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive mt-2">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Exam Name</th>
                                <th scope="col">Exam Code</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($exam_name))
                            @foreach ($exam_name as $key => $iteam)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $iteam->exam_name }}</td>
                                <td>{{ $iteam->exam_code }}</td>
                                <td>
                                    @if ($iteam->status =='active')
                                    <a href="{{ route('exam.name.status',$iteam->id) }}" class="badge bg-success">Active</a>
                                    @else
                                    <a href="{{ route('exam.name.status',$iteam->id) }}" class="badge bg-danger">De Active</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('exam.name.edit',$iteam->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('exam.name.destroy',$iteam->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this iteam ?')"><i class="fa fa-trash"></i></a>
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
@include('Backend.admin.exam.exam_name.exam_name_modal')
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')

@endsection
