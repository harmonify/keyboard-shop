<?php
session_start();

require "../helpers/functions.php";

//query data user yang sedang online
if (isset($_SESSION["username"])) {
  $ses_username = $_SESSION["username"];
  $row = query("SELECT * FROM tb_users WHERE username = '$ses_username'")[0];
}

//apabila user registrasi di halaman ini
if(isset($_POST["submit"])) {
  //jika user sudah login
  if (isset($_SESSION["login"])) {
    echo '<script>
            alert("Anda Harus Logout Terlebih Dahulu!");
            document.location.href = "index.php";
          </script>';
  }
  //jalankan fungsi register dan redirect ke profile.php apabila berhasil
  if (registerUser($_POST) > 0){
    echo '<script>
            alert("Anda Berhasil Registrasi");
            document.location.href = "profile.php";
          </script>';
  } else {
    echo '<script>
            alert("Anda Gagal Registrasi");
            document.location.href = "index.php";
          </script>';
  }
};

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Harmonikeys</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
  <link href="style.css" rel="stylesheet">

</head>

<body class="position-relative" style="background-color: #16161d;" data-bs-spy="scroll" data-bs-target="#navbar">

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
                  <li class="d-block"><a href="profile.php" class="dropdown-item text-reset">Your Profile</a></li>
                  <li class="d-block"><a href="edit_profile.php" class="dropdown-item text-reset">Edit Profile</a></li>
                  <?php if (isset($_SESSION["administrator"])) : ?>
                  <li class="d-block"><a href="../admin/index.php" class="dropdown-item text-reset">Go to Dashboard</a>
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
                <li><a href="profile.php" class="dropdown-item text-reset mb-2">Your Profile</a></li>
                <li><a href="edit_profile.php" class="dropdown-item text-reset mb-2">Edit Profile</a></li>
                <?php if (isset($_SESSION["administrator"])) : ?>
                <li><a href="../admin/index.php" class="dropdown-item text-reset mb-2">Go to Dashboard</a></li>
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



  <!-- Hero , Parallax -->
  <div class="parallax parallax-1" id="home">
    <div class="overlay d-flex">
      <div
        class="col-8 col-md-6 position-relative overflow-hidden py-5 p-md-5 mx-auto text-white text-center align-content-center">
        <p class="display-1 fw-normal pt-5 pb-4 pb-lg-3" style="font-family: 'Yellowtail', cursive;">Harmonikeys</p>
        <p class="fs-4 lead fw-normal py-md-4">Get yourself a fresh keycaps right away! Lorem ipsum dolor sit amet
          consectetur adipisicing elit. Expedita, facilis.</p>
        <a href="#getstarted" class="btn btn-primary col-8 col-md-7 col-lg-5 py-2" style="max-width: 200px;">
          <span class="me-2 lead">Get Started</span>
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- /Hero -->



  <!-- Features Section -->
  <div class="container min-vh-100">
    <div class="row p-3 p-md-5 mb-5 text-white" id="features">
      <div class="col-12 col-md-6 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Best Seller Keycaps!</h2>
          <p class="lead fs-4">And an even wittier subheading.</p>
        </div>
        <div class="m-auto project-tile">
          <img src="../img/keyboard9.jpg" class="project-image">
          <div class="project-desc">
            <p class="lead fs-3">Fresh Keycaps!</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Tri-Color Keycaps!</h2>
          <p class="lead fs-4">And an even wittier subheading.</p>
        </div>
        <div class="m-auto project-tile">
          <img src="../img/keyboard2.jpg" class="project-image">
          <div class="project-desc">
            <p class="lead fs-3">Elegant!</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">High Quality Keycaps!</h2>
          <p class="lead fs-4">And an even wittier subheading.</p>
        </div>
        <div class="m-auto project-tile">
          <img src="../img/keyboard8.jpg" class="project-image">
          <div class="project-desc">
            <p class="lead fs-3">Neon!</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Bubble Gum!</h2>
          <p class="lead fs-4">And an even wittier subheading.</p>
        </div>
        <div class="m-auto project-tile">
          <img src="../img/keyboard3.jpg" class="project-image">
          <div class="project-desc">
            <p class="lead fs-3">Gummies!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Features Section -->



  <!-- Parallax -->
  <div class="parallax parallax-2">
    <div class="overlay"></div>
  </div>



  <!-- Get Started -->
  <div class="container min-vh-100 py-5 px-4" id="getstarted" class="text-white">
    <div class="row d-flex justify-content-between align-content-center py-4 my-4">

      <div class="col-12 col-md-7 text-center mb-3 py-5">
        <div class="m-auto project-tile project-tile-lg">
          <img src="../img/keyboard4.jpg" class="project-image">
          <div class="project-desc">
            <p class="lead fs-3">Get yours now!</p>
          </div>
        </div>
      </div>

      <!-- Form -->
      <div class="col-12 col-md-5 py-5 d-flex flex-column justify-content-center align-items-center align-items-lg-start">

        <div class="mb-3">
          <p class="lead display-5 text-white">Get Started!</p>
        </div>

        <form action="#" method="post" class="w-100 pe-lg-4">
          <div class="form-floating mb-4">
            <input type="text" class="form-control form-control-lg" id="floatingInput" name="username"
              placeholder="Username" required>
            <label for="floatingInput" class="text-muted">Username</label>
          </div>
          <div class="form-floating mb-4">
            <input type="password" class="form-control form-control-lg" id="floatingPassword" name="userpass"
              placeholder="Password" required>
            <label for="floatingPassword" class="text-muted">Password</label>
          </div>
          <button type="submit" class="btn btn-primary btn-lg w-100" name="submit">Register</button>
        </form>
      </div>

    </div>
  </div>
  <!-- /Get Started -->



  <!-- Parallax -->
  <div class="parallax parallax-3">
    <div class="overlay"></div>
  </div>



  <!-- Gallery -->
  <div class="container py-5" id="gallery">
    <h1 class="lead display-5 text-white text-center pt-5">Gallery</h1>
    <div class="row py-5 m-0" data-masonry='{"percentPosition": true }'>

      <!-- Item1 -->
      <div class=" col-sm-6 mb-4">
        <div class="card overflow-hidden">
          <img src="../img/keyboard1.jpg" alt="" style="height: 19rem; width: 40rem; object-fit: cover;">
        </div>
      </div>

      <!-- Item2 -->
      <div class="col-sm-6 mb-4">
        <div class="card overflow-hidden">
          <img src="../img/keyboard2.jpg" alt="" style="height: 45rem; width: 50rem; object-fit: cover;">
        </div>
      </div>

      <!-- Item3 -->
      <div class="col-sm-6 mb-4">
        <div class="card overflow-hidden">
          <img src="../img/keyboard3.jpg" alt="" style="height: 23rem; width: 40rem; object-fit: cover;">
        </div>
      </div>

      <!-- Item4 -->
      <div class="col-sm-6 mb-4">
        <div class="card overflow-hidden">
          <img src="../img/keyboard6.jpg" alt="" style="height: 40rem; width: 40rem; object-fit: cover;">
        </div>
      </div>

      <!-- Item5 -->
      <div class="col-sm-6 mb-4">
        <div class="card overflow-hidden">
          <img src="../img/keyboard12.jpg" alt="" style="height: 25em; width: 40rem; object-fit: cover;">
        </div>
      </div>

      <!-- Item6 -->
      <div class="col-sm-6 mb-4">
        <div class="card overflow-hidden">
          <img src="../img/keyboard9.jpg" alt="" style="height: 20rem; width: 40rem; object-fit: cover;">
        </div>
      </div>

      <!-- Item7 -->
      <div class="col-sm-6 mb-4">
        <div class="card overflow-hidden">
          <img src="../img/keyboard11.jpg" alt="" style="height: 20rem; width: 40rem; object-fit: cover;">
        </div>
      </div>

      <!-- Item8 -->
      <div class="col-sm-6 mb-4">
        <div class="card overflow-hidden">
          <img src="../img/keyboard7.jpg" alt="" style="height: 20rem; width: 40rem; object-fit: cover;">
        </div>
      </div>

    </div>
  </div>
  <!-- /Gallery -->



  <!-- Footer -->
  <footer class="container py-5 text-white">
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

  <!-- Masonry JS -->
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
    integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
  </script>

</body>

</html>
