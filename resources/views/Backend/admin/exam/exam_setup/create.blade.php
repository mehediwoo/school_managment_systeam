@extends('layouts.master')
@section('title','Exam Setup')
@section('styles')

@endsection
@section('content')
<style>
    /* .dropdown-menu {
        max-height: 200px;
        width: 400px;
        overflow-y: auto;
    }
    .form-check {
        padding: 10px;
        width: 200px;
    }
    .text-danger {
        color: red;
    } */
</style>

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Create Exam</h1>
</div>
<!-- PAGE-HEADER END -->
<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Create Exam</div>
            </div>
            <div class="card-body">
                <form class="new-added-form" action="{{ route('exam.setup.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        <div class="col-xl-12 col-md-12">
                            <div class="form-group">
                                <label for="courseDropdown">Institute:</label>
                                <div class="dropdown">
                                    <div class="dropdown-toggle d-flex justify-content-between align-items-center col-12 border border-secondary rounded p-2"
                                         id="courseDropdown"
                                         data-bs-toggle="dropdown"
                                         aria-expanded="false"
                                         role="button">
                                        <span id="selectedInstituteText">Select Institute</span>
                                        <span class="dropdown-caret">
                                            <i class="bi bi-caret-down-fill"></i> <!-- Bootstrap Icons -->
                                        </span>
                                    </div>
                                    <ul class="dropdown-menu col-12" aria-labelledby="courseDropdown">
                                        @foreach ($branch as $iteam)
                                            <li>
                                                <div class="form-check px-3">
                                                    <input class="form-check-input checkIteam" type="checkbox" id="institute-{{ $iteam->id }}" name="institute_id[]" value="{{ $iteam->id }}" onclick="updateInstituteText();">
                                                    <label class="form-check-label" for="institute-{{ $iteam->id }}">{{ $iteam->name }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @error('exmType_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xl-12 col-md-12">
                            <div class="form-group">
                                <label for="courseDropdown">Exam Session:</label>
                                <div class="dropdown">
                                    <div class="dropdown-toggle d-flex justify-content-between align-items-center col-12 border border-secondary rounded p-2"
                                         id="courseDropdown"
                                         data-bs-toggle="dropdown"
                                         aria-expanded="false"
                                         role="button">
                                        <span id="selectedSessionText">Select Exam Session</span>
                                        <span class="dropdown-caret">
                                            <i class="bi bi-caret-down-fill"></i> <!-- Bootstrap Icons -->
                                        </span>
                                    </div>
                                    <ul class="dropdown-menu col-12" aria-labelledby="courseDropdown">
                                        @foreach ($session as $iteam)
                                            <li>
                                                <div class="form-check px-3">
                                                    <input class="form-check-input checkIteam" type="checkbox" id="session-{{ $iteam->id }}" name="session_id[]" value="{{ $iteam->id }}" onclick="updateSessionDropdownText();">
                                                    <label class="form-check-label" for="session-{{ $iteam->id }}">{{ $iteam->session_name }} - {{ $current_year->education_year }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @error('exmType_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        

                        {{-- <div class="col-xl-5 col-md-5">
                            <div class="form-group">
                                <label for="courseDropdown">Exam Course:</label>
                                <select name="exam_course" class="form-control">
                                    <option value="">Choose exam course</option>
                                    @if($exam_subject->count() > 0)
                                        @foreach ($exam_subject as $iteam)
                                            <option value="{{ $iteam->id }}">{{ $iteam->course->course_name.' - '.$iteam->total_marks }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('exam_course')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div> --}}



                    </div>

                    <div class="row">

                        <div class="col-xl-6 col-md-6">
                            <div class="form-group">
                                <label for="courseDropdown">Exam Center:</label>
                                <select name="exam_center" class="form-control">
                                    <option value="">Please select exam center</option>
                                    @foreach ($exam_center as $iteam)
                                    <option value="{{ $iteam->id }}">{{ $iteam->center_name }}</option>
                                    @endforeach
                                </select>
                                @error('exam_center')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="">Exam Title</label>
                                <select name="exam_title" class="form-control">
                                    @foreach ($exam_name as $iteam)
                                    <option value="{{ $iteam->id }}">{{ $iteam->exam_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('exam_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="">Exam Date</label>
                                <input type="date" name="exam_date" class="form-control">
                            </div>
                            @error('exam_date')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="">Exam Time</label>
                                <input type="time" name="exam_time" class="form-control">
                            </div>
                            @error('exam_time')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option value="publish">Publish</option>
                                    <option value="un-publish">Un-Publish</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
        </div>
    </div>

</div>
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')
<script>

    // For Institute selected menu show
    function updateInstituteText() {
        const selectedExamTypes = [];

        // Loop through all selected checkboxes
        $('input[name="institute_id[]"]:checked').each(function() {
            // Get the label text associated with the checked checkbox
            selectedExamTypes.push($(this).next('label').text().trim());
        });

        // Update the dropdown text based on selected exam types
        if (selectedExamTypes.length > 0) {
            $('#selectedInstituteText').text(selectedExamTypes.join(', '));  // Show selected items
        } else {
            $('#selectedInstituteText').text('Select Exam Type');  // Default text when nothing is selected
        }
    }

    // For Session selected menu show
    function updateSessionDropdownText() {
        const selectedExamTypes = [];

        // Loop through all selected checkboxes
        $('input[name="session_id[]"]:checked').each(function() {
            // Get the label text associated with the checked checkbox
            selectedExamTypes.push($(this).next('label').text().trim());
        });

        // Update the dropdown text based on selected exam types
        if (selectedExamTypes.length > 0) {
            $('#selectedSessionText').text(selectedExamTypes.join(', '));  // Show selected items
        } else {
            $('#selectedSessionText').text('Select Exam Session');  // Default text when nothing is selected
        }
    }

    // For exam type selected menu show
    function updateDropdownText() {
        const selectedExamTypes = [];

        // Loop through all selected checkboxes
        $('input[name="exmType_id[]"]:checked').each(function() {
            // Get the label text associated with the checked checkbox
            selectedExamTypes.push($(this).next('label').text().trim());
        });

        // Update the dropdown text based on selected exam types
        if (selectedExamTypes.length > 0) {
            $('#selectedExamText').text(selectedExamTypes.join(', '));  // Show selected items
        } else {
            $('#selectedExamText').text('Select Exam Type');  // Default text when nothing is selected
        }
    }
</script>
@endsection
