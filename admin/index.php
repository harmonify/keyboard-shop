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


/* Pagination */
$data_per_page = 5;
$data_total = count(query("SELECT * FROM tb_users"));
$page_total = ceil($data_total / $data_per_page);


//halaman yg sedang aktif
$page_active = isset($_GET["page"]) ? $_GET["page"] : 1;


//data awal yg tampil pada halaman yang sedang aktif
$page_first_data = ($data_per_page * $page_active) - $data_per_page;


//query semua data dari tb_users dengan limit per halaman sebanyak $data_per_page
$users = query("SELECT * FROM tb_users LIMIT $page_first_data, $data_per_page");

/* /Pagination */


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

  a {
    text-decoration: none;
    color: black;
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
              <li class="nav-item me-lg-4 active">
                <a class="nav-link fs-5" aria-current="page" href="#">
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
              <li class="nav-item me-lg-4">
                <a class="nav-link fs-5" href="roles.php">
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

  <main class="min-vh-100 container p-5 d-flex flex-column align-content-center">

    <!-- Navigation -->
    <nav class="ps-n5">
      <ul class="pagination">
        <!-- Tombol Previous -->
        <?php ($page_active > 1) ? $isOne = "" : $isOne = "disabled"; ?>
        <li class="page-item <?= $isOne ?>">
          <a class="page-link" href="?page=<?= $page_active-1 ?>">
            &laquo;
          </a>
        </li>

        <!-- Pages -->
        <?php for($i = 1; $i <= $page_total; $i++) : ?>
        <?php ($i == $page_active) ? $isActive = "active" : $isActive = "" ; ?>
        <li class="page-item <?= $isActive ?>">
          <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
        </li>
        <?php endfor; ?>

        <!-- Tombol Next -->
        <?php ($page_active < $page_total) ? $isLast = "" : $isLast = "disabled"; ?>
        <li class="page-item <?= $isLast ?>">
          <a class="page-link" href="?page=<?= $page_active+1 ?>">
            &raquo;
          </a>
        </li>

      </ul>
    </nav>
    <!-- /Navigation -->


    <!-- Tabel Data User -->
    <div class="row w-100 bg-light rounded-3 shadow-lg">
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
            <th scope="row"><?= $i+$page_first_data ?></th>
            <td><?= $row["username"] ?></td>
            <td>••••••••</td>
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
    <!-- /Tabel Data User -->

  </main>

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
