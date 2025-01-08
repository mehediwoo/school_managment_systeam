@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Academic Curriculam</h3>
            <ul>
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>Accademic Curriculam</li>
            </ul>
        </div>
        <div>
            <div class="container col-lg-12">



                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="{{url('course/all')}}">
                                                    <div class="row">
                                                        <div class="col-md-2 text-white text-center system-settings"><i class="fa fa-cog"></i></div>
                                                         <div class="col-md-10" style="">
                                                             <h4 class="mt-3 contolmargin"><b >Course</b></h4>
                                                               <p style="font-size: 14px">Add New Course For your Academy</p>
                                                         </div>
                                                     </div>
                                                </a>


                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="{{url('Session/all')}}" >
                                                    <div class="row">
                                                        <div class="col-md-2 text-white text-center system-settings"><i class="fa fa-cog"></i></div>
                                                         <div class="col-md-10" style="">
                                                             <h4 class="mt-3 contolmargin"><b >Session</b></h4>
                                                               <p style="font-size: 14px">Add New Session For your Academy</p>
                                                         </div>
                                                     </div>
                                                </a>


                                            </div>
                                        </div>
                                    </div>








                                </div>





        </div>
        <!-- Social Media End Here -->


    @endsection


