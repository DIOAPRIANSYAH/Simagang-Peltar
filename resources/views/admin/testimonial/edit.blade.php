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
@endsection
@section('footer')
    @include('components.dashboard.footer')
@endsection
