
@extends('layouts.master')

@section('title','Course & Session Reports')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Course & Session Reports</h1>
</div>
<!-- PAGE-HEADER END -->
<!-- PAGE-HEADER -->
<div class="page-header">

    @if (Auth::user()->admin_role=='superadmin')
    <div class="col-xl-3 col-md-3">
        <div class="form-group">
            <label for="">Institute <span class="text-danger">*</span></label>
            <select class="form-control" name="institute" id="institute">
                <option value="">Select institute</option>
                @if (!empty($institute))
                @foreach ($institute as $institute)
                <option value="{{$institute->id}}">{{$institute->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="col-md-3 col-xl-3">
        @php
            $year = App\Models\EducationYear::get();
        @endphp
        <div class="form-group">
            <label for="">Year</label>
            <select name="year" class="form-control" id="year">
                <option value="">Choose year</option>
                @foreach ($year as $iteam)
                <option value="{{ $iteam->education_year }}">{{ $iteam->education_year }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-3 col-xl-3">
        <div class="form-group">
            <label for="">Student Type</label>
            <select name="student_type" class="form-control" id="student_type">
                <option value="admited">Admited</option>
                <option value="registerd">Registerd</option>
            </select>
        </div>
    </div>

    <div class="col-md-3 mt-1">
        <div class="form-group">
            <label for=""></label>
            <button class="btn btn-primary form-control" id="filter"><i class="fa fa-filter ms-3"></i>Filter</button>
        </div>
    </div>

    @elseif (Auth::user()->admin_role=='instituteadmin')

    <div class="col-md-5 col-xl-5">
        @php
            $year = App\Models\EducationYear::get();
        @endphp
        <div class="form-group">
            <label for="">Year</label>
            <select name="year" class="form-control" id="year">
                <option value="">Choose year</option>
                @foreach ($year as $iteam)
                <option value="{{ $iteam->education_year }}">{{ $iteam->education_year }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-5 col-xl-5">
        <div class="form-group">
            <label for="">Student Type</label>
            <select name="student_type" class="form-control" id="student_type">
                <option value="admited">Admited</option>
                <option value="registerd">Registerd</option>
            </select>
        </div>
    </div>

    <div class="col-md-2 mt-1">
        <div class="form-group">
            <label for=""></label>
            <button class="btn btn-primary form-control" id="filter"><i class="fa fa-filter ms-3"></i>Filter</button>
        </div>
    </div>
    @endif

    <div class="col-md-5 mt-1"></div>

</div>
<!-- PAGE-HEADER END -->



<!-- ROW-1 OPEN -->
<div class="row d-none" id="table_row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Course & Session Reports</div>
            </div>
            <div class="card-body">

                <div class="table-responsive mt-2">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable"">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Course</th>
                                <th scope="col">Session</th>
                                <th scope="col">Total Student</th>
                            </tr>
                        </thead>
                        <tbody id="body_id">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')

<script>
    $(document).ready(function(){

        // Get session with her course by on change
        $(document).on('change','#course',function(){
            let course_id = $(this).val();
            $.ajax({
                url: "{{ route('get.sessions') }}",
                data:{course_id:course_id},
                success:function(data){
                    $('#session').empty();
                    //$('#session').append('<option value="">Choose One</option>');
                    $.each(data,function(key,value){
                        $('#session').append('<option value='+value.id+'>'+value.session_name+'</option>');
                    });
                }
            });
        });

        // student data filtaring
        $(document).on('click','#filter',function(){

            let institute = $('#institute').val();
            let year  = $('#year').val();
            let student_type  = $('#student_type').val();

            $.ajax({

                url:"{{ route('get.course.session.report') }}",
                data:{
                    institute:institute,
                    year:year,
                    student_type:student_type,
                },
                success:function(data){
                    $('#table_row').removeClass('d-none');
                    $('#basic-datatable').DataTable().destroy();
                    $('#body_id').html(data);
                    $('#basic-datatable').DataTable();
                }
            });
        });

    });
</script>

@endsection
