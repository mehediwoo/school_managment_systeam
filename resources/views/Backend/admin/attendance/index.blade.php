
@extends('layouts.master')
@section('title','Exam attendance Generate')
@section('styles')

@endsection
@section('content')
 <!-- PAGE-HEADER -->
 <div class="page-header">
    <h1 class="page-title">Exam attendance Generate</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Exam attendance Generate</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-md-12">
        <div class="card form-input-elements">
            <div class="card-header">
                <h3 class="mb-0 card-title">Exam attendance Generate</h3>
            </div>
            <form action="{{ route('attendance.pdg.generate') }}"  method="post" >
                @csrf
            <div class="card-body">
                <div class="row">

                    <div class="col-xl-5">
                        <div class="form-group">
                            <label for="">Exams</label>
                            <select name="exam" id="exam" class="form-control">
                                <option value="">Select exams</option>
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

                    <div class="col-md-5">
                        <label>Institute <span style="color:red">*</span></label>

                        <select name="institute" class="form-control custom-select select2" id="branch">
                            
                        </select>
                        @if ($errors->has('institute'))
                        <div class="error" style="color:red;">{{ $errors->first('institute') }}</div>
                        @endif

                    </div>

                    <div class="col-md-2">
                        <div class="card-footer text-end mt-3">
                            <button type="submit"  class="btn btn-primary">Generate Attendance</button>
                        </div>
                    </div>
                </div>

            </div>

        </form>
        </div>
        <div class="card">
            <div id="body_id">

            </div>
        </div>


</div>
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')
<script>
// get branch wise exam
$(document).on('change','#exam',function(){
    let branch = $(this).val();
            
    $.ajax({
        url: "{{ route('get.branch.wise.exam') }}",
        data: {branch:branch},
        success: function(data){
            $('#branch').empty();
            $.each(data, function(index, value) {
                $('#branch').append('<option value="'+value.id+'">'+value.name+'</option>');
            });
        }
    });
            
});
</script>
@endsection


