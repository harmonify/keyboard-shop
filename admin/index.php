<?php
session_start();

//cek sesi dan cek role user
if (!isset($_SESSION['login'])) {
  echo "<script>
          alert('Login dulu...');
          document.location.href = '../pages/login.php';
        </script>";
}
if (!isset($_SESSION['administrator'])) {
  echo "<script>
          alert('Anda tidak memiliki izin');
          document.location.href = '../pages/index.php';
        </script>";
}

require "../helpers/functions.php";

//query data admin yang sedang online
if (isset($_SESSION["username"])) {
  $ses_username = $_SESSION["username"];
  $row = query("SELECT * FROM tb_users WHERE username = '$ses_username'")[0];
}

//query semua data dari tb_users
$users = query("SELECT * FROM tb_users");

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

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Custom CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../pages/style.css">

  <title>Dashboard</title>
</head>

<style>
  body {
    background-image: url("../img/keyboard3.jpg");
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    scroll-behavior: smooth;
  }

</style>

<body>
  <!-- Header -->
  <header class="site-header sticky-top px-5" style="background-color: #16161d;">
    <div class="navbar navbar-expand-lg p-1">
      <div class="container d-flex flex-column flex-md-row">
        <div class="row w-100">
          <!-- Navbar Toggler -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-keyboard-fill text-white fs-1 align-center"></i>
          </button>

          <a href="" class="navbar-brand d-none d-lg-inline-block col-2">
            <i class="bi bi-keyboard-fill fs-1 d-inline-block"></i>
            <span class="d-inline-block fs-4 p-0 ps-2 position-relative"
              style="top: -4px;  font-family: 'Yellowtail', cursive;">Harmonikeys</span>
          </a>

          <nav class="collapse navbar-collapse justify-content-lg-center col-7 ps-3" id="navbar">
            <ul class="navbar-nav mb-2 mb-sm-0" id="menu">
              <li class="nav-item me-lg-4">
                <a class="nav-link fs-5" aria-current="page" href="#home">Home</a>
              </li>
              <li class="nav-item me-lg-4">
                <a class="nav-link fs-5" href="#features">Features</a>
              </li>
              <li class="nav-item me-lg-4">
                <a class="nav-link fs-5" href="#getstarted">Get Started</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-5" href="#gallery">Gallery</a>
              </li>
              <div>
                <hr class="dropdown-divider text-white">
              </div>
              <!-- List item yg tampil saat layar kecil -->
              <?php if( !(isset($_SESSION["login"])) ) : ?>
              <li class="d-block d-lg-none nav-item me-5">
                <a href="login.php" class="nav-link fs-5 text-decoration-none">Login</a>
              </li>
              <?php else : ?>
              <li class="d-block d-lg-none nav-item dropdown me-5">
                <a class="dropdown-toggle text-decoration-none" href="#" id="dropdown1" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../img/<?= $row['userimg'] ?>" class="rounded-pill" width="30" height="30"
                    alt="User Profile Image">
                  <span><?= $row['username'] ?></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdown1">
                  <li class="d-block"><a href="../pages/profile.php" class="dropdown-item text-reset">Your Profile</a>
                  </li>
                  <li class="d-block"><a href="../pages/edit_profile.php" class="dropdown-item text-reset">Edit
                      Profile</a></li>
                  <?php if (isset($_SESSION["administrator"])) : ?>
                  <li class="d-block"><a href="../pages/index.php" class="dropdown-item text-reset">Go to Main Page</a>
                  </li>
                  <?php endif; ?>
                  <li class="d-block">
                    <div class="dropdown-divider"></div>
                  </li>
                  <li class="d-block"><a href="logout.php" class="dropdown-item text-reset">Logout</a></li>
                </ul>
              </li>
              <?php endif; ?>
              <!-- /List item yg tampil saat layar kecil -->
            </ul>
          </nav>

          <!-- List item yg tampil saat layar besar -->
          <div class="dropdown d-none d-lg-inline-block col-2 mt-3 p-1">
            <?php if( !(isset($_SESSION["login"])) ) : ?>
            <div class="nav-item">
              <a href="login.php" class="text-decoration-none fs-5">Login</a>
            </div>

            <?php else : ?>
            <div class="d-none d-lg-block nav-item dropdown">
              <a class="dropdown-toggle text-decoration-none" href="#" id="dropdown2" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="../img/<?= $row['userimg'] ?>" class="rounded-pill" width="30" height="30"
                  alt="User Profile Image">
                <span><?= $row['username'] ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdown2">
                <li><a href="../pages/profile.php" class="dropdown-item text-reset mb-2">Your Profile</a></li>
                <li><a href="../pages/edit_profile.php" class="dropdown-item text-reset mb-2">Edit Profile</a></li>
                <?php if (isset($_SESSION["administrator"])) : ?>
                <li><a href="../pages/index.php" class="dropdown-item text-reset mb-2">Go to Main Page</a></li>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <li><a href="logout.php" class="dropdown-item text-reset">Logout</a></li>
              </ul>
            </div>

            <?php endif; ?>
          </div>
          <!-- /List item yg tampil saat layar besar -->

        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->

    </div>
    <!-- /.navbar -->

  </header>
  <!-- /Header -->

  <!-- Tabel Data User -->
  <div class="min-vh-100 container p-5 d-flex flex-column align-content-center w-75">
    <div class="row mb-3">
      <!-- Tombol tambah user -->
      <a href="add_user.php" class="btn btn-primary col-3">
        <i class="bi bi-plus-lg me-3"></i>
        <span>Tambah Data User</span>
      </a>
      <!-- Cari data user -->
      <form>
        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
      </form>
    </div>
    <div class="row w-75 bg-light rounded-3 shadow-lg">
      <table class="table table-striped border-bottom shadow">
        <thead>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">Profile Picture</th>
          <th scope="col">Role User</th>
          <th scope="col">Action</th>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach($users as $row) : ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $row["username"] ?></td>
            <td><?= substr(($row["userpass"]), 0, 10)."...." ?></td>
            <td><img src='../img/<?= $row["userimg"] ?>' class="d-block rounded-circle mx-4 text-center" width="50"
                height="50" alt="User image"></td>
            <td><?= $row["userrole"] ?></td>
            <td>
              <!-- Tombol Edit User -->
              <a href="edit_user.php?id=<?= $row["id"] ?>" class="text-decoration-none">
                <i class="bi bi-pencil-square text-primary fs-4"></i>
              </a>
              <!-- Tombol Hapus User -->
              <a href="del_user.php?id=<?= $row["id"]; ?>" class="text-decoration-none"
                onclick="return confirm('Are you sure?');">
                <i class="bi bi-trash-fill text-danger fs-4"></i>
              </a>
            </td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Footer -->
  <footer class="container-fluid py-5 text-white position-relative bottom-0 fixed-bottom"
    style="background-color: #16161d;">
    <div class="row">
      <div class="col-12 col-md text-center">
        <i class="bi bi-keyboard-fill fs-3"></i>
        <small class="d-block mb-3 text-muted">&copy; 2017–2021</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Cool stuff</a></li>
          <li><a class="link-secondary" href="#">Random feature</a></li>
          <li><a class="link-secondary" href="#">Team feature</a></li>
          <li><a class="link-secondary" href="#">Stuff for developers</a></li>
          <li><a class="link-secondary" href="#">Another one</a></li>
          <li><a class="link-secondary" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Resource name</a></li>
          <li><a class="link-secondary" href="#">Resource</a></li>
          <li><a class="link-secondary" href="#">Another resource</a></li>
          <li><a class="link-secondary" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Business</a></li>
          <li><a class="link-secondary" href="#">Education</a></li>
          <li><a class="link-secondary" href="#">Government</a></li>
          <li><a class="link-secondary" href="#">Gaming</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Team</a></li>
          <li><a class="link-secondary" href="#">Locations</a></li>
          <li><a class="link-secondary" href="#">Privacy</a></li>
          <li><a class="link-secondary" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer>
  <!-- /Footer -->

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
  </script>
</body>

</html>
