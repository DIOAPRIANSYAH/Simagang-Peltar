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
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">Edit
                                Data User</h4>
                            <form class="forms-sample" method="POST"
                                action="{{ route('users.update', $user->getEncryptedId()) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="foto"><strong>Foto Profil</strong></label>
                                        </div>

                                        <img class="d-flex justify-end rounded border border-gray-400 mb-3" id="preview"
                                            src="{{ $user->foto ? asset('storage/images/users/' . $user->foto) : 'https://via.placeholder.com/200' }}"
                                            alt="Avatar Dummy"
                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                        <div class="input-group mb-3">
                                            <label for="foto" class="input-group-text"
                                                for="inputGroupFile01">Upload</label>
                                            <input type="file" class="form-control" id="inputGroupFile01" id="foto"
                                                name="foto" onchange="previewImage(event)">
                                            <input type="text" class="form-control" value="{{ $user->foto }}" readonly>
                                            <div class="input-group-append">
                                                <a href="{{ asset('storage/images/users/' . $user->foto) }}" target="_blank"
                                                    class="btn btn-primary">Preview Foto</a>
                                                <a href="{{ asset('storage/images/users/' . $user->foto) }}" download
                                                    class="btn btn-warning ml-2">Download Foto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name"><strong>Nama</strong></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $user->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email"><strong>Email</strong></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $user->email }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="password"><strong>Password</strong></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Leave blank to keep current password">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="status"><strong>Status</strong></label>
                                            <select class="custom-select form-control" id="status" name="status">
                                                <option disabled>Pilih Status</option>
                                                <option value="Aktif" {{ $user->status == 'Aktif' ? 'selected' : '' }}>
                                                    Aktif
                                                </option>
                                                <option value="Tidak Aktif"
                                                    {{ $user->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                                            <select class="custom-select form-control" id="jenis_kelamin"
                                                name="jenis_kelamin">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki"
                                                    {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                                </option>
                                                <option value="Perempuan"
                                                    {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="provinceDropdown"><strong>Pilih Provinsi</strong></label>
                                            <select class="form-control text-black" id="provinceDropdown" name="provinsi">
                                                <option value="{{ $user->provinsi }}" selected>{{ $user->provinsi }}
                                                </option>
                                                <!-- Add options dynamically with JavaScript -->
                                            </select>
                                            <input type="hidden" id="originalProvince" name="original_provinsi"
                                                value="{{ $user->provinsi }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="regencyDropdown" class="block text-lg font-bold">Pilih
                                                Kabupaten</label>
                                            <select class="form-control text-black" id="regencyDropdown" name="kabupaten"
                                                disabled>
                                                <option value="" disabled selected>{{ $user->kabupaten }}</option>
                                                <!-- Add options dynamically with JavaScript -->
                                            </select>
                                            <input type="hidden" id="originalRegency" name="original_kabupaten"
                                                value="{{ $user->kabupaten }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="districtDropdown" class="block text-lg font-bold">Pilih
                                                Kecamatan</label>
                                            <select class="form-control text-black" id="districtDropdown"
                                                name="kecamatan" disabled>
                                                <option value="" disabled selected>{{ $user->kecamatan }}</option>
                                                <!-- Add options dynamically with JavaScript -->
                                            </select>
                                            <input type="hidden" id="originalDistrict" name="original_kecamatan"
                                                value="{{ $user->kecamatan }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="villageDropdown" class="block text-lg font-bold">Pilih
                                                Desa</label>
                                            <select class="form-control text-black" id="villageDropdown" name="desa"
                                                disabled>
                                                <option value="" disabled selected>{{ $user->desa }}</option>
                                                <!-- Add options dynamically with JavaScript -->
                                            </select>
                                            <input type="hidden" id="originalVillage" name="original_desa"
                                                value="{{ $user->desa }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tgl_lahir"><strong>Tanggal Lahir</strong></label>
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                                value="{{ \Carbon\Carbon::parse($user->tgl_lahir)->format('Y-m-d') }}"
                                                required>
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
                                                        value="Islam"
                                                        {{ $user->agama == 'Islam' ? 'checked' : '' }}>Islam
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Kristen"
                                                        {{ $user->agama == 'Kristen' ? 'checked' : '' }}>Kristen
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Khatolik"
                                                        {{ $user->agama == 'Khatolik' ? 'checked' : '' }}>Khatolik
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Protestan"
                                                        {{ $user->agama == 'Protestan' ? 'checked' : '' }}>Protestan
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Hindu"
                                                        {{ $user->agama == 'Hindu' ? 'checked' : '' }}>Hindu
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Budha"
                                                        {{ $user->agama == 'Budha' ? 'checked' : '' }}>Budha
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
                                                name="nama_sekolah" value="{{ $user->nama_sekolah }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pendidikan"><strong>Jenis Pendidikan</strong></label>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="SMA/SMK"
                                                        {{ $user->pendidikan == 'SMA/SMK' ? 'checked' : '' }}>SMA/SMK
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="D3" {{ $user->pendidikan == 'D3' ? 'checked' : '' }}>D3
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="D4" {{ $user->pendidikan == 'D4' ? 'checked' : '' }}>D4
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="S1" {{ $user->pendidikan == 'S1' ? 'checked' : '' }}>S1
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
                                                value="{{ $user->no_hp }}">
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
                                                        value="0"
                                                        {{ $user->type == 'pendaftar' ? 'checked' : '' }}>Pendaftar
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="type"
                                                        value="1"
                                                        {{ $user->type == 'pic_satker' ? 'checked' : '' }}>PIC Satuan
                                                    Kerja
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
                                                name="nomor_induk" value="{{ $user->nomor_induk }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jurusan"><strong>Jurusan</strong></label>
                                            <input type="text" class="form-control" id="jurusan" name="jurusan"
                                                value="{{ $user->jurusan }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="link_profile_linkedin"><strong>Link Profile
                                                    LinkedIn</strong></label>
                                            <input type="url" class="form-control" id="link_profile_linkedin"
                                                name="link_profile_linkedin" value="{{ $user->link_profile_linkedin }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="link_profile_instagram"><strong>Link Profile
                                                    Instagram</strong></label>
                                            <input type="url" class="form-control" id="link_profile_instagram"
                                                name="link_profile_instagram"
                                                value="{{ $user->link_profile_instagram }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sertifikat_kelulusan"><strong>Sertifikat Kelulusan (PDF)</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="sertifikat_kelulusan" class="input-group-text">Sertifikat
                                        Kelulusan</label>
                                    <input type="file" class="form-control" id="sertifikat_kelulusan"
                                        name="sertifikat_kelulusan" accept="application/pdf"> <input type="text"
                                        class="form-control" value="{{ $user->sertifikat_kelulusan }}" readonly>
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/pdf/sertifikat_kelulusan/' . $user->sertifikat_kelulusan) }}"
                                            target="_blank" class="btn btn-primary">Preview PDF</a>
                                        <a href="{{ asset('storage/pdf/sertifikat_kelulusan/' . $user->sertifikat_kelulusan) }}"
                                            download class="btn btn-warning ml-2">Download PDF</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cv"><strong>Curriculum Vitae</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="cv" class="input-group-text">Curriculum Vitae</label>
                                    <input type="file" class="form-control" id="cv" name="cv"
                                        accept="application/pdf"> <input type="text" class="form-control"
                                        value="{{ $user->cv }}" readonly>
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/pdf/cv/' . $user->cv) }}" target="_blank"
                                            class="btn btn-primary">Preview PDF</a>
                                        <a href="{{ asset('storage/pdf/cv/' . $user->cv) }}" download
                                            class="btn btn-warning ml-2">Download PDF</a>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary ml-2 float-right">Simpan</button>
                                <a href="{{ route('users.index') }}" class="btn btn-light float-right">Batal</a>
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
    @include('components.dashboard.footer')
@endsection
