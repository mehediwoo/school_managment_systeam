
@extends('layouts.master')
@section('title','Exam Grades')
@section('styles')

@endsection
@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Exam Grades</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Exam Grades</li>
        </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Exam Grades</div>
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
                                <th scope="col">Grade Name</th>
                                <th scope="col">Grade Point</th>
                                <th scope="col">Min Percentance</th>
                                <th scope="col">Max Percentance</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($grade))
                            @foreach ($grade as $key => $iteam)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $iteam->grade_name }}</td>
                                <td>{{ $iteam->grade_point }}</td>
                                <td>{{ $iteam->min_percent }}%</td>
                                <td>{{ $iteam->max_percent }}%</td>
                                <td>{{ $iteam->remarks }}</td>

                                <td>
                                    <a href="{{ route('exam.grade.edit',$iteam->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('exam.grade.destroy',$iteam->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this iteam ?')"><i class="fa fa-trash"></i></a>
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
@include('Backend.admin.exam.exam_grades.exam_center_modal')
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')

@endsection
