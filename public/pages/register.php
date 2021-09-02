<?php
require "../../helpers/bootstrap.php";

//redirect apabila sudah login
isLoggedIn("index.php");

//apabila user telah mengisi form register
if(isset($_POST["submit"])) {
  if (registerUser($_POST) > 0){
    echo '<script>
            alert("Anda Berhasil Registrasi");
            document.location.href = "login.php";
          </script>';
  } else {
    echo '<script>
            alert("Anda Gagal Registrasi");
            document.location.href = "login.php";
          </script>';
  }
};

?>

<?php require_once 'components/layout-top-simple.php' ?>

<style>
  body {
    background-image: url("../img/keyboard3.jpg");
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>

  <div class="container d-flex flex-column justify-content-center align-items-center mb-5">
    <div class="text-white text-center mb-2">
      <a href="index.php" class="text-reset text-decoration-none">
        <i class="bi bi-keyboard-fill mb-3" style="font-size: 60px;"></i>
        <h1 class="h3 fw-normal" style="font-family: 'Yellowtail','cursive';">Harmonikeys</h1>
      </a>
    </div>
    <div class="col-7 d-flex flex-column justify-content-center align-items-center bg-light py-5 px-3 my-3" style="border-radius: 2rem;">
      <div class="row mb-3">
        <h1 class="fs-2">Registration Form</h1>
      </div>
      <div class="row d-flex justify-content-center w-100">
        <div class="col-10">
          <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="userrole" value="user">
            <div class="mb-3">
              <label for="username" class="form-label fs-5">Username</label>
              <input type="text" class="form-control form-control-lg" name="username" id="username" autocomplete="off" autofocus>
            </div>
            <div class="mb-3">
              <label for="userpass" class="form-label fs-5">Password</label>
              <input type="password" class="form-control form-control-lg" name="userpass" id="userpass">
            </div>
            <div class="mb-3">
              <label for="userpass_confirm" class="form-label fs-5">Confirm Password</label>
              <input type="password" class="form-control form-control-lg" name="userpass_confirm" id="userpass_confirm">
            </div>
            <div class="mb-5">
              <label for="formFile" class="form-label fs-5">Profile Picture</label>
              <input class="form-control form-control-lg" type="file" id="formFile" name="userimg">
            </div>
            <button type="submit" class="btn btn-lg btn-primary" name="submit">Sign Up!</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php require_once 'components/layout-bottom.php' ?>
