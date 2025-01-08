<div class="modal fade" id="standard-modal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Fund For Registration</h5>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action="{{url('Registration/Fund/Insert')}}" method="POST">
                @csrf
                <div class="mb-3 col-md-12  form-group">
                    <label for="">Course Name</label>
                    <select name="course" id="course" class="form-control">
                        <option value="">Please choose one</option>
                        @if (!empty($course))
                            @foreach($course as $row)
                            <option value="{{ $row->id }}">{{ $row->course_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('course_name'))
                    <div class="error" style="color:red">{{ $errors->first('course_name') }}</div>
                    @endif
                </div>

                <div class="mb-3 col-md-12  form-group">
                    <label for="">Study Session</label>
                    <select name="session" id="session" class="form-control">

                    </select>
                    @if($errors->has('course_name'))
                    <div class="error" style="color:red">{{ $errors->first('course_name') }}</div>
                    @endif
                </div>

                <div class=" col-md-12 form-group">
                    <label> Pay For*</label>
                    <select name="pay_for" class="form-control" id="search_course" >
                        <option value="">Please Select Paying For</option>
                        <option value="Registration Fee">Registration Fee</option>
                        <option value="Institute Fine">Institute Fine</option>
                    </select>
                    @if($errors->has('pay_for'))
                       <div class="error" style="color:red">{{ $errors->first('pay_for') }}</div>
                    @endif
                </div>


                <div class="mb-3 col-md-12 form-group">
                    <label for="">Student Amount</label>
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="" style="font-size:20px">
                    @if($errors->has('amount'))
                    <div class="error" style="color:red">{{ $errors->first('amount') }}</div>
                    @endif
                </div>

                {{-- <div class="mb-3 col-md-12 form-group">
                    <label for="">Total Students</label>
                    <input type="text" name="total_students" class="form-control" id="total_students" placeholder="Enter total number of students" style="font-size:20px">
                </div>

                <div class="mb-3 col-md-12 form-group">
                    <label for="">Total Amount</label>
                    <input type="text" class="form-control" id="total_amount" readonly style="font-size:20px">
                </div> --}}

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"> Fund Save</button>
                </div>
            </form>



        </div>

    </div>
</div>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function(){
        $('#amount, #total_students').on('input', function() {
            var perStudentAmount = parseFloat($('#amount').val());
            var totalStudents = parseInt($('#total_students').val());

            if(!isNaN(perStudentAmount) && !isNaN(totalStudents)) {
                var totalAmount = perStudentAmount * totalStudents;
                $('#total_amount').val(totalAmount);
            } else {
                $('#total_amount').val(''); // Clear total amount if inputs are invalid
            }
        });
    });
</script> --}}
