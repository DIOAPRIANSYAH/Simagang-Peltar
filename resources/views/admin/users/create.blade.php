// File: resources/views/admin/users/create.blade.php

@extends('layouts.dashboard')

@section('navbar')
    @include('components.dashboard.navbar')
@endsection

@section('sidebar')
    @include('components.dashboard.sidebar')
@endsection

@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">Tambah
                                Data User</h4>

                            <form class="forms-sample" method="POST" action="{{ route('users.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="foto"><strong>Foto Profil</strong></label>
                                        </div>
                                        <img class="d-flex justify-end rounded border border-gray-400 mb-3" id="preview"
                                            src="https://via.placeholder.com/200" alt="Avatar Dummy"
                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                        {{-- <img class="d-flex justify-end rounded border border-gray-400 mb-3" id="preview"
                                            src="#" alt=""
                                            style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;"> --}}
                                        <div class="input-group mb-3">

                                            <label for="foto" class="input-group-text"
                                                for="inputGroupFile01">Upload</label>
                                            <input type="file" class="form-control" id="inputGroupFile01" id="foto"
                                                name="foto" onchange="previewImage(event)">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name"><strong>Nama</strong></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nama" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email"><strong>Email</strong></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="password"><strong>Password</strong></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                                            <select class="custom-select form-control" id="jenis_kelamin"
                                                name="jenis_kelamin">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="provinceDropdown"><strong>Pilih Provinsi</strong></label>
                                            <select class="form-control text-black" id="provinceDropdown" name="provinsi">
                                                <option value="" disabled selected>Pilih Provinsi</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="regencyDropdown"><strong>Pilih Kabupaten</strong></label>
                                            <select class="form-control text-black" id="regencyDropdown" id="kabupaten"
                                                name="kabupaten" disabled>
                                                <option value="" disabled selected>Pilih Kabupaten</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="districtDropdown"><strong>Pilih
                                                    Kecamatan</strong></label>
                                            <select class="form-control text-black" id="districtDropdown" name="kecamatan"
                                                disabled>
                                                <option value="" disabled selected>Pilih Kecamatan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="villageDropdown"><strong>Pilih Desa</strong></label>
                                            <select class="form-control text-black" id="villageDropdown" name="desa"
                                                disabled>
                                                <option value="" disabled selected>Pilih Desa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tgl_lahir"><strong>Tanggal Lahir</strong></label>
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                                placeholder="Tanggal Lahir" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="agama"><strong>Agama</strong></label>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Islam">Islam
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Kristen">Kristen
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Khatolik">Khatolik
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Protestan">Protestan
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Hindu">Hindu
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Budha">Budha
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_sekolah"><strong>Nama Sekolah</strong></label>
                                            <input type="text" class="form-control" id="nama_sekolah"
                                                name="nama_sekolah" placeholder="Nama Sekolah">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pendidikan"><strong>Jenis Pendidikan</strong></label>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="sma"
                                                        name="pendidikan" value="SMA/SMK">SMA/SMK
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="d3"
                                                        name="pendidikan" value="D3">D3
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="d4"
                                                        name="pendidikan" value="D4">D4
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="s1"
                                                        name="pendidikan" value="S1">S1
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="no_hp"><strong>No HP</strong></label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                placeholder="No HP">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="role"><strong>Roles</strong></label>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="type"
                                                        value="0">Pendaftar
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="type"
                                                        value="1">PIC Satuan Kerja
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nomor_induk"><strong>Nomor Induk</strong></label>
                                            <input type="text" class="form-control" id="nomor_induk"
                                                name="nomor_induk" placeholder="Nomor Induk">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jurusan"><strong>Jurusan</strong></label>
                                            <input type="text" class="form-control" id="jurusan" name="jurusan"
                                                placeholder="Jurusan">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="link_profile_linkedin"><strong>Link Profile
                                                    LinkedIn</strong></label>
                                            <input type="url" class="form-control" id="link_profile_linkedin"
                                                name="link_profile_linkedin" placeholder="Link Profile LinkedIn">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="link_profile_instagram"><strong>Link Profile
                                                    Instagram</strong></label>
                                            <input type="url" class="form-control" id="link_profile_instagram"
                                                name="link_profile_instagram" placeholder="Link Profile Instagram">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sertifikat_kelulusan"><strong>Sertifikat Kelulusan
                                            (PDF)</strong></label>
                                </div>

                                <div class="input-group mb-4">
                                    <label class="input-group-text" for="sertifikat_kelulusan">Upload</label>
                                    <input type="file" class="form-control" id="sertifikat_kelulusan"
                                        name="sertifikat_kelulusan" accept="application/pdf">
                                </div>

                                <div class="form-group">
                                    <label for="cv"><strong>CV (PDF)</strong></label>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="cv">Upload</label>
                                    <input type="file" class="form-control" id="cv" name="cv"
                                        accept="application/pdf">
                                </div>

                                <button type="submit" class="btn btn-primary ml-2 float-right">Simpan</button>
                                <a href="{{ route('users.index') }}" class="btn btn-light float-right">Batal</a>
                            </form>
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

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Fetching data and populating the dropdowns -->
        <script>
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
                        option.value = province.name; // Change value to name
                        option.textContent = province.name;
                        option.setAttribute('data-id', province.id); // Set data-id attribute to store ID
                        provinceDropdown.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching provinces:', error));

            // Event listener for provinces dropdown
            provinceDropdown.addEventListener('change', function() {
                const provinceId = this.options[this.selectedIndex].getAttribute(
                    'data-id'); // Get the province ID from data-id attribute
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
                            option.value = regency.name; // Change value to name
                            option.textContent = regency.name;
                            option.setAttribute('data-id', regency.id); // Set data-id attribute to store ID
                            regencyDropdown.appendChild(option);
                        });
                        regencyDropdown.disabled = false;
                    })
                    .catch(error => console.error('Error fetching regencies:', error));
            });

            // Event listener for regencies dropdown
            regencyDropdown.addEventListener('change', function() {
                const regencyId = this.options[this.selectedIndex].getAttribute(
                    'data-id'); // Get the regency ID from data-id attribute
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
                            option.value = district.name; // Change value to name
                            option.textContent = district.name;
                            option.setAttribute('data-id', district
                                .id); // Set data-id attribute to store ID
                            districtDropdown.appendChild(option);
                        });
                        districtDropdown.disabled = false;
                    })
                    .catch(error => console.error('Error fetching districts:', error));
            });

            // Event listener for districts dropdown
            districtDropdown.addEventListener('change', function() {
                const districtId = this.options[this.selectedIndex].getAttribute(
                    'data-id'); // Get the district ID from data-id attribute
                villageDropdown.innerHTML = '<option value="" disabled selected>Pilih Desa</option>';
                villageDropdown.disabled = true;

                // Fetch villages
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`)
                    .then(response => response.json())
                    .then(villages => {
                        villages.forEach(village => {
                            const option = document.createElement('option');
                            option.value = village.name; // Change value to name
                            option.textContent = village.name;
                            villageDropdown.appendChild(option);
                        });
                        villageDropdown.disabled = false;
                    })
                    .catch(error => console.error('Error fetching villages:', error));
            });
        </script>
    @endpush

    @section('footer')
        @include('components.dashboard.footer')
    @endsection
