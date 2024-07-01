@extends('layouts.dashboard')

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
                        <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">
                            Data Pengguna</h4>
                        <div class="card-body">
                            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3 float-right">Tambah
                                Data</a>

                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Instansi</th>
                                            <th class="text-center">Jurusan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $no => $user)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    @if ($user->status == 'Aktif')
                                                        <span
                                                            class="d-flex justify-content-center badge status-badge rounded-pill text-center font-weight-bold bg-warning text-dark">
                                                            {{ $user->status }}
                                                        </span>
                                                    @else
                                                        <span
                                                            class="d-flex justify-content-center badge status-badge rounded-pill text-center font-weight-bold bg-danger text-white">
                                                            {{ $user->status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $user->nama_sekolah }}</td>
                                                <td class="text-center">{{ $user->jurusan }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('users.show', $user->getEncryptedId()) }}"
                                                        class="btn btn-sm btn-info">Lihat</a>
                                                    <a href="{{ route('users.edit', $user->getEncryptedId()) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('users.destroy', $user->getEncryptedId()) }}"
                                                        method="POST" class="delete-form" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-sm btn-danger delete-button">Hapus</button>
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
