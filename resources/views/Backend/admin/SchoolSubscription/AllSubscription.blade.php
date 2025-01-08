@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">







        {{-- <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet"> --}}


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>





<div class="container card mt-4">

<div class="card-header"> Subcription List </div>

    <div class="panel panel-primary">
        <div class="tab-menu-heading">
            <div class="tabs-menu">
                <!-- Tabs -->
                <ul class="nav panel-tabs panel-success" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">  <a class=" active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All</a></li>
                    <li role="presentation"> <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Approved</a></li>
                    <li role="presentation">  <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Pending</a></li>
                    <li role="presentation"><a class="nav-link" id="expired-tab" data-bs-toggle="tab" href="#expired" role="tab" aria-controls="expired" aria-selected="false">Expired</a></li>

                </ul>
            </div>
        </div>
    <div class="tab-content mt-3" id="myTabContent">
        <!-- Home Tab -->
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table id="datatable1" class="table table-bordered mt-3 " style="width:100%">
                <thead>
                    <tr>
                        <th>Sl </th>
                        <th>Institute Name</th>
                        <th>Plan Name</th>
                        <th >Price</th>
                        <th>Date</th>
                        <th >Status</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>


                        @foreach ($Allsubscription as $subscription)
                        @php
                        $branchdtls=App\Models\BranchDetails::where('branch_id',$subscription->branch_id)->first();
                        @endphp

                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>{{$subscription->branch->institute_name}}</td>
                            <td>{{($subscription->plan->name) }}</td>
                             <td>{{$subscription->plan->price}}</td>
                             {{-- <td>{{$branchdtls->e_mail}}</td>
                             <td>{{$branchdtls->mobile_number}}</td> --}}
                             <td >Starting Date:<strong> {{$subscription->starting_date}}</strong><br>Expired Date:<strong>  {{$subscription->expired_date}}</strong></td>
                            <td><button type="button" class="btn btn-outline-success disabled" style="width: 100%;">{{$subscription->status}}</button></td>
                            <td style="display: flex">

                                   {{-- <a href="{{url('Branch/info',$subscription->id)}}" class="btn btn-info btn-lg" style="; margin-right:4%;height:100%"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}
                                   <a href="{{url('School/subscription/subscription/edit',$subscription->id)}}" class="btn btn-info btn-lg" style=";margin-right:4%;height:100%"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                   <form action="{{url('School/subscription/subscription/delete',$subscription->id)}}"  method="post"  style="margin-left:4%">
                                       @csrf
                                    <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to delete this item?')" style=""><i class="fa fa-trash"></i></button>
                                </form>


                             </td>
                          </tr>
                        @endforeach
                    </tr>


                </tbody>
            </table>
        </div>

        <!-- Profile Tab -->
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <table id="datatable2" class="table table-striped mt-3" style="width:100%">
                <thead>
                    <tr>

                        <th>Sl </th>
                        <th>Institute Name</th>
                        <th>Plan Name</th>
                        <th >Price</th>
                        {{-- <th >Email</th>
                        <th >Mobile No</th> --}}
                        <th >Date</th>
                        <th >Status</th>
                        <th >Action</th>

                    </tr>
                </thead>
                <tbody>


                        @foreach ($Approvedsubscription as $subscription)
                        @php
                        $branchdtls=App\Models\BranchDetails::where('branch_id',$subscription->branch_id)->first();
                       @endphp

                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>{{$subscription->branch->institute_name}}</td>
                            <td>{{$subscription->plan->name}}</td>
                             <td>{{$subscription->plan->price}}</td>
                             {{-- <td>{{$branchdtls->e_mail}}</td>
                             <td>{{$branchdtls->mobile_number}}</td> --}}
                             <td >Starting Date:<strong>{{$subscription->starting_date}}<strong><br> Expired Date: <strong>{{$subscription->expired_date}}</strong></td>
                            <td><button type="button" class="btn btn-outline-success disabled" style="width: 100%;">{{$subscription->status}}</button></td>
                            <td style="display: flex">

                                {{-- <a href="{{url('Branch/info',$subscription->id)}}" class="btn btn-info btn-lg" style="; margin-right:4%;height:100%"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}
                                <a href="{{url('School/subscription/subscription/edit',$subscription->id)}}" class="btn btn-info btn-lg" style=";margin-right:4%;height:100%"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <form action="{{url('School/subscription/subscription/delete',$subscription->id)}}"  method="post"  style="margin-left:4%">
                                    @csrf
                                 <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to delete this item?')" style=""><i class="fas fa-trash"></i></button>
                             </form>


                          </td>
                          </tr>
                        @endforeach


                </tbody>
            </table>
        </div>

        <!-- Contact Tab -->
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <table id="datatable3" class="table table-striped mt-3" style="width:100%">
                <thead>
                    <tr>

                        <th>Sl </th>
                        <th>Institute Name</th>
                        <th>Plan Name</th>
                        <th >Price</th>
                        {{-- <th >Email</th>
                        <th >Mobile No</th> --}}
                        <th>Date</th>
                        <th >Status</th>
                        <th >Action</th>

                    </tr>
                </thead>
                <tbody>


                        @foreach ($Pendingsubscription as $subscription)
                        @php
                        $branchdtls=App\Models\BranchDetails::where('branch_id',$subscription->branch_id)->first();
                       @endphp

                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>{{$subscription->branch->institute_name}}</td>
                            <td>{{$subscription->plan->name}}</td>
                             <td>{{$subscription->plan->price}}</td>
                             {{-- <td>{{$branchdtls->e_mail}}</td>
                             <td>{{$branchdtls->mobile_number}}</td> --}}
                             <td >Starting Date:<strong> {{$subscription->starting_date}}</strong> <br> Expired Date: <strong> {{$subscription->expired_date}}</strong> </td>
                            <td><button type="button" class="btn btn-outline-success disabled" style="width: 100%;">{{$subscription->status}}</button></td>
                            <td style="display: flex">

                                {{-- <a href="{{url('Branch/info',$subscription->id)}}" class="btn btn-info btn-lg" style="; margin-right:4%;height:100%"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}
                                <a href="{{url('School/subscription/subscription/edit',$subscription->id)}}" class="btn btn-info btn-lg" style=";margin-right:4%;height:100%"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <form action="{{url('School/subscription/subscription/delete',$subscription->id)}}"  method="post"  style="margin-left:4%">
                                    @csrf
                                 <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to delete this item?')" style=""><i class="fas fa-trash"></i></button>
                             </form>


                          </td>
                          </tr>
                        @endforeach


                </tbody>
            </table>
        </div>


        <div class="tab-pane fade" id="expired" role="tabpanel" aria-labelledby="expired-tab">
            <table id="datatable4" class="table table-striped mt-3" style="width:100%">
                <thead>
                    <tr>

                        <th>Sl </th>
                        <th>Institute Name</th>
                        <th>Plan Name</th>
                        <th >Price</th>
                        {{-- <th >Email</th>
                        <th >Mobile No</th> --}}
                        <th>Date</th>
                        <th >Status</th>
                        <th >Action</th>

                    </tr>
                </thead>
                <tbody>



                        @foreach ($Expiredsubscription as $subscription)
                        @php
                        $branchdtls=App\Models\BranchDetails::where('branch_id',$subscription->branch_id)->first();
                       @endphp

                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td>{{$subscription->branch->institute_name}}</td>
                            <td>{{$subscription->plan->name}}</td>
                             <td>{{$subscription->plan->price}}</td>
                             {{-- <td>{{$branchdtls->e_mail}}</td>
                             <td>{{$branchdtls->mobile_number}}</td> --}}
                             <td colspan="3">Starting Date:<strong>  {{$subscription->starting_date}}</strong> <br> Expired Date: <strong> {{$subscription->expired_date}}</strong> </td>
                            <td><button type="button" class="btn btn-outline-success disabled" style="width: 100%;">{{$subscription->status}}</button></td>
                            <td style="display: flex">

                                {{-- <a href="{{url('Branch/info',$subscription->branch_id)}}" class="btn btn-info btn-lg" style="; margin-right:4%;height:100%"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}
                                <a href="{{url('School/subscription/subscription/edit',$subscription->id)}}" class="btn btn-info btn-lg" style=";margin-right:4%;height:100%"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <form action="{{url('School/subscription/subscription/delete',$subscription->id)}}"  method="post"  style="margin-left:4%">
                                    @csrf
                                 <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to delete this item?')" style=""><i class="fas fa-trash"></i></button>
                             </form>


                          </td>
                          </tr>
                        @endforeach


                </tbody>
            </table>
        </div>



    </div>
</div>




















        <!-- Breadcubs Area Start Here -->

        </div>


















        <!-- Social Media End Here -->
    @endsection
@section('scripts')

<script>
    // Initialize DataTables for each table
    $(document).ready(function () {
        $('#datatable1').DataTable();
        $('#datatable2').DataTable();
        $('#datatable3').DataTable();
        $('#datatable4').DataTable();


    });
</script>

@endsection










