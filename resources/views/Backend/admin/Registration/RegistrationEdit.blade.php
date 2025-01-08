@extends('layouts.master')
@section('title','Edit Session Time')
@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Edit Session Time</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('institute.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Session Time</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-xl-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Edit Session Time</h3>
                    </div>
                </div>
                <form class="new-added-form" action="{{url('Registrations/Update',$registration->id)}}" method="Post" enctype="multipart/form-data">
                   @csrf
                    <div class="row">

                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Session</label>
                            <select name="session_id" class="form-control select2">
                                <option value="">Please Select Course</option>
                              @foreach ($session as $session)
                              <option {{($registration->session_id==$session->id)?'selected':''}} value={{$session->id}}>{{$session->session_name}},{{$education->education_year}}</option>
                              @endforeach
                            </select>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Time Limitation</label>
                            <select name="time_setup_type" class="form-control select2">
                                <option value="{{$registration->time_setup_type}}">{{$registration->time_setup_type}}</option>
                                <option value="Addmission">Addmission</option>
                                <option value="Registration">Registration</option>
                                <option value="Registration_Download">Registration Download</option>
                                <option value="Student_List">Student List</option>
                            </select>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Starting Date</label>
                            <input name="starting_date" type="text"value="{{$registration->start_date}}"  class="form-control air-datepicker" data-position="bottom right">
                            <i class="far fa-calendar-alt"></i>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Ending Date</label>
                            <input name="ending_date" type="text" value="{{$registration->ending_date}}" class="form-control air-datepicker" data-position="bottom right">
                            <i class="far fa-calendar-alt"></i>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Status</label>
                            <select name="status" class="form-control select2">
                                <option value="{{$registration->status}}">{{$registration->status}}</option>
                                <option value="Active">Active</option>
                                <option value="Deactive">Deactive</option>

                            </select>
                        </div>
                        <div class="col-md-6 form-group"></div>
                        <div class="col-12 form-group mg-t-8">
                            <button type="submit" class="btn btn-primary-gradient">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


