@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->

        <div>
            <div class="container col-lg-12 mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex" >
                                <a href="{{url('School/subscription/Package/add')}}" style="color:rgb(30, 155, 233);margin-right:2%"><i class="fas fa-edit">Add Package</i></a>
                               <a href="{{url('School/subscription/Package/all')}}" style="color:rgb(47, 153, 219);"><i class="fas fa-tasks">All Package</i></a>

                            </div>
                            <div class="card-body">
                                <form class="mb-5" action="{{url('School/subscription/Package/insert')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="mb-3 col-md-12 mt-3">
                                            <label for="exampleInputEmail1" class="form-label">Plan Name:<span style="color:red;font-size:20px">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                            placeholder="Enter Plan Name"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-12 mt-3">
                                            <label for="exampleInputEmail1" class="form-label">Price:<span style="color:red;font-size:20px">*</span></label>
                                            <input type="text" name="price" class="form-control"
                                            placeholder="Enter Price"style="font-size:15px">
                                        </div>

                                       <div class="mb-3 col-md-12 mt-3">
                                            <label for="exampleInputEmail1" class="form-label">Discount Price:</label>
                                            <input type="text" name="discount_price" class="form-control"
                                            placeholder="Enter Discount Price"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-12 mt-3">
                                            <label for="exampleInputEmail1" class="form-label">Sunscription Period:<span style="color:red;font-size:20px">*</span></label>
                                          <select name="subscription_period" class="form-control" style="font-size:15px;">
                                            <option value="">Select</option>
                                            <option value="Days">Days</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Yearly">Yearly</option>
                                            <option value="Lifetime">Lifetime</option>
                                          </select>
                                        </div>

                                        <div class="mb-3 col-md-12 mt-3">
                                            <label for="exampleInputEmail1" class="form-label">Date:<span style="color:red;font-size:20px">*</span></label>
                                            <input type="date" name="date" class="form-control"
                                            placeholder="Enter Day/Month/Year"style="font-size:15px">
                                        </div>
                                        <div class="mb-3 col-md-12 mt-3">
                                            <label for="exampleInputEmail1" class="form-label">Status<span style="color:red;font-size:20px">*</span></label>
                                            <select name="status" class="form-control" style="font-size:15px;">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Deactive">Deactive</option>

                                              </select>
                                        </div>
                                        <div class="col-md-12"> <button type="submit"
                                                class="btn btn-primary btn-lg" style="font-size:18px;color:white">Submit</button></div>

                            </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <!-- Social Media End Here -->
    @endsection


