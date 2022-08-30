<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Pengaduan tobadak</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">

            {{-- MENU PENGGUNA --}}
            {{-- SEMUA PENGGUNA / USER MEMPUNYAI MENU INI --}}
            <li class="menu-header">Pengguna</li>
            <li class="" id="liDashboard"><a class="nav-link" href="{{ URL::to('/dashboard') }}"><i
                        class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <li class="" id="liProfile"><a class="nav-link" href="{{ URL::to('/profile') }}"><i class="fas fa-user"></i>
                    <span>Profile</span></a></li>
            <li class="" id="liBantuan"><a class="nav-link" href="{{ URL::to('/bantuan') }}"><i
                        class="fas fa-question-circle"></i> <span>Bantuan</span></a></li>



            @if (auth()->user()->role == 'Administrator' || auth()->user()->role == 'sekdes')
            {{-- MENU ADMIN --}}
            <li class="menu-header">MASTER</li>
            <li class="nav-item dropdown " id="liPengguna">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                    <span>Pengguna</span></a>
                    <ul class="dropdown-menu">
                        <li id="liManajemenPengguna"><a class="nav-link" href="/admin/pengguna">Manajemen Pengguna</a></li>
                    </ul>
                </li>

                <li class="" id="liKategori"><a class="nav-link" href="{{ URL::to('/admin/kategori') }}"><i
                    class="fas fa-list"></i> <span>Kategori</span></a></li>
            {{-- END OF MENU ADMIN --}}
            @endif

            @if (auth()->user()->role == 'kepala_desa')
            <li class="menu-header">KEPALA DESA</li>
            <li class="" id="liPengaduan"><a class="nav-link" href="{{ URL::to('/sekdes/pengaduan') }}"><i
                class="fas fa-question-circle"></i> <span>Pengaduan</span></a></li>
            @endif

            @if (auth()->user()->role == 'masyarakat')
            {{-- MENU ADMIN --}}
            <li class="menu-header">Masyarakat</li>
            <li class="" id="liPengaduan"><a class="nav-link" href="{{ URL::to('/masyarakat/pengaduan') }}"><i
                class="fas fa-question-circle"></i> <span>Pengaduan</span></a></li>
            {{-- END OF MENU ADMIN --}}
            @endif

            @if (auth()->user()->role == 'sekdes')
            {{-- MENU ADMIN --}}
            <li class="menu-header">Sekdes</li>
            <li class="" id="liPengaduan"><a class="nav-link" href="{{ URL::to('/sekdes/pengaduan') }}"><i
                class="fas fa-arrow-right"></i> <span>Pengaduan</span></a></li>
            {{-- END OF MENU ADMIN --}}
            @endif







        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ URL::to('/logout') }}" class="btn bg-main text-white btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>
