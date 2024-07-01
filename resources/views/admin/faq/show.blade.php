@extends('layouts.dashboard')

@push('styles')
@endpush

@section('navbar')
    @include('components.dashboard.navbar')
@endsection

@section('sidebar')
    @include('components.dashboard.sidebar')
@endsection

@section('main-content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">
                            Detail Data FAQ</h4>

                        <div class="form-group">
                            <label for="judul"><strong>Judul</strong></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul"
                                value="{{ $faq->judul }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="keterangan"><strong>Keterangan</strong></label>
                            <textarea class="form-control" placeholder="Keterangan" id="keterangan" name="keterangan" rows="4" readonly>{{ $faq->keterangan }}</textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="updated_at"><strong>Updated At</strong></label>
                                <input type="text" class="form-control" id="updated_at" name="updated_at"
                                    placeholder="updated_at" value="{{ $faq->updated_at }}" readonly>
                            </div>
                            <div class="col">
                                <label for="created_at"><strong>Created At</strong></label>
                                <input type="text" class="form-control" id="created_at" name="created_at"
                                    placeholder="created_at" value="{{ $faq->created_at }}" readonly>
                            </div>
                        </div>
                        <a href="{{ route('faq.index') }}" class="btn btn-primary mt-3 float-right">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('components.dashboard.footer')
@endsection
