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
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">Tambah
                                Data Kegiatan Satuan Kerja</h4>

                            <form class="forms-sample" method="POST" action="{{ route('kegiatan_satker.store') }}"
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
                                    <label for="judul_kegiatan"><strong>Judul Kegiatan</strong></label>
                                    <input type="text" class="form-control" id="judul_kegiatan" name="judul_kegiatan"
                                        placeholder="Judul Kegiatan">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi"><strong>Deskripsi</strong></label>
                                    <textarea class="form-control" placeholder="Deskripsi" id="deskripsi" name="deskripsi" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="fotoKegiatan"><strong>Foto Kegiatan</strong></label>
                                </div>
                                <div class="input-group mb-3">

                                    <label for="fotoKegiatan" class="input-group-text" for="inputGroupFile01">Upload</label>
                                    <input type="file" class="form-control" id="inputGroupFile01" id="fotoKegiatan"
                                        name="fotoKegiatan" onchange="previewImage(event)">

                                </div>
                                <img class="rounded" id="preview" src="#" alt="Preview Image"
                                    style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;">
                                <button type="submit" class="btn btn-primary ml-2 float-right">Simpan</button>
                                <a href="{{ route('kegiatan_satker.index') }}" class="btn btn-light float-right">Batal</a>
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
