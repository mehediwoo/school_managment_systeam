<!-- Modal -->
  <div class="modal fade" id="examTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Exam Name</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('exam.name.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Exam Name</label>
                    <input type="text" name="exam_name" class="form-control @error('exam_name') is-invalid @enderror" value="{{ old('exam_name') }}" placeholder="Enter your exam name">
                    @error('exam_name')
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
