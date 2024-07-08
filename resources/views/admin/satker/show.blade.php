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
                                Detail Data Satuan Kerja</h4>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="foto"><strong>Foto Satker</strong></label>
                                    </div>
                                    <img class="d-flex justify-end rounded border border-gray-400 mb-3" id="preview"
                                        src="{{ $satker->foto ? asset('storage/images/satker/' . $satker->foto) : 'https://via.placeholder.com/200' }}"
                                        alt="Avatar Dummy" style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                    <div class="input-group mb-3">
                                        <label for="foto" class="input-group-text" for="inputGroupFile01">Foto
                                            Profil</label>
                                        <input type="text" class="form-control" value="{{ $satker->foto }}" readonly>
                                        <div class="input-group-append">
                                            <a href="{{ asset('storage/images/satker/' . $satker->foto) }}" target="_blank"
                                                class="btn btn-primary">Preview Foto</a>
                                            <a href="{{ asset('storage/images/satker/' . $satker->foto) }}" download
                                                class="btn btn-warning ml-2">Download Foto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_satker"><strong>Nama Satuan Kerja</strong></label>
                                <input type="text" class="form-control" id="nama_satker" name="nama_satker"
                                    placeholder="Nama Satuan Kerja" value="{{ $satker->nama_satker }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi"><strong>Deskripsi</strong></label>
                                <textarea class="form-control" placeholder="Deskripsi" id="deskripsi" name="deskripsi" rows="4" readonly>{{ $satker->deskripsi }}</textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="updated_at"><strong>Updated At</strong></label>
                                    <input type="text" class="form-control" id="updated_at" name="updated_at"
                                        placeholder="updated_at" value="{{ $satker->updated_at }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="created_at"><strong>Created At</strong></label>
                                    <input type="text" class="form-control" id="created_at" name="created_at"
                                        placeholder="created_at" value="{{ $satker->created_at }}" readonly>
                                </div>
                            </div>
                            <a href="{{ route('satker.index') }}" class="btn btn-primary mt-3 float-right">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('footer')
        @include('components.dashboard.footer')
    @endsection
