
@extends('layouts.master')
@section('title','Exam Mark Distribution')
@section('styles')

@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Exam Mark Distribution <span id="exam_title"></span></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Exam Mark Distribution</li>
    </ol>
</div>

<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="">Exams</label>
                            <select name="exam" id="exam" class="form-control">
                                <option value="">Please select one exam</option>
                                @if (isset($all_exam))
                                @foreach ($all_exam as $iteam)
                                    <option value="{{ $iteam->id }}">{{ $iteam->exam_names->exam_name.' - ' }}({{ $iteam->exam_names->exam_code }})</option>
                                @endforeach
                                @endif
                            </select>
                            @error('exam')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="">Branch</label>
                            <select name="branch" id="branch" class="form-control">
                                
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-2">
                        <div class="form-group" style="margin-top: 27px;">
                            <label for=""></label>
                            <button id="filters" type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Exam Mark Distribution</div>
            </div>
            <div class="card-body">
                <div class="table-responsive mt-2" id="exam_table">

                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('Backend.admin.exam.exam_name.exam_name_modal') --}}
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        // Filter
        $('#filters').click(function(){
            let exam   = $('#exam').val();
            let branch = $('#branch').val();

            if (branch === null) {
                toastr.error('Please select branch!');
                return false;
                
            }else{
                $.ajax({
                    url: "{{ route('exam.mark.distribution.filter') }}",
                    data: {exam:exam,branch:branch},
                    success: function(data){
                        if (data=='0') {
                            toastr.error('Exam not found in your selected branch!');
                        }else{
                            $('#exam_table').html(data);
                            $('#basic-datatable').DataTable();
                        }
                    }
                });
            }

            
        });

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

        // update marks
        $(document).on('keyup','#marks',function(){
            let marks = $(this).val();
            let id = $(this).attr('mark-id');
            
            
            $.ajax({
                url: "{{ route('exam.mark.distribution.update') }}",
                data: {marks:marks,id:id},
                success: function(data){
                    if (data == '1') {
                        toastr.success('Marks updated successfully!');
                    }else{
                        toastr.error('Marks not updated!');
                    }
                }
            });
        });
        // update isAbsent
        $(document).on('click','#isAbsent',function(){
            let id = $(this).attr('absentId');
            
            $.ajax({
                url: "{{ route('exam.mark.distribution.isAbsent.update') }}",
                data: {id:id},
                success: function(data){
                    if (data == '1') {
                        toastr.success('This student present successfully! ');
                    }else{
                        toastr.warning('This student is absent !');
                    }
                }
            });
        });

    });
</script>
@endsection
