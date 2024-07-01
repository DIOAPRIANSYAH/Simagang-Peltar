@extends('layouts.dashboard')

@push('js')
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
                                Add Testimonial</h4>

                            <form class="forms-sample" method="POST" action="{{ route('testimonial.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="id_users"><strong>User</strong></label>
                                    <select class="form-control" id="id_users" name="id_users">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="rate"><strong>Rating</strong></label>
                                    <select class="form-control" id="rate" name="rate">
                                        <option value="1">1 Bintang</option>
                                        <option value="2">2 Bintang</option>
                                        <option value="3">3 Bintang</option>
                                        <option value="4">4 Bintang</option>
                                        <option value="5">5 Bintang</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan"><strong>Description</strong></label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Description"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary ml-2 float-right">Save</button>
                                <a href="{{ route('testimonial.index') }}" class="btn btn-light float-right">Cancel</a>
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
