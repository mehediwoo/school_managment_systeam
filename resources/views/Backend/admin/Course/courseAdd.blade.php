@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->

        <div>
            <div class="container">


                <div class="card height-auto mt-2">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add New Course</h3>
                            </div>
                        </div>
                        <form class="new-added-form" action="{{url('course/insert')}}" method="Post" enctype="multipart/form-data">
                           @csrf
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Course Name *</label>
                                    <input type="text" name="course_name" placeholder="Enter Course Name" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Course Code</label>
                                    <input type="text" name="course_code" placeholder="Enter Course Code" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Course Duration</label>
                                    <input type="text" name="course_duration" placeholder="Enter Course Duration" class="form-control">
                                </div>


                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Course Amount</label>
                                    <input type="text" name="course_amount" placeholder="Enter Course Amount" class="form-control">
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Status</label>
                                    <select name="status" id="select-countries" class="form-control custom-select select2">
                                        <option data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}" value="" selected>Select Status</option>
                                        <option value="Active" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}" >Active</option>
                                        <option value="Deactive" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}" >Deactive</option>
                                        @if($errors->has('branch_id'))
                                        <div class="error" style="color:red">{{ $errors->first('branch_id') }}</div>
                                     @endif
                                    </select>
                                </div>
                                <div class="col-md-6 form-group"></div>
                                <div class="col-12 form-group mg-t-8  d-flex">
                                    <button type="submit" class="btn btn-blue btn-sm d-block my-auto m-2">Save</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Social Media End Here -->
    @endsection


