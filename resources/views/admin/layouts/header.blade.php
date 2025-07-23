<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="{{ url('/dashboard') }}">
                        <img src="{{ asset('/storage/admin') }}/{{ settings()->website_logo }}" style="width:70px;height:70px;" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{ url('/dashboard') }}">
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
                            <a href="{{ route('usersEdit', Auth::user()->id) }}" class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                My Profile
                            </a>
                           
                                
                                
                            <!--<a href="{{ route('user.settingsChangeUserPassword', Auth::user()->id) }}" class="dropdown-item">-->
                            <!--    <i class="mdi mdi-settings text-primary"></i>-->
                            <!--    Change Password-->
                            <!--</a>-->
                         
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
              <li class="nav-item {{ Request::is('manage') || Request::is('manage/*') || request()->routeIs([
                        'announcements.index', 'notifications_system.index', 'doctor.index', 'patient.index',
                        'student.index', 'diagnostic_case.index', 'prescription_assists.index',
                        'prescription_reads.index'
                    ]) || Request::is('quizManage') || Request::is('quizQuestionManage') ? 'active' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-chart-areaspline menu-icon"></i>
                            <span class="menu-title">Manage</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="submenu">
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('announcements.index') ? 'active' : '' }}" href="{{ route('announcements.index') }}">
                                        <i class="mdi mdi-bullhorn"></i> Announcements Manage
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('notifications_system.index') ? 'active' : '' }}" href="{{ route('notifications_system.index') }}">
                                        <i class="mdi mdi-bell-ring"></i> Notification Manage
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('doctor.index') ? 'active' : '' }}" href="{{ route('doctor.index') }}">
                                        <i class="mdi mdi-doctor"></i> Doctor Manage
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('patient.index') ? 'active' : '' }}" href="{{ route('patient.index') }}">
                                        <i class="mdi mdi-hospital"></i> Patient Manage
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('student.index') ? 'active' : '' }}" href="{{ route('student.index') }}">
                                        <i class="mdi mdi-school"></i> Student Manage
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('diagnostic_case.index') ? 'active' : '' }}" href="{{ route('diagnostic_case.index') }}">
                                        <i class="mdi mdi-magnify"></i> Diagnostic Case Manage
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('prescription_assists.index') ? 'active' : '' }}" href="{{ route('prescription_assists.index') }}">
                                        <i class="mdi mdi-file-document-edit"></i> Prescription Assists
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('prescription_reads.index') ? 'active' : '' }}" href="{{ route('prescription_reads.index') }}">
                                        <i class="mdi mdi-book-open-variant"></i> Prescription Reads
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('prescription_unknown.index') ? 'active' : '' }}" href="{{ route('prescription_unknown.index') }}">
                                        <i class="mdi mdi-pill"></i> Unknown Medicine
                                    </a>
                                </li>
                                <!--<li class="nav-item">-->
                                <!--    <a class="nav-link {{ Request::is('quizManage') ? 'active' : '' }}" href="{{ url('quizManage') }}">-->
                                <!--        <i class="mdi mdi-comment-question-outline"></i> Quiz Set Manage-->
                                <!--    </a>-->
                                <!--</li>-->
                                  <li class="nav-item">
                                    <a class="nav-link {{ Request::is('quizManage') ? 'active' : '' }}" href="{{ url('quizManage/quizManage-user') }}">
                                        <i class="mdi mdi-comment-question-outline"></i> Quiz Set Manage
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('quizQuestionManage') ? 'active' : '' }}" href="{{ url('quizQuestionManage') }}">
                                        <i class="mdi mdi-format-list-bulleted"></i> Quiz Question Setup
                                    </a>
                                </li>
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
                <li class="nav-item {{ Request::is('manage2/*') || request()->routeIs([
                    'slider.index', 'book.index', 'job.index', 'videomanage.index',
                    'blog_manage.index', 'socialLink.index', 'banner.index'
                    ]) ? 'active' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-television-guide menu-icon"></i>
                        <span class="menu-title">Book Slider Job</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('slider.index') ? 'active' : '' }}" href="{{ route('slider.index') }}">
                                    <i class="mdi mdi-image-album"></i> Slider
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('book.index') ? 'active' : '' }}" href="{{ route('book.index') }}">
                                    <i class="mdi mdi-book-open-page-variant"></i> Book
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('job.index') ? 'active' : '' }}" href="{{ route('job.index') }}">
                                    <i class="mdi mdi-briefcase-outline"></i> Job
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('videomanage.index') ? 'active' : '' }}" href="{{ route('videomanage.index') }}">
                                    <i class="mdi mdi-video-vintage"></i> Video Manage
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('blog_manage.index') ? 'active' : '' }}" href="{{ route('blog_manage.index') }}">
                                    <i class="mdi mdi-blogger"></i> Blogs Manage
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('socialLink.index') ? 'active' : '' }}" href="{{ route('socialLink.index') }}">
                                    <i class="mdi mdi-link-variant"></i> Social Link Manage
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('banner.index') ? 'active' : '' }}" href="{{ route('banner.index') }}">
                                    <i class="mdi mdi-image-size-select-large"></i> Banner Manage
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                {{-- guide  --}}
                <li class="nav-item {{ Request::is('guide/*') || request()->routeIs([
                    'chronic.index', 'teenager.index', 'diabetic.index', 'femalehelth.index',
                    'heart.index', 'kidney.index', 'mentelhelth.index', 'mother.index',
                    'skine.index', 'hepatic.index'
                ]) ? 'active' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-view-grid menu-icon"></i>
                        <span class="menu-title">Guideline Control</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('chronic.index') ? 'active' : '' }}" href="{{ route('chronic.index') }}">
                                    <i class="mdi mdi-heart-pulse"></i> Chronic Care
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('teenager.index') ? 'active' : '' }}" href="{{ route('teenager.index') }}">
                                    <i class="mdi mdi-human-child"></i> Teenager Guide
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('diabetic.index') ? 'active' : '' }}" href="{{ route('diabetic.index') }}">
                                    <i class="mdi mdi-needle"></i> Diabetic Guide
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('femalehelth.index') ? 'active' : '' }}" href="{{ route('femalehelth.index') }}">
                                    <i class="mdi mdi-gender-female"></i> Female Health Guide
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('heart.index') ? 'active' : '' }}" href="{{ route('heart.index') }}">
                                    <i class="mdi mdi-heart"></i> Heart Guide
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('kidney.index') ? 'active' : '' }}" href="{{ route('kidney.index') }}">
                                    <i class="mdi mdi-water-pump"></i> Kidney Guide
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('mentelhelth.index') ? 'active' : '' }}" href="{{ route('mentelhelth.index') }}">
                                    <i class="mdi mdi-emoticon-neutral-outline"></i> Mental Health Guide
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('mother.index') ? 'active' : '' }}" href="{{ route('mother.index') }}">
                                    <i class="mdi mdi-baby"></i> Pregnant Mother Guide
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('skine.index') ? 'active' : '' }}" href="{{ route('skine.index') }}">
                                    <i class="mdi mdi-face-woman-outline"></i> Skin Guide
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('hepatic.index') ? 'active' : '' }}" href="{{ route('hepatic.index') }}">
                                    <i class="mdi mdi-liver"></i> Hepatic Guide
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                
                 <li class="nav-item {{ Request::is('rooms') || Request::is('rooms/*') || Request::is('messages') || Request::is('messages/*') || request()->routeIs('feedback.index', 'contacts.index', 'guideline.index', 'antibiotic.index') ? 'active' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-access-point menu-icon"></i>
                        <span class="menu-title">Additional Info</span>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('feedback.index') ? 'active' : '' }}" href="{{ route('feedback.index') }}">
                                    <i class="mdi mdi-message-reply-text"></i> Feedbacks
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('contacts.index') ? 'active' : '' }}" href="{{ route('contacts.index') }}">
                                    <i class="mdi mdi-account-box"></i> Contacts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('guideline.index') ? 'active' : '' }}" href="{{ route('guideline.index') }}">
                                    <i class="mdi mdi-book-open-page-variant"></i> National GuideLine
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('antibiotic.index') ? 'active' : '' }}" href="{{ route('antibiotic.index') }}">
                                    <i class="mdi mdi-pill"></i> Antibiotic Guide
                                </a>
                            </li>
                            <!-- Optional Items with Icons -->
                            <!--
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('terms-and-conditions2') }}">
                                    <i class="mdi mdi-file-document"></i> Terms & Conditions
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('privacy-policy2') }}">
                                    <i class="mdi mdi-lock-outline"></i> Privacy Policy
                                </a>
                            </li>
                            -->
                        </ul>
                    </div>
                </li>

                {{-- master settings list --}}
                {{-- <li class="nav-item {{ Request::is('master/addresses*') || Request::is('master/specializations*') || Request::is('master/hospitals*') ? 'active' : '' }}">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-database menu-icon"></i>
                        <span class="menu-title">Master Info</span>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('master.addresses.index') ? 'active' : '' }}" href="{{ route('master.addresses.index') }}">
                                    <i class="mdi mdi-map-marker"></i> Districts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('master.specializations.index') ? 'active' : '' }}" href="{{ route('master.specializations.index') }}">
                                    <i class="mdi mdi-stethoscope"></i> Specializations
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('master.hospitals.index') ? 'active' : '' }}" href="{{ route('master.hospitals.index') }}">
                                    <i class="mdi mdi-hospital-building"></i> Hospitals
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}




                <!-- Setting Menu Item -->
                <li class="nav-item {{ Request::is('setting') || Request::is('setting/*') || request()->routeIs('web.settings.*') ? 'active' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-settings-outline menu-icon"></i>
                            <span class="menu-title">Settings</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="submenu">
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('web.settings.*') ? 'active' : '' }}" href="{{ route('web.settings.index') }}">
                                        <i class="mdi mdi-tune"></i> General Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('usersEdit') ? 'active' : '' }}" href="{{ route('usersEdit', Auth::user()->id) }}">
                                        <i class="mdi mdi-account-cog-outline"></i> Profile Settings
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

            </ul>
        </div>
    </nav>
</div>
