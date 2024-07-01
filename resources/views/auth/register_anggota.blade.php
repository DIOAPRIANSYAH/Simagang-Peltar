@extends('layouts.native')

@section('main-content')
    <main>

        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form method="POST" action="{{ route('register.submit') }}" autocomplete="off" class="sign-in-form">
                        @csrf
                        <img src="{{ asset('assets/images/logo ptba.png') }}" alt="easyclass" width="140" height="30" />

                        <div class="heading">
                            <h2>Get Started</h2>
                            <h6>Sudah Punya Akun Anggota?</h6>
                            <a href="{{ route('login') }}" class="toggle">Login</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" class="input-field" id="name" name="nama" minlength="4"
                                    autocomplete="off" required />
                                <label for="name">Name</label>
                            </div>

                            <div class="input-wrap">
                                <input type="email" class="input-field" id="email" name="email" autocomplete="off"
                                    required />
                                <label for="email">Email</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" class="input-field" id="password" name="password" minlength="4"
                                    autocomplete="off" required />
                                <label for="password">Password</label>
                            </div>

                            <div class="input-wrap">
                                <select name="id_users" id="id_users" class="input-field" required>
                                    <option value="" disabled selected></option>
                                    @foreach ($pendaftars as $pendaftar)
                                        <option value="{{ $pendaftar->user->id }}">{{ $pendaftar->user->name }}</option>
                                    @endforeach
                                </select>
                                <label for="id_users">Ketua Kelompok</label>
                            </div>

                            <input type="submit" value="Sign Up" class="sign-btn" />

                            <p class="text">
                                By signing up, I agree to the
                                <a href="#">Terms of Services</a> and
                                <a href="#">Privacy Policy</a>
                            </p>
                        </div>
                    </form>
                </div>

                <div class="carousel">
                    <div class="images-wrapper">
                        <img src="{{ asset('imgLoginRegister/register-1.png') }}" class="image img-1 show" alt="" />
                        <img src="{{ asset('imgLoginRegister/register-2.png') }}" class="image img-2" alt="" />
                        <img src="{{ asset('imgLoginRegister/register-3.png') }}" class="image img-3" alt="" />
                    </div>

                    <div class="text-slider">
                        <div class="text-wrap">
                            <div class="text-group">
                                <h2>Daftarkan Dirimu Sebagai Anggota</h2>
                                <h2>Temukan Ketua Kelompok Mu</h2>
                                <h2>Monitoring Seleksi Lebih Mudah</h2>
                            </div>
                        </div>

                        <div class="bullets">
                            <span class="active" data-value="1"></span>
                            <span data-value="2"></span>
                            <span data-value="3"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('js')
    <!-- jQuery (dibutuhkan untuk SweetAlert) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>
    @if (session('sweet_success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Pendaftaran Berhasil!',
                    text: '{{ session('sweet_success') }}',
                    confirmButtonText: 'OK'

                });
            });
        </script>
    @endif
    <script>
        @if (session('sweet_error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('sweet_error') }}',
            });
        @endif
    </script>

    <script>
        const inputs = document.querySelectorAll(".input-field");
        const toggle_btn = document.querySelectorAll(".toggle");
        const main = document.querySelector("main");
        const bullets = document.querySelectorAll(".bullets span");
        const images = document.querySelectorAll(".image");
        const totalSlides = bullets.length;
        let currentSlide = 1;
        let intervalId;

        // Function to move slider to specific index
        function moveSlider(index) {
            // Reset interval if already running
            clearInterval(intervalId);

            // Update current slide index
            currentSlide = index;

            // Show corresponding image
            images.forEach((img) => img.classList.remove("show"));
            document.querySelector(`.img-${index}`).classList.add("show");

            // Move bullet active class
            bullets.forEach((bull) => bull.classList.remove("active"));
            bullets[index - 1].classList.add("active");

            // Move text slider
            const textSlider = document.querySelector(".text-group");
            textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

            // Start interval for automatic slide change
            startSliderInterval();
        }

        // Function to start automatic slide change
        function startSliderInterval() {
            intervalId = setInterval(() => {
                currentSlide = currentSlide % totalSlides + 1;
                moveSlider(currentSlide);
            }, 1000); // Change slide every 0.5 seconds (500 milliseconds)
        }

        // Event listeners for bullets
        bullets.forEach((bullet, index) => {
            bullet.addEventListener("click", () => moveSlider(index + 1));
        });

        // Event listeners for inputs
        inputs.forEach((inp) => {
            inp.addEventListener("focus", () => {
                inp.classList.add("active");
            });
            inp.addEventListener("blur", () => {
                if (inp.value !== "") return;
                inp.classList.remove("active");
            });
        });

        // Event listeners for toggle buttons
        toggle_btn.forEach((btn) => {
            btn.addEventListener("click", () => {
                main.classList.toggle("sign-up-mode");
            });
        });

        // Initialize slider
        startSliderInterval();
    </script>


