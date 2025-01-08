<!-- Modal -->
<div class="modal fade" id="add_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('account.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Account Name</label>
                    <input type="text" name="account_name" class="form-control @error('account_name') is-invalid @enderror" placeholder="Type your account name..." value="{{ old('account_name') }}">
                    @error('account_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="">Account Number</label>
                    <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror" placeholder="Type your account number..." value="{{ old('account_number') }}">
                    @error('account_number')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" cols="5" rows="5" class="form-control" placeholder="Type description about this Account">{{ old('description') }}</textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary-gradient" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary-gradient">Save</button>
                </div>
            </form>

        </div>
      </div>
    </div>
</div>
