@extends('layouts.master')

@section('content')

                          <div class="dashboard-content-one">

                            <div class="row row-sm mt-2">
                                <div class="col-lg-12">
                                    <div class="card" style="padding-right:2%;">
                                        <div class="card-header">
                                            <h3 class="card-title">All Course</h3>

                                        </div>


                                     <div class="table-responsive mt-2" style="padding:2%;">
                                     <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">



                                    <thead>
                                        <div class="d-flex mb-2 ">

                                        <a href="{{ route('add.course') }}" class="btn btn-primary py-1 px-4">Add Course</a>
                                    </div>
                                    <tr>
                                        <th>
                                            {{-- <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label">Sl</label>
                                            </div> --}}
                                            Sl
                                        </th>
                                        <th>Course Name</th>
                                        <th>Course Code</th>
                                        <th>Course Duration</th>
                                        <th>Course Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($course as $courses)
                                        <tr>
                                            <td>

                                                    <label class="form-check-label">{{$loop->iteration}}</label>

                                            </td>

                                            <td>{{$courses->course_name}}</td>
                                            <td>{{ $courses->course_code}}</td>
                                            <td>{{$courses->course_duration}}</td>
                                            <td>{{$courses->course_amount}}</td>
                                            <td><button type="button" class="btn btn-outline-success disabled" style="width: 100%;font-size:15px">{{$courses->status}}</button></td>

                                            <td style="display: flex">


                                                <a href="{{url('course/edit',$courses->id)}}" class="btn btn-info btn-lg" style="font-size:15px;margin-right:4%;height:100%"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <form action="{{url('course/delete',$courses->id)}}"  method="post"  style="margin-left:4%">
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





        </div>
        <!-- Social Media End Here -->
    @endsection
<script>

</script>