@endpush
@push('styles')
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

        *,
        *::before,
        *::after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body,
        input {
            font-family: "Poppins", sans-serif;
        }

        main {
            width: 100%;
            min-height: 100vh;
            overflow: hidden;
            background-color: #46494f;
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .box {
            position: relative;
            width: 100%;
            max-width: 1020px;
            height: 640px;
            background-color: #fff;
            border-radius: 3.3rem;
            box-shadow: 0 60px 40px -30px rgba(0, 0, 0, 0.27);
        }

        .inner-box {
            position: absolute;
            width: calc(100% - 4.1rem);
            height: calc(100% - 4.1rem);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .logo img {
            width: 450px;
            /* Sesuaikan dengan ukuran yang diinginkan */
            height: auto;
            /* Pertahankan rasio aspek */
        }

        .forms-wrap {
            position: absolute;
            height: 100%;
            width: 45%;
            top: 0;
            left: 0;
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr;
            transition: 0.8s ease-in-out;
        }

        form {
            max-width: 260px;
            width: 100%;
            margin: 0 auto;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            grid-column: 1 / 2;
            grid-row: 1 / 2;
            transition: opacity 0.02s 0.4s;
        }

        form.sign-up-form {
            opacity: 0;
            pointer-events: none;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 27px;
            margin-right: 0.3rem;
        }

        .logo h4 {
            font-size: 1.1rem;
            margin-top: -9px;
            letter-spacing: -0.5px;
            color: #151111;
        }

        .heading h2 {
            font-size: 2.1rem;
            font-weight: 600;
            color: #151111;
        }

        .heading h6 {
            color: #bababa;
            font-weight: 400;
            font-size: 0.75rem;
            display: inline;
        }

        .toggle {
            color: #151111;
            text-decoration: none;
            font-size: 0.75rem;
            font-weight: 500;
            transition: 0.3s;
        }

        .toggle:hover {
            color: #8371fd;
        }

        .input-wrap {
            position: relative;
            height: 37px;
            margin-bottom: 2rem;
        }

        .input-field {
            position: absolute;
            width: 100%;
            height: 100%;
            background: none;
            border: none;
            outline: none;
            border-bottom: 1px solid #bbb;
            padding: 0;
            font-size: 0.95rem;
            color: #151111;
            transition: 0.4s;
        }

        label {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.95rem;
            color: #bbb;
            pointer-events: none;
            transition: 0.4s;
        }

        .input-field.active {
            border-bottom-color: #151111;
        }

        .input-field.active+label {
            font-size: 0.75rem;
            top: -2px;
        }

        .sign-btn {
            display: inline-block;
            width: 100%;
            height: 43px;
            background-color: #151111;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 0.8rem;
            font-size: 0.8rem;
            margin-bottom: 2rem;
            transition: 0.3s;
        }

        .sign-btn:hover {
            background-color: #f0b922;
        }

        .text {
            color: #bbb;
            font-size: 0.7rem;
        }

        .text a {
            color: #bbb;
            transition: 0.3s;
        }

        .text a:hover {
            color: #8371fd;
        }

        main.sign-up-mode form.sign-in-form {
            opacity: 0;
            pointer-events: none;
        }

        main.sign-up-mode form.sign-up-form {
            opacity: 1;
            pointer-events: all;
        }

        main.sign-up-mode .forms-wrap {
            left: 55%;
        }

        main.sign-up-mode .carousel {
            left: 0%;
        }

        .carousel {
            position: absolute;
            height: 100%;
            width: 55%;
            left: 45%;
            top: 0;
            background-color: #FFFF;
            border-radius: 2rem;
            display: grid;
            grid-template-rows: auto 1fr;
            padding-bottom: 2rem;
            overflow: hidden;
            transition: 0.8s ease-in-out;
        }

        .images-wrapper {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .images-wrapper .image {
            height: auto;
            width: auto max-width: 300px;
            max-height: 450px;
            /* Adjust this value to your preference */
        }

        .image {
            width: 100%;
            grid-column: 1/2;
            grid-row: 1/2;
            opacity: 0;
            transition: opacity 0.3s, transform 0.5s;
        }

        .img-1 {
            transform: translate(0, -50px);
        }

        .img-2 {
            transform: scale(0.4, 0.5);
        }

        .img-3 {
            transform: scale(0.3) rotate(-20deg);
        }

        .image.show {
            opacity: 1;
            transform: none;
        }

        .text-slider {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .text-wrap {
            max-height: 2.2rem;
            overflow: hidden;
            margin-bottom: 2.5rem;
        }

        .text-group {
            display: flex;
            flex-direction: column;
            text-align: center;
            transform: translateY(0);
            transition: 0.5s;
        }

        .text-group h2 {
            line-height: 2.2rem;
            font-weight: 600;
            font-size: 1.6rem;
        }

        .bullets {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bullets span {
            display: block;
            width: 0.5rem;
            height: 0.5rem;
            background-color: #aaa;
            margin: 0 0.25rem;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s;
        }

        .bullets span.active {
            width: 1.1rem;
            background-color: #151111;
            border-radius: 1rem;
        }

        @media (max-width: 850px) {
            .box {
                height: auto;
                max-width: 550px;
                overflow: hidden;
            }

            .inner-box {
                position: static;
                transform: none;
                width: revert;
                height: revert;
                padding: 2rem;
            }

            .forms-wrap {
                position: revert;
                width: 100%;
                height: auto;
            }

            form {
                max-width: revert;
                padding: 1.5rem 2.5rem 2rem;
                transition: transform 0.8s ease-in-out, opacity 0.45s linear;
            }

            .heading {
                margin: 2rem 0;
            }

            form.sign-up-form {
                transform: translateX(100%);
            }

            main.sign-up-mode form.sign-in-form {
                transform: translateX(-100%);
            }

            main.sign-up-mode form.sign-up-form {
                transform: translateX(0%);
            }

            .carousel {
                position: revert;
                height: auto;
                width: 100%;
                padding: 3rem 2rem;
                display: flex;
            }

            .images-wrapper {
                display: none;
            }

            .text-slider {
                width: 100%;
            }
        }

        @media (max-width: 530px) {
            main {
                padding: 1rem;
            }

            .box {
                border-radius: 2rem;
            }

            .inner-box {
                padding: 1rem;
            }

            .carousel {
                padding: 1.5rem 1rem;
                border-radius: 1.6rem;
            }

            .text-wrap {
                margin-bottom: 1rem;
            }

            .text-group h2 {
                font-size: 1.2rem;
            }

            form {
                padding: 1rem 2rem 1.5rem;
            }
        }
    </style>
@endpush
