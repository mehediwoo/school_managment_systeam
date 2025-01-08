@extends('layouts.master')
@section('title','Funds Managment')
@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Fund Management</h1>
        <ol class="breadcrumb">
            <div class="iteam-title avl_blance">
                @if ($avlable_amounts==true)
                    <h3 class="breadcrumb-item active" aria-current="page">Available Blance: ৳ {{ number_format($avlable_amounts->total_earn) }}</h3>
                @else
                    <h3 class="breadcrumb-item active" aria-current="page">Available Blance: 0</h3>
                @endif
            </div>
        </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">All Funds</div>
                <div class="">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#standard-modal" class="btn btn-primary py-1 px-4">Add Fund</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive mt-2">
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom ">
                        <thead>
                            <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Session Name</th>
                                <th scope="col">Pay For</th>
                                <th scope="col">Ammount</th>
                                <th scope="col">Pay Status</th>
                                <th scope="col">Pay Online</th>
                                <th scope="col">Print Paid Voucher</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="fund_table_body">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- ROW-1 CLOSED -->
@include('Backend.admin.Registration.addFundModal')
@include('Frontend.Payment.paymentModule')
@endsection

@section('scripts')
<script>

    // Fund table body
    $(document).ready(function(){

        // load table
        function loadData(){
            $.ajax({
                url: "{{ route('get.st.reg') }}",
                success: function(data){
                    $('#file-datatable').DataTable().destroy();
                    $('#fund_table_body').html(data);
                    $('#file-datatable').DataTable({
                        dom: 'lBfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print','colvis'
                        ]
                    });
                }
            });
        }
        loadData();

        // on change course
        $(document).on('change','#course',function(){
            let course_id = $(this).val();
            $.ajax({
                url: "{{ route('get_session_with_course') }}",
                data: {course_id:course_id},
                success: function(data){
                    $('#session').empty();
                    //$('#session').append('<option value="">Choose One</option>');
                    $.each(data,function(key,value){
                        $('#session').append('<option value='+value.id+'>'+value.session_name+'</option>');
                    });

                }
            });
        });

        // pass value in payment modal
        $(document).on('click', '.Payment', function() {
            var id = $(this).data('id');
            var amount = $(this).data('amount');

            $('#pay_id').val(id);
            $('#pay_amount').val(amount);
            $('#pay_amount1').val('Pay ' + amount + ' BDT');
        });

    });


    function otherQualification() {
        var qualification=document.getElementById('edu_qualification').value;
        if( qualification=='others'){
            document.getElementById('other').style.display='block';

        }

        else{
            document.getElementById('other').style.display='none';
        }
    }
</script>

@endsection

