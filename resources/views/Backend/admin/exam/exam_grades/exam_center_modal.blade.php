<!-- Modal -->
  <div class="modal fade" id="examTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Exam Grading Systeam</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('exam.grade.store') }}" method="post">
                @csrf
                {{-- <div class="form-group">
                    <label for="">Branch Name</label>
                    <select name="branch_name" class="form-control @error('branch_name') is-invalid @enderror" value="{{ old('branch_name') }}">
                        <option value="">Select branch</option>
                        @if (!empty($branch))
                        @foreach($branch as $iteam)
                        <option value="{{ $iteam->id }}">{{ $iteam->name }}</option>
                        @endforeach
                        @endif
                    </select>

                    @error('branch_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div> --}}

                <div class="form-group">
                    <label for="">Exam Grade Name</label>
                    <input type="text" name="exam_grade_name" class="form-control @error('exam_grade_name') is-invalid @enderror" value="{{ old('exam_grade_name') }}" placeholder="Enter your exam grade name (A+)">
                    @error('exam_grade_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Exam Grade Point</label>
                    <input type="text" name="exam_grade_point" class="form-control @error('exam_grade_point') is-invalid @enderror" value="{{ old('exam_grade_point') }}" placeholder="Enter your exam grade point (4.50 etc)">
                    @error('exam_grade_point')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Min Percentance</label>
                    <input type="text" name="min_percentance" class="form-control @error('min_percentance') is-invalid @enderror" value="{{ old('min_percentance') }}" placeholder="Enter your exam min percentance">
                    @error('min_percentance')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Max Percentance</label>
                    <input type="text" name="max_percentance" class="form-control @error('max_percentance') is-invalid @enderror" value="{{ old('max_percentance') }}" placeholder="Enter your exam max percentance">
                    @error('max_percentance')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Remarks</label>
                    <input type="text" name="remarks" class="form-control @error('remarks') is-invalid @enderror" value="{{ old('remarks') }}" placeholder="Enter your exam remarks (excelent,very good,good,poor etc)">
                    @error('remarks')
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
