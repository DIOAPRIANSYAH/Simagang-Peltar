<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SIMAGANG PELTAR</title>
    <!-- plugins:css -->
    <!-- Google Fonts -->
    @stack('styles')
    <link rel="stylesheet"
        href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-/Lx0K3wG2MnOj+Jp6S1bILvxH2F76lDbHZ6FmSBEwVBqQU5x1mxEMm0gJ5QZo2w1DRXJPDf27+9Xb4yMZv9Eww=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-Gem9XeE8kGvDPQc8Fj6qCv4tVJcVwP+oPGqRcn2NKKzZ0/91Ja3fyv2t0Vhbj1kjb9ovOVsfmHRcrs1lJB3SSA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/vertical-layout-light/style.css') }}" />
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- ======================Pre Loader Animation========================== -->
    {{-- <link rel="stylesheet" href="{{ asset('vendors/loader/normalize.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('vendors/loader/main.css') }}">
    {{-- <script src="{{ asset('vendors/loader/modernizr-2.6.2.min.js') }}"></script> --}}
    <style type="text/css">
        .back-link a {
            color: #4ca340;
            text-decoration: none;
            border-bottom: 1px #4ca340 solid;
        }

        .back-link a:hover,
        .back-link a:focus {
            color: #408536;
            text-decoration: none;
            border-bottom: 1px #408536 solid;
        }

        h1 {
            height: 100%;
            /* The html and body elements cannot have any padding or margin. */
            margin: 0;
            font-size: 14px;
            font-family: 'Open Sans', sans-serif;
            font-size: 32px;
            margin-bottom: 3px;
        }

        .entry-header {
            text-align: left;
            margin: 0 auto 50px auto;
            width: 80%;
            max-width: 978px;
            position: relative;
            z-index: 10001;
        }

        #demo-content {
            padding-top: 100px;
        }
    </style>
</head>

<body>
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @yield('navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                            aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                        aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input"
                                        placeholder="Add To-do" />
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">
                                        Add
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" />
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" />
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" />
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked />
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked />
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @yield('sidebar')

            <!-- partial -->

            @yield('main-content')
            @yield('footer')
        </div>
    </div>
</body>
<!-- page-body-wrapper ends -->
<!-- container-scroller -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- plugins:js -->
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- <script src="vendors/datatables.net/jquery.dataTables.js"></script> -->
<script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('vendors/js/dataTables.select.min.js') }}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('vendors/js/off-canvas.js') }}"></script>
<script src="{{ asset('vendors/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('vendors/js/template.js') }}"></script>
<script src="{{ asset('vendors/js/settings.js') }}"></script>
<script src="{{ asset('vendors/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('vendors/js/dashboard.js') }}"></script>
<!-- End custom js for this page-->

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/alert.js') }}"></script>
@stack('js')
{{-- <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')
    </script> --}}
<script src="{{ asset('vendors/loader/main.js') }}"></script>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>

</html>
