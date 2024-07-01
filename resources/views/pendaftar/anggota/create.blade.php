@extends('layouts.landing-page')
@section('navbar')
    @include('components.landing-page.navbar')
@endsection
@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper container my-4">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert" id="alert-border-1">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Ensure that these requirements are met:</span>
                            <ul class="mt-1.5 list-disc list-inside">
                                <li>Foto yang di upload dapat berupa format (JPEG, JPG & PNG) dan ukuran 200x200.</li>
                                <li>Pastikan email dan nomor telepon masih aktif dan fapat di hubungi.</li>
                                <li>Curriculum Vitae dapa di upload dengan menggunakan format PDF.</li>
                            </ul>
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-border-1" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-panel">
        <div class="content-wrapper container shadow-2xl my-4">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="card bg-white shadow rounded-lg">
                        <div class="card-body p-6">
                            <form class="space-y-4" method="POST" action="{{ route('anggota.store') }}" id="userForm"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="space-y-4">
                                    <div>
                                        <label for="foto" class="block text-lg font-bold">Foto Profil</label>
                                        <img class="rounded border border-gray-400 mb-3" id="preview"
                                            src="https://via.placeholder.com/200" alt="Avatar Dummy"
                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                        <div class="flex items-center space-x-4">
                                            <label for="foto"
                                                class="px-4 py-2  bg-gray-300 hover:bg-gray-700 hover:text-white transition duration-35 ease-in-out rounded cursor-pointer">Upload</label>
                                            <input type="file" class="" id="foto" name="foto"
                                                onchange="previewImage(event)">
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                readonly>

                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <label for="nama" class="block text-lg font-bold">Nama</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="nama" name="nama" required>
                                        </div>
                                        <div>
                                            <label for="email" class="block text-lg font-bold">Email</label>
                                            <input type="email" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="email" name="email" required>
                                        </div>
                                        <div>
                                            <label for="jenis_kelamin" class="block text-lg font-bold">Jenis Kelamin</label>
                                            <select class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="jenis_kelamin" name="jenis_kelamin">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki
                                                </option>
                                                <option value="Perempuan">Perempuan
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <label for="no_hp" class="block text-lg font-bold">No HP</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="no_hp" name="no_hp">
                                        </div>
                                        <div>
                                            <label for="nomor_induk" class="block text-lg font-bold">Nomor Induk</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="nomor_induk" name="nomor_induk">
                                        </div>
                                        <div>
                                            <label for="jurusan" class="block text-lg font-bold">Jurusan</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="jurusan" name="jurusan">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="provinceDropdown" class="block text-lg font-bold">Pilih
                                                Provinsi</label>
                                            <select class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="provinceDropdown" name="provinsi">
                                                <option value="" disabled selected></option>
                                                <!-- Add options dynamically with JavaScript -->
                                            </select>
                                        </div>
                                        <div>
                                            <label for="regencyDropdown" class="block text-lg font-bold">Pilih
                                                Kabupaten</label>
                                            <select class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="regencyDropdown" name="kabupaten" disabled>
                                                <option value="" disabled selected></option>
                                                <!-- Add options dynamically with JavaScript -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="districtDropdown" class="block text-lg font-bold">Pilih
                                                Kecamatan</label>
                                            <select class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="districtDropdown" name="kecamatan" disabled>
                                                <option value="" disabled selected></option>
                                                <!-- Add options dynamically with JavaScript -->
                                            </select>

                                        </div>
                                        <div>
                                            <label for="villageDropdown" class="block text-lg font-bold">Pilih
                                                Desa</label>
                                            <select class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="villageDropdown" name="desa" disabled>
                                                <option value="" disabled selected></option>
                                                <!-- Add options dynamically with JavaScript -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="tgl_lahir" class="block text-lg font-bold">Tanggal Lahir</label>
                                            <input type="date" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="tgl_lahir" name="tgl_lahir" required>
                                        </div>
                                        <div>
                                            <label class="block text-lg font-bold">Agama</label>
                                            <div class="flex space-x-4">
                                                <label class="flex items-center space-x-2">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Islam">
                                                    <span>Islam</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Kristen">
                                                    <span>Kristen</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Khatolik">
                                                    <span>Khatolik</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Protestan">
                                                    <span>Protestan</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Hindu">
                                                    <span>Hindu</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Budha">
                                                    <span>Budha</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="nama_sekolah" class="block text-lg font-bold">Nama Sekolah</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="nama_sekolah" name="nama_sekolah">
                                        </div>
                                        <div>
                                            <label class="block text-lg font-bold">Jenis Pendidikan</label>
                                            <div class="flex space-x-4">
                                                <label class="flex items-center space-x-2">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="SMA/SMK">
                                                    <span>SMA/SMK</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="D3">
                                                    <span>D3</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="D4">
                                                    <span>D4</span>
                                                </label>
                                                <label class="flex items-center space-x-2">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="S1">
                                                    <span>S1</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="link_profile_linkedin" class="block text-lg font-bold">Link
                                                Profile LinkedIn</label>
                                            <input type="url" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="link_profile_linkedin" name="link_profile_linkedin">
                                        </div>
                                        <div>
                                            <label for="link_profile_instagram" class="block text-lg font-bold">Link
                                                Profile Instagram</label>
                                            <input type="url" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="link_profile_instagram" name="link_profile_instagram">
                                        </div>
                                    </div>

                                    {{-- <div>
                                        <label for="sertifikat_kelulusan" class="block text-lg font-bold">Sertifikat
                                            Kelulusan (PDF)</label>
                                        <div class="flex items-center space-x-4">
                                            <label for="sertifikat_kelulusan"
                                                class="px-7 py-2  bg-gray-300 hover:bg-gray-700 hover:text-white transition duration-35 ease-in-out rounded cursor-pointer">Sertifikat
                                                Kelulusan</label>
                                            <input type="file" class="" id="sertifikat_kelulusan"
                                                name="sertifikat_kelulusan" accept="application/pdf">
                                            <input type="text" class="form-control w-3/6 px-4 py-2 border rounded-lg"
                                                readonly>
                                        </div>
                                    </div> --}}

                                    <div>
                                        <label for="cv" class="block text-lg font-bold">Curriculum Vitae
                                            (PDF)</label>
                                        <div class="flex items-center space-x-4">
                                            <label for="cv"
                                                class="px-9 py-2  bg-gray-300 hover:bg-gray-700 hover:text-white transition duration-35 ease-in-out rounded cursor-pointer">Curriculum
                                                Vitae</label>
                                            <input type="file" class="" id="cv" name="cv"
                                                accept="application/pdf">
                                            <input type="text" class="form-control w-3/6 px-4 py-2 border rounded-lg"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="flex justify-end space-x-4">
                                        <a href="{{ route('pendaftar.landingPage') }}"
                                            class="py-2 mx-3 px-5 rounded-md text-slate-800  hover:bg-gray-700 hover:text-white bg-gray-300 transition-all duration-300 ease-in-out">Batal</a>
                                        <button type="submit" id="submitButton"
                                            class="py-2 mx-3 px-5 rounded-md text-white hover:bg-gray-800 hover:text-white bg-gray-600 transition-all duration-300 ease-in-out">
                                            Simpan
                                        </button>
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
        document.addEventListener('DOMContentLoaded', function() {
            let formCount = 1;
            const maxForms = 3;

            document.getElementById('addFormButton').addEventListener('click', function() {
                if (formCount < maxForms) {
                    formCount++;
                    const newForm = document.getElementById('formTemplate').cloneNode(true);
                    newForm.id = '';
                    newForm.style.display = 'block';
                    document.getElementById('formsContainer').appendChild(newForm);
                } else {
                    alert('Maximum of 3 forms can be added.');
                }
            });
        });

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let formCount = 1;
            const maxForms = 3;

            document.getElementById('addFormButton').addEventListener('click', function() {
                if (formCount < maxForms) {
                    formCount++;
                    const newForm = document.getElementById('formTemplate').cloneNode(true);
                    newForm.id = '';
                    newForm.style.display = 'block';
                    document.getElementById('formsContainer').appendChild(newForm);
                } else {
                    alert('Maximum of 3 forms can be added.');
                }
            });
        });

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
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
