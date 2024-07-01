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
                            Data Kegiatan Satuan Kerja</h4>
                        <div class="card-body">
                            <a href="{{ route('kegiatan_satker.create') }}" class="btn btn-primary mb-3 float-right">Tambah
                                Data</a>

                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto Kegiatan</th>
                                            <th>Nama Satuan Kerja</th>
                                            <th>Judul Kegiatan</th>
                                            {{-- <th>Deskripsi</th> --}}
                                            <th class="text-center">Di Buat Pada</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kegiatanSatker as $no => $kegiatan)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>
                                                    @if ($kegiatan->fotoKegiatan)
                                                        <img class="rounded"
                                                            src="{{ asset('storage/images/kegiatan_satker/' . $kegiatan->fotoKegiatan) }}"
                                                            alt="Preview Image" width="150" height="100">
                                                    @else
                                                        No Image Available
                                                    @endif
                                                </td>
                                                <td style="white-space: pre-wrap;">{{ $kegiatan->satker->nama_satker }}</td>
                                                <td style="white-space: pre-wrap;">{{ $kegiatan->judul_kegiatan }}</td>
                                                {{-- <td>{{ Str::limit($kegiatan->deskripsi, 50) }}</td> --}}
                                                <td>{{ $kegiatan->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('kegiatan_satker.show', $kegiatan->getEncryptedId()) }}"
                                                        class="btn btn-sm btn-info">Lihat</a>
                                                    <a href="{{ route('kegiatan_satker.edit', $kegiatan->getEncryptedId()) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <form
                                                        action="{{ route('kegiatan_satker.destroy', $kegiatan->getEncryptedId()) }}"
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
