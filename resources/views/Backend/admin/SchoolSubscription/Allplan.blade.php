@extends('layouts.master')
@section('title','All Plan')
@section('content')
    <div class="dashboard-content-one">

        <div class="row row-sm mt-2">
            <div class="col-lg-12">
                <div class="card" style="padding-right:2%;">
                    <div class="card-header">
                        <h3 class="card-title">All Plan</h3>

                    </div>


                 <div class="table-responsive mt-2" style="padding:2%;">
                 <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">



                <thead>
                    <div class="d-flex mb-2 ">
                        <a href="{{url('School/subscription/Package/all')}}" class="btn btn-primary" style="color:rgb(50, 159, 228);margin-right:2%">Package List</i></a>
                        <a href="{{url('School/subscription/Package/add')}}" class="btn btn-primary">Add Package</i></a>
                </div>
                <tr>
                    <th scope="col">Serial No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount Price</th>
                    <th scope="col">Period Type</th>
                    <th scope="col">Period</th>
                    <th scope="col">Status</th>
                    <th scope="col">Acction</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($allPlan as  $package)

                    <tr>
                     <td>{{$loop->iteration}}</td>
                     <td>{{$package->name}}</td>
                     <td>{{$package->price}}</td>
                     <td>{{$package->discount_price}}</td>
                     <td>{{$package->subscription_period}}</td>
                     <td>{{$package->period_limit}}</td>
                     <td align="center"><button type="button" class="btn btn-outline-primary disabled" >{{$package->status}}</button></td>

                     <td class="d-flex">
                         <a href="{{url('School/subscription/Package/edit',$package->id)}}" class="btn btn-info btn-lg"><i class="fa fa-edit" aria-hidden="true""></i></a>
                         <form action="{{url('School/subscription/Package/delete',$package->id)}}" style="margin-left:4%" method="post">
                            @csrf
                         <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash"></i></button>
                     </form>


                        </td>
                    </tr>

                    @endforeach


                   </tbody>
            </table>
        </div>


    </div>
            </div>


































        </div>
        <!-- Social Media End Here -->
    @endsection


