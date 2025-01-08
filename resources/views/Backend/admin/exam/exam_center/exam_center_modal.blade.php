<!-- Modal -->
  <div class="modal fade" id="examTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Exam Center</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('exam.center.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Center Name</label>
                    <input type="text" name="center_name" class="form-control @error('center_name') is-invalid @enderror" value="{{ old('center_name') }}" placeholder="Enter your exam center name">
                    @error('center_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Center code</label>
                    <input type="text" name="center_code" class="form-control @error('center_code') is-invalid @enderror" value="{{ old('center_code') }}" placeholder="Enter your exam center code">
                    @error('center_code')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Examiner Name</label>
                    <input type="text" name="examiner_name" class="form-control @error('examiner_name') is-invalid @enderror" value="{{ old('examiner_name') }}" placeholder="Enter your exam center code">
                    @error('examiner_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="deactive">De Active</option>
                    </select>
                    @error('status')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>

      </div>
    </div>
  </div>
