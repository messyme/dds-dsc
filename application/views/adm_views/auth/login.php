<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Font Awesome CSS -->
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/assets/css/login.css">
  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <!-- Web Icon -->
  <link rel="shortcut icon" href="<?= base_url() ?>public/assets/images/logo_insight/logo.png" />
  <!-- CSS Animation -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <title>Login - INSIGHT</title>
</head>

<!-- Body Section -->

<body>
  <div class="container d-flex justify-content-center align-items-center animate__animated animate__rubberBand">
    <div class="bg-login p-4 ">
      <div class="row justify-content-center align-items-center">
        <img src="<?= base_url() ?>public/assets/images/logo_telkom_color.png" width="20%" alt="" srcset="">
        <img src="<?= base_url() ?>public/assets/images/logo_db_color.png" width="20%" alt="" srcset="">
      </div>
      <div class="row justify-content-center align-items-center">
        <img src="<?= base_url() ?>public/assets/images/logo_insight/logo-3.png" width="40%" alt="" srcset="">
      </div>
      <h4 class="text-center mt-2">Hi! There, Have a Nice Day!</h4>
      <?php
      // @codeCoverageIgnoreStart
      if ($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
      }
      // @codeCoverageIgnoreEnd
      ?>
      <br>
      <div class="social-auth-links text-center mb-3">
        <h5 class="text-center">Login using : </h5>
        <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#loginModal">
          NIK &nbsp;<i><img src="<?= base_url() ?>public/assets/images/portal-white.png" width="35px"></i>
        </button>
        <button class="btn btn-block btn-secondary" data-toggle="modal" data-target="#loginModalnon-nik">
          Non-NIK&ensp;<i class="fas fa-user mr-2"></i>
        </button>
      </div>
      <!-- <div class="d-flex justify-content-center">
        < ?php
        // @codeCoverageIgnoreStart
        if ($this->session->flashdata('msg')) {
          // @codeCoverageIgnoreEnd
        ?>
          <div class="signup-section"> <a href="< ?= base_url() ?>pages/ForgotPassword" class="text-info"> Forgot Password?</a></div>
        < ?php
        }
        ?>
      </div> -->
      <!-- /.social-auth-links -->
    </div>
  </div>


  <!-- MODAL NIK -->
  <div class="modal fade" id="loginModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h4>Login using NIK</h4>
          </div>
          <div class="d-flex flex-column ">
            <form method="post" action="<?= base_url() ?>pages/Login/login_nik">
              <div class="form-group">
                <label class="required" for="username">NIK</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter NIK" required="required">
              </div>
              <div class="form-group">
                <label class="required" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
              </div>
              <button type="submit" class="btn btn-primary btn-block btn-round">Login</button>
            </form>
          </div>

          <br>
        </div>
      </div>
    </div>

  </div>

  <!-- MODAL USERNAME -->
  <div class="modal fade" id="loginModalnon-nik"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h4>Login using Username</h4>
          </div>
          <div class="d-flex flex-column ">
            <form method="post" action="<?= base_url() ?>pages/Login/login">
              <div class="form-group">
                <label class="required" for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter Username" required="required">
              </div>
              <div class="form-group">
                <label class="required" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
              </div>
              <button type="submit" class="btn btn-primary btn-block btn-round">Login</button>
            </form>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <div class="signup-section">Dont have an account? <a href="<?= base_url() ?>pages/Register" class="text-info"> Register here</a>.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- End of Body Section -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>