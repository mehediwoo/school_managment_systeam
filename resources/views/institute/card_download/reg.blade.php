
@extends('layouts.master')
@section('title','Registration Card Managment')
@section('styles')

@endsection
@section('content')
 <!-- PAGE-HEADER -->
 <div class="page-header">
    <h1 class="page-title">Registration Card Managment</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registration Card</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-md-12">
        <div class="card form-input-elements">
            <div class="card-header">
                <h3 class="mb-0 card-title">Registration Card Filtering</h3>
            </div>
            <form action="{{ route('ins.registration.download') }}" method="post" id="submit_search_filter111">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            <label>Course<span style="color:red">*</span></label>
                            <select name="course_id" id="course_id" class="form-control custom-select select2" required>
                                <option value="br" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}">Select Course</option>
                                @foreach ($course as  $course)
                                <option value={{ $course->id }} data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}">{{ $course->course_name }}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('course_id'))
                            <div class="error" style="color:red;">{{ $errors->first('course_id') }}</div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <label>Session<span style="color:red">*</span></label>
                            <select name="session_id" id="session_id" class="form-control custom-select select2">


                            </select>
                            @if ($errors->has('session_id'))
                            <div class="error" style="color:red;">{{ $errors->first('session_id') }}</div>
                            @endif
                        </div>

                        {{-- <div class="col-md-2">
                            <label>Year<span style="color:red">*</span></label>
                            <select name="year_id" id="year_id" class="form-control custom-select select2" required>

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

                            @if ($errors->has('year_id'))
                                <div class="error" style="color:red;">{{ $errors->first('year_id') }}</div>
                            @endif
                        </div> --}}

                        <div class="col-md-2">
                            <div class="text-end mt-6">
                                <button type="submit" id="filter_btn"  class="btn btn-primary">Download</button>
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>
        {{-- <div class="card">
            <div id="body_id">

            </div>
        </div> --}}


    </div>
</div>
<!-- ROW-1 CLOSED -->

<!-- PAGE-HEADER -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 card-title">রেজিসষ্ট্রেশন কার্ড ডাউনলোড করার নিয়ম</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <li>প্রথমে কোর্স সিলেক্ট করতে হবে</li>
                    <li>কোর্স সিলেক্ট করলে অটোমেটিক সেসন চেঞ্জ হবে এবং ওই কোর্সের কোন সেসন এর ষ্টুডেন্ট এর রেজিসষ্ট্রেশন কার্ড ডাউনলোড করতে চান সেই সেসন সিলেক্ট করুণ</li>
                    <li>কোর্স এবং সেসন সিলেক্ট করার পরে ডাউনলোড বাটনে ক্লিক করুণ</li>
                    <li>কিছুক্ষন অপেক্ষা করুণ </li>
                    <li>তারপর প্রিন্টিং পেজ দেখতে পারবেন । </li>
                    <li>প্রতিটি কোর্স এবং সেসন এর জন্যে আলাদা আলাদা ভাবে ডাউনলোড করতে হবে</li>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PAGE-HEADER END -->
@endsection

@section('scripts')
<script>
    $(document).ready(function () {

        // $(document).on('submit','#submit_search_filter',function (event) {
        //     event.preventDefault();

        //     let course = $('#course_id').val();
        //     let session_id = $('#session_id').val();
        //     let year_id = $('#year_id').val();

        //     $.ajax({
        //         url: "{{ route('institute.registration.generate') }}",
        //         data:{course:course,session_id:session_id,year_id:year_id},
        //         success: function (data) {
        //             $('#body_id').html(data);
        //         }
        //     });
        // });

        // Get session with her course by on change
        $('#course_id').change(function(){

            var course_id=$(this).val();
            $.ajax({
                url:"{{ url('Student/get/session') }}",
                data: {course_id: course_id},
                success: function(response){
                    $('#session_id').html(response);
                }
            });
        });
    });
</script>

@endsection


