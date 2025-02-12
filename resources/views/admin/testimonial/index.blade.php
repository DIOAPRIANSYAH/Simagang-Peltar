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
            {{-- Table Template --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">
                                Data Testimonials</h4>
                            <a href="{{ route('testimonial.create') }}" class="btn btn-primary mb-3 float-right">Tambah
                                Testimonial</a>

                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th class="text-center">Institusi</th>
                                            <th class="text-center">Rating</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testimonials as $no => $testimonial)
                                            <tr>
                                                <td>{{ $no + 1 }}</i>
                                                </td>
                                                <td>{{ $testimonial->user->name }}</td>
                                                <td class="text-center">{{ $testimonial->user->nama_sekolah }}</td>
                                                <td class="text-center">{{ $testimonial->rate }}</td>

                                                <td class="text-center">
                                                    <a href="{{ route('testimonial.show', $testimonial->getEncryptedId()) }}"
                                                        class="btn btn-sm btn-info">View</a>
                                                    <a href="{{ route('testimonial.edit', $testimonial->getEncryptedId()) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <form
                                                        action="{{ route('testimonial.destroy', $testimonial->getEncryptedId()) }}"
                                                        method="POST" class="delete-form" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-sm btn-danger delete-button">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('footer')
        @include('components.dashboard.footer')
    @endsection
