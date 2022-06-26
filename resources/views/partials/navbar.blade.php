<!-- start: Navbar -->
<nav class="mb-4 px-3 py-2 bg-white rounded shadow">
    <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
    <h5 class="fw-bold mb-0 me-auto">Dashboard</h5>
    {{-- <div class="dropdown me-3 d-none d-sm-block">
        <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown" style="margin-right: -20px">
            <i class="ri-notification-line"></i>
        </div>
        <div class="dropdown-menu fx-dropdown-menu">
            <h5 class="p-3 bg-indigo text-light">Notification</h5>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                    <div class="me-auto">
                        <div class="fw-semibold">Rental Mobil GG Tambah Armada Matic</div>
                        <span class="fs-7">Content</span>
                    </div>
                    <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                    <div class="me-auto">
                        <div class="fw-semibold">Report Bulanan Perentalan</div>
                        <span class="fs-7">Content</span>
                    </div>
                    <span class="badge bg-primary rounded-pill">14</span>
                </a>
            </div>
        </div>
    </div> --}}
    @guest
        <div class="d-flex flex-row w-10">
            @if (Route::has('login'))
                    <a class="nav-link btn btn-primary mx-3 my-2 p-2 text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
            
            @endif
            @if (Route::has('register'))
                    <a class="nav-link btn btn-danger p-2 my-2 text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        </div>
    @else
    <div class="dropdown">
        <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger mx-2">Logout</button>
            </form>
            <span class="me-2 d-none d-sm-block">{{ Auth::user()->name }}</span>
            <a href='#' target='_blank'><img class="navbar-profile-image" src='https://i.postimg.cc/gwMXZQj1/1.jpg' border='0' alt='1'/></a>
        </div>
        {{-- <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton1">
            <li>
                <!-- <li class="sidebar-menu-item has-dropdown"></li> -->
                <a class="dropdown-item" href="#">  
                    <i class="ri-user-line"></i>
                    Profil
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="ri-list-settings-line"></i> Setting
                </a>
            </li>
            <li class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            </li>
        </ul> --}}
    </div>
    @endguest
</nav>
<!-- end: Navbar -->