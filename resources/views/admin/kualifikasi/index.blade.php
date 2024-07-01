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
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">
                                Data Kualifikasi</h4>
                            <a href="{{ route('kualifikasi.create') }}" class="btn btn-primary mb-3 float-right">Tambah
                                Data</a>

                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Satuan Kerja</th>
                                            <th>Pendidikan</th>
                                            <th>Jurusan</th>
                                            <th>Kompetensi</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kualifikasi as $index => $data)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->satker->nama_satker }}</td>
                                                <td>{{ $data->pendidikan }}</td>
                                                <td>{{ $data->jurusan }}</td>
                                                <td>{{ $data->kompetensi }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('kualifikasi.show', $data->getEncryptedId()) }}"
                                                        class="btn btn-sm btn-info">Lihat</a>
                                                    <a href="{{ route('kualifikasi.edit', $data->getEncryptedId()) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <form
                                                        action="{{ route('kualifikasi.destroy', $data->getEncryptedId()) }}"
                                                        method="POST" style="display: inline;" class="delete-form">
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
