@extends('layouts.master')
@section('content')
    <div class="dashboard-content-one MT-3">

        <div>
            <div class="container">


                <div class="card height-auto mt-3">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>SMTP SETTING</h3>
                            </div>
                        </div>
                        <form class="new-added-form" action="{{url('smtp/update',$data->id)}}" method="Post" enctype="multipart/form-data">
                           @csrf
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Mailer</label>
                                    <input type="text" name="mailer" value="{{$data->mailer}}" class="form-control">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Host</label>
                                    <input type="text" name="host" value="{{$data->host}}" class="form-control">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Port</label>
                                    <input type="text" name="port" value="{{$data->port}}" class="form-control">
                                </div>


                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>User Name</label>
                                    <input type="text" name="username" value="{{$data->username}}" class="form-control">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" value="{{$data->password}}" class="form-control">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Encryption</label>
                                    <input type="text" name="encryption" value="{{$data->encryption}}" class="form-control">
                                </div>


                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Sender</label>
                                    <input type="text" name="sender" value="{{$data->sender}}" class="form-control">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Sender Name</label>
                                    <input type="text" name="sender_name" value="{{$data->sender_name}}" class="form-control">
                                </div>

                                <div class="col-md-6 form-group"></div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn btn-primary">Update</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Social Media End Here -->
    @endsection


