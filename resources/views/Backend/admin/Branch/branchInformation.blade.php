@extends('layouts.master')
@section('content')
<div class="">
    <!-- Breadcubs Area Start Here -->
    <div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-xl-12 mt-2">
                    <div class="dashboard-content-one">
                        <!-- Breadcubs Area Start Here -->

                        <!-- Breadcubs Area End Here -->
                        <!-- Student Details Area Start Here -->
                        <div class="card height-auto ">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card-body">
                                        <div class="heading-layout1">
                                            <div class="item-title">
                                                <h3>Institute Details</h3>
                                            </div>
                                            {{-- <div class="dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                    data-toggle="dropdown" aria-expanded="false">...</a>

                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                    </div>
                                                </div> --}}
                                        </div>
                                        <div class="single-info-details">

                                            <div class="item-content">
                                                <div class="header-inline item-header">

                                                    {{-- <div class="header-elements">
                                                            <ul>
                                                                <li><a href="#"><i class="far fa-edit"></i></a></li>
                                                                <li><a href="#"><i class="fas fa-print"></i></a></li>
                                                                <li><a href="#"><i class="fas fa-download"></i></a></li>
                                                            </ul>
                                                        </div> --}}
                                                </div>

                                                <table class="table table-responsive">

                                                    <tbody>
                                                        <tr>

                                                            <td class="mt-5 d-flex ">

                                                                <p style="font-size:20px">
                                                                    <i class="fa fa-id-card" aria-hidden="true" style="margin-right:3%;"></i>Registration Number:</p>

                                                                <p style="font-size:20px">{{$branch->registration_id??'not choice yet'}}</p>

                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td class="d-flex">
                                                                <p style="font-size:20px">
                                                                    <i class="fa fa-university" aria-hidden="true" style="margin-right:3%;"></i>Institute Name:</p>
                                                                <p style="font-size:20px">{{$branch->institute_name??'not Write'}}</p>

                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td class="d-flex">
                                                                <p style="font-size:20px">
                                                                    <i class="fa fa-user" aria-hidden="true" style="margin-right:3%;"></i>Propietor Name:</p>
                                                                <p style="font-size:20px">{{$branch->Propietor_Name??'no write yet'}}</p>

                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td class="d-flex">
                                                                <p style="font-size:20px">
                                                                    <i class="fa fa-phone" aria-hidden="true" style="margin-right:3%;"></i>Mobile Number:</p>
                                                                <p style="font-size:20px">{{$branch->mobile_number??'not give yet'}}</p>

                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td class="d-flex">
                                                                <p style="font-size:20px">
                                                                    <i class="fa fa-envelope" aria-hidden="true" style="margin-right:3%;"></i>E-mail:</p>
                                                                <p style="font-size:20px">{{$branch->e_mail}}</p>

                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td class="d-flex">
                                                                <p style="font-size:20px">
                                                                    <i class="fa fa-address-card" style="margin-right:3%;"></i>
                                                                    Address:</p>
                                                                <p style="font-size:20px">
                                                                    {{$branch->address}}
                                                                </p>

                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            {{-- <div class="col-md-1"></div> --}}

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">

                                    <div class="card-body ">

                                        <div class="single-info-details">

                                            <div class="item-content">
                                                <div class="header-inline item-header"></div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-6 col-6 mt-5">
                                                            <h3>Institute General Information</h3>
                                                            <table
                                                                class="table display data-table text-nowrap table-responsive"
                                                                style="border:dotted">

                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Institute Age:
                                                                            </span>{{$branch_details->institute_age}}</th>

                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Total Computer:
                                                                            </span>{{$branch_details->no_computer}}<br></th>

                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Division:
                                                                            </span>{{$branch->division->name}}</th>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">District:
                                                                            </span>{{$branch->district->district_name}}</th>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Thana:
                                                                            </span>{{$branch->thana}}</th>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Post Office:
                                                                            </span>{{$branch->post_office}}</th>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Post Code:
                                                                            </span>{{$branch->post_code}}</th>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Father Name:
                                                                            </span>{{$branch_details->fathers_name}}</th>

                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Mother Name:
                                                                            </span>{{$branch_details->mothers_name}}</th>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Blood Group:
                                                                            </span>{{$branch_details->blood_group}}<br></th>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Facebook Account:
                                                                            </span>{{$branch_details->ceo_facebook}}<br></th>

                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Other Relative:
                                                                            </span>{{$branch_details->additional_rel_name}}<br></th>

                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Other Relative Type:
                                                                            </span>{{$branch_details->extra_rel_contact}}<br></th>

                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Other Relative Number:
                                                                            </span>{{$branch_details->additional_mobile_no}}<br></th>

                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="col-md-6 col-lg-5 col-6 col-xl-6  mt-5">
                                                            <h3>Institute Subscription Information</h3>
                                                            <table
                                                                class="table display data-table text-nowrap table-responsive"
                                                                style="border:dotted">
                                                                <tbody>

                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Status:
                                                                            </span>{{$subscription->status??'Not Selected'}}<br></th>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Plan Name:
                                                                            </span>{{$subscription->plan->name ?? 'Not yet Choice'}}<br></th>

                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Plan Price:
                                                                            </span>{{$subscription->plan->price ?? 'Not yet Choice'}}<br></th>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Started Date:
                                                                            </span>{{$subscription->starting_date ?? 'Not yet Choice'}}<br></th>

                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" style="border:none">
                                                                            <span style="color:rgb(11, 134, 134)">Ending Date:
                                                                            </span>{{$subscription->expired_date ?? 'Not yet Choice'}}<br></th>

                                                                    </tr>

                                                                </tbody>
                                                            </table>
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

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">INSTITUTE INFORMATION</h3>
                            </div>
                            <div class="card-body">
                                <div class="panel panel-primary">
                                    <div class="tab-menu-heading">
                                        <div class="tabs-menu">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs panel-success">
                                                <li>
                                                    <a href="#tab17" class="active" data-bs-toggle="tab">
                                                        <span>
                                                            <i class="fe fe-user me-1"></i>
                                                        </span>CEO</a>
                                                </li>
                                                <li>
                                                    <a href="#tab18" data-bs-toggle="tab">
                                                        <span>
                                                            <i class="fa fa-id-card me-1"></i>
                                                        </span>NID</a>
                                                </li>
                                                <li>
                                                    <a href="#tab19" data-bs-toggle="tab">
                                                        <span>
                                                            <i class="fa fa-graduation-cap me-1"></i>
                                                        </span>EDUCATIONAL SKILL</a>
                                                </li>
                                                <li>
                                                    <a href="#tab20" data-bs-toggle="tab">
                                                        <span>
                                                            <i class="fa fa-university me-1"></i>
                                                        </span>INSTITUTE</a>
                                                </li>
                                                <li>
                                                    <a href="#tab21" data-bs-toggle="tab">
                                                        <span>
                                                            <i class="fa fa-file me-1"></i>
                                                        </span>TRADE LICENCE</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab17">
                                                <img
                                                    src="{{asset($branch_details->ceo_profile)}}"
                                                    alt=""
                                                    style="height:28vh;width:30vh;margin-right:4%">
                                            </div>
                                            <div class="tab-pane" id="tab18">
                                                <img
                                                    src="{{asset($branch_details->national_id)}}"
                                                    alt=""
                                                    style="height:35vh;width:70vh;margin-right:4%">
                                            </div>
                                            <div class="tab-pane" id="tab19">
                                                <img
                                                    src="{{asset($branch_details->educational_skill)}}"
                                                    alt=""
                                                    style="height:70vh;width:105vh;margin-right:4%">
                                            </div>
                                            <div class="tab-pane" id="tab20">
                                                <img
                                                    src="{{asset($branch_details->institute_image)}}"
                                                    alt=""
                                                    style="height:30vh;width:46vh;margin-right:4%">
                                            </div>

                                            <div class="tab-pane" id="tab21">
                                                <img
                                                    src="{{asset($branch_details->trade_licence)}}"
                                                    alt=""
                                                    style="height:67vh;width:143vh;margin-right:4%">
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
    <!-- Social Media End Here -->
    @endsection
