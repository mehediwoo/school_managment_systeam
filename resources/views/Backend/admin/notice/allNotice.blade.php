@extends('layouts.master')
@section('title','All Notice')
@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">All Notice</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('institute.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Notice</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->
<div class="card">
    <div class="card-header">
        <div class="card-title">Search Notice</div>
    </div>
    <div class="card-body">

        <form class="mg-b-20" action="{{url('course/search')}}" method="get">
            @csrf
            <div class="row">

                <div class="col-xl-4">
                    <div class="form-group">
                        <input type="text" name="course_code" placeholder="Search by Course Code ..." class="form-control">
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <input type="text" name="course_name" placeholder="Search by Course ..." class="form-control">
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" >SEARCH</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<div class="card">
    <div class="card-header justify-content-between">
        <div class="card-title">All Notice List's</div>
        <div class="">
            <a href="{{url('notice/index')}}" class="btn btn-primary py-1 px-4">Add Session</a>
        </div>
    </div>
    <div class="card-body">

        <div class="table-responsive mt-2">
            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                <thead>
                    <tr>
                        <th scope="col">Notice Title</th>
                        <th scope="col">image</th>
                        <th scope="col">Notice Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notice as $notices)
                    <tr>
                        <td>{{$notices->title}}</td>
                        <td><img src="{{asset($notices->image)}}" style="width: 100px;height: 100px" alt=""></td>
                        <td>{!! substr($notices->description,0,100) !!}</td>

                        <td>
                            <button type="button" class="btn btn-outline-success disabled" style="width: 100%;font-size:15px">{{$notices->status}}</button>
                        </td>

                        <td style="display: flex">

                            <a href="{{url('notice/edit',$notices->id)}}" class="btn btn-info btn-lg" style="font-size:15px;margin-right:4%;height:100%"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            <form action="{{url('notice/delete',$notices->id)}}"  method="post"  style="margin-left:4%">
                                @csrf
                             <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to delete this item?')" style="font-size:15px"><i class="fa fa-trash"></i></button>
                            </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

