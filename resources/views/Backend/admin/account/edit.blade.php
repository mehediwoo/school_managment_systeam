@extends('layouts.master')

@section('content')
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Office Accounting</h3>
    </div>
    <div>
    <div class="container col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="d-flex">
                            <h5>Account List</h5>
                            <a href="{{ route('account.index') }}" class="btn btn-primary btn-lg ml-auto" style="font-size: 20px">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('account.update',$edit->id) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Account Name</label>
                                            <input type="text" name="account_name" class="form-control" value="{{ $edit->acc_name }}">
                                            @error('account_name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="">Account Number</label>
                                            <input type="text" name="account_number" class="form-control" value="{{ $edit->acc_number }}">
                                            @error('account_number')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description" cols="10" rows="10" class="form-control" placeholder="Type description about this Account">{{ $edit->description }}</textarea>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info" style="font-size: 20px">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Backend.admin.account.modal')
@endsection
@section('js')

@endsection
