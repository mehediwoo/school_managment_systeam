
<form action="{{ route('registerCard.generate') }}" method="post">
    @csrf
<div class="card-body">
    <table id="studentTable1" class="table table-striped table-bordered">

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4"><h4>Student List</h4></div>
                <div class="col-md-8 text-end">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-2">
                            <input type="date" name="manual_date" class="form-control" >
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary"> Registration Card Generate</button></div>
                    </div>

                </div>
            </div>

        </div>
        <hr>
        <thead>
            <tr>

                <th>SL</th>
                <th>
                    <input type="checkbox" id="select-all">
                </th>
                <th>ID/REG NO</th>
                <th>Name</th>
                <th>Course</th>
                <th>Session</th>
            </tr>
        </thead>
        <tbody>
            @foreach($student as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <input type="checkbox" name="generate_card[{{ $student->id }}]" value="" class="student-checkbox"">
                    </td>

                    <td>{{ $student->st_course_reg }}</td>
                    <td>{{ $student->st_name }}</td>
                    <td>{{ $student->course->course_name }}</td>
                    <td>{{ $student->session->session_name }}, {{ $current_Year->education_year }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</form>

<script>
    $(document).ready(function () {
        // Initialize DataTable
        var table = $('#studentTable1').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": true,
            "responsive": true
        });

        // Select/Deselect all checkboxes
        $('#select-all').on('click', function () {
            var isChecked = $(this).prop('checked');
            $('.student-checkbox').prop('checked', isChecked);
            toggleActionButton();
        });

        // Toggle action button based on checkbox selection
        $('.student-checkbox').on('change', function () {
            toggleActionButton();
        });

        // Function to enable/disable the action button
        function toggleActionButton() {
            if ($('.student-checkbox:checked').length > 0) {
                $('#perform-action').prop('disabled', false);
            } else {
                $('#perform-action').prop('disabled', true);
            }
        }


    });


</script>

<script>

    const currentDate = new Date().toISOString().split('T')[0];


    document.getElementById('date-input').value = currentDate;


    const formattedDate = new Date().toLocaleDateString('en-US');
    console.log(formattedDate);
</script>
