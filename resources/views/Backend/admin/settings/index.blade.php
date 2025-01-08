@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">

            <div class="container col-lg-12 mt-5">



                                <div class="row">

                                    <style>


                                        .card.custom-card:hover {
                                            background-color: #58e2d7; /* Desired hover background color */
                                        }

                                  </style>





                                    <div class="col-xl-4 custom-hover">
                                        <div class="card custom-card">
                                            <a href="{{url('SystemSettings/Backend/Settings')}}">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md">
                                                      <i class="ti-settings text-black"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                            <h4 class="mt-3 contolmargin text-black"><b >General Settings</b></h4>
                                                              <p style="font-size: 14px" class="text-black">Configure the foundamental information of the site.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>




                                    <div class="col-xl-4 custom-hover">
                                        <div class="card custom-card">
                                            <a href="{{url('SystemSettings/Backend/Settings/logo')}}">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md">
                                                      <i class="ti-settings text-black"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mt-3 contolmargin text-black"><b >Logo & Favicon</b></h4>
                                                        <p style="font-size: 14px" class="text-black">Upload your logo & favicon</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>





                                    <div class="col-xl-4 custom-hover">
                                        <div class="card custom-card">
                                            <a href="">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md">
                                                      <i class="ti-settings text-black"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mt-3 contolmargin text-black"><b >System configuration</b></h4>
                                                        <p style="font-size: 14px" class="text-black">Controll All of the basic modules of the system</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>



                                    <div class="col-xl-4 custom-hover">
                                        <div class="card custom-card">
                                            <a href="{{url('smtp/setting')}}">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md">
                                                      <i class="ti-settings text-black"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mt-3 contolmargin text-black"><b >SMTP Settings</b></h4>
                                                        <p style="font-size: 14px" class="text-black">SMTP setting of the site</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>




                                    <div class="col-xl-4 custom-hover">
                                        <div class="card custom-card">
                                            <a href="">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md">
                                                      <i class="ti-settings text-black"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mt-3 contolmargin text-black"><b >Notification Settings</b></h4>
                                                        <p style="font-size: 14px" class="text-black">Controll and Configure overall notification elements of the system.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>


                                    <div class="col-xl-4 custom-hover">
                                        <div class="card custom-card">
                                            <a href="{{url('SystemSettings/Backend/Settings/paymentGateway')}}">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md">
                                                      <i class="ti-settings text-black"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mt-3 contolmargin text-black"><b >Payments Gateway</b></h4>
                                                        <p style="font-size: 14px" class="text-black"> Configure automatic or manual payment gateways to accept payment from users.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>




                                    <div class="col-xl-4 custom-hover">
                                        <div class="card custom-card">
                                            <a href="{{url('SystemSettings/Backend/Settings/seo')}}">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md">
                                                      <i class="ti-settings text-black"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mt-3 contolmargin text-black"><b >SEO Configuration</b></h4>
                                                        <p style="font-size: 14px" class="text-black"> Configure proper meta title, meta description, meta keywords, etc to make the system SEO-friendly.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>




                                    <div class="col-xl-4 custom-hover">
                                        <div class="card custom-card">
                                            <a href="">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md">
                                                      <i class="ti-settings text-black"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mt-3 contolmargin text-black"><b >Manage Frontend</b></h4>
                                                        <p style="font-size: 14px" class="text-black"> Control all of the frontend contents of the system.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>





                                    <div class="col-xl-4 custom-hover">
                                        <div class="card custom-card">
                                            <a href="">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md">
                                                      <i class="ti-settings text-black"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mt-3 contolmargin text-black"><b >Language</b></h4>
                                                        <p style="font-size: 14px" class="text-black"> Configured your required language and keywords to localize the site.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>



                                    <div class="col-xl-4 custom-hover">
                                        <div class="card custom-card">
                                            <a href="{{ url('add_division') }}">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md">
                                                      <i class="ti-settings text-black"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mt-3 contolmargin text-black"><b >Division Settings</b></h4>
                                                        <p style="font-size: 14px" class="text-black">Configure the Division information of the site.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>



                                    <div class="col-xl-4 custom-hover">
                                        <div class="card custom-card">
                                            <a href="{{ url('add_district') }}">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md">
                                                      <i class="ti-settings text-black"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mt-3 contolmargin text-black"><b >District Settings</b></h4>
                                                        <p style="font-size: 14px" class="text-black">Configure the District information of the site.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>



                                    <div class="col-xl-4 custom-hover">
                                        <div class="card custom-card">
                                            <a href="{{url('education_year/add')}}">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md">
                                                      <i class="ti-settings text-black"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h4 class="mt-3 contolmargin text-black"><b >Education Year Settings</b></h4>
                                                        <p style="font-size: 14px" class="text-black">Configure the running education year of the institute.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>

















                                </div>





        </div>
        <!-- Social Media End Here -->


    @endsection


