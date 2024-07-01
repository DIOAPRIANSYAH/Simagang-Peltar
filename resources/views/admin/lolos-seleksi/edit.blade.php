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
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdown = document.getElementById('selection_stage');

            dropdown.addEventListener('change', function() {
                // Hapus semua kelas background yang mungkin ada sebelumnya
                dropdown.classList.remove('bg-green-500', 'bg-yellow-500', 'bg-blue-500', 'bg-red-500');

                // Tambahkan kelas background berdasarkan nilai yang dipilih
                switch (dropdown.value) {
                    case 'Document Submitted':
                        dropdown.classList.add('bg-blue-500');
                        break;
                    case 'On Review':
                        dropdown.classList.add('bg-yellow-500');
                        break;
                    case 'Accepted':
                        dropdown.classList.add('bg-green-500');
                        break;
                    case 'Rejected':
                        dropdown.classList.add('bg-red-500');
                        break;
                    default:
                        break;
                }
            });

            // Triggers change event on page load to set the initial background
            dropdown.dispatchEvent(new Event('change'));
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
                                Edit Data Magang
                            </h4>

                            <form class="forms-sample" method="POST"
                                action="{{ route('lolos-seleksi.update', $magang->getEncryptedId()) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name"><strong>Nama</strong></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nama" required value="{{ $magang->user->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_sekolah"><strong>Nama Sekolah</strong></label>
                                            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
                                                placeholder="Nama Sekolah" value="{{ $magang->user->nama_sekolah }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jurusan"><strong>Jurusan</strong></label>
                                            <input type="text" class="form-control" id="jurusan" name="jurusan"
                                                placeholder="Jurusan" value="{{ $magang->user->jurusan }}" disabled>
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
                                            <label for="status"><strong>Status</strong></label>
                                            <select id="selection_stage" name="status" class="form-control">
                                                <option value="" disabled {{ $magang->status ? '' : 'selected' }}>
                                                    Pilih Status</option>
                                                <option value="Document Submitted"
                                                    {{ $magang->status == 'Document Submitted' ? 'selected' : '' }}>Document
                                                    Submitted</option>
                                                <option value="On Review"
                                                    {{ $magang->status == 'On Review' ? 'selected' : '' }}>On Review
                                                </option>
                                                <option value="Accepted"
                                                    {{ $magang->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                                <option value="Rejected"
                                                    {{ $magang->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tanggal_mulai"><strong>Tanggal Mulai</strong></label>
                                            <input type="date" class="form-control" id="tanggal_mulai"
                                                name="tanggal_mulai" placeholder="Tanggal Mulai"
                                                value="{{ $magang->tanggal_mulai }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tanggal_akhir"><strong>Tanggal Akhir</strong></label>
                                            <input type="date" class="form-control" id="tanggal_akhir"
                                                name="tanggal_berakhir" placeholder="Tanggal Akhir"
                                                value="{{ $magang->tanggal_berakhir }}">
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
                                                value="{{ $magang->dosen_pembimbing_lapangan }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="dosen_pembimbing_kampus"><strong>Dosen Pembimbing
                                                    Kampus</strong></label>
                                            <input type="text" class="form-control" id="dosen_pembimbing_kampus"
                                                name="dosen_pembimbing_kampus" placeholder="Dosen Pembimbing Kampus"
                                                value="{{ $magang->dosen_pembimbing_kampus }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="satuan_kerja"><strong>Satuan Kerja</strong></label>
                                            <select class="custom-select form-control" id="satuan_kerja"
                                                name="satuan_kerja">
                                                <option value="{{ $magang->satuan_kerja }}">{{ $magang->satuan_kerja }}
                                                </option>
                                                @foreach ($satkers as $satker)
                                                    <option value="{{ $satker->nama_satker }}">{{ $satker->nama_satker }}
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
                                        class="form-control" value="{{ $magang->surat_rekomendasi }}" readonly>
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/pdf/surat_rekomendasi/' . $magang->surat_rekomendasi) }}"
                                            target="_blank" class="btn btn-primary">Preview PDF</a>
                                        <a href="{{ asset('storage/pdf/surat_rekomendasi/' . $magang->surat_rekomendasi) }}"
                                            download class="btn btn-warning ml-2">Download PDF</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="proposal"><strong>Proposal</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="proposal" class="input-group-text">Proposal</label>
                                    <input type="file" class="form-control" id="proposal" name="proposal"
                                        accept="application/pdf"> <input type="text" class="form-control"
                                        value="{{ $magang->proposal }}" readonly>
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/pdf/proposal/' . $magang->proposal) }}"
                                            target="_blank" class="btn btn-primary">Preview PDF</a>
                                        <a href="{{ asset('storage/pdf/proposal/' . $magang->proposal) }}" download
                                            class="btn btn-warning ml-2">Download PDF</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="surat_pengantar"><strong>Surat Pengantar</strong></label>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="surat_pengantar" class="input-group-text">Surat Pengantar</label>
                                    <input type="file" class="form-control" id="surat_pengantar"
                                        name="surat_pengantar" accept="application/pdf"> <input type="text"
                                        class="form-control" value="{{ $magang->surat_pengantar }}" readonly>
                                    <div class="input-group-append">
                                        <a href="{{ asset('storage/pdf/surat_pengantar/' . $magang->surat_pengantar) }}"
                                            target="_blank" class="btn btn-primary">Preview PDF</a>
                                        <a href="{{ asset('storage/pdf/surat_pengantar/' . $magang->surat_pengantar) }}"
                                            download class="btn btn-warning ml-2">Download PDF</a>
                                    </div>
                                </div>
                                <!-- Tambahkan input sesuai dengan kebutuhan -->

                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                <a href="{{ route('lolos-seleksi.index') }}"
                                    class="btn btn-secondary float-right mr-2">Kembali</a>
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
