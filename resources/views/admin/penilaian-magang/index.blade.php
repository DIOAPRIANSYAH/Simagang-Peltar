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
                            <a href="{{ route('penilaian-magang.create') }}" class="btn btn-primary mb-3 float-right">Tambah
                                Data</a>

                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Ketua</th>
                                            <th>Nama Anggota 1</th>
                                            <th>Nama Anggota 2</th>
                                            <th>Identitas Diri</th>
                                            <th>GitHub</th>
                                            <th>LinkedIn</th>
                                            <th>Instagram</th>
                                            <th>Proposal</th>
                                            <th>Surat Rekomendasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penilaianMagang as $penilaian)
                                            <tr>
                                                <td>{{ $penilaian->id }}</td>
                                                <td>{{ $penilaian->magang->ketua->name }}</td>
                                                <td>{{ $penilaian->magang->anggota->where('id_users', '!=', $penilaian->magang->id_users)->first()->user->name ?? 'N/A' }}
                                                </td>
                                                <td>{{ $penilaian->magang->anggota->where('id_users', '!=', $penilaian->magang->id_users)->skip(1)->first()->user->name ?? 'N/A' }}
                                                </td>
                                                <td>{{ $penilaian->identitas_diri }}</td>
                                                <td>{{ $penilaian->github }}</td>
                                                <td>{{ $penilaian->linkedin }}</td>
                                                <td>{{ $penilaian->instagram }}</td>
                                                <td>{{ $penilaian->proposal }}</td>
                                                <td>{{ $penilaian->surat_rekomendasi }}</td>
                                                <td>
                                                    <a href="{{ route('penilaian-magang.show', encrypt($penilaian->id)) }}"
                                                        class="btn btn-info">Lihat</a>
                                                    <a href="{{ route('penilaian-magang.edit', encrypt($penilaian->id)) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form
                                                        action="{{ route('penilaian-magang.destroy', encrypt($penilaian->id)) }}"
                                                        method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus penilaian ini?')">Hapus</button>
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
