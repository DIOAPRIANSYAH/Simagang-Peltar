@extends('layouts.landing-page')
@section('navbar')
    @include('components.landing-page.navbar')
@endsection
@section('main-content')
    <section class="relative sm:py-10 w-full 2xl:overflow-hidden">
        <div class="flex items-center text-white">
            <div class="container">
                <div class="absolute inset-0 -z-10">
                    <!-- Swiper -->
                    <div id="testi_3" class="swiper-container bg-cover bg-center">
                        <div class="swiper-wrapper relative">
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/images/landing-page/hero1.jpeg') }}"
                                    class="2xl:h-[970px] h-[500px] w-full sm:h-[400px] md:h-[970px]" alt="" />
                                <div class="absolute inset-0 bg-gray-950/70"></div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/images/landing-page/hero5.jpg') }}"
                                    class="2xl:h-[970px] h-[500px] w-full sm:h-[400px] md:h-[970px]" alt="" />
                                <div class="absolute inset-0 bg-gray-950/70"></div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/images/landing-page/hero2.png') }}"
                                    class="2xl:h-[970px] h-[500px] w-full sm:h-[400px] md:h-[970px]" alt="" />
                                <div class="absolute inset-0 bg-gray-950/70"></div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/images/landing-page/hero4.jpg') }}"
                                    class="2xl:h-[970px] h-[500px] w-full sm:h-[400px] md:h-[970px]" alt="" />
                                <div class="absolute inset-0 bg-gray-950/70"></div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/images/landing-page/hero3.png') }}"
                                    class="2xl:h-[970px] h-[500px] w-full sm:h-[400px] md:h-[970px]" alt="" />
                                <div class="absolute inset-0 bg-gray-950/70"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @guest
                    <div class="relative text-center md:text-left max-w-2xl px-4 pt-20 md:pt-40">
                        <span class="text-base font-normal uppercase tracking-wider">BUMN | MIND-ID</span>
                        <h1 class="2xl:text-6xl/tight md:text-5xl/tight text-4xl/tight font-medium tracking-wide mt-5">
                            Magang di PT. Bukit Asam Unit Pelabuhan Tarahan
                        </h1>

                        <p class="text-base/relaxed text-white/60 my-7">
                            These cases are perfectly simple and easy to distinguish. In a
                            free hour when our power of choice is untrammelled and when
                            nothing prevents our being able to do what we like best every
                            pleasure.
                        </p>

                        <a href="{{ route('register.anggota') }}"
                            class="py-3 px-8 rounded-md text-slate-800 hover:bg-gray-800 hover:text-white bg-gray-200  hover:border-white hover:border-4 transition-all duration-200 ease-out">Daftar
                            Anggota</a>
                    </div>
                @endguest

                @auth
                    <div class="relative text-center md:text-left max-w-2xl px-4 pt-20 md:pt-40">
                        <span class="text-base font-normal uppercase tracking-wider">BUMN | MIND-ID</span>
                        <h1 class="2xl:text-6xl/tight md:text-5xl/tight text-4xl/tight font-medium tracking-wide mt-5">
                            Halo, Selamat Datang
                        </h1>
                        @if (Auth::check() && Auth::user()->type == 3)
                            <h1 class="2xl:text-6xl/tight md:text-4xl/tight text-4xl/tight font-medium tracking-wide">
                                {{ Auth::user()->nama }}
                            </h1>
                        @else
                            <h1 class="2xl:text-6xl/tight md:text-4xl/tight text-4xl/tight font-medium tracking-wide">
                                {{ Auth::user()->name }}
                            </h1>
                        @endif


                        <p class="text-base/relaxed text-white/60 my-7">
                            These cases are perfectly simple and easy to distinguish. In a
                            free hour when our power of choice is untrammelled and when
                            nothing prevents our being able to do what we like best every
                            pleasure.
                        </p>

                        {{-- Memeriksa apakah pengguna sudah memiliki entri pada tabel Magang --}}
                        @if (Auth::user()->magangs()->where('id_users', Auth::id())->exists())
                            <a href="{{ route('pendaftaran.index') }}"
                                class="py-3 px-8 rounded-md text-slate-800 hover:bg-gray-800 hover:text-white bg-gray-200 hover:border-white hover:border-4 transition-all duration-200 ease-out">
                                Lihat Riwayat Pendaftaran
                            </a>
                        @elseif (Auth::user()->type == 3)
                            <a href="{{ route('anggota.monitoring') }}"
                                class="py-3 px-8 rounded-md text-slate-800 hover:bg-gray-800 hover:text-white bg-gray-200 hover:border-white hover:border-4 transition-all duration-200 ease-out">
                                Monitoring Seleksi
                            </a>
                        @else
                            <a href="{{ route('pendaftaran.create') }}"
                                class="py-3 px-8 rounded-md text-slate-800 hover:bg-gray-800 hover:text-white bg-gray-200 hover:border-white hover:border-4 transition-all duration-200 ease-out">
                                Daftar Magang
                            </a>
                        @endif

                    </div>
                @endauth

                <div class="flex text-center md:text-right 2xl:pt-72 md:pt-56">
                    <div class="pagination mt-10"></div>
                </div>
            </div>
            <!-- Container End -->
        </div>
    </section>
@endsection
@section('footer')
    @include('components.landing-page.footer')
@endsection
