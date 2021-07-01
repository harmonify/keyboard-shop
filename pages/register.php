<?php
require "../helpers/functions.php";

//cek sesi dan cek role user
if (isset($_SESSION['login'])) {
  echo "<script>
          alert('Logout dulu...');
          document.location.href = 'index.php';
        </script>";
}

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



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <title>Registration</title>
</head>

<style>
  body {
    background-image: url("../img/keyboard3.jpg");
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

</style>

<body>
  <div
    class="container d-flex flex-column justify-content-center align-items-center border shadow bg-light w-50 py-5 px-3 my-3"
    style="border-radius: 2rem;">
    <div class="row mb-4">
      <h1 class="fs-2">Halaman Registrasi</h1>
    </div>
    <div class="row d-flex justify-content-center w-100">
      <div class="col-10">
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="userrole" value="user">
          <div class="mb-3">
            <label for="username" class="form-label fs-5">Username</label>
            <input type="text" class="form-control form-control-lg" name="username" id="username">
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
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
  </script>
</body>

</html>
