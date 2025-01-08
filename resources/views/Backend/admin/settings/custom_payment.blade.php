@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div>
            <div class="container col-lg-12">


                <div class="dashboard-content-one">

                    <!-- Breadcubs Area End Here -->
                    <!-- Admit Form Area Start Here -->

                    <div class="card height-auto">
                        <div class="card-body">
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Payment Gateway</h3>
                                </div>
                            </div>
                           <div class="card">
                            <div class="d-flex">





                                <div class="card col-md-3" >
                                    <a href="{{url('SystemSettings/bkash_custom')}}"type="submit" class="btn btn-outline-secondary pbutton" style="margin-right:2%">
                                        <img src="{{asset('Backend/image/logo/bkash.png')}}" alt="bkash" style="height:80px">
                                        {{-- <h4 class="mt-2">BKASH</h4> --}}
                                       </a>
                                  </div>






                                  <div class="card col-md-3">
                                    <a href="{{url('SystemSettings/nagad_custom')}}"type="submit" class="btn btn-outline-secondary pbutton" style="margin-right:2%">
                                     <img src="{{asset('Backend/image/logo/Nagad-Logo.wine.png')}}" alt="nagad" style="height:80px">
                                     {{-- <h4 class="mt-2">BKASH</h4> --}}
                                    </a>
                                </div>


                                <div class="card col-md-3">
                                    <a href="{{url('SystemSettings/rocket_custom')}}"type="submit" class="btn btn-outline-secondary pbutton" style="margin-right:2%">
                                     <img src="{{asset('Backend/image/logo/rocket.png')}}" alt="rocket" style="height:80px">
                                     {{-- <h4 class="mt-2">BKASH</h4> --}}
                                    </a>
                                </div>

                            </div>
                           </div>
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
