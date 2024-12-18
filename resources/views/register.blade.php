<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashtreme Admin - Register</title>
  <!-- loader-->
  <link href="/mytemp/assets/css/pace.min.css" rel="stylesheet" />
  <script src="/mytemp/assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="/mytemp/assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="/mytemp/assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- animate CSS-->
  <link href="/mytemp/assets/css/animate.css" rel="stylesheet" type="text/css" />
  <!-- Icons CSS-->
  <link href="/mytemp/assets/css/icons.css" rel="stylesheet" type="text/css" />
  <!-- Custom Style-->
  <link href="/mytemp/assets/css/app-style.css" rel="stylesheet" />
</head>

<body class="bg-theme bg-theme10">

  <!-- Start wrapper-->
  <div id="wrapper">
    <div class="card card-authentication1 mx-auto my-4">
      <div class="card-body">
        <div class="card-content p-2">
          <div class="text-center">
            <img src="/mytemp/assets/images/logo-icon.png" alt="logo icon">
          </div>
          <div class="card-title text-uppercase text-center py-3">Sign Up</div>

          <!-- Form untuk registrasi -->
          <form method="POST" action="{{ route('admin.register.process') }}">
            @csrf
            <!-- Token keamanan Laravel -->

            <div class="form-group">
              <label for="name" class="sr-only">Name</label>
              <div class="position-relative has-icon-right">
                <input type="text" id="name" name="name" class="form-control input-shadow" placeholder="Enter Your Name" required>
                <div class="form-control-position">
                  <i class="icon-user"></i>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="sr-only">Email ID</label>
              <div class="position-relative has-icon-right">
                <input type="email" id="email" name="email" class="form-control input-shadow" placeholder="Enter Your Email ID" required>
                <div class="form-control-position">
                  <i class="icon-envelope-open"></i>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <div class="position-relative has-icon-right">
                <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Choose Password" required>
                <div class="form-control-position">
                  <i class="icon-lock"></i>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-light btn-block">Register</button>
          </form>
        </div>
      </div>
      <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Already have an account? <a href="{{ route('admin.login') }}">Sign In here</a></p>
      </div>
    </div>
  </div>
  <!-- End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="/mytemp/assets/js/jquery.min.js"></script>
  <script src="/mytemp/assets/js/popper.min.js"></script>
  <script src="/mytemp/assets/js/bootstrap.min.js"></script>
  <!-- sidebar-menu js -->
  <script src="/mytemp/assets/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="/mytemp/assets/js/app-script.js"></script>

</body>

</html>