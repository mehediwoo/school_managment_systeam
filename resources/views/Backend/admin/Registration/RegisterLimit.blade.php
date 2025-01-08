@extends('layouts.master')
@section('title','Registration Limit')
@section('styles')

@endsection

@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">ADD COURSE</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('institute.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">ADD COURSE</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col-xl-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Add New Course</h3>
                        </div>
                    </div>
                    <form class="new-added-form" action="{{url('Registrations/insert')}}" method="Post" enctype="multipart/form-data">
                       @csrf
                        <div class="row">

                            <div class="col-xl-3 col-lg-6">
                                <div class="form-group">
                                    <label>Session</label>
                                    <select name="session_id" class="select2 form-control">
                                        <option value="">Please Select Course</option>
                                      @foreach ($session as $session)
                                      <option value={{$session->id}}> {{$session->session_name}},{{$education->education_year}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6">
                                <div class="form-group">
                                    <label>Time Limitation</label>
                                    <select name="time_setup_type" class="form-control select2">
                                        <option value="">Select type</option>
                                        <option value="Addmission">Addmission</option>
                                        <option value="Registration">Registration</option>
                                        <option value="Registration_Download">Registration Download</option>
                                        <option value="Student_List">Student List</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6">
                                <div class="form-group">
                                    <label>Starting Date</label>
                                    <input name="starting_date" type="date" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6">
                                <div class="form-group">
                                    <label>Ending Date</label>
                                    <input name="ending_date" type="date" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                            </div>





                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Status</label>
                                <select name="status" class="form-control select2">
                                    <option value="">Please Select</option>
                                    <option value="Active">Active</option>
                                    <option value="Deactive">Deactive</option>

                                </select>
                            </div>
                            <div class="col-md-6 form-group"></div>
                            <div class="col-12 form-group mg-t-8">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Registration Session</div>
                </div>
                <div class="card-body">

                    <div class="table-responsive mt-2">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                    <tr>
                                      <th scope="col">Serial No</th>
                                      <th scope="col">Session Name</th>
                                      <th scope="col">Type</th>
                                      <th scope="col">Education Year</th>
                                      <th scope="col">Start date to end date</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Acction</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($dataRegistration as  $row)

                                    <tr>
                                     <td>{{$loop->iteration}}</td>
                                     <td>{{$row->session->session_name ??'' }}</td>
                                     <td>{{ $row->time_setup_type }}</td>
                                     <td>{{ $row->eduyear->education_year }}</td>
                                     <td>{{ $row->start_date }} <-> {{ $row->ending_date }}</td>
                                     <td>
                                        @if ($row->status=='Active')
                                        <p class="badge bg-success">{{ $row->status }}</p>
                                        @else
                                        <p class="badge bg-danger">{{ $row->status }}</p>
                                        @endif
                                     </td>

                                     <td class="d-flex">
                                         <a href="{{url('Registrations/edit',$row->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                         <form action="{{url('Registrations/delete',$row->id)}}" style="margin-left:4%" method="post">
                                            @csrf
                                         <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                    </tr>

                                    @endforeach


                                   </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('Backend.admin.account.modal')
    <!-- ROW-1 CLOSED -->
    @endsection
    @section('scripts')

    @endsection

