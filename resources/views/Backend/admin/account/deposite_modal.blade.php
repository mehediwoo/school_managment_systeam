<!-- Modal -->
<div class="modal fade" id="add_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create New Deposite</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('account.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="">Institute Name</label>
                    <select name="institute" class="form-control">
                        <option value="">Please select one.</option>
                        @if ($institute->count() > 0)
                            @foreach ($institute as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('institute')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Course Name</label>
                    <select name="course" class="form-control" id="course">
                        <option value="">Please select one.</option>
                        @if ($institute->count() > 0)
                            @foreach ($institute as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('institute')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Session Name</label>
                    <select name="session" class="form-control">

                    </select>
                    @error('session')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

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
                    <textarea name="description" cols="10" rows="10" class="form-control" placeholder="Type description about this Account">{{ old('description') }}</textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 20px">Close</button>
                    <button type="submit" class="btn btn-primary" style="font-size: 20px">Save</button>
                </div>
            </form>

        </div>
      </div>
    </div>
</div>
