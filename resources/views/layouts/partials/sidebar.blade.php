<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ Request::is('dashboard') ? "active" : ""}}">
                <a href="{{ route('dashboard') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
            {{-- Karyawan --}}
            {{-- @if (Auth::user()->role == 'pegawai') --}}
                <li class="{{ Request::is('travel') ? "active" : ""}}">
                    <a href="{{ route('travel.index') }}">
                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                        <span class="pcoded-mtext">Wisata</span>
                    </a>
                </li>
            {{-- @endif --}}
            {{-- Admin --}}
            {{-- @if (Auth::user()->role == 'admin') --}}
            <li class="{{ Request::is('order') ? "active" : ""}}">
                <a href="{{ route('order.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Pesanan</span>
                </a>
            </li>
            <li class="{{ Request::is('user') ? "active" : ""}}">
                <a href="{{ route('user.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Karyawan</span>
                </a>
            </li>
            {{-- @endif --}}
        </ul>
    </div>
</nav>
