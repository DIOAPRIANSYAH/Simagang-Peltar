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
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">Tambah
                                Data Kualifikasi</h4>

                            <form class="forms-sample" method="POST" action="{{ route('kualifikasi.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="id_satker"><strong>Satuan Kerja</strong></label>
                                    <select class="custom-select form-control" id="id_satker" name="id_satker">
                                        <option value="">Pilih Satuan Kerja</option>
                                        @foreach ($satkers as $satker)
                                            <option value="{{ $satker->id }}">{{ $satker->nama_satker }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gender"><strong>Gender</strong></label>
                                    <input type="text" class="form-control" id="gender" name="gender"
                                        placeholder="Gender">
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan"><strong>Pendidikan</strong></label>
                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                                        placeholder="Pendidikan">
                                </div>
                                <div class="form-group">
                                    <label for="jurusan"><strong>Jurusan</strong></label>
                                    <input type="text" class="form-control" id="jurusan" name="jurusan"
                                        placeholder="Jurusan">
                                </div>
                                <div class="form-group">
                                    <label for="perangkat"><strong>Perangkat</strong></label>
                                    <input type="text" class="form-control" id="perangkat" name="perangkat"
                                        placeholder="Perangkat">
                                </div>
                                <div class="form-group">
                                    <label for="penempatan"><strong>Penempatan</strong></label>
                                    <input type="text" class="form-control" id="penempatan" name="penempatan"
                                        placeholder="Penempatan">
                                </div>
                                <div class="form-group">
                                    <label for="durasi"><strong>Durasi</strong></label>
                                    <input type="text" class="form-control" id="durasi" name="durasi"
                                        placeholder="Durasi">
                                </div>
                                <div class="form-group">
                                    <label for="kompetensi"><strong>Kompetensi</strong></label>
                                    <input type="text" class="form-control" id="kompetensi" name="kompetensi"
                                        placeholder="Kompetensi">
                                </div>
                                <button type="submit" class="btn btn-primary ml-2 float-right">Simpan</button>
                                <a href="{{ route('kualifikasi.index') }}" class="btn btn-light float-right">Batal</a>
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