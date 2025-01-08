
@extends('layouts.master')
@section('title','Edit Exam Type')
@section('styles')

@endsection
@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Edit Course</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('exam.course.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a></li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Edit Exam Course</div>
            </div>
            <div class="card-body">
                <form action="{{ route('exam.course.update',$edit->id) }}" method="post">
                    @csrf
                    

                    <div class="form-group">
                        <label for="">Exam Course</label>
                        <select name="course" class="form-control">
                          @foreach ($course as $item)
                           @if($item->id == $edit->course_id)
                           <option class="text-danger" value="{{ $item->id }}" selected>{{ $item->course_name }}</option>
                           @else
                           <option value="{{ $item->id }}">{{ $item->course_name }}</option>
                           @endif
                            
                          @endforeach
                        </select>
                        @error('course')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Exam Total Mark's</label>
                        <input type="text" name="total_mark" class="form-control" value="{{ $edit->total_marks }}" placeholder="Enter Exam Total Mark">
                        @error('total_mark')
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
