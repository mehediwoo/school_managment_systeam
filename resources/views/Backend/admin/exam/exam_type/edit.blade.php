
@extends('layouts.master')
@section('title','Edit Exam Type')
@section('styles')

@endsection
@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Edit Exam Type</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('exam.type.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a></li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Edit Exam Type</div>
            </div>
            <div class="card-body">
                <form action="{{ route('exam.type.update',$edit->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Exam Type</label>
                        <input type="text" name="exam_type" class="form-control @error('exam_type') is-invalid @enderror" value="{{ $edit->exam_type }}">
                        @error('exam_type')
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
                        <button type="submit" class="btn btn-primary">Update</button>
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
