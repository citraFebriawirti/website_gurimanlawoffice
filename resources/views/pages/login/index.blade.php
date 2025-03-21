<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ env('APP_NAME') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('admin/assets/img/icon.png') }} " rel="icon">
    <link href="{{ asset('admin/assets/img/icon.png') }} " rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/assets/vendor/fontawesome-free/css/all.min.css') }} " rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css">

  



    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/assets/css/ruang-admin.min.css') }} " rel="stylesheet">
</head>

<body style="background-image: url('{{ asset('admin/assets/img/bg-login.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">


    @include('sweetalert::alert')

             <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0 ">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="row g-3 needs-validation" novalidate method="post"
                  action="{{ route('login_proses') }}">
                  @csrf
                  <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail"
                          required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                  </div>
                  <div class="col-12 mt-3">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control"
                          id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                  </div>
                  <div class="col-12 mt-3">
                      <button class="btn btn-primary w-100 border-0" style="background-color: #b99044" type="submit">Login</button>
                      {{-- <a href="{{ route('/') }}" class="btn btn-success w-100 mt-2">Home</a> --}}
                  </div>
              </form>
                  <hr>
                  <div class="text-center">
                    {{-- <a class="font-weight-bold small" href="register.html">Create an Account!</a> --}}
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}  "></script>
    <script src="{{ asset('admin/assets/vendor/jquery-easing/jquery.easing.min.js') }} "></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('admin/assets/js/ruang-admin.min.js') }} "></script>



   
</body>

</html>
