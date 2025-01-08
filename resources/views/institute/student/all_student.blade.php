
@extends('layouts.master')
@section('title','All Student')
@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">All Student</h1>
</div>
<!-- PAGE-HEADER END -->
<!-- PAGE-HEADER -->
<div class="page-header">

    @if (Auth::user()->admin_role=='superadmin')
    <div class="col-xl-3 col-md-3">
        <div class="form-group">
            <label for="">Institute</label>
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

    <div class="col-xl-3 col-md-3">
        <div class="form-group">
            <label for="">Course</label>
            <select class="form-control" name="course" id="course">
                <option value="">Select Course</option>
                @if (!empty($course))
                @foreach ($course as $row)
                <option value="{{ $row->id }}">{{ $row->course_name }}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="">Session</label>
            <select class="form-control" name="session" id="session">

            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="">Year</label>
            <select class="form-control" name="edu_year" id="edu_year">
                @if (!empty($year))
                @foreach ($year as $row)
                    @if ($row->status=='Active' && $row->current=='1')
                    <option class="text-danger" value="{{$row->id}}" selected>{{$row->education_year}}</option>
                    @else
                    <option value="{{$row->id}}">{{ $row->education_year }}</option>
                    @endif
                @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="">Registration Status</label>
            <select class="form-control" name="reg_status" id="reg_status">
                <option value="">Select Registration Type</option>
                <option value="Addmitted_List">Admited List</option>
                <option value="Registered_Student">Register List</option>
            </select>
        </div>
    </div>

    @else
    <div class="col-xl-4 col-md-3">
        <div class="form-group">
            <label for="">Course</label>
            <select class="form-control" name="course" id="course">
                <option value="">Select Course</option>
                @if (!empty($course))
                @foreach ($course as $row)
                <option value="{{ $row->id }}">{{ $row->course_name }}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="">Session</label>
            <select class="form-control" name="session" id="session">

            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="">Year</label>
            <select class="form-control" name="edu_year" id="edu_year">
                @if (!empty($year))
                @foreach ($year as $row)
                    @if ($row->status=='Active' && $row->current=='1')
                    <option class="text-danger" value="{{$row->id}}" selected>{{$row->education_year}}</option>
                    @else
                    <option value="{{$row->id}}">{{ $row->education_year }}</option>
                    @endif
                @endforeach
                @endif
            </select>
        </div>
    </div>
    @endif


</div>
<!-- PAGE-HEADER END -->



<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">All Student</div>
                <div class="">
                    <a href="{{ route('addmision.form') }}" class="btn btn-primary py-1 px-4">Add New Student</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive mt-2">
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead>
                            <tr>
                                <th style="width:24px">
                                    <div class="form-check">
                                        <input type="checkbox" id="checkAll" class="form-check-input">
                                        <label class="form-check-label">All</label>
                                    </div>
                                </th>
                                <th scope="col">Id / Regi No</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Father Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Course</th>
                                <th scope="col">Session</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
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
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function(){

        // Load All Students
        function LoadStudentTable(){

            $.ajax({
                url : "{{ route('gate.all.student') }}",
                success:function(data){
                    $('#file-datatable').DataTable().destroy();
                    $('#body_id').html(data);
                    // $('#file-datatable').DataTable();

                    $('#file-datatable').DataTable({
                        dom: 'lBfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                }
            });
        }
        LoadStudentTable();

       // Get session with her course by on change
       $('#course').change(function(){

            var course_id=$(this).val();
            $.ajax({
                url:"{{ url('Student/get/session') }}",
                data: {course_id: course_id},
                success: function(response){
                    $('#session').html(response);
                }
            });
        });

        // student data filtaring
        $(document).on('change','#institute,#course,#session,#edu_year,#reg_status',function(){

            let registration = $('#reg_status').val();
            let institute = $('#institute').val();
            let course    = $('#course').val();
            let session   = $('#session').val();
            let edu_year  = $('#edu_year').val();

            $.ajax({

                url:"{{ route('search.stu.filtaring') }}",
                data:{
                    institute:institute,
                    course:course,
                    session:session,
                    edu_year:edu_year,
                    registration:registration
                },
                success:function(data){
                    $('#file-datatable').DataTable().destroy();
                    $('#body_id').html(data);
                    // $('#file-datatable').DataTable();
                    $('#file-datatable').DataTable({
                        dom: 'lBfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                }
            });
        });

    });
</script>

@endsection
