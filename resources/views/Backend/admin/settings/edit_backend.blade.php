@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div>
            <div class="container col-lg-12">



                    <!-- Breadcubs Area End Here -->
                    <!-- Admit Form Area Start Here -->

                    <div class="card height-auto mt-3">
                        <div class="card-body">
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Institute Information Update</h3>
                                </div>
                            </div>
                            <form class="new-added-form" action="{{url('SystemSettings/update',$getBackend->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-12 col-12 form-group ">
                                        <h4><b>Title</b></h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6 col- form-group ">

                                                <label class="text-dark-medium">Site Title </label>
                                               <input type="text" name="site_title" class="form-control" value="{{$getBackend->site_title}}">
                                            </div>
                                            <div class="col-lg-6 col- form-group ">
                                                <label class="text-dark-medium">Sub Title </label>
                                               <input type="text" name="sub_title" class="form-control" value="{{$getBackend->sub_title}}">
                                            </div>
                                        </div>
                                     </div>






                                    <div class="col-lg-12 col-12 form-group ">
                                        <h4><b>Institute About</b></h4>
                                        <hr>
                                      <div class="row">
                                        <div class="col-lg-6 col-12 form-group">
                                            <label class="text-dark-medium">Address</label>
                                           <input type="text" name="address" class="form-control" value="{{$getBackend->address}}">
                                        </div>

                                        <div class="col-lg-6 col-12 form-group ">
                                            <label class="text-dark-medium">Phone</label>
                                           <input type="text" name="phone" class="form-control" value="{{$getBackend->phone}}">
                                        </div>

                                        <div class="col-lg-6 col-12 form-group ">
                                            <label class="text-dark-medium">Email</label>
                                           <input type="email" name="email" class="form-control" value="{{$getBackend->email}}">
                                        </div>
                                        <div class="col-lg-6 col-12 form-group">
                                            <label class="text-dark-medium">Starting Year </label>
                                           <input type="text" name="starting_year" class="form-control" value="{{$getBackend->starting_year}}">
                                        </div>
                                      </div>

                                    </div>


                                        <div class="col-lg-12 col-12 form-group ">
                                            <h4><b>Social Media Link</b></h4>
                                            <hr>
                                           <div class="row">

                                            <div class="col-lg-6 col-12 form-group ">
                                                <label class="text-dark-medium">Facebook</label>
                                               <input type="text" name="facebook" class="form-control" value="{{$getBackend->facebook}}">
                                            </div>
                                            <div class="col-lg-6 col-12 form-group ">
                                                <label class="text-dark-medium">Twitter</label>
                                               <input type="text" name="twitter" class="form-control" value="{{$getBackend->twitter}}">
                                            </div>
                                            <div class="col-lg-6 col-12 form-group ">
                                                <label class="text-dark-medium">LinkedIn</label>
                                               <input type="text" name="linkedin" class="form-control" value="{{$getBackend->linkedin}}">
                                            </div>
                                            <div class="col-lg-6 col-12 form-group ">
                                                <label class="text-dark-medium">Instragram</label>
                                               <input type="text" name="instragram" class="form-control" value="{{$getBackend->instragram}}">
                                            </div>
                                           </div>
                                        </div>
                                        <div class="col-lg-12 col-12 form-group ">
                                            <h4><b>Footer</b></h4>
                                            <hr>
                                           <div class="row">

                                            <div class="col-lg-6 col-12 form-group ">
                                                <label class="text-dark-medium">Footer</label>
                                                <textarea name="footer" class="form-control">{{$getBackend->footer}}</textarea>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-12 form-group mg-t-8">
                                        <button type="submit" class="btn btn-primary">Update</button>

                                </div>
                            </form>
                        </div>
                    </div>

            </div>

        </div>
        <!-- Social Media End Here -->
    @endsection

    @section('js')
    <script>
    function otherQualification() {
        var qualification=document.getElementById('edu_qualification').value;
        if( qualification=='others'){
            document.getElementById('other').style.display='block';

        }

        else{
            document.getElementById('other').style.display='none';
        }
    }
    </script>


    @endsection
