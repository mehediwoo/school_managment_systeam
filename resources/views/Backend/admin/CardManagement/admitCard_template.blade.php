
@extends('layouts.master')
@section('title','Admit Card Managment')
@section('styles')

@endsection
@section('content')
 <!-- PAGE-HEADER -->
 <div class="page-header">
    <h1 class="page-title">Admit Card Managment</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Admit Card</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-md-12">
        <div class="card form-input-elements">
            <div class="card-header">
                <h3 class="mb-0 card-title">Admit Card Filtering</h3>
            </div>
            <form action=""  method="get" enctype="multipart/form-data" id="search_filter">
                @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <label>Branch <span style="color:red">*</span></label>

                            <select name="branch_id" id="select_branch" class="form-control custom-select select2" required>
                                <option value="br" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}" selected>Select Branch</option>
                                @foreach ($branch as  $branch)
                                <option value={{ $branch->id }} data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}">{{ $branch->institute_name }}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('branch_id'))
                            <div class="error" style="color:red;">{{ $errors->first('branch_id') }}</div>
                        @endif

                    </div>
                    <div class="col-md-3">
                        <label>Course<span style="color:red">*</span></label>
                        <select name="course_id" id="course_id" class="form-control custom-select select2" required>
                            <option value="br" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}" selected>Select Branch</option>
                            @foreach ($course as  $course)
                            <option value={{ $course->id }} data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}">{{ $course->course_name }}</option>
                            @endforeach

                        </select>
                        @if ($errors->has('course_id'))
                        <div class="error" style="color:red;">{{ $errors->first('branch_id') }}</div>
                    @endif
                    </div>
                    <div class="col-md-3">
                        <label>Session<span style="color:red">*</span></label>
                        <select name="session_id" class="form-control custom-select select2" id="session" required>
                            <option value="">select Session </option>
                        </select>
                        @if ($errors->has('branch_id'))
                        <div class="error" style="color:red;">{{ $errors->first('branch_id') }}</div>
                    @endif
                    </div>

                    <div class="col-md-3">
                        <label>Year<span style="color:red">*</span></label>
                        <select name="year_id" id="select-countries" class="form-control custom-select select2" required>
                            <!-- Highlight the current year -->
                            {{-- <option
                                value="{{ $current_Year->id }}"
                                data-data="{&quot;image&quot;: &quot;{{ asset('build/assets/images/flags/br.svg') }}&quot;}"
                                @selected(true)>
                                <span style="color:red;">{{ $current_Year->education_year }}</span>
                            </option> --}}

                            <!-- Loop through other years -->
                            @foreach ($year as $yearItem)
                                <option
                                    value="{{ $yearItem->id }}"
                                    data-data="{&quot;image&quot;: &quot;{{ asset('build/assets/images/flags/br.svg') }}&quot;}"
                                    @selected($yearItem->id == $current_Year->id)>
                                    {{ $yearItem->education_year }}
                                </option>
                            @endforeach
                        </select>

                        @if ($errors->has('branch_id'))
                            <div class="error" style="color:red;">{{ $errors->first('branch_id') }}</div>
                        @endif
                    </div>

                    <div class="card-footer text-end">
                        <button type="button" id="filter_btn"  class="btn btn-primary">Filter</button>
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
    $(document).ready(function () {
        $('#filter_btn').click(function () {
            let formData = $('#search_filter').serialize();
             $.ajax({
                 url: "{{ route('admit.generate.card.student') }}",
                 type: 'GET',
                 data: formData,
                 success: function (data) {
                    console.log(data);
                     $('#body_id').html(data);
                 }
             })
        });
    });

    $(document).ready(function(){

        $('#course_id').change(function(){

            var course_id=$(this).val();
            $.ajax({
                url:"{{ url('Student/get/session') }}",
                data: {course_id: course_id},
                success: function(response){
                    $('#session').html(response);
                }
            });
        });

    });
</script>

@endsection


