@extends('admin.layouts.master')
@section('content')
<div class="login-main"
    style="background-image: url('{{ asset('assets/admin/images/login.jpg') }}')">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8 col-sm-11">
                <div class="login-area">
                    <div class="login-wrapper">
                        <div class="login-wrapper__top">
                            {{--  @php
                            $backend_setting=App\Models\BackendSettings::first();
                            @endphp  --}}
                           <h3 class="title text-white">@lang('Welcome to') <strong></strong></h3>
                          <p class="text-white">
                                @lang('Our Family')</p>
                        </div>

                        <div class="login-wrapper__body">
                            <form action="{{url('Login/AuthCheck')}}" method="POST" class="cmn-form mt-30 verify-gcaptcha login-form">
                                @csrf

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <label>@lang('Institute Registration Number ')<span style="color:red">*</span></label>
                                    <input type="text" name="registration_id" id="typeEmailX" class="form-control form-control-lg" />

                                    @if($errors->has('registration_id'))
                                    <div class="error" style="color:red">{{ $errors->first('registration_id') }}</div>
                                 @endif
                                  </div>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <label>@lang('Email')<span style="color:red">*</span></label>
                                    <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" />

                                    @if($errors->has('email'))
                                    <div class="error" style="color:red">{{ $errors->first('email') }}</div>
                                 @endif
                                  </div>

                                  <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <label>@lang('Password')<span style="color:red">*</span></label>
                                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />

                                    @if($errors->has('password'))
                                    <div class="error" style="color:red">{{ $errors->first('password') }}</div>
                                 @endif
                                  </div>
                                {{-- <x-captcha /> --}}
                                <button type="submit" class="btn cmn-btn w-100">@lang('LOGIN')</button>
                            </form>

                        </div>

                    </div>
                    {{-- <div class="d-flexlog mt-5 text-center">
                        <a class="glass-button" href="{{url('admin/login')}}">Admin Login</a>
                        <a class="glass-button" href="{{url('Login/log')}}">Institute Login</a>
                    </div> --}}
                    <style>

                        .d-flexlog{
                            display: flex;

                          }

                          .glass-button {
                            background: rgba(42, 233, 233, 0.5); /* Transparent background */
                            border-radius: 12px; /* Rounded corners */
                            padding: 10px 20px;
                            text-decoration: none;
                            color: white;
                            font-weight: bold;
                            margin-right: 4%;
                            backdrop-filter: blur(10px); /* Background blur for glass effect */
                            -webkit-backdrop-filter: blur(10px); /* For Safari */
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5); /* Light shadow */
                            border: 1px solid rgba(255, 255, 255, 0.5); /* Subtle border */
                            transition: all 0.3s ease;
                          }

                          .glass-button:hover {
                            background: rgba(182, 202, 168, 0.2); /* Slightly darker background on hover */
                            box-shadow: 0 6px 40px rgba(0, 0, 0, 0.2); /* Deeper shadow on hover */
                          }

                    </style>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
