@extends('layouts.landing-page')

@section('navbar')
    @include('components.landing-page.navbar')
@endsection

@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper container shadow-2xl my-4">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="card bg-white shadow rounded-lg">
                        <div class="card-body p-6">
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">Latest
                                Testimonial</h4>
                            <div class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="id_users" class="block text-lg font-bold">Nama Pendaftar</label>
                                        <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                            id="name" name="name" value="{{ $testimonial->user->name }}"
                                            placeholder="{{ $testimonial->user->name }}" disabled>
                                    </div>

                                    <div>
                                        <label for="rate" class="block text-lg font-bold">Rating</label>
                                        <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                            id="rate" name="rate" value="{{ $testimonial->rate }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan" class="block text-lg font-bold">Description</label>
                                    <textarea class="form-control w-full px-4 py-2 border rounded-lg" id="keterangan" name="keterangan" rows="4"
                                        placeholder="Description" disabled>{{ $testimonial->keterangan }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style type="text/css">
        @media (max-width: 767.98px) {
            .text-center-md {
                text-align: center;
            }
        }
    </style>
@endpush

@section('footer')
    @include('components.landing-page.footer')
@endsection
