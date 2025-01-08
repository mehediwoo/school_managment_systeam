@php
    $course = App\Models\CourseModel::all();
    $type   = App\Models\exam_type::all();
    $exam   = App\Models\ExamSetup::latest()->get();
@endphp
<!-- Modal -->
  <div class="modal fade" id="examTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Exam Course</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('exam.course.store') }}" method="post">
              @csrf

              <div class="form-group">
                <label for="">Exam's</label>
                <select name="exam" class="form-control">
                  <option value="">Please choose an exam</option>
                    @foreach ($exam as $iteam)
                      <option value="{{ $iteam->id }}">{{ $iteam->exam_names->exam_name }}</option>
                    @endforeach
                </select>
                @error('exam')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Exam Course</label>
                <select name="course" class="form-control">
                    @foreach ($course as $iteam)
                      <option value="{{ $iteam->id }}">{{ $iteam->course_name }}</option>
                    @endforeach
                </select>
                @error('course')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Exam Total Mark's</label>
                <input type="text" name="total_mark" class="form-control" placeholder="Enter Exam Total Mark">
                @error('total_mark')
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
