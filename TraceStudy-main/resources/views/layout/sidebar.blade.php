<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo" style="display: flex; justify-content: center; align-items: center; width: 100%;">
                    <a href="{{ Auth()->user()->role == 'mahasiswa' ? route('mahasiswa.index') : route('dosen.index') }}">
                        <img src="{{ asset('dist/assets/images/logo/TraceStudy.png') }}" alt="Logo" srcset="" class="logo-img" style="max-width: 100%; height: auto; width: 200px;">
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>  
        
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                @if (Auth()->user()->role == 'mahasiswa')
                    <li class="sidebar-item {{ request()->routeIs('mahasiswa.index') ? 'active' : '' }}">
                        <a href="{{ route('mahasiswa.index') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('mahasiswa.alumni') ? 'active' : '' }}">
                        <a href="{{ route('mahasiswa.alumni') }}" class='sidebar-link'>
                            <i class="bi bi-person-fill"></i>
                            <span>Alumni</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('mahasiswa.institusi') ? 'active' : '' }}">
                        <a href="{{ route('mahasiswa.institusi') }}" class='sidebar-link'>
                            <i class="bi bi-building"></i>
                            <span>Institusi</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('mahasiswa.loker') ? 'active' : '' }}">
                        <a href="{{ route('mahasiswa.loker') }}" class='sidebar-link'>
                            <i class="bi bi-briefcase-fill"></i>
                            <span>Lowongan Kerja</span>
                        </a>
                    </li>
                @elseif (Auth()->user()->role == 'dosen')
                    <li class="sidebar-item {{ request()->routeIs('dosen.index') ? 'active' : '' }}">
                        <a href="{{ route('dosen.index') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('dosen.alumni') ? 'active' : '' }}">
                        <a href="{{ route('dosen.alumni') }}" class='sidebar-link'>
                            <i class="bi bi-person-fill"></i>
                            <span>Alumni</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('dosen.institusi') ? 'active' : '' }}">
                        <a href="{{ route('dosen.institusi') }}" class='sidebar-link'>
                            <i class="bi bi-building"></i>
                            <span>Institusi</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('dosen.agenda') ? 'active' : '' }}">
                        <a href="{{ route('dosen.agenda') }}" class='sidebar-link'>
                            <i class="bi bi-calendar"></i>
                            <span>Agenda</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('dosen.loker') ? 'active' : '' }}">
                        <a href="{{ route('dosen.loker') }}" class='sidebar-link'>
                            <i class="bi bi-briefcase-fill"></i>
                            <span>Lowongan Kerja</span>
                        </a>
                    </li>
                @endif
                <li class="sidebar-item">
                    <a href="{{ route('logout') }}" class='sidebar-link' onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>