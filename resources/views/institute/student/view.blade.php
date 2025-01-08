
@extends('layouts.master')
@section('title','Student Information')

@section('styles')



@endsection

@section('content')

						<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Student's Information</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="javascript:void(0);">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Student's Information</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row" id="user-profile">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">
                <div class="wideget-user">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="wideget-user-desc d-flex">
                                <div class="wideget-user-img">
                                    <img class="" src="{{asset($student->student_photo)}}" alt="{{ $student->st_name }}" style="height: 128px;width:128px;">
                                </div>
                                <div class="user-wrap">
                                        <h4>{{$student->st_name}}</h4>
                                        <h6 class="text-muted mb-3">Institute: {{ $student->User->name }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-top">
                    <div class="wideget-user-tab">
                        <div class="tab-menu-heading border-0">
                            <div class="tabs-menu1">
                                <ul class="nav">
                                    <li class="">
                                        <a href="#tab-51" class="active show" data-bs-toggle="tab">Student Details</a>
                                    </li>
                                    <li>
                                        <a href="#tab-71" data-bs-toggle="tab" class="">Educational Qualification</a>
                                    </li>
                                    <li>
                                        <a href="#tab-81" data-bs-toggle="tab" class="">All Document</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="">
                    <div class="border-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-51">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="profile-log-switch">
                                            <div class="media-heading">
                                                <h5>
                                                    <strong>Personal Information</strong>
                                                </h5>
                                            </div>
                                            <div class="table-responsive ">
                                                <table class="table row table-borderless">
                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                        <tr>
                                                            <td><strong>Full Name : </strong>{{ $student->st_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            @if ($student->status=='Admited')
                                                            <td><strong>Id :</strong>{{ $student->id }}</td>
                                                            @elseif($student->status=='registered')
                                                            <td><strong>Register Nnumber : {{ $student->st_course_reg }}</strong></td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <td> <strong>Email :</strong>{{ $student->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Mobile Number :</strong>{{ $student->mobile_no }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Course : </strong>{{ $student->course->course_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Session :</strong>{{ $student->session->session_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Addmission Date :</strong>{{ $student->created_at->format('d-M-y, '.'g:i a') }}</td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                        <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Father Name: </span>{{$student->f_name}}</th>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Mother Name: </span>{{$student->m_name}}</th>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Gender: </span>{{$student->gender}}</th>

                                                        </tr>
                                                        <tr>
                                                        <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Date Of Birth: </span>{{$student->Date_of_birth}}</th>

                                                        </tr>

                                                        <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Religion: </span>{{$student->religion}}</th>

                                                        </tr>

                                                        <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Blood Group: </span>{{$student->blood_group}}</th>

                                                        </tr>

                                                        <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Id Type: </span>{{$student->id_type}}</th>

                                                        </tr>

                                                        <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">National/Birth Id No: </span>{{$student->id_number}}</th>

                                                        </tr>

                                                        <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Class Roll: </span>{{$student->class_roll}}</th>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane" id="tab-71">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="profile-log-switch">
                                            <div class="media-heading">
                                                <h5>
                                                    <strong>Educational Qualification</strong>
                                                </h5>
                                            </div>
                                            <div class="table-responsive ">
                                                <table class="table row table-borderless">

                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                        <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Certificate Type </span>{{$student->edu_qualification}}<br></th>

                                                          </tr>
                                                          <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Result: </span>{{$student->result}}<br></th>

                                                          </tr>
                                                          <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Registration No: </span>{{$student->reg_no}}<br></th>

                                                          </tr>
                                                          <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Rgistration Board: </span>{{$student->reg_board}}<br></th>

                                                          </tr>

                                                          <tr>
                                                            <th scope="row" style="border:none"> <span style="color:rgb(11, 134, 134)">Passing Year: </span>{{$student->passing_year}}<br></th>

                                                          </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-81">
                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12">
                                        <div class="card custom-card">

                                            <div class="card-body">

                                                <ul class="nav nav-tabs tab-style-1 d-sm-flex d-block" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#orders" aria-current="page" href="#orders" aria-selected="true" role="tab" tabindex="-1">Photo</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link " data-bs-toggle="tab" data-bs-target="#accepted" href="#accepted" aria-selected="false" role="tab">National Id Card</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#declined" href="#declined" aria-selected="false" role="tab" tabindex="-1">Birth Certificate</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content">

                                                    <div class="tab-pane active show" id="orders" role="tabpanel">
                                                        <div class="text-muted">
                                                            <div class="card custom-card">
                                                                <img src="{{ asset($student->student_photo) }}" class="card-img-top" alt="{{ $student->student_photo }}" style="height: 150px;width:150px">
                                                                <div class="card-body">
                                                                    <h6 class="card-title fw-medium">Photo</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="accepted" role="tabpanel">
                                                        <div class="text-muted">
                                                            <div class="card custom-card">
                                                                <img src="{{asset($student->id_document)}}" class="card-img-top" alt="{{ $student->id_document }}" style="height: 150px;width:150px">
                                                                <div class="card-body">
                                                                    <h6 class="card-title fw-medium">NID Card</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="declined" role="tabpanel">
                                                        <div class="text-muted">
                                                            <div class="card custom-card mt-3">
                                                                <img src="{{asset($student->edu_certificate)}}" class="card-img-top" alt="{{ $student->edu_certificate }}" style="height: 150px;width:150px">
                                                                <div class="card-body">
                                                                    <h6 class="card-title fw-medium">Birth Certificate</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COL-END -->
</div>
<!-- ROW-1 CLOSED -->

@endsection

@section('scripts')

		<!-- GALLERY JS -->
		<script src="{{asset('build/assets/plugins/gallery/picturefill.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lightgallery.js')}}"></script>
		<script src="{{asset('build/assets/plugins/gallery/lightgallery-1.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-pager.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-autoplay.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-fullscreen.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-zoom.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-hash.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-share.js')}}"></script>

@endsection
