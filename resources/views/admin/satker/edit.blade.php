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
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">Edit
                                Data Satuan Kerja</h4>

                            <form class="forms-sample" method="POST"
                                action="{{ route('satker.update', $satker->getEncryptedId()) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="foto"><strong>Foto Satker</strong></label>
                                        </div>

                                        <img class="d-flex justify-end rounded border border-gray-400 mb-3" id="preview"
                                            src="{{ $satker->foto ? asset('storage/images/satker/' . $satker->foto) : 'https://via.placeholder.com/200' }}"
                                            alt="Avatar Dummy"
                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                        <div class="input-group mb-3">
                                            <label for="foto" class="input-group-text"
                                                for="inputGroupFile01">Upload</label>
                                            <input type="file" class="form-control" id="inputGroupFile01" name="foto"
                                                onchange="previewImage(event)">
                                            <input type="text" class="form-control" value="{{ $satker->foto }}" readonly>
                                            <div class="input-group-append">
                                                <a href="{{ asset('storage/images/satker/' . $satker->foto) }}"
                                                    target="_blank" class="btn btn-primary">Preview Foto</a>
                                                <a href="{{ asset('storage/images/satker/' . $satker->foto) }}" download
                                                    class="btn btn-warning ml-2">Download Foto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_satker"><strong>Nama Satuan Kerja</strong></label>
                                    <input type="text" class="form-control" id="nama_satker" name="nama_satker"
                                        placeholder="Nama Satuan Kerja" value="{{ $satker->nama_satker }}">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi"><strong>Deskripsi</strong></label>
                                    <textarea class="form-control" placeholder="Deskripsi" id="deskripsi" name="deskripsi" rows="4">{{ $satker->deskripsi }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary ml-2 float-right">Simpan</button>
                                <a href="{{ route('satker.index') }}" class="btn btn-light float-right">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
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
    @section('footer')
        @include('components.dashboard.footer')
    @endsection
