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
                <li class="nav-item {{ Request::is('users') || Request::is('users/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-chart-areaspline menu-icon"></i>
                        <span class="menu-title">User Manage</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item"><a class="nav-link" href="{{ url('users') }}">User Manage</a></li>
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

                {{-- book, slider, job --}}
                <li class="nav-item {{ Request::is('rooms') || Request::is('rooms/*') || Request::is('messages') || Request::is('messages/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-chart-areaspline menu-icon"></i>
                        <span class="menu-title">Guideline Control</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item"><a class="nav-link" href="{{ route('slider.index') }}">Chronic Care</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('book.index') }}">Teenager Guide</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('book.index') }}">Diabetic Guide</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('book.index') }}">Female Helth Guide</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('book.index') }}">Heart Guide</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('book.index') }}">Kidney Guide</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('book.index') }}">Mentel Helth Guide</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('book.index') }}">Pregnant Mother Guide</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('book.index') }}">Skine  Guide</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('job.index') }}">Hepatic Guide</a></li>
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
                <li class="nav-item {{ Request::is('settings') || Request::is('user/settings/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-chart-areaspline menu-icon"></i>
                        <span class="menu-title">Setting</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item"><a class="nav-link" href="{{ url('settings') }}">Settings</a></li>
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
