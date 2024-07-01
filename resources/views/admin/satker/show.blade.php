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
