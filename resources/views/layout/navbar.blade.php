@php
$date = date('D, d M Y');
@endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Ayam Broiler</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @auth
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/home') }}">Home </a>
                </li>

                <li class="nav-item dropdown {{ Request::is('informasi-pakan', 'perangkat') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        Detail Informasi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('informasi-pakan') }}">Informasi Pakan</a>
                        <a class="dropdown-item" href="{{ url('perangkat') }}">Informasi Perangkat</a>
                        <a class="dropdown-item" href="{{ url('data-kandang') }}">Data Kandang</a>
                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                    </div>
                </li>
                <li class="nav-item {{ Request::is('tambah-kandang') ? 'active' : '' }} ">
                    <a class="nav-link" href="{{ url('/tambah-kandang') }}">Tambah Kandang +</a>
                </li>
            @endauth

        </ul>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#"> {{ $date }}</a>
            </li>

        </ul>
        @auth
            <div class="form-inline">


                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ auth()->user()->name }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        {{-- <a class="dropdown-item" href="#">Profil</a>
                        <a class="dropdown-item" href="#">Ubah Password</a> --}}
                        <form action="/logout" method="post">
                            @csrf

                            <button class=" dropdown-item btn btn-outline-danger me-2"><i class="fas fa-sign-out"></i>
                                Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            {{-- <a class="btn btn-primary btn-sm me-2" href="{{ url('/login') }}"><i class="fas fa-sign-in"></i> Login</a> --}}
        @endauth
    </div>
</nav>
