@extends('layouts.landing-page')
@section('navbar')
    @include('components.landing-page.navbar')
@endsection
@section('main-content')
    <section class="bg-white mt-12">
        <div class="py-3 px-4 items-center">
            <h2 class="text-4xl md:text-4xl text-primary font-bold mb-6 md:mb-8 text-center">Satuan Kerja</h2>
            <p class="text-center text-base md:text-lg text-medium">There are many variations of passages of Lorem Ipsum
                available, but the majority have suffered alteration in some form. There are many variations of passages of
                Lorem Ipsum available, but the majority have suffered alteration in some form. There are many variations of
                passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
        </div>

        <body>
            <div class="card__container swiper">
                <div class="card__content">
                    <div class="swiper-wrapper">
                        @foreach ($satkers as $satker)
                            <article class="card__article swiper-slide">
                                <div class="space-y-2">
                                    <div
                                        class="max-w-xs bg-white border border-white rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-300 md:max-w-md lg:max-w-lg xl:max-w-xl">
                                        <a href="#">
                                            <img class="rounded-t-lg"
                                                src="{{ asset('storage/images/landing-page/card.jpg') }}" alt="" />
                                        </a>
                                        <div class="p-5 bg-white-700">
                                            <a href="#">
                                                <h5
                                                    class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                    {{ $satker->nama_satker }}
                                                </h5>
                                            </a>
                                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 ">
                                                {{ $satker->deskripsi }}
                                            </p>
                                            <div class="flex items-center justify-center py-3">
                                                <!-- Added this div -->
                                                <a href="#"
                                                    class="inline-flex items-center px-10 py-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Read more
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        {{-- <article class="card__article swiper-slide">
                            <div class="space-y-2">
                                <div
                                    class="max-w-xs bg-white border border-white rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-300 md:max-w-md lg:max-w-lg xl:max-w-xl">
                                    <a href="#">
                                        <img class="rounded-t-lg" src="{{ asset('storage/images/landing-page/card.jpg') }}"
                                            alt="" />
                                    </a>
                                    <div class="p-5 bg-white-700">
                                        <a href="#">
                                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                Noteworthy technology acquisitions 2021
                                            </h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            Here are the biggest enterprise technology acquisitions of
                                            2021 so far, in reverse chronological order.
                                        </p>
                                        <div class="flex items-center justify-center py-3">
                                            <!-- Added this div -->
                                            <a href="#"
                                                class="inline-flex items-center px-10 py-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Read more
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="card__article swiper-slide">
                            <div class="space-y-2">
                                <div
                                    class="max-w-xs bg-white border border-white rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-300 md:max-w-md lg:max-w-lg xl:max-w-xl">
                                    <a href="#">
                                        <img class="rounded-t-lg" src="{{ asset('storage/images/landing-page/card.jpg') }}"
                                            alt="" />
                                    </a>
                                    <div class="p-5 bg-white-700">
                                        <a href="#">
                                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                Noteworthy technology acquisitions 2021
                                            </h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            Here are the biggest enterprise technology acquisitions of
                                            2021 so far, in reverse chronological order.
                                        </p>
                                        <div class="flex items-center justify-center py-3">
                                            <!-- Added this div -->
                                            <a href="#"
                                                class="inline-flex items-center px-10 py-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Read more
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="card__article swiper-slide">
                            <div class="space-y-2">
                                <div
                                    class="max-w-xs bg-white border border-white rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-300 md:max-w-md lg:max-w-lg xl:max-w-xl">
                                    <a href="#">
                                        <img class="rounded-t-lg" src="{{ asset('storage/images/landing-page/card.jpg') }}"
                                            alt="" />
                                    </a>
                                    <div class="p-5 bg-white-700">
                                        <a href="#">
                                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                Noteworthy technology acquisitions 2021
                                            </h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            Here are the biggest enterprise technology acquisitions of
                                            2021 so far, in reverse chronological order.
                                        </p>
                                        <div class="flex items-center justify-center py-3">
                                            <!-- Added this div -->
                                            <a href="#"
                                                class="inline-flex items-center px-10 py-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Read more
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="card__article swiper-slide">
                            <div class="space-y-2">
                                <div
                                    class="max-w-xs bg-white border border-white rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-300 md:max-w-md lg:max-w-lg xl:max-w-xl">
                                    <a href="#">
                                        <img class="rounded-t-lg" src="{{ asset('storage/images/landing-page/card.jpg') }}"
                                            alt="" />
                                    </a>
                                    <div class="p-5 bg-white-700">
                                        <a href="#">
                                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                Noteworthy technology acquisitions 2021
                                            </h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            Here are the biggest enterprise technology acquisitions of
                                            2021 so far, in reverse chronological order.
                                        </p>
                                        <div class="flex items-center justify-center py-3">
                                            <!-- Added this div -->
                                            <a href="#"
                                                class="inline-flex items-center px-10 py-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Read more
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article> --}}
                    </div>
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next">
                    <i class="ri-arrow-right-s-line"></i>
                </div>

                <div class="swiper-button-prev">
                    <i class="ri-arrow-left-s-line"></i>
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination mb-2"></div>
            </div>
    </section>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    </body>
    </div>


    </div>
    </div>
    </section>
