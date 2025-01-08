@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div>
            <div class="container col-lg-12">


                <div class="dashboard-content-one mt-3">


                    <!-- Breadcubs Area End Here -->
                    <!-- Admit Form Area Start Here -->

                    <div class="card height-auto">
                        <div class="card-body">
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>SEO Information Update</h3>
                                </div>
                            </div>
                            <form class="new-added-form" action="{{url('SystemSettings/seo/update',$seo->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">


                                    <div class="col-lg-12 col-12 form-group">
                                        <h4><b>Meta Information</b></h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6 col- form-group">
                                                <label class="text-dark-medium">Meta Title </label>
                                               <input type="text" name="meta_title" class="form-control" value="{{$seo->meta_title}}">
                                            </div>

                                            <div class="col-lg-6 col- form-group">
                                                <label class="text-dark-medium">Meta Description: <span style="color: rgb(98, 150, 248)"> Max Length 160 characters</span></label>
                                              <textarea name="meta_description" class="form-control" id="" >{{$seo->meta_description}}</textarea>
                                            </div>

                                            <div class="col-lg-6 col- form-group ">
                                                <label class="text-dark-medium"> Meta Keywords: <span style="color: rgb(98, 150, 248)">   Separate Every Keyword by Using (,) Symbol</span></label>
                                              <textarea name="meta_keywords" class="form-control" id="" >{{$seo->meta_keywords}}</textarea>
                                            </div>
                                        </div>
                                     </div>



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
