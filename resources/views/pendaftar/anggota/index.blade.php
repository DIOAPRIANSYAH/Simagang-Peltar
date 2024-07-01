@extends('layouts.landing-page')
@section('navbar')
    @include('components.landing-page.navbar')
@endsection
@section('main-content')
    @foreach ($anggota as $key => $anggota)
        @if ($anggota->id_users == Auth::user()->id)
            <div class="main-panel">
                <div class="content-wrapper container shadow-2xl my-4">
                    <div class="flex flex-col">
                        <div class="w-full">
                            <div class="card bg-white shadow rounded-lg">
                                <div class="card-body p-6">
                                    <form class="space-y-4" id="userForm" enctype="multipart/form-data">
                                        @csrf

                                        <div class="space-y-4">
                                            <div>
                                                <h4 class="text-2xl text-white px-4 py-2 rounded bg-gray-700 mb-5">Data
                                                    Anggota {{ $key + 1 }}</h4>
                                                <label for="foto" class="block text-lg font-bold">Foto Profil</label>
                                                <img class="rounded border border-gray-400 mb-3" id="preview"
                                                    src="{{ $anggota->foto ? asset('storage/images/anggota/' . $anggota->foto) : 'https://via.placeholder.com/200' }}"
                                                    alt="Avatar Dummy"
                                                    style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                <div class="flex items-center space-x-4">
                                                    <label for="foto"
                                                        class="px-4 py-2 bg-gray-200 rounded cursor-pointer">Upload</label>
                                                    <input type="file" class="hidden" id="foto" name="foto"
                                                        disabled onchange="previewImage(event)">
                                                    <input type="text"
                                                        class="form-control w-full px-4 py-2 border rounded-lg"
                                                        value="{{ $anggota->foto }}" readonly>
                                                    <div class="flex space-x-2">
                                                        <a href="{{ asset('storage/images/anggota/' . $anggota->foto) }}"
                                                            target="_blank"
                                                            class="py-2 mx-3 px-5 rounded-md text-white  hover:bg-gray-200 hover:text-slate-800 bg-purple-700 transition-all duration-300 ease-in-out">Preview
                                                        </a>
                                                        <a href="{{ asset('storage/images/anggota/' . $anggota->foto) }}"
                                                            download
                                                            class="py-2 mx-3 px-5 rounded-md text-white  hover:bg-gray-200 hover:text-slate-800 bg-gray-700 transition-all duration-300 ease-in-out">Download
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="nama" class="block text-lg font-bold">Nama</label>
                                                    <input type="text"
                                                        class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="nama" name="nama" value="{{ $anggota->nama }}" disabled>
                                                </div>
                                                <div>
                                                    <label for="email" class="block text-lg font-bold">Email</label>
                                                    <input type="email"
                                                        class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="email" name="email" value="{{ $anggota->email }}"
                                                        disabled>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="status" class="block text-lg font-bold">Status</label>
                                                    <input type="status"
                                                        class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="status" value="Anggota" name="status" disabled>
                                                </div>
                                                <div>
                                                    <label for="jenis_kelamin" class="block text-lg font-bold">Jenis
                                                        Kelamin</label>
                                                    <select class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="jenis_kelamin" name="jenis_kelamin" disabled>
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="Laki-laki"
                                                            {{ $anggota->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                            Laki-laki
                                                        </option>
                                                        <option value="Perempuan"
                                                            {{ $anggota->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                            Perempuan
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="provinceDropdown" class="block text-lg font-bold">Pilih
                                                        Provinsi</label>
                                                    <select class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="provinceDropdown" name="provinsi" disabled>
                                                        <option value="" disabled selected>{{ $anggota->provinsi }}
                                                        </option>
                                                        <!-- Add options dynamically with JavaScript -->
                                                    </select>
                                                    <input type="hidden" id="originalProvince" name="original_provinsi"
                                                        value="{{ $anggota->provinsi }}">
                                                </div>
                                                <div>
                                                    <label for="regencyDropdown" class="block text-lg font-bold">Pilih
                                                        Kabupaten</label>
                                                    <select class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="regencyDropdown" name="kabupaten" disabled>
                                                        <option value="" disabled selected>{{ $anggota->kabupaten }}
                                                        </option>
                                                        <!-- Add options dynamically with JavaScript -->
                                                    </select>
                                                    <input type="hidden" id="originalRegency" name="original_kabupaten"
                                                        value="{{ $anggota->kabupaten }}">
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="districtDropdown" class="block text-lg font-bold">Pilih
                                                        Kecamatan</label>
                                                    <select class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="districtDropdown" name="kecamatan" disabled>
                                                        <option value="" disabled selected>{{ $anggota->kecamatan }}
                                                        </option>
                                                        <!-- Add options dynamically with JavaScript -->
                                                    </select>
                                                    <input type="hidden" id="originalDistrict" name="original_kecamatan"
                                                        value="{{ $anggota->kecamatan }}">
                                                </div>
                                                <div>
                                                    <label for="villageDropdown" class="block text-lg font-bold">Pilih
                                                        Desa</label>
                                                    <select class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="villageDropdown" name="desa" disabled>
                                                        <option value="" disabled selected>{{ $anggota->desa }}
                                                        </option>
                                                        <!-- Add options dynamically with JavaScript -->
                                                    </select>
                                                    <input type="hidden" id="originalVillage" name="original_desa"
                                                        value="{{ $anggota->desa }}">
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="tgl_lahir" class="block text-lg font-bold">Tanggal
                                                        Lahir</label>
                                                    <input type="date"
                                                        class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="tgl_lahir" name="tgl_lahir"
                                                        value="{{ $anggota->tgl_lahir }}" dissable>
                                                </div>
                                                <div>
                                                    <label class="block text-lg font-bold">Agama</label>
                                                    <div class="flex space-x-4">
                                                        <label class="flex items-center space-x-2">
                                                            <input type="radio" class="form-check-input" name="agama"
                                                                value="Islam" disabled
                                                                {{ $anggota->agama == 'Islam' ? 'checked' : '' }}>
                                                            <span>Islam</span>
                                                        </label>
                                                        <label class="flex items-center space-x-2">
                                                            <input type="radio" class="form-check-input" name="agama"
                                                                value="Kristen" disabled
                                                                {{ $anggota->agama == 'Kristen' ? 'checked' : '' }}>
                                                            <span>Kristen</span>
                                                        </label>
                                                        <label class="flex items-center space-x-2">
                                                            <input type="radio" class="form-check-input" name="agama"
                                                                value="Khatolik" disabled
                                                                {{ $anggota->agama == 'Khatolik' ? 'checked' : '' }}>
                                                            <span>Khatolik</span>
                                                        </label>
                                                        <label class="flex items-center space-x-2">
                                                            <input type="radio" class="form-check-input" name="agama"
                                                                value="Protestan" disabled
                                                                {{ $anggota->agama == 'Protestan' ? 'checked' : '' }}>
                                                            <span>Protestan</span>
                                                        </label>
                                                        <label class="flex items-center space-x-2">
                                                            <input type="radio" class="form-check-input" name="agama"
                                                                value="Hindu" disabled
                                                                {{ $anggota->agama == 'Hindu' ? 'checked' : '' }}>
                                                            <span>Hindu</span>
                                                        </label>
                                                        <label class="flex items-center space-x-2">
                                                            <input type="radio" class="form-check-input" name="agama"
                                                                value="Budha" disabled
                                                                {{ $anggota->agama == 'Budha' ? 'checked' : '' }}>
                                                            <span>Budha</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="nama_sekolah" class="block text-lg font-bold">Nama
                                                        Sekolah</label>
                                                    <input type="text"
                                                        class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="nama_sekolah" name="nama_sekolah" disabled
                                                        value="{{ $anggota->nama_sekolah }}">
                                                </div>
                                                <div>
                                                    <label class="block text-lg font-bold">Jenis Pendidikan</label>
                                                    <div class="flex space-x-4">
                                                        <label class="flex items-center space-x-2">
                                                            <input type="radio" class="form-check-input"
                                                                name="pendidikan" value="SMA/SMK" disabled
                                                                {{ $anggota->pendidikan == 'SMA/SMK' ? 'checked' : '' }}>
                                                            <span>SMA/SMK</span>
                                                        </label>
                                                        <label class="flex items-center space-x-2">
                                                            <input type="radio" class="form-check-input"
                                                                name="pendidikan" value="D3" disabled
                                                                {{ $anggota->pendidikan == 'D3' ? 'checked' : '' }}>
                                                            <span>D3</span>
                                                        </label>
                                                        <label class="flex items-center space-x-2">
                                                            <input type="radio" class="form-check-input"
                                                                name="pendidikan" value="D4" disabled
                                                                {{ $anggota->pendidikan == 'D4' ? 'checked' : '' }}>
                                                            <span>D4</span>
                                                        </label>
                                                        <label class="flex items-center space-x-2">
                                                            <input type="radio" class="form-check-input"
                                                                name="pendidikan" value="S1" disabled
                                                                {{ $anggota->pendidikan == 'S1' ? 'checked' : '' }}>
                                                            <span>S1</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div>
                                                    <label for="nomor_induk" class="block text-lg font-bold">Nomor
                                                        Induk</label>
                                                    <input type="text"
                                                        class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="nomor_induk" name="nomor_induk" disabled
                                                        value="{{ $anggota->nomor_induk }}">
                                                </div>
                                                <div>
                                                    <label for="jurusan" class="block text-lg font-bold">Jurusan</label>
                                                    <input type="text"
                                                        class="form-control w-full px-4 py-2 border rounded-lg" disabled
                                                        id="jurusan" name="jurusan" value="{{ $anggota->jurusan }}">
                                                </div>
                                                <div>
                                                    <label for="no_hp" class="block text-lg font-bold">No HP</label>
                                                    <input type="text"
                                                        class="form-control w-full px-4 py-2 border rounded-lg" disabled
                                                        id="no_hp" name="no_hp" value="{{ $anggota->no_hp }}">
                                                </div>

                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="link_profile_linkedin"
                                                        class="block text-lg font-bold">Link
                                                        Profile LinkedIn</label>
                                                    <input type="url"
                                                        class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="link_profile_linkedin" name="link_profile_linkedin" disabled
                                                        value="{{ $anggota->link_profile_linkedin }}">
                                                </div>
                                                <div>
                                                    <label for="link_profile_instagram"
                                                        class="block text-lg font-bold">Link
                                                        Profile Instagram</label>
                                                    <input type="url"
                                                        class="form-control w-full px-4 py-2 border rounded-lg"
                                                        id="link_profile_instagram" name="link_profile_instagram" disabled
                                                        value="{{ $anggota->link_profile_instagram }}">
                                                </div>
                                            </div>
                                            @if (!empty($anggota->sertifikat_kelulusan))
                                                <div>
                                                    <label for="sertifikat_kelulusan"
                                                        class="block text-lg font-bold">Sertifikat Kelulusan (PDF)</label>
                                                    <div class="flex items-center space-x-4">
                                                        <label for="sertifikat_kelulusan"
                                                            class="px-7 py-2 bg-gray-200 rounded cursor-pointer">Sertifikat
                                                            Kelulusan</label>
                                                        <input type="file" class="hidden" id="sertifikat_kelulusan"
                                                            name="sertifikat_kelulusan" accept="application/pdf" disabled>
                                                        <input type="text"
                                                            class="form-control w-3/6 px-4 py-2 border rounded-lg"
                                                            value="{{ $anggota->sertifikat_kelulusan ?? '' }}" readonly>
                                                        <div class="flex space-x-2">
                                                            <a href="{{ asset('storage/pdf/sertifikat_kelulusan/' . $anggota->sertifikat_kelulusan) }}"
                                                                target="_blank"
                                                                class="py-2 mx-3 px-5 rounded-md text-white hover:bg-gray-200 hover:text-slate-800 bg-blue-700 transition-all duration-300 ease-in-out">Preview</a>
                                                            <a href="{{ asset('storage/pdf/sertifikat_kelulusan/' . $anggota->sertifikat_kelulusan) }}"
                                                                download
                                                                class="py-2 mx-3 px-5 rounded-md text-white hover:bg-gray-200 hover:text-slate-800 bg-gray-700 transition-all duration-300 ease-in-out">Download</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                            <div>
                                                <label for="cv" class="block text-lg font-bold">Curriculum
                                                    Vitae</label>
                                                <div class="flex items-center space-x-4">
                                                    <label for="cv"
                                                        class="px-9 py-2 bg-gray-200 rounded cursor-pointer">Curriculum
                                                        Vitae</label>
                                                    <input type="file" class="hidden" id="cv" name="cv"
                                                        accept="application/pdf" disabled>
                                                    <input type="text"
                                                        class="form-control w-3/6 px-4 py-2 border rounded-lg"
                                                        value="{{ $anggota->cv }}" readonly>
                                                    <div class="flex space-x-2">
                                                        <a href="{{ asset('storage/pdf/cv/' . $anggota->cv) }}"
                                                            target="_blank"
                                                            class="py-2 mx-3 px-5 rounded-md text-white  hover:bg-gray-200 hover:text-slate-800 bg-blue-700 transition-all duration-300 ease-in-out">Preview
                                                        </a>
                                                        <a href="{{ asset('storage/pdf/cv/' . $anggota->cv) }}" download
                                                            class="py-2 mx-3 px-5 rounded-md text-white  hover:bg-gray-200 hover:text-slate-800 bg-gray-700 transition-all duration-300 ease-in-out">Download
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
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