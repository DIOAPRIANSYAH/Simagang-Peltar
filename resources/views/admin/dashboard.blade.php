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
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                            {{-- <h6 class="font-weight-normal mb-0">
                                All systems are running smoothly! You have
                                <span class="text-primary">3 unread alerts!</span>
                            </h6> --}}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Data --}}
            <div class="row mb-4">
                <div class="col-xl-3 col-lg-6 col-md-6 col-12 mt-6">
                    <!-- card -->
                    <div class="card shadow-lg rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Total Users</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-briefcase fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $totalUsers }}</h1>
                                <p class="mb-0">
                                    <span class="text-dark me-2">Current Count</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12 mt-6">
                    <!-- card -->
                    <div class="card shadow-lg rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Total Pendaftar</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-list-task fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $totalUsersAndMembers }}</h1>
                                <p class="mb-0">
                                    <span class="text-dark me-2">Current Count</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12 mt-6">
                    <!-- card -->
                    <div class="card shadow-lg rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Total Accepted</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-people fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $totalAcceptedInternships }}</h1>
                                <p class="mb-0">
                                    <span class="text-dark me-2">Current Count</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12 mt-6">
                    <!-- card -->
                    <div class="card shadow-lg rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Total Rejected</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-bullseye fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $totalRejectedInternships }}</h1>
                                <p class="mb-0">
                                    <span class="text-success me-2">Current Count</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Data Maps --}}
            <div class="container-map justify-items-center shadow-lg rounded-lg">
                <div id="container-map" class="pt-5 rounded-md shadow-md"></div>
            </div>
            {{-- Charts Data --}}

            <div class="row my-5">
                <div class="col">
                    <div class="card shadow-lg rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div id="genderChartContainer">
                                <canvas id="genderChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-lg rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div id="mahasiswaByKampusChartContainer">
                                <canvas id="lineChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col">
                    <div class="card shadow-lg rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div id="satuanKerjaChartContainer">
                                <canvas id="satuanKerjaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-lg rounded">
                        <!-- card body -->
                        <div class="card-body">
                            <div id="statusChartContainer">
                                <canvas id="statusChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
    @push('styles')
        <style>
            .card-item {
                transition: transform 0.3s ease-in-out;
            }

            .card-item:hover {
                transform: translateY(-10px);
            }

            #container-map {
                height: auto;

            }

            .loading {
                margin-top: 10em;
                text-align: center;
                color: gray;
            }
        </style>
    @endpush
    @push('js')
        <script src="{{ asset('assets/js/maps.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.highcharts.com/maps/highmaps.js"></script>
        <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/maps/highmaps.js"></script>
        <script src="https://code.highcharts.com/maps/modules/data.js"></script>
        <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/maps/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/maps/modules/accessibility.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                // Data gender dari tabel User dan Anggota
                var userGenderCounts = @json($userGenderCounts);
                var anggotaGenderCounts = @json($anggotaGenderCounts);

                var maleCount = 0;
                var femaleCount = 0;

                userGenderCounts.forEach(function(item) {
                    if (item.jenis_kelamin === 'Laki-laki') {
                        maleCount += item.total;
                    } else if (item.jenis_kelamin === 'Perempuan') {
                        femaleCount += item.total;
                    }
                });

                anggotaGenderCounts.forEach(function(item) {
                    if (item.jenis_kelamin === 'Laki-laki') {
                        maleCount += item.total;
                    } else if (item.jenis_kelamin === 'Perempuan') {
                        femaleCount += item.total;
                    }
                });

                var ctx = document.getElementById('genderChart').getContext('2d');
                var genderChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Laki-laki', 'Perempuan'],
                        datasets: [{
                            label: 'Gender',
                            data: [maleCount, femaleCount],
                            backgroundColor: ['#36A2EB', '#FF6384'],
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Grafik Gender Pendaftar',
                                font: {
                                    size: 18,
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                });
            });
            document.addEventListener('DOMContentLoaded', (event) => {
                // Data jumlah magang dengan status tertentu
                var documentSubmittedCount = @json($documentSubmittedCount);
                var onReviewCount = @json($onReviewCount);
                var acceptedCount = @json($acceptedCount);
                var rejectedCount = @json($rejectedCount);

                var ctx = document.getElementById('statusChart').getContext('2d');
                var statusChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Document Submitted', 'On Review', 'Accepted', 'Rejected'],
                        datasets: [{
                            label: 'Status Magang',
                            data: [documentSubmittedCount, onReviewCount, acceptedCount, rejectedCount],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.5)', // Merah
                                'rgba(54, 162, 235, 0.5)', // Biru
                                'rgba(75, 192, 192, 0.5)', // Hijau
                                'rgba(255, 206, 86, 0.5)', // Kuning
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)', // Merah
                                'rgba(54, 162, 235, 1)', // Biru
                                'rgba(75, 192, 192, 1)', // Hijau
                                'rgba(255, 206, 86, 1)', // Kuning
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Grafik Status Magang',
                                font: {
                                    size: 18,
                                    weight: 'bold'
                                }
                            }
                        }

                    }

                });
            });

            document.addEventListener('DOMContentLoaded', (event) => {
                // Data jumlah users berdasarkan satuan kerja
                var usersBySatuanKerja = @json($usersBySatuanKerja);

                var labels = [];
                var usersCount = [];

                // Loop untuk menyiapkan data
                usersBySatuanKerja.forEach(function(item) {
                    labels.push(item.satuan_kerja);
                    usersCount.push(item.total);
                });

                var ctx = document.getElementById('satuanKerjaChart').getContext('2d');
                var satuanKerjaChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Users',
                            data: usersCount,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)', // Ubah warna di sini
                            borderColor: 'rgba(54, 162, 235, 1)', // Ubah warna di sini
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Grafik Satuan Kerja',
                                font: {
                                    size: 18,
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                });
            });

            document.addEventListener('DOMContentLoaded', (event) => {
                var lineChartData = @json($lineChartData);

                var labels = [];
                var data = [];

                lineChartData.forEach(function(item) {
                    labels.push(item.nama_sekolah);
                    data.push(item.jumlah_mahasiswa);
                });

                var ctx = document.getElementById('lineChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Mahasiswa',
                            data: data,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            fill: true,
                            tension: 0.1,
                            spanGaps: true,
                            stepped: false
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        elements: {
                            line: {
                                borderDash: [5, 5], // Setting the line to be dashed
                                borderDashOffset: 2, // Setting the dash offset for the line
                                fill: 'start', // Ensuring the line fills to the chart boundaries
                                borderJoinStyle: 'miter' // Setting the border join style for better boundary visualization
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Grafik Instansi',
                                font: {
                                    size: 18,
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
    @section('footer')
        @include('components.dashboard.footer')
    @endsection
