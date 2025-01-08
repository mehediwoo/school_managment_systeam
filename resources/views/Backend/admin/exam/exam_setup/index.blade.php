@extends('layouts.master')
@section('title','Exam Lists')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('content')
<style>
    .custom-checkbox {
        padding: 0;
    }

    .custom-checkbox .fa-toggle-on,
    .custom-checkbox .fa-toggle-off {
        font-size: 135%;
    }

    .custom-checkbox input[type=checkbox] {
        visibility: collapse;
        width: 0px;
        margin-left: -0.25em;
    }

    .custom-checkbox input[type=checkbox] ~ .custom-check-on {
        display: none;
    }

    .custom-checkbox input[type=checkbox]:checked ~ .custom-check-on {
        display: inline;
    }

    .custom-checkbox input[type=checkbox]:checked ~ .custom-check-off {
        display: none;
    }

    .custom-checkbox input[type=checkbox]:disabled ~ * {
        color: #b6b4b4;
    }

    .custom-checkbox input[type=checkbox].error ~ .custom-check-on,
    .custom-checkbox input[type=checkbox].error ~ .custom-check-off {
        border: solid 2px red;
    }

    .custom-checkbox i.btn {
        overflow: hidden;
        color: transparent;
        position: relative;
        display: inline-block;
        width: 3em;
        padding: 0;
        font-style: normal;
    }

    .custom-checkbox .btn:after {
        content: "";
        font-style: normal;
        border: 7px solid white;
        position: absolute;
        top: 0;
        bottom: 0;
        border-radius: 5px;
    }

    .custom-checkbox .custom-check-on.btn:after {
        right: -4px;
    }

    .custom-checkbox .custom-check-off.btn:after {
        left: -4px;
    }

    .custom-checkbox .custom-check-on.btn:before {
        content: "On";
        color: white;
        margin-left: -10px;
    }

    .custom-checkbox .custom-check-off.btn:before {
        content: "Off";
        color: #333;
        margin-right: -15px;
    }

    .custom-checkbox input[type=checkbox]:checked ~ .btn.custom-check-on {
        display: inline-block;
    }
</style>

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Exam Lists</h1>
</div>
<!-- PAGE-HEADER END -->
<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Exam Lists</div>
                <div class="">
                    <a href="{{ route('exam.setup.create') }}" class="btn btn-primary py-1 px-4">Create Exam</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive mt-2">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                              <th>Sl</th>
                              <th>Institute Name</th>
                              <th>Session</th>
                              <th>Center Name</th>
                              <th>Exam Title</th>
                              <th>Exam Date & Time</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if (!empty($exams) && $exams->count() > 0)
                            @foreach ($exams as $exam)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @php
                                        $institute = App\Models\User::whereIn('id',json_decode($exam->branch_id))->get();
                                    @endphp
                                    @if (!empty($institute))
                                        @foreach ($institute as $iteam)
                                        {{ ucfirst($iteam->name) }} <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $session = App\Models\Session::whereIn('id',json_decode($exam->session_id))->get();
                                    @endphp
                                    @if (!empty($session))
                                        @foreach ($session as $iteam)
                                        {{ ucfirst($iteam->session_name) }} <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $exam->exam_center->center_name ?? 'Null' }} ({{ $exam->exam_center->center_code ?? 'Null' }})</td>
                                <td>{{ $exam->exam_names->exam_name ?? '' }}</td>
                                <td>{{ $exam->exam_date.' '.$exam->exam_time }}</td>
                                <td>
                                    @if ($exam->status=='publish')
                                    <a href="{{ route('exam.setup.status',$exam->id) }}" class="badge bg-success">Publish</a>
                                    @else
                                    <a href="{{ route('exam.setup.status',$exam->id) }}" class="badge bg-danger">Un-blish</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('exam.setup.edit',$exam->id) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-edit"></i> <!-- Edit icon -->
                                    </a>
                                    <a href="{{ route('exam.setup.destroy',$exam->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this exam?')">
                                        <i class="fa fa-trash"></i> <!-- Delete icon -->
                                    </a>
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
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.publish-checkbox').change(function() {
            var examId = $(this).data('id'); // Get the exam ID
            var status = $(this).is(':checked') ? 'Active' : 'Inactive'; // Determine the new status

            $.ajax({
                url: '{{ url("ExamSetup/publish_update") }}/' + examId, // Adjust your URL based on routing
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    publish: status // Send the new status
                },
                success: function(response) {
                    // Handle success (e.g., display a success message)
                    alert('Publish status updated successfully!');
                    toastr.success('Status updated successfully !');
                },
                error: function(xhr) {
                    // Handle error (e.g., display an error message)
                    alert('Error updating status: ' + xhr.responseText);
                }
            });
        });
    });
</script>
@endsection

