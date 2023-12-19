<div>
    <!-- Modal Account -->
    <div class="modal fade" id="viewAcc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Account Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control border-0 border-bottom" id="regist-user"
                            placeholder="name@example.com">
                        <label for="regist-user">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control border-0 border-bottom" id="regist-user"
                            placeholder="name@example.com">
                        <label for="regist-user">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control border-0 border-bottom" id="regist-p"
                            placeholder="Password">
                        <label for="regist-p">Age</label>
                    </div>
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected disabled>Select your gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rent">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md bg-body-tertiary sticky-top shadow-sm">
        <!-- large navbar -->
        <div class="container-sm navbar-resp-large">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('user/img/yyy.png') }}" width="" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            @guest
            <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNav">
                <ul class="navbar-nav fw-semibold">
                    <li class="nav-item nav-link-bg">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    
                </ul>
            </div>
                <div class="guest ms-4">
                    @if (Route::has('login'))
                        <a class="btn btn-rent rounded-5" href="{{ route('login') }}">Log in</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="btn btn-light rounded-5 border" href="{{ route('register') }}">Sign up</a>
                    @endif
                </div>
            @else
            <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNav">
                <ul class="navbar-nav fw-semibold">
                    <li class="nav-item nav-link-bg">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index_boat') }}">Daftar</a>
                    </li>
                </ul>
            </div>
                <div class="dropdown ms-4">
                    <a class="dropdown-toggle text-decoration-none fw-semibold nav-acc" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end border-0 rounded shadow-lg p-0">
                        @if (Auth::user()->is_admin)
                            <li class="dropdown-item px-4 py-2 rounded-top dropdown-link">
                                <a class="text-decoration-none fw-semibold" href="{{ route('dashboard_home') }}">Dashboard
                                    Admin</a>
                            </li>
                        @endif
                        <li class="dropdown-item px-4 py-2 rounded-top dropdown-link">
                            <a class="text-decoration-none fw-semibold" href="{{ route('index_user') }}">View Account</a>
                        </li>
                        <li class="dropdown-item px-4 py-2 dropdown-link">
                            <a class="text-decoration-none fw-semibold" href="{{ route('show_history_pendaftaran') }}">Histori Pendaftaran</a>
                        </li>
                        <li class="dropdown-item px-4 py-2 rounded-bottom dropdown-link">

                            <a class="text-decoration-none fw-semibold" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                LogOut
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>



                        </li>
                    </ul>
                </div>
            @endguest

        </div>
        <!-- small navbar -->
        {{-- @if (Auth::user())@endif --}}
        <div class="container-sm navbar-resp-small">
            <!-- small navbar -->
            @if (Auth::user())
                <div class="dropdown">
                    <a class="dropdown-toogle text-decoration-none fw-semibold nav-acc" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu border-0 rounded shadow-lg p-0">
                        @if (Auth::user()->is_admin)
                            <li class="dropdown-item px-4 py-2 rounded-top dropdown-link">
                                <a class="text-decoration-none fw-semibold"
                                    href="{{ route('dashboard_home') }}">Dashboard
                                    Admin</a>
                            </li>
                        @endif

                        <li class="dropdown-item px-4 py-2 rounded-top dropdown-link">
                            <a class="text-decoration-none fw-semibold" href="{{ route('index_user') }}">View
                                Account</a>
                        </li>
                        <li class="dropdown-item px-4 py-2 dropdown-link">
                            <a class="text-decoration-none fw-semibold"
                                href="{{ route('show_history_pendaftaran') }}">Histori Pendaftaran</a>
                        </li>
                        <li class="dropdown-item px-4 py-2 rounded-bottom dropdown-link">
                            <a class="text-decoration-none fw-semibold" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                LogOut
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>


                </div>
            @endif
            <a class="navbar-brand" href="#">                
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNav">
                <ul class="navbar-nav fw-semibold">

                    <div class="guest mb-3 mt-3">
                        @if (!Auth::user())
                            @if (Route::has('login'))
                                <a class="btn btn-rent rounded-5" href="{{ route('login') }}" style="width: 45%">Log
                                    in</a>
                            @endif
                            @if (Route::has('register'))
                                <a class="btn btn-light rounded-5 border" href="{{ route('register') }}"
                                    style="width: 45%">Sign
                                    up</a>
                            @endif
                        @endif


                    </div>
                    <li class="nav-item nav-link-bg">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index_boat') }}">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

</div>
