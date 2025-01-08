@php
    $admit = App\Models\card_pdf_time::where('card_type','admit')->first();
    $regis = App\Models\card_pdf_time::where('card_type','registration')->first();
    $certi = App\Models\card_pdf_time::where('card_type','certificate')->first();
@endphp
@if (Auth::user()->admin_role=='superadmin' )
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <div class="app-sidebar">
            <div class="side-header">
                <a class="header-brand1" href="">
                    <img src="{{ asset($logo->logo) }}" class="header-brand-img toggle-logo"
                        alt="logo">
                    <img src="{{asset('build/assets/images/brand/logo-2.png')}}" class="header-brand-img light-logo" alt="logo">
                    <img src="{{ asset($logo->logo) }}" class="header-brand-img light-logo1"
                        alt="logo">
                </a>
                <!-- LOGO -->
            </div>
            <div class="main-sidemenu">
                <div class="slide-left disabled" id="slide-left">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                    </svg>
                </div>
                <ul class="side-menu">
                    <li class="sub-category">
                        <h3>Main super admin</h3>
                    </li>

                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.dashboard') }}">
                        <i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Dashboards</span>
                    </a>

                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('all.branch') }}">
                        <i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Institute</span>
                    </a>

                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('all.student') }}">
                        <i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Student</span>
                    </a>


                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-map"></i><span
                            class="side-menu__label">Institute Subscription</span><i
                            class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="tab-menu-heading p-0 pb-2 border-0">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a href="#side5" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
                                                <li><a href="#side6" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side5">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1">
                                                    <a href="javascript:void(0);"></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('all.subscription') }}" class="slide-item">All Subscription List</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('all.plan.packege') }}" class="slide-item">All Plan</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>


                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-map"></i><span
                            class="side-menu__label">Registration Management</span><i
                            class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="tab-menu-heading p-0 pb-2 border-0">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a href="#side5" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
                                                <li><a href="#side6" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side5">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1">
                                                    <a href="javascript:void(0);"></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('session.time') }}" class="slide-item">Registration limit</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-map"></i><span
                            class="side-menu__label">Card Management System</span><i
                            class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="tab-menu-heading p-0 pb-2 border-0">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a href="#side5" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
                                                <li><a href="#side6" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side5">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1">
                                                    <a href="javascript:void(0);"></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admit.card.template') }}" class="slide-item">Admit Card</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('registration.card.template') }}" class="slide-item">Registration Card</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('certificate.index') }}" class="slide-item">Certificate</a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('controller.signature') }}" class="slide-item">Controller Signature</a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('card.time.index') }}" class="slide-item">Time Limit Admit Card Download</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-map"></i><span
                            class="side-menu__label">Teachers</span><i
                            class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="tab-menu-heading p-0 pb-2 border-0">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a href="#side5" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
                                                <li><a href="#side6" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side5">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1">
                                                    <a href="javascript:void(0);"></a>
                                                </li>
                                                <li>
                                                    <a href="{{url('registration limit')}}" class="slide-item">All Teachers</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('registration limit')}}" class="slide-item">Teacher Details</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('registration limit')}}" class="slide-item">Add Teachers</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('registration limit')}}" class="slide-item">Payment</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-map"></i><span
                            class="side-menu__label">Acconunt Management</span><i
                            class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="tab-menu-heading p-0 pb-2 border-0">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a href="#side5" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
                                                <li><a href="#side6" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side5">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1">
                                                    <a href="javascript:void(0);"></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('account.index') }}" class="slide-item">Account</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('account.new.deposite') }}" class="slide-item">New Deposite</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('all.transaction') }}" class="slide-item">All Transaction</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-map"></i><span
                            class="side-menu__label">Academic Curriculam</span><i
                            class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="tab-menu-heading p-0 pb-2 border-0">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a href="#side5" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
                                                <li><a href="#side6" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side5">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1">
                                                    <a href="javascript:void(0);"></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('all.course') }}" class="slide-item">All Course</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('add.course') }}" class="slide-item">Add New Course</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('all.session') }}" class="slide-item">All Session</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('add.session') }}" class="slide-item">All New Session</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>

                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Class Routine</span>
                    </a>


                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-map"></i><span
                            class="side-menu__label">Exam</span><i
                            class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="tab-menu-heading p-0 pb-2 border-0">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a href="#side5" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
                                                <li><a href="#side6" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side5">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1">
                                                    <a href="javascript:void(0);"></a>
                                                </li>
                                                {{-- <li>
                                                    <a href="{{ route('exam.type.index') }}" class="slide-item">Exam Type</a>
                                                </li> --}}
                                                <li>
                                                    <a href="{{ route('exam.center.index') }}" class="slide-item">Exam Center</a>
                                                </li>
                                                
                                                <li>
                                                    <a href="{{ route('exam.name.index') }}" class="slide-item">Exam Name</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('exam.setup.index') }}" class="slide-item">Exam Setup</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('attendance.index') }}" class="slide-item">Attendence</a>
                                                </li>

                                                <li>
                                                    <p>Exams Marks</p>
                                                </li>

                                                <li>
                                                    <a href="{{ route('exam.course.index') }}" class="slide-item">Exam Course</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('exam.grade.index') }}" class="slide-item">Exam Grades Range</a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('student.assign.index') }}" class="slide-item">Student Assign</a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('exam.mark.distribution.index') }}" class="slide-item">Mark Distribution</a>
                                                </li>

                                                <li>
                                                    <p>Exams Publishing</p>
                                                </li>
                                                <li>
                                                    <a href="{{ route('exam.publish.index') }}" class="slide-item">Exam Publish Date</a>
                                                </li>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-map"></i><span
                            class="side-menu__label">Report</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="tab-menu-heading p-0 pb-2 border-0">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a href="#side5" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
                                                <li><a href="#side6" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side5">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1">
                                                    <a href="javascript:void(0);"></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admission.report') }}" class="slide-item">Admision Reports</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('register.report') }}" class="slide-item">Register Reports</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('course.session.index') }}" class="slide-item">Course & Session Reports</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-map"></i><span
                            class="side-menu__label">Notice</span><i
                            class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="tab-menu-heading p-0 pb-2 border-0">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a href="#side5" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
                                                <li><a href="#side6" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side5">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1">
                                                    <a href="javascript:void(0);"></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('notice.index') }}" class="slide-item">Add Notice</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('all.notice') }}" class="slide-item">All Notice</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>

                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ url('message') }}">
                        <i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Message</span>
                    </a>

                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('systeam.settings') }}">
                        <i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">System Settings</span>
                    </a>

                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ url('systeam-setting') }}">
                        <i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">My Account</span>
                    </a>


                </ul>
                <div class="slide-right" id="slide-right">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                        width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                    </svg>
                </div>
            </div>
    </div>
