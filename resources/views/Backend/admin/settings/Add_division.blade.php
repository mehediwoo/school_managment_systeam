@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">

<div>
    <div class="container col-lg-12 mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header" style="font-size: 25px">
                    Add Division
                </div>
                <div class="card-body">
                    <form class="mb-5" action="{{ url('add_division/insert') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 form-group" style="font-size: 25px">
                          <label for="exampleInputEmail1" class="form-label">Division Name</label>
                          <input type="text" name="name"class="form-control" placeholder="Enter District Name">
                        </div>

                        <div class="col-12 form-group mg-t-8">
                            <button type="submit" class="btn btn-primary">Save</button>

                        </div>
                      </form>
                </div>
              </div>
            </div>

            <div class="col-md-12">








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
                            <th>Serial No</th>
                            <th>Division Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody style="color:black;font-size:13px">

                            @foreach ($get_division as $division)
                            <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $division->name }}</td>
                               <td>
                                   <a href="{{ url('edit/division',$division->id) }}" class="btn btn-primary">Edit</a>
                                   <a href="{{ url('division/delete',$division->id) }}"  class="btn btn-danger">Delete</a>
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
