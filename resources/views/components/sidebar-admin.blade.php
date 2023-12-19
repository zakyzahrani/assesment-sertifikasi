<div>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="{{ route('home') }}" class="category" >            
            <img height="75"  class="" style="display:block; margin-left: 30%;"  src="../admin/assets/img/yyy.png">
        </a>
        <ul class="side-menu top">
            <li class="{{ request()->routeIs('dashboard_home') ? 'active' : '' }}">
                <a href="{{ route('dashboard_home') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('dashboard_user') ? 'active' : '' }}">
                <a href="{{ route('dashboard_user') }}">
                    <i class='bx bxs-user'></i>
                    <span class="text">User</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('dashboard_pendaftar') ? 'active' : '' }}">
                <a href="{{ route('dashboard_pendaftar') }}">
                    <i class='bx bxs-receipt'></i>
                    <span class="text">Pendaftar</span>
                </a>
            </li>

        </ul>
        <ul class="side-menu">

            <li>
                <a class="logout" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <h4>Dashboard</h4>
            {{-- <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="img/people.png">
            </a> --}}
        </nav>
        <!-- NAVBAR -->
