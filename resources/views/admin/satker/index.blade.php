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
                        <div class="card-body">
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">
                                Data Satuan Kerja</h4>
                            <a href="{{ route('satker.create') }}" class="btn btn-primary mb-3 float-right">Tambah Data</a>

                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Satuan Kerja</th>
                                            <th>Deskripsi</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($satkers as $no => $satker)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $satker->nama_satker }}</td>
                                                <td>{{ Str::limit($satker->deskripsi, 50) }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('satker.show', $satker->getEncryptedId()) }}"
                                                        class="btn btn-sm btn-info">Lihat</a>
                                                    <a href="{{ route('satker.edit', $satker->getEncryptedId()) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('satker.destroy', $satker->getEncryptedId()) }}"
                                                        method="POST" class="delete-form" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-sm btn-danger delete-button">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tr>
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
