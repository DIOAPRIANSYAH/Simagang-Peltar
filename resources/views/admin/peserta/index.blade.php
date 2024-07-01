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
                            Data Magang
                        </h4>
                        <div class="card-body">
                            <a href="{{ route('peserta.create') }}" class="btn btn-primary mb-3 float-right">Tambah
                                Data</a>

                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th class="text-center">Nama Sekolah</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Tanggal Mulai</th>
                                            <th class="text-center">Tanggal Akhir</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($magang as $no => $item)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td class="text-center">{{ $item->user->nama_sekolah }}</td>
                                                <td>
                                                    <span
                                                        class="badge status-badge rounded-pill text-center font-weight-bold d-flex justify-content-center">
                                                        {{ $item->status }}
                                                    </span>
                                                </td>
                                                <td class="text-center">{{ $item->tanggal_mulai_formatted }}</td>
                                                <td class="text-center">{{ $item->tanggal_berakhir_formatted }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('peserta.show', $item->getEncryptedId()) }}"
                                                        class="btn btn-sm btn-info">Lihat</a>
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
    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Dapatkan semua elemen dengan kelas 'status-badge'
                const statusBadges = document.querySelectorAll('.status-badge');

                // Debug: Tampilkan jumlah elemen yang ditemukan
                console.log(`Found ${statusBadges.length} status badges`);

                // Loop melalui setiap elemen dan ubah warna background berdasarkan nilainya
                statusBadges.forEach(function(badge) {
                    // Debug: Tampilkan nilai teks dalam elemen <span>
                    console.log(`Status badge text: '${badge.textContent.trim()}'`);

                    // Hapus semua kelas background yang mungkin ada sebelumnya
                    badge.classList.remove('badge-primary', 'badge-success', 'badge-warning', 'badge-info',
                        'badge-danger');

                    // Tambahkan kelas background berdasarkan nilai teks dalam elemen <span>
                    switch (badge.textContent.trim()) {
                        case 'Document Submited':
                            badge.classList.add('badge-info');
                            break;
                        case 'On Review':
                            badge.classList.add('badge-warning');
                            break;
                        case 'Accepted':
                            badge.classList.add('badge-success');
                            break;
                        case 'Rejected':
                            badge.classList.add('badge-danger');
                            break;
                        default:
                            badge.classList.add('badge-primary'); // Default class
                            break;
                    }

                    // Debug: Tampilkan kelas yang ditambahkan
                    console.log(`Classes after update: ${badge.classList}`);
                });
            });
        </script>
    @endpush

    @section('footer')
        @include('components.dashboard.footer')
    @endsection
