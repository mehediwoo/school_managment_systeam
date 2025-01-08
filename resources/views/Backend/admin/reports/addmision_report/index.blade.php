
@extends('layouts.master')

@section('title','Admission Reports')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Admission Reports</h1>
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

    <div class="col-xl-2 col-md-2">
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

    <div class="col-md-2">
        <div class="form-group">
            <label for="">Session</label>
            <select class="form-control" name="session" id="session">

            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="">Start Date</label>
            <input type="date" name="start_date" class="form-control" id="start_date" max="{{ date('Y-m-d') }}" min="1992-01-01">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="">End Date</label>
            <input type="date" name="end_date" class="form-control" id="end_date" max="{{ date('Y-m-d') }}" min="1992-01-01">
        </div>
    </div>

    <div class="col-md-1 mt-1">
        <div class="form-group">
            <label for=""></label>
            <button class="btn btn-primary form-control" id="filter"><i class="fa fa-filter ms-3"></i>Filter</button>
        </div>
    </div>

    @elseif (Auth::user()->admin_role=='instituteadmin')

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

    <div class="col-md-3 col-xl-3">
        <div class="form-group">
            <label for="">Session</label>
            <select class="form-control" name="session" id="session">

            </select>
        </div>
    </div>

    <div class="col-md-2 col-xl-2">
        <div class="form-group">
            <label for="">Start Date</label>
            <input type="date" name="start_date" class="form-control" id="start_date" max="{{ date('Y-m-d') }}" min="1992-01-01">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="">End Date</label>
            <input type="date" name="end_date" class="form-control" id="end_date" max="{{ date('Y-m-d') }}" min="1992-01-01">
        </div>
    </div>

    <div class="col-md-2 mt-1">
        <div class="form-group">
            <label for=""></label>
            <button class="btn btn-primary form-control" id="filter"><i class="fa fa-filter ms-3"></i>Filter</button>
        </div>
    </div>
    @endif

</div>
<!-- PAGE-HEADER END -->



<!-- ROW-1 OPEN -->
<div class="row d-none" id="table_row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Addmision Reports</div>
            </div>
            <div class="card-body">

                <div class="table-responsive mt-2">
                    <table class="table table-bordered text-nowrap key-buttons border-bottom" id="file-datatable">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">ID No</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Course</th>
                                <th scope="col">Session</th>
                                <th scope="col">guardian name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
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
        $(document).on('click','#filter',function(){

            let institute = $('#institute').val();
            let course    = $('#course').val();
            let session   = $('#session').val();
            let start_date  = $('#start_date').val();
            let end_date  = $('#end_date').val();

            $.ajax({

                url:"{{ route('get.addmision.report') }}",
                data:{
                    institute:institute,
                    course:course,
                    session:session,
                    start_date:start_date,
                    end_date:end_date,
                },
                success:function(data){
                    $('#table_row').removeClass('d-none');
                    $('#file-datatable').DataTable().destroy();
                    $('#body_id').html(data);
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
