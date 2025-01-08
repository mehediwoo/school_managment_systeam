<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System - Registration Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container" style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <div class="card border-0 shadow">
            <div class="card-body">
                <?php
                   $sitetitle=App\Models\BackendSettings::first();
                ?>
                <h3 class="card-title text-center" style="color: #007bff;">Welcome to {{ $sitetitle->site_title }}</h3>
                <p class="text-center">Your registration is almost complete!</p>
                <hr>
                <p>Dear {{$branch->institute_name}},</p>
                <p>We are pleased to inform you that your temporary registration details are as follows:</p>
                <div class="alert alert-info" role="alert">
                    <strong>Registration Number:</strong>{{$branch->registration_id ?? 'not selected'}} <br>
                    <strong>Email:</strong> {{$branch->e_mail??'not get'}}<br>
                    <strong>Password:</strong> {{$branch->password ?? 'not get'}}

                </div>
                <p>Please use this information to log in to your account and complete the registration process.</p>
                <p>If you have any issues or need assistance, feel free to contact our support team.</p>
                <p>Best regards,</p>

                <div class="text-center mt-4">
                    <a href="{{url('Login/log')}}" class="btn btn-primary">Go to Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
