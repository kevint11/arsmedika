<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daftar Akun</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="icon" type="image/x-icon" href="{{ asset('theme/sneat/assets/img/favicon/favicon.ico') }}" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('theme/finanza/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/finanza/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('theme/finanza/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('theme/finanza/css/style.css') }}" rel="stylesheet">
    <style>
        .p-viewer {
            float: right;
            margin-top: -40px;
            margin-right: 10px;
            position: relative;
            z-index: 1;
            cursor:pointer;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt text-primary me-2"></i>Jl. Perwira No. 2B Medan</small>
                <small class="ms-4"><i class="fa fa-clock text-primary me-2"></i>8.00 am - 6.00 pm</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small><i class="fa fa-envelope text-primary me-2"></i>kevintnatant@gmail.com</small>
                <small class="ms-4"><i class="fa fa-phone-alt text-primary me-2"></i>+62 853 5886 9940</small>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="#" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="display-5 text-primary m-0">Arsmedika</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('Dashboard') }}" class="nav-item nav-link">Dashboard</a>
                            <a class="nav-item nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-item nav-link active">Register</a>
                            @endif
                        @endauth
                    @endif
                    <a href="contact.html" class="nav-item nav-link">Tentang kami</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                        <small class="fab fa-facebook-f text-primary"></small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                        <small class="fab fa-twitter text-primary"></small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                        <small class="fab fa-linkedin-in text-primary"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Callback Start -->
    <div class="container-fluid callback my-5 pt-5 bg-white">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                        @if ($errors->any())
                            {!! implode(
                                '',
                                $errors->all(' <div class="alert alert-danger alert-dismissible" role="alert">
                                                        :message <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>'),
                            ) !!}
                        @endif
                        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                            <h1 class="display-5 mb-5">Daftar Baru</h1>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            placeholder="Nama Lengkap Anda" autofocus value="{{ old('nama') }}"
                                            autocomplete="nama" required>
                                        <label for="nama">Nama Lengkap</label>
                                        @error('nama')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="nik_id" class="form-control" id="nik_id"
                                            placeholder="NIK Anda" autofocus value="{{ old('nik_id') }}"
                                            autocomplete="nik_id" required>
                                        <label for="nik_id">NIK</label>
                                        @error('nik_id')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="mail"
                                            placeholder="Email Anda" autofocus value="{{ old('email') }}"
                                            autocomplete="email" required>
                                        <label for="mail">Email</label>
                                        @error('email')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <select id="jenis_kelamin" class="form-control" name="jenis_kelamin">
                                            <option selected disabled></option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        @error('jenis_kelamin')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" name="tempat_lahir" class="form-control"
                                            id="tempat_lahir" placeholder="Tempat Lahir" autofocus
                                            value="{{ old('tempat_lahir') }}" autocomplete="tempat_lahir" required>
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        @error('tempat_lahir')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" name="tanggal_lahir" class="form-control datepicker"
                                            id="tanggal_lahir" placeholder="Tanggal Lahir" autofocus
                                            value="{{ old('tanggal_lahir') }}" autocomplete="tanggal_lahir" required>
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        @error('tanggal_lahir')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" autofocus value="{{ old('password') }}"
                                            autocomplete="current-password" required>
                                            <span class="p-viewer">
                                                <i class="bi bi-eye-slash" id="togglePassword" aria-hidden="true"></i>
                                              </span>
                                        <label for="password">Password</label>
                                        @error('password')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="password_confirmation" placeholder="Ketik Ulang Password" autofocus
                                            value="{{ old('password_confirmation') }}"
                                            autocomplete="password_confirmation" required>
                                            <span class="p-viewer">
                                                <i class="bi bi-eye-slash" id="toggleConfirmPassword" aria-hidden="true"></i>
                                            </span>
                                        <label for="password_confirmation">Ketik Ulang Password</label>
                                        @error('password_confirmation')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Daftar</button>
                                    <a class="btn btn-danger btn-block w-100 mt-3 py-3" href="{{ route('Google Login') }}">
                                        <i class="fab fa-google-plus mr-8"> </i> &nbsp Daftar dengan Google +
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Callback End -->

     <!-- Copyright Start -->
     <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">

                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a class="border-bottom" href="#"> </a> Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('theme/finanza/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('theme/finanza/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('theme/finanza/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('theme/finanza/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('theme/finanza/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('theme/datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('theme/finanza/js/main.js') }}"></script>
    <script>
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
        const confirmPassword = document.querySelector("#password_confirmation");

        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("bi-eye");
        });

        toggleConfirmPassword.addEventListener("click", function () {
            const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
            confirmPassword.setAttribute("type", type);
            this.classList.toggle("bi-eye");
        });

        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>
</body>

</html>
