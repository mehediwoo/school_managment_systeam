<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>School Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .hero {
            background-image: url('path-to-your-image.jpg');
            background-size: cover;
            background-position: center;
            height: 400px;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade */
        }
        #backToTop {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
        }
    </style>
</head>
<body>

{{-- <!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">School Logo</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Branches</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Admissions</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
            <li class="nav-item"><a class="btn btn-primary" href="#">Login</a></li>
            <li class="nav-item"><a class="btn btn-secondary" href="#">Register</a></li>
        </ul>
    </div>
</nav> --}}

<!-- Hero Section -->
<header class="hero text-white text-center" style="background-color:rgb(0, 102, 255)">
    <div class="container">
        <h1 class="display-4">Welcome to Our School Management System</h1>
        <p class="lead">Empowering Education Across Multiple Branches</p>
        <a class="btn btn-light btn-lg" href="#">Explore Now</a>
    </div>
</header>

<!-- Features Section -->
<section class="features py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <i class="fas fa-school fa-3x"></i>
                <h3>Manage Multiple Branches</h3>
                <p>Streamline operations across all branches.</p>
            </div>
            <div class="col-md-3">
                <i class="fas fa-user-graduate fa-3x"></i>
                <h3>Student Enrollment</h3>
                <p>Easy enrollment process for students.</p>
            </div>
            <div class="col-md-3">
                <i class="fas fa-chart-line fa-3x"></i>
                <h3>Performance Tracking</h3>
                <p>Monitor student progress and achievements.</p>
            </div>
            <div class="col-md-3">
                <i class="fas fa-comments fa-3x"></i>
                <h3>Communication Portal</h3>
                <p>Stay connected with parents and students.</p>
            </div>
        </div>
    </div>
</section>

<!-- Branches Overview -->
<section class="branches py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Our Branches</h2>
        <div class="row">

            @foreach ($branch as $branch)

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body" style="height:20vh">
                            <h5 class="card-title">{{ $branch->institute_name }}</h5>
                            {{-- <p class="card-text">Address: {{ $branch->address }}</p>
                            <p class="card-text">Contact: {{ $branch->contact }}</p> --}}
                            <a href="{{url('Login/log')}}" class="btn btn-primary">Login</a>
                        </div>
                    </div>
                </div>
                
            @endforeach
         
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-4">
    <p>Quick Links | Privacy Policy | Terms of Service | Contact Us</p>
    <div>
        <a href="#" class="text-white mx-2">Facebook</a>
        <a href="#" class="text-white mx-2">Twitter</a>
        <a href="#" class="text-white mx-2">Instagram</a>
    </div>
</footer>

<a href="#" class="btn btn-secondary" id="backToTop">Top</a>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#backToTop').fadeIn();
        } else {
            $('#backToTop').fadeOut();
        }
    });
</script>
</body>
</html>
