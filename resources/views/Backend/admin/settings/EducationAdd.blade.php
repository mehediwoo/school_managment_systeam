@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->

        <div>
            <div class="container col-lg-12 mt-3">

          <div class="row"><div class="card height-auto col-md-12">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Add New Education Year</h3>
                    </div>
                </div>
                <form class="new-added-form" action="{{url('education_year/insert')}}" method="Post" enctype="multipart/form-data">
                   @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label>Educational YEAR *</label>
                            <input type="text" name="education_year" placeholder="Enter education Year" class="form-control">
                        </div>

                        <div class="col-md-6 form-group"></div>
                        <div class="col-12 form-group ">
                            <button type="submit" class="btn btn-primary">Save</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="card height-auto mt-2 col-md-12">










            <div class="row row-sm mt-2">
                <div class="col-lg-12">
                    <div class="card" style="padding-right:2%;">
                        <div class="card-header">
                            <h3 class="card-title">All Education Year</h3>

                        </div>


                     <div class="table-responsive mt-2" style="padding:2%;">
                     <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">



                    <thead>
                        <div class="d-flex mb-2 ">

                    </div>
                    <tr>
                        <th class="table_cell" style="color:black;font-size:15px">
                            <b>Sl</b>
                        </th>
                        <th class="table_cell" style="color:black;font-size:15px">
                            <b>Education Year</b>
                        </th>
                        <th class="table_cell" style="color:black;font-size:15px">
                            <b>Status</b>
                        </th>
                        <th class="table_cell" style="color:black;font-size:15px">
                            <b>Current</b>
                        </th>
                        <th class="table_cell" style="color:black;font-size:15px">
                            <b>Created Date</b>
                        </th>
                        <th class="table_cell" style="color:black;font-size:15px">
                            <b>Action</b>
                        </th>
                    </tr>
                    </thead>
                    <tbody style="color:black;font-size:13px">

                        @foreach ($eduYear as $eduYear)
                           <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$eduYear->education_year}}</td>
                              <td>{{$eduYear->status}}</td>
                              <td>
                                  @if ($eduYear->current==0)
                                  <p class="text-danger">Disable</p>
                                  @else
                                  <p class="text-success">Enable</p>
                                  @endif
                              </td>
                              <td>{{$eduYear->created_at}}</td>
                              <td style="display: flex">

                                  <form action="{{url('education_year/update',$eduYear->id)}}" method="post" style="margin-right:4%">
                                      @csrf

                                      <button type="submit" class="mt-2 btn btn-info btn-lg font_icon" {{($eduYear->status=="Deactive")?'style="color:red"':''}}><i class="fa fa-exchange"></i></button>
                                  </form>

                                  <form action="{{url('education_year/current/change',$eduYear->id)}}"  method="post" class="mt-2 mr-2" style="margin-right:4%">
                                      @csrf
                                   <button type="submit" class="btn btn-warning btn-lg font_icon" onclick="return confirm('Are you sure to change this item?')" style="font-size:15px"><i class="fa fa-check"></i></button>
                                  </form>

                                  <form action=""  method="post" class="mt-2 mr-2" style="margin-right:4%">
                                    @csrf
                                 <button type="submit" class="btn btn-info btn-lg font_icon" onclick="return confirm('Are you sure to Edit this item?')" style="font-size:15px"><i class="fa fa-edit"></i></button>
                                </form>

                                  {{-- <form action="{{url('education_year/delete',$eduYear->id)}}"  method="post" class="mt-2 ml-2 ">
                                      @csrf
                                   <button type="submit" class="btn btn-danger btn-lg font_icon" onclick="return confirm('Are you sure to delete this item?')" style="font-size:15px"><i class="fa fa-trash"></i></button>
                                  </form> --}}
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
        <!-- Social Media End Here -->
    @endsection


