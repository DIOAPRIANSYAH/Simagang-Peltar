@extends('layouts.landing-page')
@section('navbar')
    @include('components.landing-page.navbar')
@endsection
@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper container shadow-2xl my-4">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="card bg-white shadow rounded-lg">
                        <div class="card-body p-6">
                            <form class="space-y-4" method="POST" action="{{ route('pendaftaran.store') }}" id="magangForm"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <label for="id_users" class="block text-lg font-bold">Nama Pendaftar</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="name" name="name" required value=" {{ Auth::user()->name }}"
                                                placeholder=" {{ Auth::user()->name }}" disabled>
                                        </div>
                                        <div>
                                            <label for="fakultas" class="block text-lg font-bold">
                                                Fakultas</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="fakultas" name="fakultas" placeholder="Ekonomi dan Bisnis" required>
                                        </div>
                                        <div>
                                            <label for="alamat_kampus" class="block text-lg font-bold">
                                                Alamat Kampus</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="alamat_kampus" name="alamat_kampus"
                                                placeholder="Jl.Soekarno-Hatta No.15, Bandar Lampung" required>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                        <div>
                                            <label for="nomor_surat_rekomendasi" class="block text-lg font-bold">
                                                Nomor Surat Rekomendasi</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="nomor_surat_rekomendasi" name="nomor_surat_rekomendasi" placeholder="2112/XII/558/2024" required>
                                        </div>

                                        <div>
                                            <label for="dosen_pembimbing_kampus" class="block text-lg font-bold">Dosen
                                                Pembimbing Kampus</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="dosen_pembimbing_kampus" name="dosen_pembimbing_kampus" placeholder="Dr.Irwansyah" required>
                                        </div>
                                        <div>
                                            <label for="satuan_kerja" class="block text-lg font-bold">Satuan Kerja</label>
                                            <select class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="satuan_kerja" name="satuan_kerja" required>
                                                <option selected>Pilih Satuan Kerja</option>
                                                @foreach ($satkers as $satker)
                                                    <option value="{{ $satker->nama_satker }}">{{ $satker->nama_satker }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="tanggal_mulai" class="block text-lg font-bold">Tanggal Mulai</label>
                                            <input type="date" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="tanggal_mulai" name="tanggal_mulai" required>
                                        </div>
                                        <div>
                                            <label for="tanggal_berakhir" class="block text-lg font-bold">Tanggal
                                                Berakhir</label>
                                            <input type="date" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="tanggal_berakhir" name="tanggal_berakhir" required>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="surat_rekomendasi" class="block text-lg font-bold">Surat Rekomendasi
                                            (PDF)</label>
                                        <div class="flex items-center space-x-4">
                                            <label for="surat_rekomendasi"
                                                class="px-4 py-2 bg-gray-300 hover:bg-gray-700 hover:text-white transition duration-35 ease-in-out rounded cursor-pointer">Upload
                                                Surat
                                                Rekomendasi</label>
                                            <input type="file" class="" id="surat_rekomendasi"
                                                name="surat_rekomendasi" accept="application/pdf">
                                            <input type="text" class="form-control w-3/6 px-4 py-2 border rounded-lg"
                                                readonly>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="proposal" class="block text-lg font-bold">Proposal
                                            (PDF)</label>
                                        <div class="flex items-center space-x-4">
                                            <label for="proposal"
                                                class="px-4 py-2 bg-gray-300 hover:bg-gray-700 hover:text-white transition duration-35 ease-in-out rounded cursor-pointer">Upload
                                                Proposal</label>
                                            <input type="file" class="" id="proposal" name="proposal"
                                                accept="application/pdf">
                                            <input type="text" class="form-control w-3/6 px-4 py-2 border rounded-lg"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="flex justify-end space-x-4">
                                        <a href="{{ route('pendaftar.landingPage') }}"
                                            class="py-2 px-5 rounded-md text-slate-800 hover:bg-gray-700 hover:text-white bg-gray-300 transition-all duration-300 ease-in-out">Batal</a>
                                        <button type="submit"
                                            class="py-2 px-5 rounded-md text-white hover:bg-gray-800 hover:text-white bg-gray-600 transition-all duration-300 ease-in-out">Simpan</button>
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

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Fetching data and populating the dropdowns -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinceDropdown = document.getElementById('provinceDropdown');
            const regencyDropdown = document.getElementById('regencyDropdown');
            const districtDropdown = document.getElementById('districtDropdown');
            const villageDropdown = document.getElementById('villageDropdown');

            // Fetch provinces
            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
                .then(response => response.json())
                .then(provinces => {
                    provinces.forEach(province => {
                        const option = document.createElement('option');
                        option.value = province.name;
                        option.textContent = province.name;
                        option.setAttribute('data-id', province.id);
                        provinceDropdown.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching provinces:', error));

            // Event listener for provinces dropdown
            provinceDropdown.addEventListener('change', function() {
                const provinceId = this.options[this.selectedIndex].getAttribute('data-id');
                regencyDropdown.innerHTML = '<option value="" disabled selected>Pilih Kabupaten</option>';
                regencyDropdown.disabled = true;
                districtDropdown.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';
                districtDropdown.disabled = true;
                villageDropdown.innerHTML = '<option value="" disabled selected>Pilih Desa</option>';
                villageDropdown.disabled = true;

                // Fetch regencies
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                    .then(response => response.json())
                    .then(regencies => {
                        regencies.forEach(regency => {
                            const option = document.createElement('option');
                            option.value = regency.name;
                            option.textContent = regency.name;
                            option.setAttribute('data-id', regency.id);
                            regencyDropdown.appendChild(option);
                        });
                        regencyDropdown.disabled = false;
                    })
                    .catch(error => console.error('Error fetching regencies:', error));
            });

            // Event listener for regencies dropdown
            regencyDropdown.addEventListener('change', function() {
                const regencyId = this.options[this.selectedIndex].getAttribute('data-id');
                districtDropdown.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';
                districtDropdown.disabled = true;
                villageDropdown.innerHTML = '<option value="" disabled selected>Pilih Desa</option>';
                villageDropdown.disabled = true;

                // Fetch districts
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regencyId}.json`)
                    .then(response => response.json())
                    .then(districts => {
                        districts.forEach(district => {
                            const option = document.createElement('option');
                            option.value = district.name;
                            option.textContent = district.name;
                            option.setAttribute('data-id', district.id);
                            districtDropdown.appendChild(option);
                        });
                        districtDropdown.disabled = false;
                    })
                    .catch(error => console.error('Error fetching districts:', error));
            });

            // Event listener for districts dropdown
            districtDropdown.addEventListener('change', function() {
                const districtId = this.options[this.selectedIndex].getAttribute('data-id');
                villageDropdown.innerHTML = '<option value="" disabled selected>Pilih Desa</option>';
                villageDropdown.disabled = true;

                // Fetch villages
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`)
                    .then(response => response.json())
                    .then(villages => {
                        villages.forEach(village => {
                            const option = document.createElement('option');
                            option.value = village.name;
                            option.textContent = village.name;
                            villageDropdown.appendChild(option);
                        });
                        villageDropdown.disabled = false;
                    })
                    .catch(error => console.error('Error fetching villages:', error));
            });
        });
    </script>
@endpush
@section('footer')
    @include('components.landing-page.footer')
@endsection
