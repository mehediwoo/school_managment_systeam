
@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div>
            <div class="container col-lg-12">


                <div class="dashboard-content-one">
                    <!-- Breadcubs Area Start Here -->
                    <div class="breadcrumbs-area">
                        <h3>Nagad Api</h3>
                        <ul>
                            <li>
                                <a href="{{route('admin.dashboard')}}">Home</a>
                            </li>
                            <li>Nagad Api Settings</li>
                        </ul>
                    </div>
                    <!-- Breadcubs Area End Here -->
                    <!-- Admit Form Area Start Here -->

                    <div class="card height-auto">
                        <div class="card-body">
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Edit Nagad (API)</h3>
                                </div>
                                <div class="row">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            @if ($nagad_api->on_live==1)
                                            <input type="checkbox" class="form-check-input" value="">Go sandbox
                                            @elseif ($nagad_api->on_live==0)
                                            <input type="checkbox" class="form-check-input" value="">Go on live
                                            @endif
                                        </label>
                                      </div>
                                </div>
                            </div>
                           <div class="card">
                            <form action="{{ route('nagad_gateway.update',$nagad_api->id) }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $nagad_api->name }}">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="transactionFee">Transaction Fee (%)</label>
                                        <input type="text" class="form-control" name="transactionFee" value="{{ $nagad_api->trans_fee }}">
                                        @error('transactionFee')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="sandbox">Sandbox</label>
                                        <input type="text" name="sand_box" class="form-control" value="{{ $nagad_api->sandbox }}" placeholder="Sand box url">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="sandbox">Live Url</label>
                                        <input type="text" name="live_url" class="form-control" value="{{ $nagad_api->live }}" placeholder="Live url">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="username">Marchent ID</label>
                                        <input type="text" class="form-control" name="marchent_id" value="{{ $nagad_api->merchant_id }}">
                                        @error('marchent_id')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">Marchent Number</label>
                                        <input type="text" class="form-control" name="marchent_number" value="{{ $nagad_api->merchant_number }}">
                                        @error('marchent_number')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="appKey">Public Key</label>
                                        <input type="text" class="form-control" name="public_key"value="{{ $nagad_api->public_key }}">
                                        @error('public_key')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="appSecret">Private Key</label>
                                        <input type="text" class="form-control" name="private_key"value="{{ $nagad_api->private_key }}">
                                        @error('private_key')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="mt-5">
                                            <img src="{{ asset($nagad_api->logo) }}" alt="" style="height: 64px;width:64px">
                                        </div>
                                        <label class="text-dark-medium">Logo</label>
                                        <input type="file" name="logo"  class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="sandbox">Status</label>
                                        <select name="status" class="form-control">
                                            <option class="text-success" selected>{{$nagad_api->status}}</option>
                                            <option value="active">Active</option>
                                            <option value="deactive">Deactive</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </form>
                           </div>
                        </div>
                    </div>

            </div>

        </div>
        <!-- Social Media End Here -->
    {{-- <script>
        $(document).ready(function(){

            $(document).on('change','#on_select',function(){

                let value = $(this).val();

                if (value=='on') {
                    $('#live').removeClass('d-none');
                    $('#sandbox').addClass('d-none');
                }else if(value=='of'){
                    $('#live').addClass('d-none');
                    $('#sandbox').removeClass('d-none');

                }
            });
        });
    </script> --}}
    @endsection


