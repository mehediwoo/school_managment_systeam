<div class="modal fade" id="standard-modal" tabindex="-1" role="dialog"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Generate Password</h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action="{{url('Generate/Password')}}" method="POST">
                @csrf
                <div class="mb-3 col-md-12  form-group">
                    <input type="text" name="id" class="form-control" id="up_id"
                        placeholder="" hidden style="font-size:20px">
                </div>

                  <div class="mb-3 col-md-12  form-group">
                    <input type="text" name="name" class="form-control" id="up_pName"
                        placeholder="" hidden style="font-size:20px">
                </div>

                <div class="mb-3 col-md-12  form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" id="up_email"
                        placeholder=""style="font-size:20px">
                </div>


                <div class="mb-3 col-md-12  form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control" id="up_password"
                        placeholder=""style="font-size:20px">
                </div>
                <div class="modal-footer">
                    <button type="button" class="footer-btn bg-dark-low"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="footer-btn bg-linkedin">Update</button>
                </div>
            </form>



        </div>

    </div>
</div>
</div>

