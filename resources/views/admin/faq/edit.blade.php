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
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">
                                Edit Data FAQ
                            </h4>

                            <form class="forms-sample" method="POST"
                                action="{{ route('faq.update', $faq->getEncryptedId()) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="judul"><strong>Judul</strong></label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        placeholder="Judul FAQ" value="{{ $faq->judul }}">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan"><strong>Keterangan</strong></label>
                                    <textarea class="form-control" placeholder="Keterangan" id="keterangan" name="keterangan" rows="4">{{ $faq->keterangan }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary ml-2 float-right">Simpan</button>
                                <a href="{{ route('faq.index') }}" class="btn btn-light float-right">Batal</a>
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
