<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

  <title>Register - INSIGHT</title>
</head>

<!-- Body Section -->

<body>
  <div class="container animate__animated animate__rubberBand">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="bg-login p-4">
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
        <form method="post" action="<?= base_url() ?>pages/Register/register">
          <div class="form-group">
            <label class="required" for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter Username" required="required">
          </div>
          <div class="form-group">
            <label class="required" for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required="required">
          </div>
          <div class="form-group">
            <label class="required" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
          </div>
          <button type="submit" class="btn btn-block btn-outline-primary">Register</button>
          <div>
            <p>Already have an account? <a href="<?= base_url() ?>pages/Login">Login here</a></p>
          </div>
        </form>
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