@extends('layouts.landing-page')
@section('navbar')
    @include('components.landing-page.navbar')
@endsection

@section('main-content')
    <section class="bg-white mt-12">
        <div class="py-3 px-4 items-center">
            <h2 class="text-4xl md:text-4xl text-primary font-bold mb-6 md:mb-8 text-center">Statistik Magang</h2>
            <p class="text-center text-base md:text-lg text-medium">There are many variations of passages of Lorem Ipsum
                available, but the majority have suffered alteration in some form. There are many variations of passages of
                Lorem Ipsum available, but the majority have suffered alteration in some form. There are many variations of
                passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
        </div>
        <div class="gap-16 items-center py-3 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-3 lg:px-6">
            <div class="gap-4 mt-8">
                <img class="w-full" src="{{ asset('storage/images/landing-page/statistik.png') }}" alt="miner">

            </div>
            <div class="sm:text-lg sm:py-5 text-black">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">We didn't reinvent the
                    wheel</h2>
                <p class="mb-4 ">We are strategists, designers and developers. Innovators and problem solvers. Small enough
                    to be simple and quick, but big enough to deliver the scope you want at the pace you need. Small enough
                    to be simple and quick, but big enough to deliver the scope you want at the pace you need.</p>
                <p>We are strategists, designers and developers. Innovators and problem solvers. Small enough to be simple
                    and quick.</p>
            </div>

        </div>
        <div class="bg-[#3F3F3F] mt-12">
            <div class="px-4 pt-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
                <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="sm:col-span-2">
                        <span class="text-xl font-bold tracking-wide text-white uppercase">Variations of passages of Lorem
                            Ipsum </span>
                        </a>
                        <div class="mt-6 lg:max-w-sm">
                            <p class="text-sm text-white">
                                Sejalan dengan visi menjadi perusahan energi kelas dunia yang
                                peduli lingkungan, Bukit Asam terus melakukan inovasi dalam
                                bisnis energi berbasis batu bara, renewable energy, dan proyek
                                hilirisasi batu bara.
                            </p>
                        </div>
                    </div>
                    <div class="">
                        <div class="flex items-center p-4">
                            <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                                <svg class="w-6 h-6 fill-current text-green-700" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="flex-grow flex flex-col ml-4">
                                <span class="text-xl text-white font-bold" x-data="animation()" x-init="animate(200)"
                                    x-text="counter">0</span>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Pendaftar</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-4">
                            <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                                <svg class="w-6 h-6 fill-current text-green-700" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="flex-grow flex flex-col ml-4">
                                <span class="text-xl text-white font-bold" x-data="animation()" x-init="animate(200)"
                                    x-text="counter">0</span>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Lolos Seleksi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="flex items-center p-4">
                            <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                                <svg class="w-6 h-6 fill-current text-green-700" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="flex-grow flex flex-col ml-4">
                                <span class="text-xl text-white font-bold" x-data="animation()" x-init="animate(200)"
                                    x-text="counter">0</span>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Pendaftar</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-4">
                            <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                                <svg class="w-6 h-6 fill-current text-green-700" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="flex-grow flex flex-col ml-4">
                                <span class="text-xl text-white font-bold" x-data="animation()" x-init="animate(340)"
                                    x-text="counter">0</span>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-300">Lolos Seleksi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col-reverse justify-center sm:justify-center  lg:flex-row">
            </div>
        </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js"></script>
    <script>
        function animation() {
            return {
                counter: 0,
                animate(finalCount) {
                    let time = 1800; /* Time in milliseconds */
                    let interval = 9;
                    let step = Math.floor((finalCount * interval) / time);
                    let timer = setInterval(() => {
                        this.counter = this.counter + step;
                        if (this.counter >= finalCount + step) {
                            this.counter = finalCount;
                            clearInterval(timer);
                            timer = null;
                            return;
                        }
                    }, interval);
                },
            };
        }
    </script>
@endpush
@section('footer')
    @include('components.landing-page.footer')
@endsection
