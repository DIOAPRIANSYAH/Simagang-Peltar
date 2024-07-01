@extends('layouts.landing-page')
@section('navbar')
    @include('components.landing-page.navbar')
@endsection
@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper container shadow-2xl my-4">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="card bg-gray-100 shadow rounded-lg">
                        <div class="card-body p-6">
                            <form class="space-y-4" method="POST" action="{{ route('pendaftaran.store') }}" id="magangForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <label for="id_users" class="block text-lg font-bold">Nama Pendaftar</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="status" name="status" placeholder="{{ Auth::user()->name }}"
                                                disabled>
                                        </div>
                                        <div>
                                            <label for="dosen_pembimbing_kampus" class="block text-lg font-bold">Dosen
                                                Pembimbing Kampus</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="dosen_pembimbing_kampus" name="dosen_pembimbing_kampus"
                                                placeholder="{{ Auth::user()->magangs->first()->dosen_pembimbing_kampus }}"
                                                disabled>
                                        </div>
                                        <div>
                                            <label for="satuan_kerja" class="block text-lg font-bold">Satuan Kerja</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="satuan_kerja" name="satuan_kerja"
                                                placeholder="{{ Auth::user()->magangs->first()->satuan_kerja }}" disabled>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="tanggal_mulai" class="block text-lg font-bold">Tanggal Mulai</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="tanggal_mulai" name="tanggal_mulai"
                                                placeholder="{{ Auth::user()->magangs->first()->tanggal_mulai }}" disabled>
                                        </div>
                                        <div>
                                            <label for="tanggal_berakhir" class="block text-lg font-bold">Tanggal
                                                Berakhir</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="tanggal_berakhir" name="tanggal_berakhir"
                                                placeholder="{{ Auth::user()->magangs->first()->tanggal_berakhir }}"
                                                disabled>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="surat_rekomendasi" class="block text-lg font-bold">Surat
                                            Rekomendasi</label>
                                        <div class="flex items-center space-x-4">
                                            <label for="surat_rekomendasi"
                                                class="px-9 py-2 bg-gray-200 rounded cursor-pointer">Surat
                                                Rekomendasi</label>
                                            <input type="file" class="hidden" id="surat_rekomendasi"
                                                name="surat_rekomendasi" accept="application/pdf" disabled>
                                            <input type="text" class="form-control w-3/6 px-4 py-2 border rounded-lg"
                                                value="{{ Auth::user()->magangs->first()->surat_rekomendasi }}" readonly>
                                            <div class="flex space-x-2">
                                                <a href="{{ asset('storage/pdf/surat_rekomendasi/' . Auth::user()->magangs->first()->surat_rekomendasi) }}"
                                                    target="_blank"
                                                    class="py-2 mx-3 px-5 rounded-md text-white  hover:bg-gray-200 hover:text-slate-800 bg-blue-700 transition-all duration-300 ease-in-out">Preview
                                                </a>
                                                <a href="{{ asset('storage/pdf/surat_rekomendasi/' . Auth::user()->magangs->first()->surat_rekomendasi) }}"
                                                    download
                                                    class="py-2 mx-3 px-5 rounded-md text-white  hover:bg-gray-200 hover:text-slate-800 bg-gray-700 transition-all duration-300 ease-in-out">Download
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="proposal" class="block text-lg font-bold">Proposal</label>
                                        <div class="flex items-center space-x-4">
                                            <label for="proposal"
                                                class="px-9 py-2 bg-gray-200 rounded cursor-pointer">Proposal</label>
                                            <input type="file" class="hidden" id="proposal" name="proposal"
                                                accept="application/pdf" disabled>
                                            <input type="text" class="form-control w-3/6 px-4 py-2 border rounded-lg"
                                                value="{{ Auth::user()->magangs->first()->proposal }}" readonly>
                                            <div class="flex space-x-2">
                                                <a href="{{ asset('storage/pdf/proposal/' . Auth::user()->magangs->first()->proposal) }}"
                                                    target="_blank"
                                                    class="py-2 mx-3 px-5 rounded-md text-white  hover:bg-gray-200 hover:text-slate-800 bg-blue-700 transition-all duration-300 ease-in-out">Preview
                                                </a>
                                                <a href="{{ asset('storage/pdf/proposal/' . Auth::user()->magangs->first()->proposal) }}"
                                                    download
                                                    class="py-2 mx-3 px-5 rounded-md text-white  hover:bg-gray-200 hover:text-slate-800 bg-gray-700 transition-all duration-300 ease-in-out">Download
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-end space-x-4">
                                        <a href="{{ route('pendaftar.landingPage') }}"
                                            class="py-2 px-5 rounded-md text-white hover:bg-gray-800 hover:text-white bg-gray-600 transition-all duration-300 ease-in-out">Kembali</a>
                                    </div>
                                </div>
                            </form>
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
@endpush
@push('js')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script>
        document.getElementById('submitButton').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the form from submitting immediately

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyimpan perubahan ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Tersimpan!',
                        'Perubahan Anda telah disimpan.',
                        'success'
                    ).then(() => {
                        document.getElementById('userForm')
                            .submit(); // Submit the form if confirmed
                    });
                }
            });
        });
    </script>
@endpush
@section('footer')
    @include('components.landing-page.footer')
@endsection
