@extends('layouts.master')

@section('content')



<div class="dashboard-content-one mt-4">
    <!-- Breadcubs Area Start Here -->
    <div class="col-md-12 ">

        <div class="card form-input-elements">
            <div class="card-header">
                <h3 class="mb-0 card-title">Edit New Institute</h3>
            </div>
            <div class="card-body">



                <form class="mb-5" action="{{url('Branch/upate',$branches->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">
                                নিবন্ধন নম্বর (Registration
                                Number):*
                            </label>
                            <input type="text" value="{{$branches->registration_id}}" name="registration_id" class="form-control"
                                style="font-size:15px">
                        </div>

                        <div class="mb-3 col-md-6 mt-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">বিভাগের নাম (Division
                                Name):*</label>

                            <select name="division_id" class="form-control" id="division"
                                style="font-size:15px;">
                                <option class="p-4"value="">Select Division</option>
                                @foreach ($get_division as $division)
                                    <option  {{($branches->division_id==$division->id)?'selected':''}} value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3 col-md-6 mt-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">বিভাগের নাম (Division
                                Name):*</label>
                        <select name="district_id" class="form-control" id="district"
                        style="font-size:15px;">
                        <option class="p-4"value="">Select District</option>
                        @foreach ($get_district as $district)
                            <option  {{($branches->district_id==$district->id)?'selected':''}} value="{{ $district->id }}">{{ $district->district_name }}</option>
                        @endforeach
                    </select>
                </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">উপজেলা (Upazila):*
                            </label>
                            <input type="text" name="sub_district" class="form-control"
                               value="{{$branches->sub_district}}" style="font-size:15px">
                        </div>



                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">থানা (Thana):*
                            </label>
                            <input type="text"value="{{$branches->thana}}" name="thana" class="form-control"
                               style="font-size:15px">
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">পোষ্ট অফিস (Post Office):*
                            </label>
                            <input type="text" value="{{$branches->post_office}}"   name="post_office" class="form-control"
                                style="font-size:15px">
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">পোস্ট কোড (Post Code):*
                            </label>
                            <input type="text" value="{{$branches->post_code}}"  name="post_code" class="form-control"
                               style="font-size:15px">
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">Status
                            </label>
                            <select name="status" id=""
                                class="form-control"style="font-size:15px">
                                <option value="{{$branches->status}}">{{$branches->status}}</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                               <option value="Expired">Expired</option>
                            </select>
                        </div>


                        {{--  <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Select Plan</label>
                            <select name="plan_id" class="select2">

                                <option value="{{$subscription->plan_id}}">{{$subscription->plan->name}}</option>

                                @foreach ($plansubs as $planSubs)
                                <option value="{{$planSubs->id}}">{{$planSubs->name}}</option>
                                @endforeach

                            </select>
                        </div>  --}}



                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Select Plan</label>
                            <select name="plan_id" class="select2">
                                @if(isset($subscription->plan_id) && isset($subscription->plan))
                                    <option value="{{$subscription->plan_id}}">{{$subscription->plan->name}}</option>
                                @else
                                    <option value="">Select a Plan</option>
                                @endif

                                @foreach ($plansubs as $planSubs)
                                    <option value="{{$planSubs->id}}">{{$planSubs->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3 col-md-12 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">প্রতিষ্ঠানের নাম (Institute
                                Name):*
                            </label>
                            <input type="text" value="{{$branches->institute_name}}" name="institute_name" class="form-control"
                               style="font-size:15px">
                        </div>




                        <div class="mb-3 col-md-12 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">পরিচালকের নাম (Propietor
                                Name):*
                            </label>
                            <input type="text" value="{{$branches->Propietor_Name}}" name="Propietor_Name" class="form-control"
                                style="font-size:15px">
                        </div>




                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">পিতার নাম (Father's Name):*
                            </label>
                            <input type="text"  value="{{$branch_details->fathers_name}}" name="fathers_name" class="form-control"
                                style="font-size:15px">
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">মাতার নাম (Mother's Name):*
                            </label>
                            <input type="text" value="{{$branch_details->mothers_name}}" name="mothers_name" class="form-control"
                               style="font-size:15px">
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">প্রতিষ্ঠানের বয়স(Institute
                                Age):
                            </label>
                            <input type="text" value="{{$branch_details->institute_age}}" name="institute_age" class="form-control"
                            style="font-size:15px">
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">কম্পিউটারের সংখ্যা (No Of
                                Computers):*
                            </label>
                            <input type="text" name="no_computer"  value="{{$branch_details->no_computer}}" class="form-control"
                             style="font-size:15px">
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">ই-মেইল (E-mail):*
                            </label>
                            <input type="email" value="{{$branches->e_mail}}" name="e_mail" class="form-control"
                           style="font-size:15px">
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">মোবাইল নম্বর (Mobile
                                Number):*
                            </label>
                            <input type="text" value="{{$branches->mobile_number}}" name="mobile_number" class="form-control"
                                style="font-size:15px">
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">অতিরিক্ত যোগাযোগের নাম
                                (Additional Contact Name):*
                            </label>
                            <input type="text" value="{{$branch_details->additional_rel_name}}" name="additional_rel_name" class="form-control"
                                style="font-size:15px">
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">রক্তের গ্রুপ (Blood Group)
                            </label>
                            <select name="blood_group" id=""
                                class="form-control"style="font-size:15px">
                                <option value="{{$branch_details->blood_group}}">{{$branch_details->blood_group}}</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">অতিরিক্ত যোগাযোগের সম্পর্ক
                                (Additional Contact Relation):*
                            </label>
                            <input type="text" value="{{$branch_details->extra_rel_contact}}" name="extra_rel_contact" class="form-control"
                               style="font-size:15px">
                        </div>


                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label"> অতিরিক্ত মোবাইল নম্বর
                                (Additional Mobile Number):*
                            </label>
                            <input type="text"  value="{{$branch_details->additional_mobile_no}}" name="additional_mobile_no" class="form-control"
                                style="font-size:15px">
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label"> মালিক/সি,ই,ও প্রোফাইল
                                (Propietor/CEO Profile):*
                            </label>
                            <input type="file" name="ceo_profile" class="form-control"
                                accept="image/*"style="font-size:15px;">

                                <div>
                                    <img src="{{asset($branch_details->ceo_profile)}}" alt="" height="50px" width="50px">
                                </div>


                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label"> জাতীয় পরিচয়পত্র
                                (National id):
                            </label>
                            <input type="file" name="national_id" class="form-control"

                                accept="image/*"style="font-size:15px">
                                <div>
                                    <img src="{{asset($branch_details->national_id)}}" alt="" height="50px" width="50px">
                                </div>
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">Document: ( 'HSC' শিক্ষাগত
                                ও দক্ষত সনদ Educational & Skill )
                            </label>
                            <input type="file" name="educational_skill" class="form-control"

                                accept="image/*"style="font-size:15px">
                                <div>
                                    <img src="{{asset($branch_details->educational_skill)}}" alt="" height="50px" width="50px">
                                </div>
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label"> প্রতিষ্ঠানের ছবি:
                                (Institute Photo):
                            </label>
                            <input type="file" name="institute_image" class="form-control"

                                accept="image/*"style="font-size:15px">
                                <div>
                                    <img src="{{asset($branch_details->institute_image)}}" alt="" height="50px" width="50px">
                                </div>
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label"> ট্রেড লাইসেন্স (Trade
                                License):
                            </label>
                            <input type="file" name="trade_licence" class="form-control"

                                accept="image/*"style="font-size:15px">
                                <div>
                                    <img src="{{asset($branch_details->trade_licence)}}" alt="" height="50px" width="50px">
                                </div>
                        </div>

                        <div class="mb-3 col-md-6 mt-4 form-group" id="extra_file">
                            <label for="exampleInputEmail1" class="form-label"> আরো ফাইল যুক্ত করুন (Click to Add More):
                            </label>
                            <input type="file" name="extra_file[]" multiple class="form-control"

                                accept="image/*"style="font-size:15px;">
                                  <div>
                                    <button type="button"class="btn btn-info mt-4 btn-lg" id="addMore" style="font-size:18px;color:white">Add More File</button>
                                   </div>
                                   @foreach ($branch_file as $branch_file)

                                   <div style=" display:inline-flex;flex-direction: row; margin-right:2%">
                                    <img  src="{{asset($branch_file->extra_file)}}" alt="" height="100px" width="100px">
                                </div>
                                   @endforeach

                        </div>



                        <div class="mb-3 col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label"style="font-size:15px" >
                                পরিচালকের ফেসবুক লিংক (Proprietor/CEO Facebook URL):*
                            </label>
                            <input type="text" value={{$branch_details->ceo_facebook}} name="ceo_facebook" class="form-control"
                               style="font-size:15px">
                        </div>

                        <div class="mb-3 form-group col-md-6 mt-4 form-group">
                            <label for="exampleInputEmail1" class="form-label"style="font-size:15px">
                                ঠিকানা (Address):*
                            </label>
                            <br>
                            <textarea name="address" id="" class="form-control"  style="border:1px solid black">{{$branches->address}}</textarea>
                        </div>




                        <div class="col-md-12"> <button type="submit"
                                class="btn btn-primary btn-lg" style="font-size:18px;color:white">update</button></div>

                </form>








            </div>
        </div>
    </div>
</div>

































    @endsection

    @section('js')
        <script>
            $(document).ready(function() {
                $('#division').change(function() {
                    var division_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                   type:'GET',
                   url:'get_districts',
                   data:{division_id:division_id },
                   success:function(data){

                    $('#district').html(data);

                   }


            });
            });
        });
        </script>

        <script>
              $(document).ready(function() {
                $('#addMore').click(function(){
                $('#extra_file').append('<input type="file" name="extra_file[]" class="form-control"accept="image/*" multiple style="font-size:15px;padding:20px">')
                });
              });
        </script>
    @endsection
