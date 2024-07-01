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
                                Detail Data Kegiatan Satuan Kerja</h4>

                            <div class="form-group">
                                <label for="id_satker"><strong>Satuan Kerja</strong></label>
                                <input type="text" class="form-control" id="id_satker" name="id_satker"
                                    value="{{ $kegiatanSatker->satker->nama_satker }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="judul_kegiatan"><strong>Judul Kegiatan</strong></label>
                                <input type="text" class="form-control" id="judul_kegiatan" name="judul_kegiatan"
                                    value="{{ $kegiatanSatker->judul_kegiatan }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi"><strong>Deskripsi</strong></label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" readonly>{{ $kegiatanSatker->deskripsi }}</textarea>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label for="updated_at"><strong>Updated At</strong></label>
                                    <input type="text" class="form-control" id="updated_at" name="updated_at"
                                        placeholder="updated_at" value="{{ $kegiatanSatker->updated_at }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="created_at"><strong>Created At</strong></label>
                                    <input type="text" class="form-control" id="created_at" name="created_at"
                                        placeholder="created_at" value="{{ $kegiatanSatker->created_at }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fotoKegiatan"><strong>Foto Kegiatan</strong></label>
                                <img class="rounded"
                                    src="{{ asset('storage/images/kegiatan_satker/' . $kegiatanSatker->fotoKegiatan) }}"
                                    alt="Foto Kegiatan" style="max-width: 200px; max-height: 200px;">
                            </div>

                            <a href="{{ route('kegiatan_satker.index') }}" class="btn btn-primary float-right">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('footer')
        @include('components.dashboard.footer')
    @endsection
