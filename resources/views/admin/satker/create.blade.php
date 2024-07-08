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
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">Tambah
                                Data Satuan Kerja</h4>

                            <form class="forms-sample" enctype="multipart/form-data" method="POST"
                                action="{{ route('satker.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="foto"><strong>Foto Satker</strong></label>
                                        </div>
                                        <img class="d-flex justify-end rounded border border-gray-400 mb-3" id="preview"
                                            src="https://via.placeholder.com/200" alt="Avatar Dummy"
                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                        {{-- <img class="d-flex justify-end rounded border border-gray-400 mb-3" id="preview"
                                            src="#" alt=""
                                            style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;"> --}}
                                        <div class="input-group mb-3">

                                            <label for="foto" class="input-group-text" \
                                                for="inputGroupFile01">Upload</label>
                                            <input type="file" accept="image/*" class="form-control"
                                                id="inputGroupFile01" id="foto" name="foto"
                                                onchange="previewImage(event)">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_satker"><strong>Nama Satuan Kerja</strong></label>
                                    <input type="text" class="form-control" id="nama_satker" name="nama_satker"
                                        placeholder="Nama Satuan Kerja">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi"><strong>Deskripsi</strong></label>
                                    <textarea class="form-control" placeholder="Deskripsi" id="deskripsi" name="deskripsi" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary ml-2 float-right">Simpan</button>
                                <a href="{{ route('satker.index') }}" class="btn btn-light float-right">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('js')
        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                });
            </script>
        @endif

        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: '{!! implode('<br>', $errors->all()) !!}',
                });
            </script>
        @endif
        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var preview = document.getElementById('preview');
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    @endpush

    @section('footer')
        @include('components.dashboard.footer')
    @endsection