</div>


@elseif (Auth::user()->admin_role=='instituteadmin')

<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <div class="app-sidebar">
            <div class="side-header">
                <a class="header-brand1" href="">
                    <img src="{{ asset($logo->logo) }})}}" class="header-brand-img toggle-logo"
                        alt="logo">
                    <img src="{{asset('build/assets/images/brand/logo-2.png')}}" class="header-brand-img light-logo" alt="logo">
                    <img src="{{ asset($logo->logo) }}" class="header-brand-img light-logo1"
                        alt="logo">
                </a>
                <!-- LOGO -->
            </div>
            <div class="main-sidemenu">
                <div class="slide-left disabled" id="slide-left">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                    </svg>
                </div>
                <ul class="side-menu">
                    <li class="sub-category">
                        <h3>institute</h3>
                    </li>

                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('institute.dashboard') }}">
                        <i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Dashboards</span>
                    </a>

                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('addmision.registration') }}">
                        <i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Admission & Registration</span>
                    </a>

                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('all.fund.view') }}">
                        <i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Fund Management</span>
                    </a>

                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('institute.card.index') }}">
                        <i class="side-menu__icon fe fe-download-cloud"></i><span class="side-menu__label">Download</span>
                    </a>



                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-map"></i><span
                            class="side-menu__label">Report</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="tab-menu-heading p-0 pb-2 border-0">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a href="#side5" class="d-flex active" data-bs-toggle="tab"><i class="fe fe-monitor me-2"></i><p>Home</p></a></li>
                                                <li><a href="#side6" data-bs-toggle="tab" class="d-flex"><i class="fe fe-message-square me-2"></i><p>Chat</p></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side5">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1">
                                                    <a href="javascript:void(0);"></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admission.report') }}" class="slide-item">Admision Reports</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('register.report') }}" class="slide-item">Register Reports</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('course.session.index') }}" class="slide-item">Course & Session Reports</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>

                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('institute.profile.index') }}">
                        <i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">My Account</span>
                    </a>



                    {{-- <li class="sub-category">
                        <h3>Student admision and registration </h3>
                    </li> --}}
                </ul>
                <div class="slide-right" id="slide-right">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                        width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


