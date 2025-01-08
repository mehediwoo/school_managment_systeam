<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admit Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="page">
    <!-- Form to submit the SVG data and branch_id -->
    <form action="{{ route('save_admit_card') }}" method="POST" id="admitCardForm">
        @csrf

        <!-- Hidden input to store the branch ID -->
    

        <!-- Hidden input to store the SVG data -->
        <input type="hidden" name="svg_data" id="svgData" value="">


        {!! $chunkedData !!}


        {{-- <button type="submit" class="btn btn-primary">Download and Save</button> --}}
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // JavaScript to set the SVG data into the hidden input field before form submission
    document.getElementById('admitCardForm').addEventListener('submit', function(event) {
        var svgData = document.querySelector('.page').innerHTML; // Get the entire SVG content inside the .page div

        // Set the SVG data in the hidden input field
        document.getElementById('svgData').value = svgData;
    });
</script>


</body>
</html>
