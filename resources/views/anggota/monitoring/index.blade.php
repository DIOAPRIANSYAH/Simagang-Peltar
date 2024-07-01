@extends('layouts.landing-page')
@section('navbar')
    @include('components.landing-page.navbar')
@endsection
@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper container shadow-2xl my-4">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="card bg-gray-100 shadow rounded-lg ">
                        <div class="card-body p-6">
                            <div class="container flex justify-between mx-auto mt-10">
                                <div class="m-2">
                                    <h2
                                        class="font-semibold lg:text-4xl text-3xl my-3 lg:leading-9 md:leading-7 leading-9 text-gray-800 text-center md:text-left">
                                        Monitoring Proses Seleksi</h2>
                                    <title>Lorem ipsum dolor sit amet</title>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem impedit dolorum
                                        <br> aliquid quas autem non ad, reiciendis incidunt quis! Aliquid quas deleniti
                                        autem
                                        <br> veritatis tempore similique iste ex dolores praesentium?
                                    </p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem impedit dolorum
                                        <br> aliquid quas autem non ad, reiciendis incidunt quis! Aliquid quas deleniti
                                        autem
                                        <br> veritatis tempore similique iste ex dolores praesentium?
                                    </p>
                                </div>
                                <div class="md:w-5/12 lg:w-[70%] w-full">
                                    <img src="{{ asset('storage/images/landing-page/monitoring2.svg') }}"
                                        alt="Image of Glass bottle"
                                        class="w-full md:block hidden transform scale-x-[-1] mr-32 opacity-15" />
                                    <img src="{{ asset('storage/images/landing-page/monitoring2.svg') }}"
                                        alt="Image of Glass bottle" class="w-full md:hidden block transform scale-x-[-1]" />
                                </div>
                                <ol class="relative text-gray-500 border-l-[3px] border-gray-600 ml-7" id="stepper">
                                    <li class="step mb-10 ml-6" data-status="Document Submitted">
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 rounded-full -left-4 ring-4 ring-gray-600 bg-gray-800 text-white step-number">
                                            1
                                        </span>
                                        <h3 class="font-medium leading-tight text-slate-900 ml-2 ">Document Submitted</h3>
                                        <p class="text-xs text-slate-500 ml-2 my-2">Lorem ipsum dolor sit amet consectetur
                                            <br> adipisicing elit. Illum blanditiis non earum odit sequi quas aut
                                            dignissimos
                                            <br> cumque obcaecati aliquam iusto accusantium, vitae inventore ipsam. Labore
                                            maxime
                                            <br> vitae animi architecto? Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit.
                                            <br> Doloremque dolores minus asperiores, autem veritatis eaque distinctio,
                                            nobis
                                            <br> nulla tempore reprehenderit aliquam odio laudantium eum ab harum! Corporis
                                            <br> deserunt sit impedit!
                                        </p>
                                    </li>
                                    <li class="step mb-10 ml-6" data-status="On Review">
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 rounded-full -left-4 ring-4 ring-gray-600 bg-gray-800 text-white step-number">
                                            2
                                        </span>
                                        <h3 class="font-medium leading-tight text-slate-900 ml-2">On Review</h3>
                                        <p class="text-xs text-slate-500 ml-2 my-2">Lorem ipsum dolor sit, amet consectetur
                                            <br> adipisicing elit. Dicta, reiciendis culpa quas impedit distinctio dolorem
                                            <br> corrupti adipisci tenetur error, obcaecati consectetur tempore. Facilis
                                            alias,
                                            <br> magni libero harum maxime fugiat consequatur.
                                            @if ($magang)
                                                <p><strong>Status:</strong> {{ $magang->status }}</p>
                                                <!-- Tambahkan tampilan informasi lainnya sesuai kebutuhan -->
                                            @else
                                                <p>Data magang tidak ditemukan.</p>
                                            @endif
                                        </p>
                                    </li>
                                    <li class="step mb-10 ml-6" data-status="Accepted">
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 rounded-full -left-4 ring-4 ring-gray-600 bg-gray-800 text-white step-number">
                                            3
                                        </span>
                                        <h3 class="font-medium leading-tight text-slate-900 ml-2">Accepted</h3>
                                        @if ($magang && $magang->surat_pengantar)
                                            <p class="text-xs text-slate-500 ml-2 my-2">Step details here</p>
                                            <a href="{{ asset('storage/pdf/surat_pengantar/' . $magang->surat_pengantar) }}"
                                                download
                                                class="py-1 mx-2 px-4 rounded-md text-white text-xs  hover:bg-gray-200 hover:text-slate-800 bg-gray-700 transition-all duration-300 ease-in-out">Surat
                                                Pengantar
                                            </a>
                                        @endif
                                    </li>
                                    <li class="step ml-6" data-status="Rejected">
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 rounded-full -left-4 ring-4 ring-gray-600 bg-gray-800 text-white step-number">
                                            4
                                        </span>
                                        <h3 class="font-medium leading-tight text-slate-900 ml-2">Rejected</h3>
                                        <p class="text-xs text-slate-500 ml-2 my-2">Step details here</p>

                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style type="text/css">
        @media (max-width: 767.98px) {
            .text-center-md {
                text-align: center;
            }
        }
    </style>
    <style>
        .step {
            display: none;
        }
    </style>
@endpush
@push('js')
    {{-- {{ Auth::user()->magangs->first()->status }} --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentStatus =
                "{{ $magang ? $magang->status : '' }}; // Ganti dengan status yang diperoleh dari server

            const steps = document.querySelectorAll('.step');
            const stepNumbers = document.querySelectorAll('.step-number');

            // Fungsi untuk menampilkan langkah-langkah yang sesuai dengan status saat ini
            function showSteps(status) {
                let statusReached = false;
                let stepCounter = 1;

                steps.forEach(function(step, index) {
                    const stepStatus = step.getAttribute('data-status');
                    const stepNumber = stepNumbers[index];

                    if (statusReached) {
                        step.style.display = 'none';
                    } else if (status === "Rejected" && stepStatus === "Accepted") {
                        step.style.display =
                            'none'; // Sembunyikan langkah "Accepted" jika status adalah "Rejected"
                    } else if (status === "Accepted" && stepStatus === "Rejected") {
                        step.style.display =
                            'none'; // Sembunyikan langkah "Rejected" jika status adalah "Accepted"
                    } else if (stepStatus === status) {
                        step.style.display = 'block';
                        stepNumber.textContent = stepCounter;
                        statusReached = true;
                    } else {
                        step.style.display = 'block';
                        stepNumber.textContent = stepCounter;
                        stepCounter++;
                    }
                });
            }

            // Menampilkan langkah-langkah sesuai dengan status saat ini
            showSteps(currentStatus);
        });
    </script>
@endpush
@section('footer')
    @include('components.landing-page.footer')
@endsection
