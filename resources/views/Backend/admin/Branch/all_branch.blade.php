@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->







        <div class="col-md-12 mt-2">

            <div class="card form-input-elements">
                <div class="card-header">
                    <h3 class="mb-0 card-title">Institute Subscription</h3>
                </div>
                <div class="card-body">
                    <form class="new-added-form" action="{{url('branch/subscription/insert')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label">Select Institute</label>

                                <select name="branch_id" id="select-countries" class="form-control custom-select select2">
                                    <option value="br" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}" selected>Please Select Institute</option>
                                    @foreach ($branchSubs as $branchSubs)
                                    <option  value="{{$branchSubs->id}}" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/cz.svg')}}&quot;}">{{$branchSubs->institute_name}}</option>
                                    @endforeach
                                    @if($errors->has('branch_id'))
                                    <div class="error" style="color:red">{{ $errors->first('branch_id') }}</div>
                                 @endif
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label">Select Plan</label>
                                <select name="plan_id" id="select-countries" class="form-control custom-select select2">
                                    <option value="br" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}" selected>Please Select Plan</option>
                                    @foreach ($plansubs as $planSubs)
                                    <option  value="{{$planSubs->id}}" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/cz.svg')}}&quot;}">{{$planSubs->name}}</option>
                                    @endforeach
                                    @if($errors->has('branch_id'))
                                    <div class="error" style="color:red">{{ $errors->first('branch_id') }}</div>
                                 @endif
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6 mt-5 form-group">
                            <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn btn-primary py-1 px-4">Save</button>
                       </div>
                    </div>
                </form>
                </div>
            </div>
        </div><!-- COL END -->















        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card" style="padding-right:2%;">
                    <div class="card-header">
                        <h3 class="card-title">All Institute</h3>

                    </div>

                   <form action="{{url('query/pdf')}}" method="GET" enctype="multipart/form-data">
                 <div class="table-responsive mt-2" style="padding:2%;">
                 <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">



                <thead>
                    <div class="d-flex mb-2 ">
                    <button type="submit" class="btn btn-primary py-1 px-4" style="margin-right:1%" ><i class="fa fa-file-pdf" aria-hidden="true" ></i>Courier Slip</button>
                    <a href="{{ url('add_branch') }}" class="btn btn-primary py-1 px-4">Add Institute</a>
                </div>
                    <tr>
                        <th style="width:24px">
                            <div class="form-check">
                                <input type="checkbox" id="checkAll" class="form-check-input">
                                <label class="form-check-label">All</label>
                            </div>
                        </th>
                        <th scope="col">Sl No</th>
                        <th scope="col">Branch Name</th>
                        <th scope="col">Propietor Name</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($branchSearch !== null)
                        @foreach ($branchSearch as $branches)
                            @php
                                $branchdtls = App\Models\BranchDetails::where('branch_id', $branches->id)->first();
                            @endphp
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" name="branch[{{$branches->id}}]" value="{{$branches->id}}" class="form-check-input branch-checkbox">
                                    </div>
                                </td>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$branches->institute_name}}</td>
                                <td>{{$branches->Propietor_Name}}</td>
                                <td>{{$branches->mobile_number}}</td>
                                <td>{{$branches->e_mail}}</td>
                                <td>{{$branches->address}} <br> {{$branches->district->district_name}}, {{$branches->division->name}}</td>
                                <td><button type="button" class="btn btn-outline-success disabled" style="width: 100%;font-size:15px">{{$branches->status}}</button></td>
                                <td style="display: flex">
                                    <a type="button" href="" class="btn btn-secondary btn-lg update_institute" style="font-size:15px; margin-right:2%;height:100%"  data-bs-toggle="modal" data-id="{{$branches->id}}" data-email="{{$branches->e_mail}}" data-password="{{$branches->password}}" data-institute_name="{{$branches->institute_name}}"  data-bs-target="#standard-modal">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{url('Send/mail', $branches->id)}}" class="btn btn-info btn-lg" style="font-size:15px; margin-right:2%;height:100%">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{url('Branch/info', $branches->id)}}" class="btn btn-primary btn-lg" style="font-size:15px; margin-right:2%;height:100%">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{url('Branch/edit', $branches->id)}}" class="btn btn-warning btn-lg" style="font-size:15px;margin-right:2%;height:100%">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <form id="deleteBranchForm-{{$branches->id}}" style="margin-left:2%">
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-lg delete-branch-btn" data-id="{{$branches->id}}" onclick="confirmDelete({{$branches->id}})" style="font-size:15px">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </form>
    </div>
            </div>




        </div>


    @include('Backend.admin.Branch.updateModal')
    @endsection

    @section('scripts')



    <script>
        // Function to confirm deletion and send AJAX request
   function confirmDelete(branchId) {
    if (confirm('Are you sure to delete this item?')) {
        // Prepare the AJAX request
        $.ajax({
            url: '/Branch/delete/' + branchId,  // Construct the URL with the branch ID
            type: 'POST',  // Set the method to POST
            data: {
                _token: $('input[name=_token]').val(),  // Include the CSRF token
            },
            success: function(response) {
                alert('Branch deleted successfully.');
                location.reload();  // Reload the page to see the changes
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert('Branch deleted successfully.');
                location.reload();
            }
        });
    }
  }
</script>





    <script>

        $(document).on('click','.update_institute',function(){
         var id=$(this).data('id');
         var email=$(this).data('email');
         var password=$(this).data('password');

         var institute_name=$(this).data('institute_name')

         $('#up_id').val(id);
         $('#up_pName').val(institute_name);
         $('#up_email').val(email);
         $('#up_password').val(password);
        });
    </script>





@endsection
