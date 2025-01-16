<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                        <img src="{{ asset('/storage/admin') }}/{{ settings()->website_logo }}" style="width:70px;height:70px;" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
                        <img src="{{ asset('/storage/admin') }}/{{ settings()->website_logo }}" style="width:70px;height:70px;" alt="logo" />
                    </a>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item text-dark text-capitalize">
                        <h3>Welcome {{ Auth::user()->designation }} dashboard</h3>
                    </li>
                    <li class="nav-item dropdown d-lg-flex d-none">
                        <a href="{{ route('user.settings', Auth::user()->id) }}" class="btn btn-inverse-primary btn-sm">Settings</a>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                            <span class="online-status"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a href="{{ route('user.settings', Auth::user()->id) }}" class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                My Profile
                            </a>
                            <a href="{{ route('user.settingsChangeUserPassword', Auth::user()->id) }}" class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                Change Password
                            </a>
                            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </div>
    </nav>

    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
                <!-- Dashboard Menu Item -->
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('dashboard') }}">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <!-- User Manage Menu Item -->
                <li class="nav-item {{ Request::is('manage') || Request::is('manage/*') || Request::is('messages') || Request::is('messages/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-chart-areaspline menu-icon"></i>
                        <span class="menu-title">Manage</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('notifications_system.index') ? 'active' : '' }}" href="{{ route('notifications_system.index') }}">Notification Manage</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('doctor.index') ? 'active' : '' }}" href="{{ route('doctor.index') }}">Doctor Manage</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('patient.index') ? 'active' : '' }}" href="{{ route('patient.index') }}">Patient Manage</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.index') ? 'active' : '' }}" href="{{ route('student.index') }}">Student Manage</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('diagnostic_case.index') ? 'active' : '' }}" href="{{ route('diagnostic_case.index') }}">Diagnostic case Manage</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('prescription_assists.index') ? 'active' : '' }}" href="{{ route('prescription_assists.index') }}">Prescription assists Manage</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('prescription_reads.index') ? 'active' : '' }}" href="{{ route('prescription_reads.index') }}">Prescription reads Manage</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Subscription Menu Item -->
                {{-- <li class="nav-item {{ Request::is('items') || Request::is('items/*') || Request::is('subscriptions') || Request::is('subscriptions/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-chart-areaspline menu-icon"></i>
                        <span class="menu-title">Subscription</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item"><a class="nav-link" href="{{ url('items') }}">Items Manage</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('subscription') }}">Subscriptions Manage</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('withdraw') }}">Withdraw Manage</a></li>
                        </ul>
                    </div>
                </li> --}}

                {{-- book, slider, job --}}
                <li class="nav-item {{ Request::is('rooms') || Request::is('rooms/*') || Request::is('messages') || Request::is('messages/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-chart-areaspline menu-icon"></i>
                        <span class="menu-title">Book Slider Job</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item"><a class="nav-link" href="{{ route('slider.index') }}">Slider</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('book.index') }}">Book</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('job.index') }}">JOB</a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="{{ url('rooms') }}">Rooms Manage</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('messages') }}">Messages Manage</a></li> --}}
                        </ul>
                    </div>
                </li>

                {{-- guide  --}}
                <li class="nav-item {{ Request::is('rooms') || Request::is('guide/*') || Request::is('messages') || Request::is('messages/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-chart-areaspline menu-icon"></i>
                        <span class="menu-title">Guideline Control</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('chronic.index') ? 'active' : '' }}" href="{{ route('chronic.index') }}">Chronic Care</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('teenager.index') ? 'active' : '' }}" href="{{ route('teenager.index') }}">Teenager Guide</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('diabetic.index') ? 'active' : '' }}" href="{{ route('diabetic.index') }}">Diabetic Guide</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('femalehelth.index') ? 'active' : '' }}"  href="{{ route('femalehelth.index') }}">Female Helth Guide</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('heart.index') ? 'active' : '' }}" href="{{ route('heart.index') }}">Heart Guide</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('kidney.index') ? 'active' : '' }}" href="{{ route('kidney.index') }}">Kidney Guide</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('mentelhelth.index') ? 'active' : '' }}" href="{{ route('mentelhelth.index') }}">Mentel Helth Guide</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('mother.index') ? 'active' : '' }}" href="{{ route('mother.index') }}">Pregnant Mother Guide</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('skine.index') ? 'active' : '' }}" href="{{ route('skine.index') }}">Skine  Guide</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('hepatic.index') ? 'active' : '' }}" href="{{ route('hepatic.index') }}">Hepatic Guide</a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="{{ url('rooms') }}">Rooms Manage</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('messages') }}">Messages Manage</a></li> --}}
                        </ul>
                    </div>
                </li>

                 {{-- book, slider, job --}}
                 <li class="nav-item {{ Request::is('rooms') || Request::is('rooms/*') || Request::is('messages') || Request::is('messages/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-chart-areaspline menu-icon"></i>
                        <span class="menu-title">Additional Info</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item"><a class="nav-link" href="{{ route('feedback.index') }}">Feedbacks</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('contacts.index') }}">Contacts</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('guideline.index') }}">National GuideLine</a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="{{ url('rooms') }}">Rooms Manage</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('messages') }}">Messages Manage</a></li> --}}
                        </ul>
                    </div>
                </li>



                <!-- Setting Menu Item -->
                <li class="nav-item {{ Request::is('setting') || Request::is('setting/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-chart-areaspline menu-icon"></i>
                        <span class="menu-title">Setting</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('web.settings.*')  ? 'active' : '' }} " href="{{ route('web.settings.index') }}">General Info</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('user/settings/' . Auth::user()->id) }}">Profile Settings</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('quizManage') }}">Quiz Manage</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('quizQuestionManage') }}">Quiz Question Manage</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
