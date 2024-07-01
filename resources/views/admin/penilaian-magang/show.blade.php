@extends('layouts.dashboard')

@push('styles')
    <style type="text/css">
        @media (max-width: 767.98px) {
            .text-center-md {
                text-align: center;
            }
        }
    </style>
    <style>
        /* Tambahkan beberapa kelas warna khusus untuk input */
        .bg-info {
            background-color: #d1ecf1 !important;
        }

        .bg-warning {
            background-color: #fff3cd !important;
        }

        .bg-success {
            background-color: #d4edda !important;
        }

        .bg-danger {
            background-color: #f8d7da !important;
        }
    </style>
@endpush

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan elemen input dengan id 'status'
            const statusInput = document.getElementById('status');

            // Debug: Tampilkan nilai teks dalam elemen input
            console.log(`Status input value: '${statusInput.value.trim()}'`);

            // Hapus semua kelas background yang mungkin ada sebelumnya
            statusInput.classList.remove('bg-info', 'bg-warning', 'bg-success', 'bg-danger');

            // Tambahkan kelas background berdasarkan nilai teks dalam elemen input
            switch (statusInput.value.trim()) {
                case 'Document Submited':
                    statusInput.classList.add('bg-info');
                    break;
                case 'On Review':
                    statusInput.classList.add('bg-warning');
                    break;
                case 'Accepted':
                    statusInput.classList.add('bg-success');
                    break;
                case 'Rejected':
                    statusInput.classList.add('bg-danger');
                    break;
                default:
                    break;
            }

            // Debug: Tampilkan kelas yang ditambahkan
            console.log(`Classes after update: ${statusInput.classList}`);
        });
    </script>
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
                                Lihat Data Magang</h4>

                            <form class="forms-sample">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name"><strong>Nama</strong></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nama" required disabled value="{{ $magang->user->name }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_sekolah"><strong>Nama Sekolah</strong></label>
                                            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
                                                placeholder="Nama Sekolah" disabled
                                                value="{{ $magang->user->nama_sekolah }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="judul"><strong>Judul Projek</strong></label>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                placeholder="Judul Projek"
                                                value="{{ $magang->first()->judul }}
                                                "
                                                disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jurusan"><strong>Jurusan</strong></label>
                                            <input type="text" class="form-control" id="jurusan" name="jurusan"
                                                placeholder="Jurusan" disabled value="{{ $magang->user->jurusan }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="status"><strong>Status</strong></label>
                                            <input type="text" class="form-control font-weight-bold" id="status"
                                                name="status" placeholder="Status" disabled value="{{ $magang->status }}">
                                        </div>
                                    </div>
                                </div>

                                @php
                                    use Carbon\Carbon;
                                    setlocale(LC_TIME, 'id_ID');
                                    $formattedTanggalMulai = Carbon::parse($magang->tanggal_mulai)->translatedFormat(
                                        'd F Y',
                                    );
                                    $formattedTanggalAkhir = Carbon::parse($magang->tanggal_berakhir)->translatedFormat(
                                        'd F Y',
                                    );
                                @endphp
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tanggal_mulai"><strong>Tanggal Mulai</strong></label>
                                            <input type="text" class="form-control" id="tanggal_mulai"
                                                name="tanggal_mulai" placeholder="Tanggal Mulai" disabled
                                                value="{{ $formattedTanggalMulai }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tanggal_akhir"><strong>Tanggal Akhir</strong></label>
                                            <input type="text" class="form-control" id="tanggal_akhir"
                                                name="tanggal_berakhir" placeholder="Tanggal Akhir" disabled
                                                value="{{ $formattedTanggalAkhir }}">
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
                                                disabled value="{{ $magang->dosen_pembimbing_lapangan }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="dosen_pembimbing_kampus"><strong>Dosen Pembimbing
                                                    Kampus</strong></label>
                                            <input type="text" class="form-control" id="dosen_pembimbing_kampus"
                                                name="dosen_pembimbing_kampus" placeholder="Dosen Pembimbing Kampus"
                                                disabled value="{{ $magang->dosen_pembimbing_kampus }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="satuan_kerja"><strong>Satuan Kerja</strong></label>
                                            <input type="text" class="form-control" id="satuan_kerja"
                                                name="satuan_kerja" placeholder="Satuan Kerja" disabled
                                                value="{{ $magang->satuan_kerja }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="foto"><strong>Surat Rekomendasi</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="surat_rekomendasi" class="input-group-text">Surat Rekomendasi</label>
                                    <input type="text" class="form-control" readonly
                                        value="{{ $magang->surat_rekomendasi }}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/pdf/surat_rekomendasi/' . $magang->surat_rekomendasi) }}"
                                            target="_blank" class="btn btn-primary">Preview PDF</a>
                                        <a href="{{ asset('storage/pdf/surat_rekomendasi/' . $magang->surat_rekomendasi) }}"
                                            download class="btn btn-warning ml-2">Download PDF</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="foto"><strong>Proposal</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="proposal" class="input-group-text">Proposal</label>
                                    <input type="text" class="form-control" readonly value="{{ $magang->proposal }}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/pdf/proposal/' . $magang->proposal) }}"
                                            target="_blank" class="btn btn-primary">Preview PDF</a>
                                        <a href="{{ asset('storage/pdf/proposal/' . $magang->proposal) }}" download
                                            class="btn btn-warning ml-2">Download PDF</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="foto"><strong>Surat Pengantar</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="surat_pengantar" class="input-group-text">Surat Pengantar</label>
                                    <input type="text" class="form-control" readonly
                                        value="{{ $magang->surat_pengantar }}">
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/pdf/surat_pengantar/' . $magang->surat_pengantar) }}"
                                            target="_blank" class="btn btn-primary">Preview PDF</a>
                                        <a href="{{ asset('storage/pdf/surat_pengantar/' . $magang->surat_pengantar) }}"
                                            download class="btn btn-warning ml-2">Download PDF</a>
                                    </div>
                                </div>

                                <a href="{{ route('magang.index') }}" class="btn btn-primary float-right">Kembali</a>
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
