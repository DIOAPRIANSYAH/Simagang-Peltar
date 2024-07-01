@extends('layouts.dashboard')

@push('styles')
    <style type="text/css">
        @media (max-width: 767.98px) {
            .text-center-md {
                text-align: center;
            }
        }
    </style>
    <style>
        /* Tambahkan beberapa kelas warna khusus untuk input */
        .bg-info {
            background-color: #d1ecf1 !important;
        }

        .bg-warning {
            background-color: #fff3cd !important;
        }

        .bg-success {
            background-color: #d4edda !important;
        }

        .bg-danger {
            background-color: #f8d7da !important;
        }
    </style>
@endpush

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan elemen input dengan id 'status'
            const statusInput = document.getElementById('status');

            // Debug: Tampilkan nilai teks dalam elemen input
            console.log(`Status input value: '${statusInput.value.trim()}'`);

            // Hapus semua kelas background yang mungkin ada sebelumnya
            statusInput.classList.remove('bg-info', 'bg-warning', 'bg-success', 'bg-danger');

            // Tambahkan kelas background berdasarkan nilai teks dalam elemen input
            switch (statusInput.value.trim()) {
                case 'Document Submited':
                    statusInput.classList.add('bg-info');
                    break;
                case 'On Review':
                    statusInput.classList.add('bg-warning');
                    break;
                case 'Accepted':
                    statusInput.classList.add('bg-success');
                    break;
                case 'Rejected':
                    statusInput.classList.add('bg-danger');
                    break;
                default:
                    break;
            }

            // Debug: Tampilkan kelas yang ditambahkan
            console.log(`Classes after update: ${statusInput.classList}`);
        });
    </script>
