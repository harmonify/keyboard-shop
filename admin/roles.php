<?php
//cek sesi dan cek role user
require_once "../helpers/check.php";

isNotLoggedIn("../pages/login.php");
isNotAdministrator("../pages/login.php");

require "../helpers/functions.php";

//query data admin yang sedang online
if (isset($_SESSION["username"])) {
  $ses_username = $_SESSION["username"];
  $ses_data = query("SELECT * FROM tb_users WHERE username = '$ses_username'")[0];
}

//query data tb_roles
$roles = query("SELECT * FROM tb_roles");


//apabila admin mengisi form tambah role
if(isset($_POST["addrole"])) {
  //tambah data dan cek apakah data berhasil ditambahkan
  if (addRole($_POST) > 0) {
    echo '<script>
            alert("Role Baru Berhasil Ditambahkan");
            document.location.href = "index.php";
          </script>';
  } else {
    echo '<script>
            alert("Role Baru Gagal Ditambahkan");
            document.location.href = "index.php";
          </script>';
  }
}

//apabila admin mengisi form hapus role
if(isset($_POST["delrole"])) {
  //hapus data dan cek apakah data berhasil dihapus
  if (delRole($_POST) > 0) {
    echo '<script>
            alert("Role Berhasil Dihapus");
            document.location.href = "index.php";
          </script>';
  } else {
    echo '<script>
            alert("Role Gagal Dihapus");
            document.location.href = "index.php";
          </script>';
  }
}

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

  <title>Manage Roles</title>
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

<body class="min-vh-100">
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
                <a class="nav-link fs-5" href="index.php">
                  <i class="bi bi-speedometer2"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="nav-item me-lg-4">
                <a class="nav-link fs-5" href="add_user.php">
                  <i class="bi bi-plus"></i>
                  <span>Add New User</span>
                </a>
              </li>
              <li class="nav-item me-lg-4 active">
                <a class="nav-link fs-5" aria-current="page" href="#">
                  <i class="bi bi-gear-fill"></i>
                  <span>Manage Roles</span>
                </a>
              </li>
              <div>
                <hr class="dropdown-divider text-white">
              </div>
              <!-- List item yg tampil saat layar kecil -->
              <li class="d-block d-lg-none nav-item dropdown me-5">
                <a class="dropdown-toggle text-decoration-none" href="#" id="dropdown1" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../img/<?= $ses_data['userimg'] ?>" class="rounded-pill" width="30" height="30"
                    alt="User Profile Image">
                  <span><?= $ses_data['username'] ?></span>
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
                  <li class="d-block"><a href="../pages/logout.php" class="dropdown-item text-reset">Logout</a></li>
                </ul>
              </li>
              <!-- /List item yg tampil saat layar kecil -->
            </ul>
          </nav>

          <!-- List item yg tampil saat layar besar -->
          <div class="dropdown d-none d-lg-inline-block col-2 mt-3 p-1">
            <div class="d-none d-lg-block nav-item dropdown">
              <a class="dropdown-toggle text-decoration-none" href="#" id="dropdown2" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="../img/<?= $ses_data['userimg'] ?>" class="rounded-pill" width="30" height="30"
                  alt="User Profile Image">
                <span><?= $ses_data['username'] ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdown2">
                <li><a href="../pages/profile.php" class="dropdown-item text-reset mb-2">Your Profile</a></li>
                <li><a href="../pages/edit_profile.php" class="dropdown-item text-reset mb-2">Edit Profile</a></li>
                <?php if (isset($_SESSION["administrator"])) : ?>
                <li><a href="../pages/index.php" class="dropdown-item text-reset mb-2">Go to Main Page</a></li>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <li><a href="../pages/logout.php" class="dropdown-item text-reset">Logout</a></li>
              </ul>
            </div>
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

  <!-- Main -->
  <main class="min-vh-100 container d-flex flex-column justify-content-center my-5">
    <div
      class="align-self-start row d-flex flex-column align-items-center text-center shadow-lg bg-light py-5 px-5 m-5"
      style="border-radius: 2rem; width: 60%;">

      <div class="mt-4 mb-5">
        <h1 class="display-2">
          <i class="bi bi-plus"></i>
          <span>Add New Role</span>
        </h1>
      </div>

      <form action="" method="post" class="text-start align-self-center w-75 d-flex flex-column">
        <input type="hidden" name="roleby" value="<?= $row["username"] ?>">
        <div class="mb-3">
          <label for="formRole" class="form-label">New Role Name</label>
          <input type="text" class="form-control form-control-lg" id="formRole" name="rolename" placeholder="example"
            required>
        </div>

        <div class="mt-5 mb-4">
          <a href="index.php" class="btn btn-lg btn-default">Batal</a>
          <button type="submit" name="addrole" class="btn btn-lg btn-primary"
            onclick="return confirm('Are you sure you want to add this role?');">Submit</button>
        </div>

      </form>
    </div>

    <div
      class="align-self-end row d-flex flex-column align-items-center text-center shadow-lg bg-light py-5 px-5 m-5"
      style="border-radius: 2rem; width: 60%;">

      <div class="mt-4 mb-5">
        <h1 class="display-2">
          <i class="bi bi-trash"></i>
          <span>Delete Role</span>
        </h1>
      </div>

      <form action="" method="post" class="text-start align-self-center w-75 d-flex flex-column">

        <div class="mb-3">
          <label for="formRole2" class="form-label">Choose a role</label>
          <select class="form-select form-select-lg" name="rolename" id="formRole2">
            <?php foreach($roles as $role) : ?>
            <option value="<?= $role["rolename"] ?>"><?= $role["rolename"] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mt-5 mb-4 align-self-end">
          <a href="index.php" class="btn btn-lg btn-default">Batal</a>
          <button type="submit" name="delrole" class="btn btn-lg btn-danger"
            onclick="return confirm('Are you sure you want to delete this role?');">Delete</button>
        </div>

      </form>
    </div>
  </main>
  <!-- /Main -->


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
