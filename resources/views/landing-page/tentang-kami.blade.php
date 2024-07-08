@extends('layouts.landing-page')
@section('navbar')
    @include('components.landing-page.navbar')
@endsection
@section('main-content')
    {{-- Testimonials --}}
    <section class="py-24 ">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="flex justify-center items-center gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-8 max-w-sm sm:max-w-2xl lg:max-w-full mx-auto">

                <div class="order-last md:order-first w-full lg:w-3/5">
                    <!--Slider wrapper-->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($testimonials as $testimonial)
                                <div
                                    class="swiper-slide group bg-white border border-solid border-gray-300 rounded-2xl max-sm:max-w-sm max-sm:mx-auto p-6 transition-all duration-500 hover:shadow-lg">
                                    <div class="flex items-center gap-5 mb-5 sm:mb-9">
                                        <img src="{{ asset('storage/images/placeholder/avatar.png') }}" alt="avatar">
                                        <div class="grid gap-1">
                                            <h5 class="text-gray-900 font-medium transition-all duration-500">
                                                {{ $testimonial->user->name }}</h5>
                                            <span
                                                class="text-sm leading-6 text-gray-700">{{ $testimonial->user->nama_sekolah }}</span>

                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center mb-5 sm:mb-9 gap-2 text-amber-500 transition-all duration-500">
                                        @for ($i = 1; $i <= $testimonial->rate; $i++)
                                            <svg class="w-5 h-5" viewBox="0 0 18 17" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.10326 1.31699C8.47008 0.57374 9.52992 0.57374 9.89674 1.31699L11.7063 4.98347C11.8519 5.27862 12.1335 5.48319 12.4592 5.53051L16.5054 6.11846C17.3256 6.23765 17.6531 7.24562 17.0596 7.82416L14.1318 10.6781C13.8961 10.9079 13.7885 11.2389 13.8442 11.5632L14.5353 15.5931C14.6754 16.41 13.818 17.033 13.0844 16.6473L9.46534 14.7446C9.17402 14.5915 8.82598 14.5915 8.53466 14.7446L4.91562 16.6473C4.18199 17.033 3.32456 16.41 3.46467 15.5931L4.15585 11.5632C4.21148 11.2389 4.10393 10.9079 3.86825 10.6781L0.940384 7.82416C0.346867 7.24562 0.674378 6.23765 1.4946 6.11846L5.54081 5.53051C5.86652 5.48319 6.14808 5.27862 6.29374 4.98347L8.10326 1.31699Z" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <p
                                        class="text-sm text-gray-500 leading-6 transition-all duration-500 min-h-24 group-hover:text-gray-800">
                                        {{ $testimonial->keterangan }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-2/5">
                    <span class="text-sm text-gray-500 font-medium mb-4 block">Testimonial</span>
                    <h2 class="font-semibold lg:text-4xl text-3xl lg:leading-9 md:leading-7 leading-9 text-gray-800">
                        Apa Kata Mereka ?</h2>
                    <h3 class="font-semibold lg:text-2xl text-xl lg:leading-9 md:leading-7 leading-9 text-gray-700">
                        Magang di Bukit Asam Unit Pelabuhan Tarahan</h3>
                    <div class="mt-4 flex md:justify-between md:items-start md:flex-row flex-col justify-start items-start">
                        <div class="">
                            <p class="font-normal text-base leading-6 text-gray-600 lg:w-8/12 md:w-9/12">
                                Here are few of the most frequently asked questions by our Internship Students</p>
                        </div>

                    </div>
                    <!-- Slider controls -->
                    <div class="flex items-center justify-center lg:justify-end gap-10 invisible md:visible">
                        <button id="slider-button-left"
                            class="bg-gray-600 swiper-button-prev group flex justify-center items-center w-12 h-12 transition-all duration-500 rounded-lg hover:bg-gray-800"
                            data-carousel-prev>
                            <svg class="h-6 w-6 text-white group-hover:text-white" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.9999 12L4.99992 12M9.99992 6L4.70703 11.2929C4.3737 11.6262 4.20703 11.7929 4.20703 12C4.20703 12.2071 4.3737 12.3738 4.70703 12.7071L9.99992 18"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </button>
                        <button id="slider-button-right"
                            class="swiper-button-next bg-gray-600 group flex justify-center items-center w-12 h-12 transition-all duration-500 rounded-lg hover:bg-gray-800"
                            data-carousel-next>
                            <svg class="h-6 w-6 text-white group-hover:text-white" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 12L19 12M14 18L19.2929 12.7071C19.6262 12.3738 19.7929 12.2071 19.7929 12C19.7929 11.7929 19.6262 11.6262 19.2929 11.2929L14 6"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" />
    <style>
        .swiper-button-prev:after,
        .swiper-rtl .swiper-button-next:after {
            content: '' !important;
        }

        .swiper-button-next:after,
        .swiper-rtl .swiper-button-prev:after {
            content: '' !important;
        }

        .swiper-button-next svg,
        .swiper-button-prev svg {
            width: 24px !important;
            height: 24px !important;
        }

        .swiper-button-next,
        .swiper-button-prev {
            position: relative !important;
            margin-top: 32px;
        }

        .swiper-slide.swiper-slide-active {
            --tw-border-opacity: 1 !important;
            border-color: rgb(79 70 229 / var(--tw-border-opacity)) !important;
        }

        .swiper-slide.swiper-slide-active>.swiper-slide-active\:text-indigo-600 {
            --tw-text-opacity: 1;
            color: rgb(79 70 229 / var(--tw-text-opacity));
        }

        .swiper-slide.swiper-slide-active>.flex .grid .swiper-slide-active\:text-indigo-600 {
            --tw-text-opacity: 1;
            color: rgb(79 70 229 / var(--tw-text-opacity));
        }

        .swiper-pagination-bullet {
            background-color: hsl(210, 14%, 25%);
            opacity: 1;
            transform: translateY(10px);
            /* Menggeser pagination ke bawah sebanyak 10px */
        }

        .swiper-pagination-bullet-active {
            background-color: var(--second-color);
        }
    </style>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap");

        /* Variables */
        :root {
            --white: #fff;
            --black: #1c2b2d;
            --blue: #31326f;
            --light-blue: #005490;
            --color-primary: #9d0191;
            --color-sec: #2e2e2d;
            --color-grey: #eee;
            --color-dark-grey: #222831;
        }

        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            /* font-size: calc(1rem - 8px); */
            /* Mengurangi ukuran font sebanyak 1px */

        }

        /* Timeline Section */
        .timeline {
            width: 100%;
            overflow: hidden;
        }

        .timeline ul {
            padding: 5rem 0;
        }

        .timeline ul li {
            list-style: none;
            position: relative;
            width: 9px;
            margin: 0 auto;
            padding-top: 5rem;
            background: var(--color-sec);
        }

        .timeline ul li::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            background: inherit;
        }

        .timeline ul li .card_timeline {
            width: 67rem;
            font-size: 1.2rem;
            position: relative;
            bottom: 0;
            padding: 1.5rem;
            background: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            visibility: hidden;
            opacity: 0;
            transition: all 0.5s ease-in-out;
        }

        .timeline ul li:nth-child(odd) .card_timeline {
            left: 45px;
            transform: translateX(20rem);
        }

        .timeline ul li:nth-child(even) .card_timeline {
            left: -570px;
            transform: translateX(-20rem);
        }

        .timeline ul li .card_timeline::before {
            content: "";
            position: absolute;
            bottom: 7px;
            width: 0;
            height: 0;
            border-style: solid;
        }

        .timeline ul li:nth-child(odd) .card_timeline::before {
            border-color: transparent var(--color-primary) transparent transparent;
        }

        .timeline ul li:nth-child(even) .card_timeline::before {

            border-color: transparent transparent transparent var(--color-sec);
        }

        time {
            display: block;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .timeline ul li.slide-in .card_timeline {
            transform: none;
            visibility: visible;
            opacity: 1;
        }

        .timeline ul li.slide-in::after {
            background: var(--white);
            border: 4px solid var(--color-sec);
        }

        /* Media Queries */
        @media screen and (max-width: 900px) {
            .timeline ul li .card_timeline {
                width: 25rem;
            }

            .timeline ul li:nth-child(even) .card_timeline {
                left: -289px;
            }
        }

        @media screen and (max-width: 600px) {
            .timeline ul li {
                margin-left: 2rem;
            }

            .timeline ul li .card_timeline {
                width: calc(100vw - 91px);
            }

            .timeline ul li:nth-child(even) .card_timeline {
                left: 45px;
            }

            .timeline ul li:nth-child(even) .card_timeline::before {

                border-color: transparent var(--color-sec) transparent transparent;
            }
        }
    </style>
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js"></script>
    <script src="https://kit.fontawesome.com/1935d064dd.js" crossorigin="anonymous"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            autoplay: true,
            slidesPerView: 2,
            spaceBetween: 28,
            centeredSlides: false,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    centeredSlides: false,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 28,
                    centeredSlides: false,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 32,
                },
            },
        });

        // Menggeser pagination ke bawah sebanyak 10px
        document.querySelector('.swiper-pagination').style.transform = 'translateY(40px)';
    </script>
    <script>
        function animation() {
            return {
                counter: 0,
                animate(finalCount) {
                    let time = 1500; /* Time in milliseconds */
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
    <script>
        (function() {
            const items = document.querySelectorAll(".timeline li");

            function isElementInViewport(el) {
                let rect = el.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <=
                    (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }

            function slideIn() {
                for (let i = 0; i < items.length; i++) {
                    if (isElementInViewport(items[i])) {
                        items[i].classList.add("slide-in");
                    } else {
                        items[i].classList.remove("slide-in");
                    }
                }
            }

            window.addEventListener("load", slideIn);
            window.addEventListener("scroll", slideIn);
            window.addEventListener("resize", slideIn);
        })();
    </script>
@endpush
@section('footer')
    @include('components.landing-page.footer')
@endsection
