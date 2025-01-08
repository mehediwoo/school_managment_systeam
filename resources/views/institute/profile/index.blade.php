@extends('layouts.master')
@section('title','My Profile')
@section('styles')
<style>
    .userprofile .userpic .userpicimg {
    height: 100%;
    width: 100%;
    border-radius: 100%;
}
</style>
@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Edit Profile</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('institute.dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-lg-5 col-xl-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="userprofile">
                        <div class="userpic  brround">
                            <img src="{{ asset($branch->branch_details->ceo_profile) }}"  alt="{{ $branch->branch_details->ceo_profile }}" class="userpicimg">
                        </div>
                        <h3 class="username text-dark mb-2">{{ $branch->Propietor_Name }}</h3>
                        <p class="mb-1 text-muted">Institute : <strong>{{ $branch->institute_name }}</strong></p>

                        <div class="socials text-center mt-3">
                            <a href="{{ url($branch->branch_details->ceo_facebook) }}" target="_blank" class="btn btn-circle btn-primary ">
                                <i class="fa fa-facebook fs-14"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                    <div class="card-title">Edit Password</div>
            </div>
            <form action="{{ route('institute.profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                        @error('new_password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password">
                        @error('confirm_password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-0 mt-3">
                        <label class="form-label">Profile Thumbnail</label>
                        <input type="file" class="form-control dropify" name="thumbnail">
                        @error('thumbnail')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary-gradient">Update</button>
                </div>

            </form>
        </div>

        <div class="card panel-theme">
            <div class="card-header">
                <div class="float-start">
                    <h3 class="card-title">Contact</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body no-padding">
                <ul class="list-group no-margin">
                    <li class="list-group-item">
                        <div class="d-inline-flex">
                            <i class="fa fa-envelope text-muted"></i>
                        </div>
                        <div class="my-auto pt-2 ms-3 d-inline-flex fs-15">
                            {{ $branch->e_mail }}
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-inline-flex">
                            <i class="fa fa-globe text-muted"></i>
                        </div>
                        <div class="my-auto pt-2 ms-3 d-inline-flex fs-15">
                            {{ $branch->mobile_number }}
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-xl-8 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-lg-6 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Propiter Name</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->Propietor_Name }}" disabled>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Institute Name</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->institute_name }}" disabled>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Father Name</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->branch_details->fathers_name }}" disabled>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Mother Name</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->branch_details->mothers_name }}" disabled>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Age</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->branch_details->institute_age }}" disabled>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Number of computer</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->branch_details->no_computer }}" disabled>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Additional Relation Name</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->branch_details->extra_rel_contact }}" disabled>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Blood Group</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->branch_details->blood_group }}" disabled>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Division</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->division->name }}" disabled>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Distric</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->district->district_name }}" disabled>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Sub District</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->sub_district }}" disabled>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Registration</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->registration_id }}" disabled>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Thana</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->thana }}" disabled>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Post Office</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->post_office }}" disabled>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Post Code</label>
                            <input type="text" class="form-control" id="exampleInputname" value="{{ $branch->post_code }}" disabled>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Address</label>
                            <textarea name="" class="form-control" id="" cols="5" rows="5" disabled>{{ $branch->address }}</textarea>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">National Id</label>
                            <img src="{{ asset($branch->branch_details->national_id) }}" alt="" class="img-thumbnail">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Education Skill</label>
                            <img src="{{ asset($branch->branch_details->educational_skill) }}" alt="" class="img-thumbnail">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Institute Image</label>
                            <img src="{{ asset($branch->branch_details->institute_image) }}" alt="" class="img-thumbnail">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="mb-4">
                            <label for="exampleInputname">Trade Licence</label>
                            <img src="{{ asset($branch->branch_details->trade_licence) }}" alt="" class="img-thumbnail">
                        </div>
                    </div>

                </div>

            </div>

            {{-- <div class="card-footer">
                <a href="javascript:void(0);" class="btn btn-success-gradient mt-1">Save</a>
            </div> --}}
        </div>

    </div>
</div>
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')

	<!-- INTERNAL SELECT2 JS -->
    <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
	@vite('resources/assets/js/select2.js')
    <!-- FILE UPLOADES JS -->
    <script src="{{asset('build/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('build/assets/plugins/fileuploads/js/file-upload.js')}}"></script>

@endsection
