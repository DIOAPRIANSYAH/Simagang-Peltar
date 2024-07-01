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
                            <form class="space-y-4" id="projekForm" method="POST" action="{{ route('projek.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="space-y-4">
                                    <h4 class="text-2xl text-white px-4 py-2 rounded bg-gray-700 mb-5">Data Projek
                                    </h4>

                                    <!-- Judul -->
                                    <div>
                                        <label for="judul" class="block text-lg font-bold">Judul Projek</label>
                                        <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                            id="judul" name="judul" required>
                                    </div>

                                    <!-- Jenis -->
                                    <div>
                                        <label for="jenis" class="block text-lg font-bold">Jenis Projek</label>
                                        <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                            id="jenis" name="jenis" required>
                                    </div>

                                    <!-- Status -->
                                    <div>
                                        <label for="status" class="block text-lg font-bold">Status Projek</label>
                                        <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                            id="status" name="status" required>
                                    </div>


                                    <!-- Link Github -->
                                    <div>
                                        <label for="link_github" class="block text-lg font-bold">Link Github</label>
                                        <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                            id="link_github" name="link_github" required>
                                    </div>

                                    <!-- Dokumentasi Pengerjaan -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <label for="dokumentasi_pengerjaan1" class="block text-lg font-bold">Dokumentasi
                                                Pengerjaan 1</label>
                                            <input type="file" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="dokumentasi_pengerjaan1" name="dokumentasi_pengerjaan1" accept="image/*"
                                                required data-preview="preview1">
                                        </div>
                                        <div>
                                            <label for="dokumentasi_pengerjaan2" class="block text-lg font-bold">Dokumentasi
                                                Pengerjaan 2</label>
                                            <input type="file" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="dokumentasi_pengerjaan2" name="dokumentasi_pengerjaan2" accept="image/*"
                                                required data-preview="preview2">
                                        </div>
                                        <div>
                                            <label for="dokumentasi_pengerjaan3" class="block text-lg font-bold">Dokumentasi
                                                Pengerjaan 3</label>
                                            <input type="file" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="dokumentasi_pengerjaan3" name="dokumentasi_pengerjaan3" accept="image/*"
                                                required data-preview="preview3">
                                        </div>
                                    </div>

                                    <!-- Preview Gambar -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <img class="rounded" id="preview1" src="https://via.placeholder.com/200"
                                                alt="Preview 1"
                                                style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                        </div>
                                        <div>
                                            <img class="rounded" id="preview2" src="https://via.placeholder.com/200"
                                                alt="Preview 2"
                                                style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                        </div>
                                        <div>
                                            <img class="rounded" id="preview3" src="https://via.placeholder.com/200"
                                                alt="Preview 3"
                                                style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                        </div>
                                    </div>

                                    <!-- Button Simpan -->
                                    <div>
                                        <button type="submit"
                                            class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
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
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function() {
                const img = new Image();
                img.src = reader.result;

                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    canvas.width = 200;
                    canvas.height = 200;

                    ctx.drawImage(img, 0, 0, 200, 200);

                    const previewId = input.getAttribute('data-preview');
                    const preview = document.getElementById(previewId);
                    preview.src = canvas.toDataURL('image/jpeg');
                };
            };

            reader.readAsDataURL(input.files[0]);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input[type="file"]');
            inputs.forEach(function(input) {
                input.addEventListener('change', previewImage);
            });
        });
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
