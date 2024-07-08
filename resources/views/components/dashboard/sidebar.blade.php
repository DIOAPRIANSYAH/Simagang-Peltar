<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('magang.index') }}">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Pendaftar Magang</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('peserta.index') }}">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Peserta Magang</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('lolos-seleksi.index') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Lolos Seleksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('gagal-seleksi.index') }}">
                <i class="icon-contract menu-icon"></i>
                <span class="menu-title">Gagal Seleksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-expanded="true" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Landing Page</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('satker.index') }}">Satuan Kerja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kegiatan_satker.index') }}">Kegiatan Satker</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kualifikasi.index') }}">Kualifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('testimonial.index') }}">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faq.index') }}">FAQ</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
