<!-- Navigasi Bar/Header -->
<nav
    class="bg-white border-gray-800 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:dark:bg-gray-900 w-full transition duration-300 ease-in-out">
    <div
        class="max-w-screen-xl flex flex-wrap md:flex md:flex-wrap items-center justify-end md:justify-between mx-auto p-2">
        <a href="#" class="flex items-center invisible md:visible">
            <img src="{{ asset('storage/images/landing-page/logo-ptba-white.png') }}" class="mr-3" width="180"
                height="150" alt="PTBA Logo" />
        </a>
        <div class="flex items-center md:order-2">
            <!-- Tombol dan menu untuk pengguna yang belum login -->
            @guest
                <a href="{{ route('login') }}"
                    class="py-2 px-5 rounded-md text-white hover:bg-gray-200 bg-gray-800 hover:text-slate-800 transition-all duration-300 ease-in-out">
                    Login
                </a>
                <a href="{{ route('login') }}"
                    class="py-2 mx-3 px-5 rounded-md text-white hover:bg-gray-200 hover:text-slate-800 bg-gray-700 transition-all duration-300 ease-in-out">
                    Daftar
                </a>
            @endguest

            <!-- Tombol dan menu untuk pengguna yang sudah login -->
            @auth
                <button
                    class="flex mr-1 text-sm bg-gray-800 rounded-full md:mr-2 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                    @if (Auth::check() && Auth::user()->type == 3)
                        @if (Auth::user()->foto)
                            <img class="w-8 h-8 rounded-full"
                                src="{{ asset('storage/images/anggota/' . Auth::user()->foto) }}" alt="user photo" />
                        @else
                            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/images/placeholder/avatar.png') }}"
                                alt="user photo" />
                        @endif
                    @else
                        @if (Auth::user()->foto)
                            <img class="w-8 h-8 rounded-full"
                                src="{{ asset('storage/images/users/' . Auth::user()->foto) }}" alt="user photo" />
                        @else
                            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/images/placeholder/avatar.png') }}"
                                alt="user photo" />
                        @endif
                    @endif

                </button>

                <button type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    @if (Auth::check() && Auth::user()->type == 3)
                        <h4 class="text-white px-2">{{ Auth::user()->nama }}</h4>
                    @else
                        <h4 class="text-white px-2">{{ Auth::user()->name }}</h4>
                    @endif
                </button>

                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        @if (Auth::check() && Auth::user()->type == 3)
                            <span class="block text-sm text-white dark:text-white">{{ Auth::user()->nama }}</span>
                        @else
                            <span class="block text-sm text-white dark:text-white">{{ Auth::user()->name }}</span>
                        @endif
                        <span class="block text-sm text-white truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">

                        <li>
                            @if (Auth::check() && Auth::user()->type == 3)
                                <a href="{{ route('anggota.profile.edit', Auth::user()->getEncryptedId()) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Profile
                                </a>
                            @else
                                <a href="{{ route('profile.edit', Auth::user()->getEncryptedId()) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Profile
                                </a>
                            @endif

                        </li>
                        <li>
                            @php
                                $jumlahAnggota = Auth::user()->anggotas()->count();
                            @endphp
                            @if (Auth::check() && Auth::user()->type == 3)
                            @else
                                @if ($jumlahAnggota >= 2)
                                    <a href="javascript:void(0)" id="tambahAnggotaLink"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Tambah Anggota
                                    </a>
                                @else
                                    <a href="{{ route('anggota.create') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Tambah Anggota
                                    </a>
                                @endif
                            @endif

                        </li>
                        @if (Auth::check() && Auth::user()->type == 3)
                        @else
                            @if (Auth::user()->anggotas()->exists())
                                <li>
                                    <a href="{{ route('anggota.index') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Anggota
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="javascript:void(0)" id="tambahAnggotaLink"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Anggota
                                    </a>
                                </li>
                            @endif
                        @endif

                        @if (Auth::user()->magangs()->where('id_users', Auth::id())->exists())
                            <li>
                                <a href="{{ route('monitoring.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Monitoring Seleksi
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="javascript:void(0)" id="monitoringLink"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Monitoring Seleksi
                                </a>
                            </li>
                        @endif


                        @if (Auth::check() && Auth::user()->type == 3)
                        @else
                            @if (Auth::user()->testimonials()->where('id_users', Auth::id())->exists())
                                <li>
                                    <a href="{{ route('testimonial.pendaftar.index') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Testimonial
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('testimonial.pendaftar.create') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Testimonial
                                    </a>
                                </li>
                            @endif
                        @endif

                        {{-- <li>
                            @php
                                // Mengambil magang pengguna yang diautentikasi dengan status 'Accepted'
                                $userMagang = Auth::user()->magangs()->where('status', 'Accepted')->first();
                            @endphp

                            @if ($userMagang)
                                <a href="{{ route('projek.create', $userMagang->getEncryptedId()) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Projek
                                </a>
                            @else
                                <a href="#" onclick="showAlert()"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Projek
                                </a>
                            @endif
                        </li> --}}
                        <li>
                            <form id="logout-form" method="POST" action="{{ route('pendaftar.logout') }}">
                                @csrf
                                <a role="menuitem"
                                    class="dropdown-item cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        @if (Auth::check() && Auth::user()->type == 3)
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border md:flex-row md:space-x-8 md:mt-0 md:border-0">
                    <li>
                        <a href="{{ route('anggota.beranda') }}"
                            class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition-all duration-300 ease-in-out"
                            aria-current="page">Beranda</a>
                    </li>
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="500"
                            data-dropdown-trigger="hover"
                            class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 space-x-2 transition-all duration-300 ease-in-out"
                            type="button">
                            <a href="{{ route('anggota.satker') }}">Satuan Kerja</a>
                            {{-- <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                        class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg> --}}
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownDelay"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDelayButton">
                                @foreach ($satkers as $satker)
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            {{ $satker->nama_satker }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <li>
                        <a href="{{ route('anggota.statistik') }}"
                            class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition-all duration-300 ease-in-out">Statistik</a>
                    </li>
                    <li>
                        <a href="{{ route('anggota.tentangKami') }}"
                            class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition-all duration-300 ease-in-out">Tentang
                            Kami</a>
                    </li>
                    <li>
                        <a href="{{ route('anggota.hubungiKami') }}"
                            class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition-all duration-300 ease-in-out">Hubungi
                            Kami</a>
                    </li>
                </ul>
            </div>
        @else
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border md:flex-row md:space-x-8 md:mt-0 md:border-0">
                    <li>
                        <a href="{{ route('beranda') }}"
                            class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition-all duration-300 ease-in-out"
                            aria-current="page">Beranda</a>
                    </li>
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay"
                            data-dropdown-delay="500" data-dropdown-trigger="hover"
                            class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 space-x-2 transition-all duration-300 ease-in-out"
                            type="button">
                            <a href="{{ route('satker') }}">Satuan Kerja</a>
                            {{-- <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg> --}}
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownDelay"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDelayButton">
                                @foreach ($satkers as $satker)
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            {{ $satker->nama_satker }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <li>
                        <a href="{{ route('statistik') }}"
                            class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition-all duration-300 ease-in-out">Statistik</a>
                    </li>
                    <li>
                        <a href="{{ route('tentangKami') }}"
                            class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition-all duration-300 ease-in-out">Tentang
                            Kami</a>
                    </li>
                    <li>
                        <a href="{{ route('hubungiKami') }}"
                            class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 transition-all duration-300 ease-in-out">Hubungi
                            Kami</a>
                    </li>
                </ul>
            </div>
        @endif


    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showAlert() {
        Swal.fire({
            title: 'Peringatan',
            text: 'Halaman Ini Untuk Pendaftar Lolos Seleksi',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var monitoringLink = document.getElementById("monitoringLink");
        if (monitoringLink) {
            monitoringLink.addEventListener("click", function() {
                Swal.fire({
                    title: "Belum Mengisi Formulir Magang",
                    text: "Silakan lengkapi formulir magang terlebih dahulu.",
                    icon: "question"
                }).then((result) => {
                    if (result.isConfirmed) {

                    }
                });
            });
        }

        var tambahAnggotaLink = document.getElementById("tambahAnggotaLink");
        if (tambahAnggotaLink) {
            tambahAnggotaLink.addEventListener("click", function() {
                Swal.fire({
                    title: "Belum Menambahkan Anggota",
                    text: "Silakan tambahkan anggota terlebih dahulu.",
                    icon: "question"
                }).then((result) => {
                    if (result.isConfirmed) {

                    }
                });
            });
        }

        var tambahAnggotaLink = document.getElementById("tambahAnggotaLink");
        if (tambahAnggotaLink) {
            tambahAnggotaLink.addEventListener("click", function() {
                @if ($jumlahAnggota >= 2)
                    Swal.fire({
                        title: "Anda sudah mencapai jumlah anggota maksimal",
                        icon: "warning"
                    });
                @endif
            });
        }
    });
</script>
