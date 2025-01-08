
@extends('layouts.master')
@section('title','Edit Exam Grades')
@section('styles')

@endsection
@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Edit Exam Grades</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('exam.grade.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a></li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Edit Exam Grades</div>
            </div>
            <div class="card-body">
                <form action="{{ route('exam.grade.update',$edit->id) }}" method="post">
                    @csrf
                    

                    <div class="form-group">
                        <label for="">Exam Grade Name</label>
                        <input type="text" name="exam_grade_name" class="form-control @error('exam_grade_name') is-invalid @enderror" value="{{ $edit->grade_name }}" placeholder="Enter your exam grade name (A+)">
                        @error('exam_grade_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Exam Grade Point</label>
                        <input type="text" name="exam_grade_point" class="form-control @error('exam_grade_point') is-invalid @enderror" value="{{ $edit->grade_point }}" placeholder="Enter your exam grade point (4.50 etc)">
                        @error('exam_grade_point')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Min Percentance</label>
                        <input type="text" name="min_percentance" class="form-control @error('min_percentance') is-invalid @enderror" value="{{ $edit->min_percent }}" placeholder="Enter your exam min percentance">
                        @error('min_percentance')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Max Percentance</label>
                        <input type="text" name="max_percentance" class="form-control @error('max_percentance') is-invalid @enderror" value="{{ $edit->max_percent }}" placeholder="Enter your exam max percentance">
                        @error('max_percentance')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Remarks</label>
                        <input type="text" name="remarks" class="form-control @error('remarks') is-invalid @enderror" value="{{ $edit->remarks }}" placeholder="Enter your exam remarks (excelent,very good,good,poor etc)">
                        @error('remarks')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')

@endsection
