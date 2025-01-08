@extends('layouts.master')

@section('content')

    <div class="dashboard-content-one mt-4">
        <!-- Breadcubs Area Start Here -->
        <div class="col-md-12 ">

            <div class="card form-input-elements">
                <div class="card-header">
                    <h3 class="mb-0 card-title">Add New Institute</h3>
                </div>
                <div class="card-body">

                    <form class="mb-5" action="{{url('branch/insert')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="mb-3 col-md-6 mt-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">বিভাগের নাম (Division
                                    Name):*</label>
                                <select name="division_id" class="form-control" id="division"
                                    style="font-size:16px;">
                                    <option class="p-4"value="">Select Division</option>
                                    @foreach ($get_division as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('division_id'))
                                <div class="error" style="color:red">{{ $errors->first('division_id') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">জেলার নাম (District
                                    Name):*</label>
                                <select name="district_id" class="form-control"
                                    id="district"style="font-size:16px">
                                    <option value="">select District </option>
                                </select>

                                @if($errors->has('district_id'))
                                <div class="error" style="color:red">{{ $errors->first('district_id') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">উপজেলা (Upazila):*
                                </label>
                                <input type="text" name="sub_district" class="form-control"
                                    placeholder="Enter your sub District"style="font-size:16px">

                                @if($errors->has('sub_district'))
                                <div class="error" style="color:red">{{ $errors->first('sub_district') }}</div>
                             @endif
                            </div>



                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">থানা (Thana):*
                                </label>
                                <input type="text" name="thana" class="form-control"
                                    placeholder="Enter your  thana"style="font-size:16px">

                                @if($errors->has('thana'))
                                <div class="error" style="color:red">{{ $errors->first('thana') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">পোষ্ট অফিস (Post Office):*
                                </label>
                                <input type="text" name="post_office" class="form-control"
                                    placeholder="Enter your post office"style="font-size:16px">

                                @if($errors->has('post_office'))
                                <div class="error" style="color:red">{{ $errors->first('post_office') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">পোস্ট কোড (Post Code):*
                                </label>
                                <input type="text" name="post_code" class="form-control"
                                    placeholder="Enter your post code"style="font-size:16px">

                                @if($errors->has('post_code'))
                                <div class="error" style="color:red">{{ $errors->first('post_code') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-12 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">প্রতিষ্ঠানের নাম (Institute
                                    Name):*
                                </label>
                                <input type="text" name="institute_name" class="form-control"
                                    placeholder="Enter your institute name"style="font-size:16px">

                                @if($errors->has('institute_name'))
                                <div class="error" style="color:red">{{ $errors->first('institute_name') }}</div>
                             @endif
                            </div>




                            <div class="mb-3 col-md-12 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">পরিচালকের নাম (Propietor
                                    Name):*
                                </label>
                                <input type="text" name="Propietor_Name" class="form-control"
                                    placeholder="Enter your propietor name"style="font-size:16px">

                                @if($errors->has('Propietor_Name'))
                                <div class="error" style="color:red">{{ $errors->first('Propietor_Name') }}</div>
                             @endif
                            </div>

        {{--
                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">
                                    নিবন্ধন নম্বর (Registration
                                    Number):*
                                </label>
                                <input type="text" name="registration_id" class="form-control"
                                    placeholder="6521" readonly style="font-size:16px">

                                @if($errors->has('registration_id'))
                                <div class="error" style="color:red">{{ $errors->first('registration_id') }}</div>
                             @endif
                            </div>  --}}

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">পিতার নাম (Father's Name):*
                                </label>
                                <input type="text" name="fathers_name" class="form-control"
                                    placeholder="Enter your father name"style="font-size:16px">

                                @if($errors->has('fathers_name'))
                                <div class="error" style="color:red">{{ $errors->first('fathers_name') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">মাতার নাম (Mother's Name):*
                                </label>
                                <input type="text" name="mothers_name" class="form-control"
                                    placeholder="Enter your mother name"style="font-size:16px">

                                @if($errors->has('mothers_name'))
                                <div class="error" style="color:red">{{ $errors->first('mothers_name') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">প্রতিষ্ঠানের বয়স(Institute
                                    Age):
                                </label>
                                <input type="text" name="institute_age" class="form-control"
                                    placeholder="Enter your institute age"style="font-size:16px">

                                @if($errors->has('institute_age'))
                                <div class="error" style="color:red">{{ $errors->first('institute_age') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">কম্পিউটারের সংখ্যা (No Of
                                    Computers):*
                                </label>
                                <input type="text" name="no_computer" class="form-control"
                                    placeholder="Enter the number of computer"style="font-size:16px">

                                @if($errors->has('no_computer'))
                                <div class="error" style="color:red">{{ $errors->first('no_computer') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">ই-মেইল (E-mail):*
                                </label>
                                <input type="email" name="e_mail" class="form-control"
                                    placeholder="Enter your email"style="font-size:16px">

                                @if($errors->has('e_mail'))
                                <div class="error" style="color:red">{{ $errors->first('e_mail') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">মোবাইল নম্বর (Mobile
                                    Number):*
                                </label>
                                <input type="text" name="mobile_number" class="form-control"
                                    placeholder="Enter your mobile number"style="font-size:16px">

                                @if($errors->has('mobile_number'))
                                <div class="error" style="color:red">{{ $errors->first('mobile_number') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">অতিরিক্ত যোগাযোগের নাম
                                    (Additional Contact Name):*
                                </label>
                                <input type="text" name="additional_rel_name" class="form-control"
                                    placeholder="Enter your relative name"style="font-size:16px">

                                @if($errors->has('additional_rel_name'))
                                <div class="error" style="color:red">{{ $errors->first('additional_rel_name') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">রক্তের গ্রুপ (Blood Group)
                                </label>
                                <select name="blood_group" id=""
                                    class="form-control"style="font-size:16px">
                                    <option value="">Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>

                                @if($errors->has('blood_group'))
                                <div class="error" style="color:red">{{ $errors->first('blood_group') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">অতিরিক্ত যোগাযোগের সম্পর্ক
                                    (Additional Contact Relation):*
                                </label>
                                <input type="text" name="extra_rel_contact" class="form-control"
                                    placeholder="Enter your contact relation"style="font-size:16px">

                                @if($errors->has('extra_rel_contact'))
                                <div class="error" style="color:red">{{ $errors->first('extra_rel_contact') }}</div>
                             @endif
                            </div>


                            <div class="mb-3 col-md-6 mt-4 form-group ">
                                <label for="exampleInputEmail1" class="form-label"> অতিরিক্ত মোবাইল নম্বর
                                    (Additional Mobile Number):*
                                </label>
                                <input type="text" name="additional_mobile_no" class="form-control"
                                    placeholder="Enter your additional mobile number"style="font-size:16px">

                                @if($errors->has('additional_mobile_no'))
                                <div class="error" style="color:red">{{ $errors->first('additional_mobile_no') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label"> মালিক/সি,ই,ও প্রোফাইল
                                    (Propietor/CEO Profile):*
                                </label>
                                <input type="file" name="ceo_profile" class="form-control"
                                    placeholder="Enter CEO profile"
                                    accept="image/*"style="font-size:16px;">

                                @if($errors->has('ceo_profile'))
                                <div class="error" style="color:red">{{ $errors->first('ceo_profile') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label"> জাতীয় পরিচয়পত্র
                                    (National id):
                                </label>
                                <input type="file" name="national_id" class="form-control"
                                    placeholder="Enter  id card"
                                    accept="image/*"style="font-size:16px">

                                @if($errors->has('national_id'))
                                <div class="error" style="color:red">{{ $errors->first('national_id') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label">Document: ( 'HSC' শিক্ষাগত
                                    ও দক্ষত সনদ Educational & Skill )
                                </label>
                                <input type="file" name="educational_skill" class="form-control"
                                    placeholder="Enter your Educational & Skill  paper"
                                    accept="image/*"style="font-size:16px">

                                @if($errors->has('educational_skill'))
                                <div class="error" style="color:red">{{ $errors->first('educational_skill') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label"> প্রতিষ্ঠানের ছবি:
                                    (Institute Photo):
                                </label>
                                <input type="file" name="institute_image" class="form-control"
                                    placeholder="Enter your sub District"
                                    accept="image/*"style="font-size:16px">

                                @if($errors->has('institute_image'))
                                <div class="error" style="color:red">{{ $errors->first('institute_image') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label"> ট্রেড লাইসেন্স (Trade
                                    License):
                                </label>
                                <input type="file" name="trade_licence" class="form-control"
                                    placeholder="Enter your sub District"
                                    accept="image/*"style="font-size:16px">

                                @if($errors->has('trade_licence'))
                                <div class="error" style="color:red">{{ $errors->first('trade_licence') }}</div>
                             @endif
                            </div>

                            <div class="mb-3 col-md-6 mt-4 form-group" id="extra_file">
                                <label for="exampleInputEmail1" class="form-label"> আরো ফাইল যুক্ত করুন (Click to Add More):
                                </label>
                                <input type="file" name="extra_file[]" multiple class="form-control"

                                    accept="image/*"style="font-size:16px;">
                                    <div>
                                        <button type="button"class="btn btn-info mt-4 btn-lg" id="addMore" style="font-size:18px;color:white">Add More File</button>
                                       </div>

                                @if($errors->has('extra_file'))
                                <div class="error" style="color:red">{{ $errors->first('extra_file') }}</div>
                             @endif
                            </div>



                            <div class="mb-3 col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label"style="font-size:15px" >
                                    পরিচালকের ফেসবুক লিংক (Proprietor/CEO Facebook URL):*
                                </label>
                                <input type="text" name="ceo_facebook" class="form-control"
                                    placeholder="Enter CEO Facebook URL" style="font-size:16px">

                                @if($errors->has('ceo_facebook'))
                                <div class="error" style="color:red">{{ $errors->first('ceo_facebook') }}</div>
                             @endif
                            </div>

                            <div class="mb-3  col-md-6 mt-4 form-group">
                                <label for="exampleInputEmail1" class="form-label"style="font-size:16px">
                                    ঠিকানা (Address):*
                                </label>
                                <br>
                                <textarea name="address" id="" class="form-control" placeholder="enter Proprietor address" style="border:1px solid black"></textarea>

                                @if($errors->has('address'))
                                <div class="error" style="color:red">{{ $errors->first('address') }}</div>
                             @endif
                            </div>




                            <div class="col-md-12"> <button type="submit"
                                    class="btn btn-primary btn-lg" style="font-size:16px;color:white">Submit</button></div>

                    </form>










                {{-- <form class="new-added-form" action="{{url('branch/subscription/insert')}}" method="Post" enctype="multipart/form-data">
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
                </form> --}}
                </div>
            </div>
        </div>
 </div>
        <!-- Social Media End Here -->
    @endsection

    @section('script')
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
                $('#extra_file').append(' <input type="file" name="extra_file[]" class="form-control"accept="image/*" multiple style="font-size:15px;padding:20px">')
                });
              });
        </script>
    @endsection
