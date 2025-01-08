
@extends('layouts.master')
@section('title','Exam Course')
@section('styles')

@endsection
@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Exam Course</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Exam Course</li>
        </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Exam Course</div>
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
                                <th scope="col">Exam Course</th>
                                <th scope="col">Course Total Marks</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($course))
                            @foreach ($course as $key => $iteam)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                @php
                                    $exam   = App\Models\ExamSetup::where('id',$iteam->exam_id)->first();
                                @endphp
                                <td>{{ $exam ? $exam->exam_names->exam_name : '' }}</td>
                                <td>{{ $iteam->course->course_name }}</td>
                                <td>{{ $iteam->total_marks }}</td>
                                <td>
                                    <a href="{{ route('exam.course.edit',$iteam->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('exam.course.destroy',$iteam->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this iteam ?')"><i class="fa fa-trash"></i></a>
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
@include('Backend.admin.exam.exam_subject.exam_type_modal')
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')
<script>


</script>
@endsection
