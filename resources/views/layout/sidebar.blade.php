<nav class="sidebar">

    <div class="sidebar-header">
        <a href="{{ url('/dashboard') }}" class="sidebar-brand" style="font-size:20px">
            Gold<span>Star</span>
        </a>
        <div class="text-black sidebar-toggler not-active" style="color: #000000">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav navbar-non-responsive">
            <li class="nav-item nav-category"></li>
            <li class="nav-item {{ active_class(['dashboard']) }}">
                <a href="{{ url('/dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            @if (Session::get('role') == 'Admin')
                <li class="nav-item {{ active_class(['generatePointList']) }}">
                    <a href="{{ url('/generatePointList') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Generate Points</span>
                    </a>
                </li>
            @endif

            <li class="nav-item nav-category">Management</li>


            @if (in_array(Session::get('role'), ['Admin', 'subadmin', 'agent', 'super_distributor', 'distributor', 'subadmin']))
                @php
                    $isFranchise = Session::get('is_f') == 'true';
                @endphp
                @if (in_array(Session::get('role'), ['Admin', 'subadmin']))
                    {{--    <div class="nav-item" id="usersNavItem">
                        <a href="#" class="nav-link" id="usersToggle">
                            <i class="link-icon fas fa-users"></i>
                            <span class="link-title dropdown-toggle">Users Management</span>
                        </a>
                        <div class="custom-submenu" id="usersMenu">
                            <a href="{{ url('/' . ($isFranchise ? 'admin' : 'users') . '/add_' . ($isFranchise ? 'super_distributor' : 'agent')) }}"
                                class="nav-link">
                                <span class="link-title">Add Super Distributor</span>
                            </a>
                            <a href="{{ url('/' . ($isFranchise ? 'admin' : 'users') . '/add_' . ($isFranchise ? 'distributor' : 'agent')) }}"
                                class="nav-link">
                                <span class="link-title">Add Distributor</span>
                            </a>
                            {{--  <a href="{{ url('/' . ($isFranchise ? 'Franchise' : 'users') . '/add_' . ($isFranchise ? 'retailer' : 'agent')) }}"
                            class="nav-link">
                            <span class="link-title">Add Retailer</span>
                        </a>  --}}
                    {{--  <a href="{{ url('/' . ($isFranchise ? 'Franchise' : 'users') . '/add_' . ($isFranchise ? 'agent' : 'agent')) }}"
                            class="nav-link">
                            <span class="link-title">Add Agent</span>
                        </a>  --}}
                    {{--  <a href="{{ url('/' . ($isFranchise ? 'admin' : 'users') . '/add_' . 'player') }}"
                                class="nav-link">
                                <span class="link-title">Add Player</span>
                            </a>
                            <a href="{{ url('/users' . ($isFranchise ? '/admin' : '')) }}" class="nav-link">
                                <span class="link-title">View Users</span>
                            </a>  --}}
                    {{--  <a href="{{ url('/roles') }}" class="nav-link">
                            <span class="link-title">View Roles</span>
                        </a>  --}}
                    {{--  </div>
    </div>  --}}
                @endif
                {{--  <li class="nav-item {{ active_class([$isFranchise ? 'Franchise/' : 'users/']) }}">
                    <a href="{{ url('/' . ($isFranchise ? 'Franchise' : 'users') . '/add_' . ($isFranchise ? 'super_distributor' : 'agent')) }}"
                        class="nav-link">
                        <i class="link-icon" data-feather="user-plus"></i>
                        <span class="link-title">Add Users</span>
                    </a>
                </li>  --}}
                {{--            Dropdown --}}
                @if (in_array(Session::get('role'), ['Admin']))
                    <div class="nav-item" id="anotherDropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="superToggle">
                            <i class="link-icon fas fa-users"></i>
                            <span class="link-title ">Super Distributor</span>
                        </a>
                        <div class="custom-submenu" id="superMenu">
                            <a href="{{ url('/' . ($isFranchise ? 'admin' : 'users') . '/add_' . ($isFranchise ? 'super_distributor' : 'agent')) }}"
                                class="nav-link">
                                <i class="link-icon fas fa-bar-chart"></i>
                                <span span class="link-title">Add Super Distributor</span>
                            </a>
                            <a href="{{ url('/getdata/super-distributor') }}" class="nav-link">
                                <i class="link-icon fas fa-bar-chart"></i>
                                <span class="link-title">View Super Distributor</span>
                            </a>
                        </div>
                    </div>
                @endif
                @if (in_array(Session::get('role'), ['Admin']))
                    <div class="nav-item" id="anotherDropdown">
                        <a href="#" class="nav-link dropdown-toggle">
                            <i class="link-icon fas fa-box"></i>
                            <span class="link-title">Distributor</span>
                        </a>
                        <div class="custom-submenu">
                            <a href="{{ url('/' . ($isFranchise ? 'admin' : 'users') . '/add_' . 'distributor') }}"
                                class="nav-link">
                                <i class="link-icon fas fa-box"></i>
                                <span class="link-title">Add Distributor</span>
                            </a>
                            <a href="{{ url('/getdata/distributor') }}" class="nav-link">
                                <i class="link-icon fas fa-box"></i>
                                <span class="link-title">View Distributor</span>
                            </a>
                        </div>
                    </div>
                @endif
                @if (in_array(Session::get('role'), ['Admin']))
                    <div class="nav-item" id="anotherDropdown">
                        <a href="#" class="nav-link dropdown-toggle">
                            <i class="link-icon fas fa-user"></i>
                            <span class="link-title">Player</span>
                        </a>
                        <div class="custom-submenu">
                            <a href="{{ url('/' . ($isFranchise ? 'admin' : 'users') . '/add_' . ($isFranchise ? 'player' : 'player')) }}"
                                class="nav-link">
                                <i class="link-icon fas fa-user"></i>
                                <span class="link-title">Add Player</span>
                            </a>
                            <a href="{{ url('/getdata/player') }}" class="nav-link">
                                <i class="link-icon fas fa-user"></i>
                                <span class="link-title">View Player</span>
                            </a>
                        </div>
                    </div>
                @endif
                @if (in_array(Session::get('role'), ['subadmin']))
                    <div class="nav-item" id="anotherDropdown">
                        <a href="#" class="nav-link dropdown-toggle">
                            <i class="link-icon fas fa-user"></i>
                            <span class="link-title">Player</span>
                        </a>
                        <div class="custom-submenu">
                            <a href="{{ url('/getdata/player') }}" class="nav-link">
                                <i class="link-icon fas fa-user"></i>
                                <span class="link-title">View Player</span>
                            </a>
                        </div>
                    </div>
                @endif
                @if (in_array(Session::get('role'), ['super_distributor']))
                    <div class="nav-item" id="anotherDropdown">
                        <a href="#" class="nav-link dropdown-toggle">
                            <i class="link-icon fas fa-box"></i>
                            <span class="link-title">Distributor</span>
                        </a>
                        <div class="custom-submenu">
                            <a href="{{ url('/' . ($isFranchise ? 'admin' : 'users') . '/add_' . 'distributor') }}"
                                class="nav-link">
                                <i class="link-icon fas fa-box"></i>
                                <span class="link-title">Add Distributor</span>
                            </a>
                            <a href="{{ url('/users/admin') }}" class="nav-link">
                                <i class="link-icon fas fa-box"></i>
                                <span class="link-title">View Distributor</span>
                            </a>
                        </div>
                    </div>
                @endif
                @if (in_array(Session::get('role'), ['super_distributor']))
                    <div class="nav-item" id="anotherDropdown">
                        <a href="#" class="nav-link dropdown-toggle">
                            <i class="link-icon fas fa-user"></i>
                            <span class="link-title">Player</span>
                        </a>
                        <div class="custom-submenu">
                            <a href="{{ url('/' . ($isFranchise ? 'admin' : 'users') . '/add_' . ($isFranchise ? 'player' : 'player')) }}"
                                class="nav-link">
                                <i class="link-icon fas fa-user"></i>
                                <span class="link-title">Add Player</span>
                            </a>
                            <a href="{{ url('/users/admin') }}" class="nav-link">
                                <i class="link-icon fas fa-user"></i>
                                <span class="link-title">View Player</span>
                            </a>
                        </div>
                    </div>
                @endif
                @if (in_array(Session::get('role'), ['distributor']))
                    <div class="nav-item" id="anotherDropdown">
                        <a href="#" class="nav-link dropdown-toggle">
                            <i class="link-icon fas fa-user"></i>
                            <span class="link-title">Player</span>
                        </a>
                        <div class="custom-submenu">
                            <a href="{{ url('/' . ($isFranchise ? 'admin' : 'users') . '/add_' . ($isFranchise ? 'player' : 'player')) }}"
                                class="nav-link">
                                <i class="link-icon fas fa-user"></i>
                                <span class="link-title">Add Player</span>
                            </a>
                            <a href="{{ url('/users/admin') }}" class="nav-link">
                                <i class="link-icon fas fa-user"></i>
                                <span class="link-title">View Player</span>
                            </a>
                        </div>
                    </div>
                @endif
            @endif
            @if (Session::get('role') == 'Admin')
                <li class="nav-item {{ active_class(['subAdmin/*']) }}">
                    <a href="{{ url('/subAdmin') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">View Sub Admin List</span>
                    </a>
                </li>
            @endif
            <li class="nav-item {{ active_class(['OnPlayers']) }}">
                <a href="{{ url('/OnPlayers') }}" class="nav-link">
                    <i class="link-icon fa fa-user-times"></i>
                    <span class="link-title">Online Player</span>
                </a>
            </li>
            @if (Session::get('role') != 'subadmin')
                <li class="nav-item {{ active_class(['profile']) }}">
                    <a href="{{ url('/profile') }}" class="nav-link">
                        <i class="link-icon fa fa-eye"></i>
                        <span class="link-title">Profile View</span>
                    </a>
                </li>
            @endif
            @if (Session::get('role') != 'subadmin')
                <li class="nav-item {{ active_class(['transfer']) }}">
                    <a href="{{ url('/transfer') }}" class="nav-link">
                        <i class="link-icon fa fa-exchange"></i>
                        <span class="link-title">Transfer Point</span>
                    </a>
                </li>
            @endif
            {{--  <li class="nav-item {{ active_class(['point_request']) }}">
                <a href="{{ url('/point_request') }}" class="nav-link">
                    <i class="link-icon fa fa-exchange"></i>
                    <span class="link-title">Point Request</span>
                </a>
            </li>  --}}
            @if (Session::get('role') != 'subadmin')
                <li class="nav-item {{ active_class(['changepin']) }}">
                    <a href="{{ url('/changepin') }}" class="nav-link">
                        <i class="link-icon fa fa-key"></i>
                        <span class="link-title">Change Transaction Pin</span>
                    </a>
                </li>
            @endif

            @if (Session::get('role') == 'Admin' || Session::get('role') == 'subadmin')
                <li class="nav-item nav-category">Reports</li>
                <li class="nav-item {{ active_class(['history']) }}">
                    <a href="{{ url('/history') }}" class="nav-link">
                        <i class="link-icon fa fa-history"></i>
                        <span class="link-title">Players History</span>
                    </a>
                </li>
            @endif
            {{--  @if (Session::get('role') == 'Admin')
                <li class="nav-item {{ active_class(['generatePointList']) }}">
                    <a href="{{ url('/lockuser') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Lock User</span>
                    </a>
                </li>
            @endif  --}}

            @if (in_array(Session::get('role'), ['Admin', 'super_distributor', 'distributor']))
                <li class="nav-item {{ active_class(['gamedraw']) }}">
                    <a href="{{ url('/gamedraw/1') }}" class="nav-link">
                        <i class="link-icon fa fa-history"></i>
                        <span class="link-title">Game Draw</span>
                    </a>
                </li>
                @if ($isFranchise)
                    <li class="nav-item ">
                        @if (Session::get('role') == 'Admin')
                            <a href="{{ url('/Tnover?role=franchise&type=7&from=' . date('Y-m-d') . '&to=' . date('Y-m-d')) }}"
                                class="nav-link">
                            @else
                                <a href="{{ url('/Tnover?role=' . Session::get('role') . '&type=7&from=' . date('Y-m-d') . '&to=' . date('Y-m-d')) }}"
                                    class="nav-link">
                        @endif
                        <i class="link-icon fa fa-pie-chart"></i>
                        <span class="link-title">Turnover Report</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item ">
                        @if (Session::get('role') == 'Admin')
                            <a href="{{ url('/Tnover?role=agent&type=7&from=' . date('Y-m-d') . '&to=' . date('Y-m-d')) }}"
                                class="nav-link">
                            @else
                                <a href="{{ url('/Tnover?role=' . Session::get('role') . '&type=7&from=' . date('Y-m-d') . '&to=' . date('Y-m-d')) }}"
                                    class="nav-link">
                        @endif
                        <i class="link-icon fa fa-pie-chart"></i>
                        <span class="link-title">Turnover Report</span>
                        </a>
                    </li>
                @endif
                @if (Session::get('role') == 'Admin')
                    <li class="nav-item {{ active_class(['gameProfit']) }}">
                        <a href="{{ url('/gameProfit?type=7&from=' . date('Y-m-d') . '&to=' . date('Y-m-d')) }}"
                            class="nav-link">
                            <i class="link-icon fa fa-history"></i>
                            <span class="link-title">Game Profit</span>
                        </a>
                    </li>
                @endif
            @endif
            {{--  <li class="nav-item {{ active_class(['transactions']) }}">
                <a href="{{ url('/transactions') }}" class="nav-link">
                    <i class="link-icon fa fa-money"></i>
                    <small><span class="link-title">Point Request Transaction Report</span></small>
                </a>
            </li>  --}}
            {{--  <li class="nav-item {{ active_class(['PointFile']) }}">
                <a href="{{ url('/PointFile') }}" class="nav-link">
                    <i class="link-icon fa fa-money"></i>
                    <span class="link-title">Point File</span>
                </a>
            </li>  --}}
            {{--  <li class="nav-item {{ active_class(['verify_pointFile']) }}">
                <a href="{{ url('/verify_pointFile') }}" class="nav-link">
                    <i class="link-icon fa fa-money"></i>
                    <span class="link-title">Approve Request Point File</span>
                </a>
            </li>  --}}
            {{--  <li class="nav-item {{ active_class(['in_point']) }}">
                <a href="{{ url('/in_point') }}" class="nav-link">
                    <i class="link-icon fa fa-money"></i>
                    <span class="link-title">In Points</span>
                </a>
            </li>  --}}
            {{--  <li class="nav-item {{ active_class(['points_out']) }}">
                <a href="{{ url('/points_out') }}" class="nav-link">
                    <i class="link-icon fa fa-money"></i>
                    <span class="link-title">Out Points</span>
                </a>
            </li>  --}}

            @if (Session::get('role') == 'Admin')
                <li class="nav-item {{ active_class(['winningPercent']) }}">
                    <a href="{{ url('/winningPercent') }}" class="nav-link">
                        <i class="link-icon fa fa-trophy"></i>
                        <span class="link-title">Winning %</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['adminPercent']) }}">
                    <a href="{{ url('/adminPercent') }}" class="nav-link">
                        <i class="link-icon fa fa-money"></i>
                        <span class="link-title">Admin Balance</span>
                    </a>
                </li>
                {{--  @if (array_key_exists('winbyadmin', Session::get('permissions')))
                    <li class="nav-item {{ active_class(['announcement']) }}">
                        <a href="{{ url('/announcement') }}" class="nav-link">
                            <i class="link-icon fa fa-stop"></i>
                            <span class="link-title">Announcement</span>
                        </a>
                    </li>
                @endif  --}}
            @endif
            @if (Session::get('role') == 'Admin' || Session::get('role') == 'subadmin')
                <li class="nav-item {{ active_class(['liveResult/liveResultFunRoulette']) }}">
                    <a href="{{ url('/liveResult/liveResultFunRoulette') }}" class="nav-link">
                        <i class="link-icon fa fa-list"></i>
                        <span class="link-title">Live Result FunRoulette</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['liveResult/liveResultFunTarget']) }}">
                    <a href="{{ url('/liveResult/liveResultFunTarget') }}" class="nav-link">
                        <i class="link-icon fa fa-list"></i>
                        <span class="link-title">Live Result FunTarget</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['liveResult/liveResultAnimal']) }}">
                    <a href="{{ url('/liveResult/liveResultAnimal') }}" class="nav-link">
                        <i class="link-icon fa fa-list"></i>
                        <span class="link-title">Live Result Animal</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['liveResult/liveResultDragonTiger']) }}">
                    <a href="{{ url('/liveResult/liveResultDragonTiger') }}" class="nav-link">
                        <i class="link-icon fa fa-list"></i>
                        <span class="link-title">Live Result DragonTiger</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ active_class(['/chpass']) }}" href="{{ url('/chpass') }}">
                    <i class="link-icon fa fa-key mr-1"></i>
                    <span class="link-title">Change Password</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('/blockedPlayers') }}">
                    <i class="link-icon fa fa-users mr-1"></i><span class="link-title">Blocked Players</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/logout') }}" class="nav-link">
                    <i class="link-icon fa fa-sign-out"></i>
                    <span class="link-title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
{{--  <script type="text/javascript">
    $('.sidebar-body', '.superDis').perfectScrollbar();
</script>  --}}
<script>
    // JavaScript to toggle the visibility of the dropdown menu
    var dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            var submenu = toggle.nextElementSibling; // Assuming the submenu is the next sibling element
            if (submenu.style.display === 'block') {
                submenu.style.display = 'none';
            } else {
                submenu.style.display = 'block';
            }
        });
    });
</script>
