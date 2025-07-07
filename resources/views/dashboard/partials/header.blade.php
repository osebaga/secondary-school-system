<!-- Top Bar Start -->
<div class="topbar" style="background-color: #977229">

    <!-- LOGO -->
    <div class="topbar-left" style="background-color: #977229">
        <div class="text-center">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('assets/uploads/logo/logo.png') }}"
                    style="opacity: .8; width:22%; margin-left:5%; background-color:#ffffff;border-radius:100%;"
                    alt="Logo">
                &nbsp;&nbsp;

                <span>SAMIS</span></a>
        </div>
    </div>

    <nav class="navbar-custom" style="background-color: #977229">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ Auth::user()->present()->avatar }}" alt="."
                        class="rounded-circle">{{ Auth::user()->present()->fullName }}
                    {{-- alt="{{Auth::user()->present()->userName}}" --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small>Welcome ! {{ Auth::user()->present()->userName }}</small> </h5>
                    </div>

                    <!-- item-->
                    @if (Auth::user()->isAn('Student'))
                        <a href="{{ route('students.my-profile', auth()->user()->fullname) }}"
                            class="dropdown-item notify-item">
                            <i class="mdi mdi-account"></i> <span>Profile</span>
                        </a>
                    @else
                        <a href="{{ route('staffs.profile') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-face-profile"></i> <span>My Account</span>
                        </a>
                    @endif

                    <!-- item-->

                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                        onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout"></i> <span>{{ __('Logout') }}</span>
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>

        </ul>
        <button class="button-menu-mobile open-left waves-light waves-effect" style="background-color: #977229; ">
            <i class="mdi mdi-menu"></i>
        </button>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
                .top-bar {
                    background-color: ##864B1F;
                    /* Dark background */
                    color: white;
                    /* White text */
                    text-align: center;
                    /* Center the text */
                    font-size: 20px;
                    /* Font size for better visibility */
                    position: fixed;
                    /* Fix the bar at the top */
                    top: 0;
                    /* Stick the bar to the top */
                    width: 50%;
                    /* Full width */
                    z-index: 1000;
                    /* Ensure it stays on top */
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
                }
            </style>
        </head>
        <div class="top-bar" style="margin-left: 10%">
            <p>KANGE COLLEGE OF HEALTH AND ALLIED SCIENCES <br>STUDENT ACADEMIC MANAGEMENT INFORMATION SYSTEM</p>

        </div>



    </nav>

</div>
<!-- Top Bar End -->
