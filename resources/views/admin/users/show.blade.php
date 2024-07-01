@extends('layouts.dashboard')

@push('styles')
    <style type="text/css">
        @media (max-width: 767.98px) {
            .text-center-md {
                text-align: center;
            }
        }
    </style>
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
                                            src="{{ $user->foto ? asset('storage/images/users/' . $user->foto) : 'https://via.placeholder.com/200' }}"
                                            alt="Avatar Dummy"
                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                        <div class="input-group mb-3">
                                            <label for="foto" class="input-group-text" for="inputGroupFile01">Foto
                                                Profil</label>
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
                                                placeholder="Nama" required disabled value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email"><strong>Email</strong></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email" required disabled value="{{ $user->email }}">
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
                                            <label for="provinceDropdown"><strong>Provinsi</strong></label>
                                            <select class="form-control text-black" id="provinceDropdown" name="provinsi"
                                                disabled>
                                                <option value="{{ $user->provinsi }}">{{ $user->provinsi }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="regencyDropdown"><strong>Kabupaten</strong></label>
                                            <select class="form-control text-black" id="regencyDropdown" name="kabupaten"
                                                disabled>
                                                <option value="{{ $user->kabupaten }}">{{ $user->kabupaten }}</option>
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
                                                <option value="{{ $user->kecamatan }}">{{ $user->kecamatan }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="villageDropdown"><strong>Desa</strong></label>
                                            <select class="form-control text-black" id="villageDropdown" name="desa"
                                                disabled>
                                                <option value="{{ $user->desa }}">{{ $user->desa }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        @php
                                            use Carbon\Carbon;
                                            setlocale(LC_TIME, 'id_ID');
                                            $formattedDate = Carbon::parse($user->tgl_lahir)->translatedFormat('d F Y');
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
                                                        value="Islam" {{ $user->agama == 'Islam' ? 'checked' : '' }}
                                                        disabled>Islam
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Kristen" {{ $user->agama == 'Kristen' ? 'checked' : '' }}
                                                        disabled>Kristen
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Khatolik" {{ $user->agama == 'Khatolik' ? 'checked' : '' }}
                                                        disabled>Khatolik
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Protestan"
                                                        {{ $user->agama == 'Protestan' ? 'checked' : '' }}
                                                        disabled>Protestan
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Hindu" {{ $user->agama == 'Hindu' ? 'checked' : '' }}
                                                        disabled>Hindu
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="agama"
                                                        value="Budha" {{ $user->agama == 'Budha' ? 'checked' : '' }}
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
                                                value="{{ $user->nama_sekolah }}">
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
                                                        {{ $user->pendidikan == 'SMA/SMK' ? 'checked' : '' }}
                                                        disabled>SMA/SMK
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="D3" {{ $user->pendidikan == 'D3' ? 'checked' : '' }}
                                                        disabled>D3
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="D4" {{ $user->pendidikan == 'D4' ? 'checked' : '' }}
                                                        disabled>D4
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="pendidikan"
                                                        value="S1" {{ $user->pendidikan == 'S1' ? 'checked' : '' }}
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
                                                placeholder="No HP" disabled value="{{ $user->no_hp }}">
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
                                                        value="0" {{ $user->type == 'pendaftar' ? 'checked' : '' }}
                                                        disabled>Pendaftar
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="type"
                                                        value="1" {{ $user->type == 'pic_satker' ? 'checked' : '' }}
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
                                                value="{{ $user->nomor_induk }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jurusan"><strong>Jurusan</strong></label>
                                            <input type="text" class="form-control" id="jurusan" name="jurusan"
                                                placeholder="Jurusan" disabled value="{{ $user->jurusan }}">
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
                                                value="{{ $user->link_profile_linkedin }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="link_profile_instagram"><strong>Link Profile
                                                    Instagram</strong></label>
                                            <input type="url" class="form-control" id="link_profile_instagram"
                                                name="link_profile_instagram" placeholder="Link Profile Instagram"
                                                disabled value="{{ $user->link_profile_instagram }}">
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
                                        value="{{ $user->sertifikat_kelulusan }}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/pdf/sertifikat_kelulusan/' . $user->sertifikat_kelulusan) }}"
                                            target="_blank" class="btn btn-primary">Preview PDF</a>
                                        <a href="{{ asset('storage/pdf/sertifikat_kelulusan/' . $user->sertifikat_kelulusan) }}"
                                            download class="btn btn-warning ml-2">Download PDF</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="foto"><strong>Curriculum Vitae</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="cv" class="input-group-text">Curriculum Vitae</label>
                                    <input type="text" class="form-control" readonly value="{{ $user->cv }}">
                                    {{-- Buatkan button preview pdf di sini --}}
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/pdf/cv/' . $user->cv) }}" target="_blank"
                                            class="btn btn-primary">Preview PDF</a>
                                        <a href="{{ asset('storage/pdf/cv/' . $user->cv) }}" download
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
    @endsection

    @section('footer')
        @include('components.dashboard.footer')
    @endsection
