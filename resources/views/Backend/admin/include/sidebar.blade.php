<!-- Sidebar Area Start Here -->
<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
    <div class="mobile-sidebar-header d-md-none">
        <div class="header-logo">
            @php $backend_setting=App\Models\logoSet::first(); @endphp
            @if(Auth::user()->admin_role=='superadmin')
            <a href="{{url('admin/dashboard')}}">
                <img src="{{asset($backend_setting->logo)}}" alt="logo"></a>
                @else
                <a href="{{url('institute/dashboard')}}">
                    <img src="{{asset($backend_setting->logo)}}" alt="logo"></a>
                    @endif
                </div>
            </div>
            <div class="sidebar-menu-content">
                <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                    <li class="nav-item">
                        @if(Auth::user()->admin_role=='superadmin')
                        <a href="{{url('admin/dashboard')}}" class="nav-link">
                            <i class="flaticon-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                        @else
                        <a href="{{url('institute/dashboard')}}" class="nav-link">
                            <i class="flaticon-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                        @endif
                        {{-- <a href="" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a> --}}

                    </li>


                    

                    @if(Auth::user()->admin_role=='instituteadmin')

                    <li class="nav-item  d-flex">
                        <a href="{{url('Student/addmission/registration/page')}}" class="nav-link">
                            <i class="flaticon-classmates icon"></i>
                            <span>Addmission & Registration</span>
                        </a>
                        <i
                            class="fas fa-angle-right mt-4"
                            onclick="getItem()"
                            id="right"
                            style="color:white"></i>
                        <i
                            class="fas fa-angle-down mt-4"
                            onclick="getItem()"
                            id="down"
                            style=" color:white;display:none;"></i>
                    </li>
                    <ul class="nav sub-group-menu sub" style="display:none;" id="group">

                        <li class="nav-item">
                            <a
                                href="{{url('Student/all')}}"
                                class="nav-link nav1"
                                style=" "><i class="
                                fas="fas"
                                fa-angle-right"="fa-angle-right""></i>All Students</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('Student/addmission/form')}}" class="nav-link nav1">
                            <i class="fas fa-angle-right"></i>Admission Form</a>
                    </li>

                    <li class="nav-item">
                        <a href="student-details.html" class="nav-link nav1">
                            <i class="fas fa-angle-right"></i>Student Details</a>
                    </li>

                    <li class="nav-item">
                        <a href="student-promotion.html" class="nav-link nav1">
                            <i class="fas fa-angle-right"></i>Student Promotion</a>
                    </li>
                </ul>

                <li class="nav-item">
                    <a href="{{url('Registration/add/fund')}}" class="nav-link">
                        <i class="flaticon-settings"></i>
                        <span>Fund Management</span>
                    </a>
                </li>

                @endif @if (Auth::user()->admin_role=='superadmin')



                <li class="nav-item sidebar-nav-item">
                    <a href="{{url('branch/all')}}" class="nav-link">
                        <i class="flaticon-classmates"></i>
                        <span>Institute </span>
                    </a>
                </li>



                <li class="nav-item sidebar-nav-item">
                    <a href="{{url('Student/all')}}" class="nav-link">
                        <i class="flaticon-classmates"></i>
                        <span>Students </span>
                    </a>
                </li>


                <li class="nav-item sidebar-nav-item">
                    <a href="{{url('School/subscription/list/all')}}" class="nav-link">
                        <i class="flaticon-classmates"></i>
                        <span>Institute Subscription </span>
                    </a>
                </li>


                <li class="nav-item sidebar-nav-item">
                    <a href="{{url('School/subscription/Package/all')}}" class="nav-link">
                        <i class="flaticon-classmates"></i>
                        <span>Plan Package</span>
                    </a>
                </li>



                <li class="nav-item sidebar-nav-item">
                    <a href="{{url('Registrations/session/time')}}" class="nav-link">
                        <i class="flaticon-classmates"></i>
                        <span>Registration Management</span>
                    </a>
                </li>


                <li class="nav-item sidebar-nav-item">
                    <a href="" class="nav-link">
                        <i class="flaticon-multiple-users-silhouette"></i>
                        <span>Teachers</span>
                    </a>
                </li>






                <li class="nav-item sidebar-nav-item">
                    <a href="#" class="nav-link">
                        <i class="flaticon-technological"></i>
                        <span>Account Management</span>
                    </a>
                </li>



                <li class="nav-item sidebar-nav-item">
                    <a href="{{ url('Academic/curriculum/index') }}" class="nav-link">
                        <i class="flaticon-technological"></i>
                        <span>Academic Curriculam</span>
                    </a>
                </li>



                <li class="nav-item sidebar-nav-item">
                    <a href="{{url('ExamSetup/index')}}" class="nav-link">
                        <i class="flaticon-classmates"></i>
                        <span>Exam Master</span>
                    </a>
                </li>

                <li class="nav-item sidebar-nav-item">
                    <a href="{{url('notice/all')}}"  class="nav-link">
                        <i class="flaticon-shopping-list"></i>
                        <span>Notice</span>
                    </a>
                </li>





                {{-- <li class="nav-item">
                    <a href="class-routine.html" class="nav-link">
                        <i class="flaticon-calendar"></i>
                        <span>Class Routine</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="student-attendence.html" class="nav-link">
                        <i class="flaticon-checklist"></i>
                        <span>Attendence</span>
                    </a>
                </li> --}}




                <li class="nav-item">
                    <a href="messaging.html" class="nav-link">
                        <i class="flaticon-chat"></i>
                        <span>Messeage</span>
                    </a>
                </li>

                <li class="nav-item sidebar-nav-item">
                    <a href="{{url('SystemSettings/index')}}" class="nav-link">
                        <i class="flaticon-classmates"></i>
                        <span>System Settings</span>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="flaticon-settings"></i>
                        <span>My Account</span>
                    </a>
                </li>

                {{-- <li class="nav-item">

                    <a href="{{url('lgout')}}" method="post" class="nav-link"><i
                        class="flaticon-settings"></i><span>Logout</span></a>
                </li> --}}
            </ul>
        </div>
    </div>
    <!-- Sidebar Area End Here -->

    <script>

        function getItem() {
            var group = document.getElementById('group');
            if (group.style.display === "none") {
                group.style.display = "block";
                down.style.display = "block";
                right.style.display = "none";
            } else {
                group.style.display = "none";
                down.style.display = "none";
                right.style.display = "block";
            }
        }
    </script>