@endpush

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
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">Lihat
                                Data User</h4>

                            <form class="forms-sample">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="foto"><strong>Foto Profil</strong></label>
                                        </div>
                                        <img class="d-flex justify-end rounded border border-gray-400 mb-3" id="preview"
                                            src="{{ $magang->user->foto ? asset('storage/images/users/' . $magang->user->foto) : 'https://via.placeholder.com/200' }}"
                                            alt="Avatar Dummy"
                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                        <div class="input-group mb-3">
                                            <label for="foto" class="input-group-text" for="inputGroupFile01">Foto
                                                Profil</label>
                                            <input type="text" class="form-control" value="{{ $magang->user->foto }}"
                                                readonly>
                                            <div class="input-group-append">
                                                <a href="{{ asset('storage/images/users/' . $magang->user->foto) }}"
                                                    target="_blank" class="btn btn-primary">Preview Foto</a>
                                                <a href="{{ asset('storage/images/users/' . $magang->user->foto) }}"
                                                    download class="btn btn-warning ml-2">Download Foto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name"><strong>Nama</strong></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nama" required disabled value="{{ $magang->user->name }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email"><strong>Email</strong></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email" required disabled value="{{ $magang->user->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="password"><strong>Password</strong></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" required disabled value="********">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                                            <select class="custom-select form-control" id="jenis_kelamin"
                                                name="jenis_kelamin" disabled>
                                                <option value="Laki-laki"
                                                    {{ $magang->user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki
                                                </option>
                                                <option value="Perempuan"
                                                    {{ $magang->user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="provinceDropdown"><strong>Provinsi</strong></label>
                                            <select class="form-control text-black" id="provinceDropdown" name="provinsi"
                                                disabled>
                                                <option value="{{ $magang->user->provinsi }}">{{ $magang->user->provinsi }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="regencyDropdown"><strong>Kabupaten</strong></label>
                                            <select class="form-control text-black" id="regencyDropdown" name="kabupaten"
                                                disabled>
                                                <option value="{{ $magang->user->kabupaten }}">
                                                    {{ $magang->user->kabupaten }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="districtDropdown"><strong>Kecamatan</strong></label>
                                            <select class="form-control text-black" id="districtDropdown" name="kecamatan"
                                                disabled>
                                                <option value="{{ $magang->user->kecamatan }}">
                                                    {{ $magang->user->kecamatan }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="villageDropdown"><strong>Desa</strong></label>
                                            <select class="form-control text-black" id="villageDropdown" name="desa"
                                                disabled>
                                                <option value="{{ $magang->user->desa }}">{{ $magang->user->desa }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        @php
                                            use Carbon\Carbon;
                                            setlocale(LC_TIME, 'id_ID');
                                            $formattedDate = Carbon::parse($magang->user->tgl_lahir)->translatedFormat(
                                                'd F Y',
                                            );
                                        @endphp

                                        <div class="form-group">
                                            <label for="tgl_lahir"><strong>Tanggal Lahir</strong></label>
                                            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                                placeholder="Tanggal Lahir" required disabled
                                                value="{{ $formattedDate }}">
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
                                                        {{ $magang->user->agama == 'Islam' ? 'checked' : '' }}
                                                        disabled>Islam
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Kristen"
                                                        {{ $magang->user->agama == 'Kristen' ? 'checked' : '' }}
                                                        disabled>Kristen
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Khatolik"
                                                        {{ $magang->user->agama == 'Khatolik' ? 'checked' : '' }}
                                                        disabled>Khatolik
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Protestan"
                                                        {{ $magang->user->agama == 'Protestan' ? 'checked' : '' }}
                                                        disabled>Protestan
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Hindu"
                                                        {{ $magang->user->agama == 'Hindu' ? 'checked' : '' }}
                                                        disabled>Hindu
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Budha"
                                                        {{ $magang->user->agama == 'Budha' ? 'checked' : '' }}
                                                        disabled>Budha
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
                                                name="nama_sekolah" placeholder="Nama Sekolah" disabled
                                                value="{{ $magang->user->nama_sekolah }}">
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
                                                        {{ $magang->user->pendidikan == 'SMA/SMK' ? 'checked' : '' }}
                                                        disabled>SMA/SMK
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="D3"
                                                        {{ $magang->user->pendidikan == 'D3' ? 'checked' : '' }}
                                                        disabled>D3
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="D4"
                                                        {{ $magang->user->pendidikan == 'D4' ? 'checked' : '' }}
                                                        disabled>D4
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="S1"
                                                        {{ $magang->user->pendidikan == 'S1' ? 'checked' : '' }}
                                                        disabled>S1
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
                                                placeholder="No HP" disabled value="{{ $magang->user->no_hp }}">
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
                                                        {{ $magang->user->type == 'pendaftar' ? 'checked' : '' }}
                                                        disabled>Pendaftar
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="type"
                                                        value="1"
                                                        {{ $magang->user->type == 'pic_satker' ? 'checked' : '' }}
                                                        disabled>PIC Satuan Kerja
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
                                                name="nomor_induk" placeholder="Nomor Induk" disabled
                                                value="{{ $magang->user->nomor_induk }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jurusan"><strong>Jurusan</strong></label>
                                            <input type="text" class="form-control" id="jurusan" name="jurusan"
                                                placeholder="Jurusan" disabled value="{{ $magang->user->jurusan }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="link_profile_linkedin"><strong>Link Profile
                                                    LinkedIn</strong></label>
                                            <input type="url" class="form-control" id="link_profile_linkedin"
                                                name="link_profile_linkedin" placeholder="Link Profile LinkedIn" disabled
                                                value="{{ $magang->user->link_profile_linkedin }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="link_profile_instagram"><strong>Link Profile
                                                    Instagram</strong></label>
                                            <input type="url" class="form-control" id="link_profile_instagram"
                                                name="link_profile_instagram" placeholder="Link Profile Instagram"
                                                disabled value="{{ $magang->user->link_profile_instagram }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="foto"><strong>Sertifikat Kelulusan</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="sertifikat_kelulusan" class="input-group-text">Sertifikat
                                        Kelulusan</label>
                                    <input type="text" class="form-control" readonly
                                        value="{{ $magang->user->sertifikat_kelulusan }}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/pdf/sertifikat_kelulusan/' . $magang->user->sertifikat_kelulusan) }}"
                                            target="_blank" class="btn btn-primary">Preview PDF</a>
                                        <a href="{{ asset('storage/pdf/sertifikat_kelulusan/' . $magang->user->sertifikat_kelulusan) }}"
                                            download class="btn btn-warning ml-2">Download PDF</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="foto"><strong>Curriculum Vitae</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="cv" class="input-group-text">Curriculum Vitae</label>
                                    <input type="text" class="form-control" readonly value="{{ $magang->user->cv }}">
                                    {{-- Buatkan button preview pdf di sini --}}
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/pdf/cv/' . $magang->user->cv) }}" target="_blank"
                                            class="btn btn-primary">Preview PDF</a>
                                        <a href="{{ asset('storage/pdf/cv/' . $magang->user->cv) }}" download
                                            class="btn btn-warning ml-2">Download PDF</a>
                                    </div>
                                </div>

                                <a href="{{ route('users.index') }}" class="btn btn-primary float-right">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($anggota as $key => $anggota)
            @if ($anggota->id_users == $magang->id_users)
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4
                                        class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">
                                        Lihat
                                        Data User</h4>

                                    <form class="forms-sample">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="foto"><strong>Foto Profil</strong></label>
                                                </div>
                                                <img class="d-flex justify-end rounded border border-gray-400 mb-3"
                                                    id="preview"
                                                    src="{{ $anggota->foto ? asset('storage/images/anggota/' . $anggota->foto) : 'https://via.placeholder.com/200' }}"
                                                    alt="Avatar Dummy"
                                                    style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                <div class="input-group mb-3">
                                                    <label for="foto" class="input-group-text"
                                                        for="inputGroupFile01">Foto
                                                        Profil</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $anggota->foto }}" readonly>
                                                    <div class="input-group-append">
                                                        <a href="{{ asset('storage/images/users/' . $anggota->foto) }}"
                                                            target="_blank" class="btn btn-primary">Preview Foto</a>
                                                        <a href="{{ asset('storage/images/users/' . $anggota->foto) }}"
                                                            download class="btn btn-warning ml-2">Download Foto</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="name"><strong>Nama</strong></label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" placeholder="Nama" required disabled
                                                        value="{{ $anggota->nama }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email"><strong>Email</strong></label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" placeholder="Email" required disabled
                                                        value="{{ $anggota->email }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="password"><strong>Password</strong></label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" placeholder="Password" required disabled
                                                        value="********">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                                                    <select class="custom-select form-control" id="jenis_kelamin"
                                                        name="jenis_kelamin" disabled>
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
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="provinceDropdown"><strong>Provinsi</strong></label>
                                                    <select class="form-control text-black" id="provinceDropdown"
                                                        name="provinsi" disabled>
                                                        <option value="{{ $anggota->provinsi }}">
                                                            {{ $anggota->provinsi }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="regencyDropdown"><strong>Kabupaten</strong></label>
                                                    <select class="form-control text-black" id="regencyDropdown"
                                                        name="kabupaten" disabled>
                                                        <option value="{{ $anggota->kabupaten }}">
                                                            {{ $anggota->kabupaten }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="districtDropdown"><strong>Kecamatan</strong></label>
                                                    <select class="form-control text-black" id="districtDropdown"
                                                        name="kecamatan" disabled>
                                                        <option value="{{ $anggota->kecamatan }}">
                                                            {{ $anggota->kecamatan }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="villageDropdown"><strong>Desa</strong></label>
                                                    <select class="form-control text-black" id="villageDropdown"
                                                        name="desa" disabled>
                                                        <option value="{{ $anggota->desa }}">{{ $anggota->desa }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">

                                                <div class="form-group">
                                                    <label for="tgl_lahir"><strong>Tanggal Lahir</strong></label>
                                                    <input type="text" class="form-control" id="tgl_lahir"
                                                        name="tgl_lahir" placeholder="Tanggal Lahir" required disabled
                                                        value="{{ $formattedDate }}">
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
                                                                {{ $anggota->agama == 'Islam' ? 'checked' : '' }}
                                                                disabled>Islam
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="agama"
                                                                value="Kristen"
                                                                {{ $anggota->agama == 'Kristen' ? 'checked' : '' }}
                                                                disabled>Kristen
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="agama"
                                                                value="Khatolik"
                                                                {{ $anggota->agama == 'Khatolik' ? 'checked' : '' }}
                                                                disabled>Khatolik
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="agama"
                                                                value="Protestan"
                                                                {{ $anggota->agama == 'Protestan' ? 'checked' : '' }}
                                                                disabled>Protestan
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="agama"
                                                                value="Hindu"
                                                                {{ $anggota->agama == 'Hindu' ? 'checked' : '' }}
                                                                disabled>Hindu
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="agama"
                                                                value="Budha"
                                                                {{ $anggota->agama == 'Budha' ? 'checked' : '' }}
                                                                disabled>Budha
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
                                                        name="nama_sekolah" placeholder="Nama Sekolah" disabled
                                                        value="{{ $anggota->nama_sekolah }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="pendidikan"><strong>Jenis Pendidikan</strong></label>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="pendidikan" value="SMA/SMK"
                                                                {{ $anggota->pendidikan == 'SMA/SMK' ? 'checked' : '' }}
                                                                disabled>SMA/SMK
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="pendidikan" value="D3"
                                                                {{ $anggota->pendidikan == 'D3' ? 'checked' : '' }}
                                                                disabled>D3
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="pendidikan" value="D4"
                                                                {{ $anggota->pendidikan == 'D4' ? 'checked' : '' }}
                                                                disabled>D4
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="pendidikan" value="S1"
                                                                {{ $anggota->pendidikan == 'S1' ? 'checked' : '' }}
                                                                disabled>S1
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="no_hp"><strong>No HP</strong></label>
                                                    <input type="text" class="form-control" id="no_hp"
                                                        name="no_hp" placeholder="No HP" disabled
                                                        value="{{ $anggota->no_hp }}">
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
                                                                {{ $anggota->type == 'pendaftar' ? 'checked' : '' }}
                                                                disabled>Pendaftar
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="type"
                                                                value="1"
                                                                {{ $anggota->type == 'pic_satker' ? 'checked' : '' }}
                                                                disabled>PIC Satuan Kerja
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
                                                        name="nomor_induk" placeholder="Nomor Induk" disabled
                                                        value="{{ $anggota->nomor_induk }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="jurusan"><strong>Jurusan</strong></label>
                                                    <input type="text" class="form-control" id="jurusan"
                                                        name="jurusan" placeholder="Jurusan" disabled
                                                        value="{{ $anggota->jurusan }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="link_profile_linkedin"><strong>Link Profile
                                                            LinkedIn</strong></label>
                                                    <input type="url" class="form-control" id="link_profile_linkedin"
                                                        name="link_profile_linkedin" placeholder="Link Profile LinkedIn"
                                                        disabled value="{{ $anggota->link_profile_linkedin }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="link_profile_instagram"><strong>Link Profile
                                                            Instagram</strong></label>
                                                    <input type="url" class="form-control"
                                                        id="link_profile_instagram" name="link_profile_instagram"
                                                        placeholder="Link Profile Instagram" disabled
                                                        value="{{ $anggota->link_profile_instagram }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="foto"><strong>Sertifikat Kelulusan</strong></label>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="sertifikat_kelulusan" class="input-group-text">Sertifikat
                                                Kelulusan</label>
                                            <input type="text" class="form-control" readonly
                                                value="{{ $anggota->sertifikat_kelulusan }}">
                                            <div class="input-group-append">
                                                <a href="{{ asset('storage/pdf/sertifikat_kelulusan/' . $anggota->sertifikat_kelulusan) }}"
                                                    target="_blank" class="btn btn-primary">Preview PDF</a>
                                                <a href="{{ asset('storage/pdf/sertifikat_kelulusan/' . $anggota->sertifikat_kelulusan) }}"
                                                    download class="btn btn-warning ml-2">Download PDF</a>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="foto"><strong>Curriculum Vitae</strong></label>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="cv" class="input-group-text">Curriculum Vitae</label>
                                            <input type="text" class="form-control" readonly
                                                value="{{ $anggota->cv }}">
                                            {{-- Buatkan button preview pdf di sini --}}
                                            <div class="input-group-append">
                                                <a href="{{ asset('storage/pdf/cv/' . $anggota->cv) }}" target="_blank"
                                                    class="btn btn-primary">Preview PDF</a>
                                                <a href="{{ asset('storage/pdf/cv/' . $anggota->cv) }}" download
                                                    class="btn btn-warning ml-2">Download PDF</a>
                                            </div>
                                        </div>


                                        <a href="{{ route('users.index') }}"
                                            class="btn btn-primary float-right">Kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endsection

    @section('footer')
        @include('components.dashboard.footer')
    @endsection