@endsection
@push('css')
    <style>
        *===============CARD===============*/ .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card__container {
            padding-block: 5rem;
        }

        .card__content {
            margin-inline: 1.75rem;
            border-radius: 1.25rem;
            overflow: hidden;
        }

        .card__article {
            width: 300px;
            /* Remove after adding swiper js */
            border-radius: 1.25rem;
            overflow: hidden;
        }

        .card__image {
            position: relative;
            background-color: var(--first-color-light);
            padding-top: 1.5rem;
            margin-bottom: -.75rem;
        }

        .card__data {
            background-color: var(--container-color);
            padding: 1.5rem 2rem;
            border-radius: 1rem;
            text-align: center;
            position: relative;
            z-index: 10;
        }

        .card__img {
            width: 180px;
            margin: 0 auto;
            position: relative;
            z-index: 5;
        }

        .card__shadow {
            width: 200px;
            height: 200px;
            background-color: var(--first-color-alt);
            border-radius: 50%;
            position: absolute;
            top: 3.75rem;
            left: 0;
            right: 0;
            margin-inline: auto;
            filter: blur(45px);
        }

        .card__name {
            font-size: var(--h2-font-size);
            color: var(--second-color);
            margin-bottom: .75rem;
        }

        .card__description {
            font-weight: 500;
            margin-bottom: 1.75rem;
        }

        .card__button {
            display: inline-block;
            background-color: var(--first-color);
            padding: .75rem 1.5rem;
            border-radius: .25rem;
            color: var(--dark-color);
            font-weight: 600;
        }

        /* Swiper class */
        .swiper-button-prev:after,
        .swiper-button-next:after {
            content: "";
        }

        .swiper-button-prev,
        .swiper-button-next {
            width: initial;
            height: initial;
            font-size: 3rem;
            color: var(--second-color);
            display: none;
        }

        .swiper-button-prev {
            left: 0;
        }

        .swiper-button-next {
            right: 0;
        }

        .swiper-pagination-bullet {
            background-color: hsl(210, 14%, 25%);
            opacity: 1;
        }

        .swiper-pagination-bullet-active {
            background-color: var(--second-color);
        }

        /*=============== BREAKPOINTS ===============*/
        /* For small devices */
        @media screen and (max-width: 320px) {
            .card__data {
                padding: 1rem;
            }
        }

        /* For medium devices */
        @media screen and (min-width: 768px) {
            .card__content {
                margin-inline: 3rem;
            }

            .swiper-button-next,
            .swiper-button-prev {
                display: block;
            }
        }

        /* For large devices */
        @media screen and (min-width: 1120px) {
            .card__container {
                max-width: 1420px;
            }

            .swiper-button-prev {
                left: -1rem;
            }

            .swiper-button-next {
                right: -1rem;
            }
        }
    </style>
@endpush
@push('js')
    <script>
        /*=============== SWIPER JS ===============*/
        let swiperCards = new Swiper(".card__content", {
            autoplay: true,
            spaceBetween: 40,
            grabCursor: true,
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
                600: {
                    slidesPerView: 2,
                },
                968: {
                    slidesPerView: 3,
                },
            },
        });
    </script>
@endpush
@section('footer')
    @include('components.landing-page.footer')
@endsection
