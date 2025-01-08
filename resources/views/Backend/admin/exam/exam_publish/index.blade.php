
@extends('layouts.master')
@section('title','Result Publish Date')
@section('styles')

@endsection
@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Result Publish Date</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Result Publish Date</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                    <form action="{{ route('exam.publish.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group">
                                    <label for="">Exams</label>
                                    <select name="exam" id="exam" class="form-control">
                                        <option value="">Select Exam</option>
                                        @if (isset($all_exam))
                                        @foreach ($all_exam as $iteam)
                                            <option value="{{ $iteam->id }}">{{ $iteam->exam_names->exam_name.' - ' }}({{ $iteam->exam_names->exam_code }})</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('exam')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
        

                            <div class="col-xl-3">
                                <div class="form-group">
                                    <label for="">Publishing Date</label>
                                    <input type="date" name="publish_date" class="form-control">
                                    @error('publish_date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="col-xl-2">
                                <div class="form-group" style="margin-top: 27px;">
                                    <label for=""></label>
                                    <button id="filter" type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>

                    </form>
                    
            </div>
        </div>
    </div>
</div>
<!-- ROW-1 CLOSED -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Exam Publishing Date Lists</div>
            </div>
            <div class="card-body">
                <div class="table-responsive mt-2">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Exam Name</th>
                                <th scope="col">Publish Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($publish_date))
                            @foreach ($publish_date as $key => $iteam)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $iteam->exam->exam_names->exam_name }}</td>
                                <td>{{ $iteam->publish_date }}</td>
                                
                                <td>
                                    <a href="{{ route('exam.publish.destroy',$iteam->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this iteam ?')"><i class="fa fa-trash"></i></a>
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

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
      
    });
</script>
@endsection
