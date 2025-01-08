@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">

<div>
    <div class="container col-lg-12 mt-3">
        <div class="row">
            <div class="col-md-6 m-auto ">
                <div class="card">
                <div class="card-header">
                    Update Division
                </div>
                <div class="card-body">
                    <form class="mb-5" action="{{ url('division/update',$get_division->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Division Name</label>
                          <input type="text" name="name"class="form-control" value="{{ $get_division->name }}">
                        </div>

                        <button type="Update" class="btn btn-primary">Update</button>
                      </form>
                </div>
              </div>
            </div>

        </div>
    </div>

</div>
        <!-- Social Media End Here -->
    @endsection
