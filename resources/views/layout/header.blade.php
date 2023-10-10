<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <ul class="navbar-nav">
            <li class="nav-item dropdown nav-notifications">
                <a class="nav-link dropdown-toggle m-2" href="#" id="notificationDropdown">
                    <i class="fa fa-money mr-3"></i>Balance : {{ number_format(Session::get('creditPoint')) }}
                </a>
            </li>
            <li class="nav-item dropdown nav-notifications">
                <a class="nav-link dropdown-toggle m-2" href="{{ url('/blockedPlayers') }}" id="notificationDropdown">
                    <i class="fa fa-users mr-1"></i>Blocked Players
                </a>
            </li>
            <li class="nav-item dropdown nav-notifications">
                <a class="nav-link dropdown-toggle m-2" href="{{ url('/chpass') }}" id="notificationDropdown">
                    <i class="fa fa-key mr-1"></i>Change Password
                </a>
            </li>
            <li class="nav-item dropdown nav-profile">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile">
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="figure mb-3">
                            <img src="{{ url('https://via.placeholder.com/80x80') }}" alt="">
                        </div>
                        <div class="info text-center">
                            <p class="name font-weight-bold mb-0">{{ Session::get('username') }}</p>
                            <p class="email text-muted mb-3">{{ Session::get('name') }}</p>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle m-2" href="{{ url('/logout') }}"
                                    id="notificationDropdown">
                                    <i class="fa fa-sign-out mr-1"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>