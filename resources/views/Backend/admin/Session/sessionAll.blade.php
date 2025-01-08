@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">






        <div class="row row-sm mt-2">
            <div class="col-lg-12">
                <div class="card" style="padding-right:2%;">
                    <div class="card-header">
                        <h3 class="card-title">All Session</h3>

                    </div>


                 <div class="table-responsive mt-2" style="padding:2%;">
                 <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">



                <thead>
                    <div class="d-flex mb-2 ">

                    <a href="{{url('Session/add')}}" class="btn btn-primary py-1 px-4">Add Session</a>
                </div>

                    <tr>
                        <th>
                            <div class="form-check">

                                <label class="form-check-label">SI NO</label>
                            </div>
                        </th>
                        <th>Session Name</th>
                        <th>Course Name</th>
                        <th>Status</th>
                        <th>Action</th>

                        <th></th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($sessions as $session)
                    <tr>
                        <td>
                            <div class="form-check">
                              
                                <label class="form-check-label">{{$loop->iteration}}</label>
                            </div>
                        </td>

                        <td>{{$session->session_name}}</td>
                        <td>
                            @if($session->course_names->isNotEmpty())
                                {{ implode(', ', $session->course_names->toArray()) }}
                            @else
                                No course selected
                            @endif
                        </td>

                        <td><button type="button" class="btn btn-outline-success disabled" style="width: 100%;font-size:15px">{{$session->status}}</button></td>

                        <td style="display: flex">


                            <a href="{{url('Session/edit',$session->id)}}" class="btn btn-info btn-lg" style="font-size:15px;margin-right:4%;height:100%"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            <form action="{{url('Session/delete',$session->id)}}"  method="post"  style="margin-left:4%">
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

