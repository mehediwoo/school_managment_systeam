@extends('layouts.master')

@section('content')

<style>

    .dropdown-menu {
                max-height: 200px;
                width:200px;
                overflow-y: auto;
            }
            .form-check{
                padding: 10px;
                width:200px;
            }
    </style>

    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>EDIT SESSION</h3>
            <ul>
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>Edit Session</li>
            </ul>
        </div>
        <div>
            <div class="container col-lg-12">


                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Edit Session</h3>
                            </div>

                        </div>
                        <form class="new-added-form" action="{{url('Session/update',$sessionEdit->id)}}" method="Post" enctype="multipart/form-data">
                           @csrf
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Session Name *</label>
                                    <input type="text" name="session_name" value="{{$sessionEdit->session_name}}" class="form-control" >
                                </div>


                                <div class="col-md-12">
                                    <label for="">Select Course</label><br>
                                                    <div class="btn-group mt-1 mb-2 col-md-3">

                                                        <button type="button" class="btn btn-outline-success">Select Course</button>
                                                        <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu " role="menu" style="padding: 10px">
                                                            @foreach ($getCourse as $course)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="course-{{ $course->id }}" name="course_id[]" value="{{ $course->id }}"
                                                                {{-- Check if the course is already selected --}}
                                                                @if(in_array($course->id,$selectedCourses)) checked @endif
                                                                onclick="event.stopPropagation();">
                                                                <label class="form-check-label" for="course-{{ $course->id }}">
                                                                    {{ $course->course_name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                        </ul>
                                                    </div>

                                </div>


                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Status</label>
                                    <select name="status" id="select-countries" class="form-control custom-select select2">
                                        <option data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}" value="{{$sessionEdit->status}}">{{$sessionEdit->status}}</option>
                                        <option value="Active" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}" >Active</option>
                                        <option value="Deactive" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}" >Deactive</option>
                                        @if($errors->has('branch_id'))
                                        <div class="error" style="color:red">{{ $errors->first('branch_id') }}</div>
                                     @endif
                                    </select>
                                </div>

















                                <div class="col-md-6 form-group"></div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn btn-primary py-1 px-4">Save</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Social Media End Here -->
    @endsection
@section('js')

@endsection
