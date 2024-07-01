@extends('layouts.dashboard')

@push('styles')
    <style type="text/css">
        @media (max-width: 767.98px) {
            .text-center-md {
                text-align: center;
            }
        }
    </style>
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
                                Tambah Data Magang
                            </h4>

                            <form method="POST" action="{{ route('magang.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name"><strong>Nama</strong></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nama" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_sekolah"><strong>Nama Sekolah</strong></label>
                                            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
                                                placeholder="Nama Sekolah" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jurusan"><strong>Jurusan</strong></label>
                                            <input type="text" class="form-control" id="jurusan" name="jurusan"
                                                placeholder="Jurusan" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="status"><strong>Status</strong></label>
                                            <select id="selection_stage" name="status" class="form-control">
                                                <option value="Document Submitted" disabled>Pilih Status</option>
                                                <option value="Document Submitted">Document Submitted</option>
                                                <option value="On Review">On Review
                                                </option>
                                                <option value="Accepted">Accepted</option>
                                                <option value="Rejected">Rejected</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tanggal_mulai"><strong>Tanggal Mulai</strong></label>
                                            <input type="date" class="form-control" id="tanggal_mulai"
                                                name="tanggal_mulai" placeholder="Tanggal Mulai" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tanggal_berakhir"><strong>Tanggal Akhir</strong></label>
                                            <input type="date" class="form-control" id="tanggal_berakhir"
                                                id="tanggal_berakhir" name="tanggal_berakhir" placeholder="Tanggal Akhir"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="dosen_pembimbing_lapangan"><strong>Dosen Pembimbing
                                                    Lapangan</strong></label>
                                            <input type="text" class="form-control" id="dosen_pembimbing_lapangan"
                                                name="dosen_pembimbing_lapangan" placeholder="Dosen Pembimbing Lapangan"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="dosen_pembimbing_kampus"><strong>Dosen Pembimbing
                                                    Kampus</strong></label>
                                            <input type="text" class="form-control" id="dosen_pembimbing_kampus"
                                                name="dosen_pembimbing_kampus" placeholder="Dosen Pembimbing Kampus"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="satuan_kerja"><strong>Satuan Kerja</strong></label>
                                            <select class="custom-select form-control" id="id_satker" name="id_satker">
                                                <option>Pilih Satuan Kerja</option>
                                                @foreach ($satkers as $satker)
                                                    <option value="{{ $satker->id }}">{{ $satker->nama_satker }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="surat_rekomendasi"><strong>Surat Rekomendasi</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="surat_rekomendasi" class="input-group-text">Surat Rekomendasi</label>
                                    <input type="file" class="form-control" id="surat_rekomendasi"
                                        name="surat_rekomendasi" accept="application/pdf"> <input type="text"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="proposal"><strong>Proposal</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="proposal" class="input-group-text">Proposal</label>
                                    <input type="file" class="form-control" id="proposal" name="proposal"
                                        accept="application/pdf"> <input type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="surat_pengantar"><strong>Surat Pengantar</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="surat_pengantar" class="input-group-text">Surat Pengantar</label>
                                    <input type="file" class="form-control" id="surat_pengantar"
                                        name="surat_pengantar" accept="application/pdf"> <input type="text"
                                        class="form-control">

                                </div>

                                <!-- Tambahkan input sesuai dengan kebutuhan -->

                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                <a href="{{ route('magang.index') }}" class="btn btn-secondary float-right mr-2">Batal</a>
                            </form>
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
