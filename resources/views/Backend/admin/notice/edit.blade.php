@extends('layouts.master')
@section('title','Edit Notice')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Edit Notice</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('institute.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Notice</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->
<div class="card">
    <div class="card-header justify-content-between">
        <div class="card-title">Create Notice </div>
    </div>
    <div class="card-body">

        <form class="new-added-form" action="{{url('notice/update/'.$notice->id)}}" method="Post" enctype="multipart/form-data">
            @csrf
             <div class="row">
                 <div class="col-xl-12 col-lg-12 col-12 form-group">
                     <label>Notice Title *</label>
                     <input type="text" name="title" value="{{ $notice->title }}" class="form-control">
                 </div>

                 <div class="col-xl-12 col-lg-12 col-12 form-group">
                     <label>Image *</label>
                     <input type="file" name="image"  class="form-control">

                     <div><img src="{{asset($notice->image)}}" alt="" style="width: 100px;height: 100px"></div>
                 </div>

                 <div class="col-xl-12 col-lg-12 col-12 form-group">
                     <label>Status</label>
                     <select name="status" class="select2 form-control">
                         <option value="{{ $notice->status }}">{{ $notice->status }}</option>
                         <option value="Active">Active</option>
                         <option value="Deactive">Deactive</option>

                     </select>
                 </div>

                 <div class="form-group">
                    <label for="">Description</label>
                    <textarea id="summernote" rows="10" cols="80" name="description" class="form-control">{!! $notice->description !!}</textarea>
                 </div>





                 <div class="col-md-6 form-group"></div>
                 <div class="col-12 form-group mg-t-8">
                     <button type="submit" class="btn btn-primary">Update</button>
                 </div>
             </div>
         </form>

    </div>
</div>



@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<script>

    $(document).ready(function() {

        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

    });
</script>
@endsection
