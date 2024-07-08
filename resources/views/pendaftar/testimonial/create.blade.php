@extends('layouts.landing-page')

@section('navbar')
    @include('components.landing-page.navbar')
@endsection

@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper container shadow-2xl my-4">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="card bg-white shadow rounded-lg">
                        <div class="card-body p-6">
                            <h4 class="card-header card-title rounded bg-primary text-white shadow-lg text-center-md">Add
                                Testimonial</h4>
                            <form class="space-y-4" method="POST" action="{{ route('testimonial.pendaftar.store') }}"
                                id="testimonialForm">
                                @csrf

                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="id_users" class="block text-lg font-bold">Nama Pendaftar</label>
                                            <input type="text" class="form-control w-full px-4 py-2 border rounded-lg"
                                                id="id_users" name="id_users" placeholder=" {{ Auth::user()->name }}"
                                                required disabled>
                                        </div>

                                        <div>
                                            <label for="rate" class="block text-lg font-bold">Rating</label>
                                            <select class="form-control w-full px-4 py-2 border rounded-lg" id="rate"
                                                name="rate" required>
                                                <option value="1">1 Bintang</option>
                                                <option value="2">2 Bintang</option>
                                                <option value="3">3 Bintang</option>
                                                <option value="4">4 Bintang</option>
                                                <option value="5">5 Bintang</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan" class="block text-lg font-bold">Description</label>
                                        <textarea class="form-control w-full px-4 py-2 border rounded-lg" id="keterangan" name="keterangan" rows="4"
                                            placeholder="Description" required></textarea>
                                    </div>

                                    <div class="flex justify-end space-x-4">
                                        <a href="{{ route('testimonial.index') }}"
                                            class="py-2 px-5 rounded-md text-slate-800 hover:bg-gray-700 hover:text-white bg-gray-300 transition-all duration-300 ease-in-out">Cancel</a>
                                        <button type="submit"
                                            class="py-2 px-5 rounded-md text-white hover:bg-gray-800 hover:text-white bg-gray-600 transition-all duration-300 ease-in-out">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        document.getElementById('testimonialForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting immediately

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyimpan testimonial ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Submit the form if confirmed
                }
            });
        });
    </script>
@endpush

@section('footer')
    @include('components.landing-page.footer')
@endsection
