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
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">
                                Detail Data Kualifikasi</h4>

                            <div class="form-group">
                                <label for="id_satker"><strong>Satuan Kerja</strong></label>
                                <input type="text" class="form-control" id="id_satker" name="id_satker"
                                    placeholder="Satuan Kerja" value="{{ $kualifikasi->satker->nama_satker }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="gender"><strong>Gender</strong></label>
                                <input type="text" class="form-control" id="gender" name="gender"
                                    placeholder="Gender" value="{{ $kualifikasi->gender }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="pendidikan"><strong>Pendidikan</strong></label>
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                                    placeholder="Pendidikan" value="{{ $kualifikasi->pendidikan }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jurusan"><strong>Jurusan</strong></label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan"
                                    placeholder="Jurusan" value="{{ $kualifikasi->jurusan }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="perangkat"><strong>Perangkat</strong></label>
                                <input type="text" class="form-control" id="perangkat" name="perangkat"
                                    placeholder="Perangkat" value="{{ $kualifikasi->perangkat }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="penempatan"><strong>Penempatan</strong></label>
                                <input type="text" class="form-control" id="penempatan" name="penempatan"
                                    placeholder="Penempatan" value="{{ $kualifikasi->penempatan }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="durasi"><strong>Durasi</strong></label>
                                <input type="text" class="form-control" id="durasi" name="durasi"
                                    placeholder="Durasi" value="{{ $kualifikasi->durasi }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kompetensi"><strong>Kompetensi</strong></label>
                                <input type="text" class="form-control" id="kompetensi" name="kompetensi"
                                    placeholder="Kompetensi" value="{{ $kualifikasi->kompetensi }}" readonly>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="updated_at"><strong>Updated At</strong></label>
                                    <input type="text" class="form-control" id="updated_at" name="updated_at"
                                        placeholder="updated_at" value="{{ $kualifikasi->updated_at }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="created_at"><strong>Created At</strong></label>
                                    <input type="text" class="form-control" id="created_at" name="created_at"
                                        placeholder="created_at" value="{{ $kualifikasi->created_at }}" readonly>
                                </div>
                            </div>
                            <a href="{{ route('kualifikasi.index') }}" class="btn btn-primary mt-3 float-right">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('footer')
        @include('components.dashboard.footer')
    @endsection
