@extends('layouts.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Notice Details</h3>
            {{-- <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Course</li>
            </ul> --}}
        </div>
        <div>
            <div class="container">

                <style>
                    .notice-header {
                        background-color: #f8f9fa;
                        padding: 20px;
                        border-radius: 5px;
                    }
                    .notice-content {
                        margin-top: 20px;
                        background-color: #ffffff;
                        padding: 15px;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                    }
                    .notice-footer {
                        margin-top: 20px;
                        font-size: 0.9rem;
                    }
                </style>
                <div class="container mt-5">
                    <div class="notice-header text-center">
                        <h2 class="notice-title">{{ $notice->title }}</h2>
                        <p class="notice-date">Published on:{!! $notice->date !!} </p>
                    </div>

                    <div class="notice-content">
                        <h5>Details:</h5>
                        <p>{!! $notice->description !!}</p>

                </div>


        </div>
        <!-- Social Media End Here -->
    @endsection


