
@extends('layouts.master')
@section('title','Edit Exam Center')
@section('styles')

@endsection
@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Edit Exam Center</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('exam.center.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a></li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Edit Exam Center</div>
            </div>
            <div class="card-body">
                <form action="{{ route('exam.center.update',$edit->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Center Name</label>
                        <input type="text" name="center_name" class="form-control @error('center_name') is-invalid @enderror" value="{{ $edit->center_name }}" placeholder="Enter your exam center name">
                        @error('center_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Center code</label>
                        <input type="text" name="center_code" class="form-control @error('center_code') is-invalid @enderror" value="{{ $edit->center_code }}" placeholder="Enter your exam center code">
                        @error('center_code')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Examiner Name</label>
                        <input type="text" name="examiner_name" class="form-control @error('examiner_name') is-invalid @enderror" value="{{ $edit->examiner_name }}" placeholder="Enter your exam center code">
                        @error('examiner_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control">
                            @if ($edit->status=='active')
                            <option value="active" selected>Active</option>
                            <option value="deactive">De Active</option>
                            @else
                            <option value="active">Active</option>
                            <option value="deactive" selected>De Active</option>
                            @endif
                        </select>
                        @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="modal-footer">
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
