<?php
require "../../helpers/bootstrap.php";

$user = userAuth();
?>

<?php require_once 'components/layout-top.php' ?>

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
  <div class="container min-vh-100 bg-eigengrau">
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
  <div class="container min-vh-100 py-5 px-4 text-white bg-eigengrau" id="getstarted">
    <div class="row d-flex justify-content-between align-content-center py-4 my-4">

      <div class="col-12 col-md-7 text-center mb-3 py-5">
        <div class="m-auto project-tile project-tile-lg">
          <img src="../img/keyboard4.jpg" class="project-image">
          <div class="project-desc">
            <p class="lead fs-3">Get yours now!</p>
          </div>
        </div>
      </div>

      <div
        class="col-12 col-md-5 py-5 d-flex flex-column justify-content-center align-items-center align-items-lg-start">

        <div class="mb-4">
          <p class="lead display-5 text-white">Get Started!</p>
        </div>
        <div class="mb-4">
          <p class="lead fs-5 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore harum quod
            non? Corrupti soluta placeat quo impedit ipsum quae nam aperiam culpa, maiores facere laudantium!</p>
        </div>
        <a href="register.php" class="btn btn-primary btn-lg w-100 form-animate">
          Register
        </a>
      </div>

    </div>
  </div>
  <!-- /Get Started -->



  <!-- Parallax -->
  <div class="parallax parallax-3">
    <div class="overlay"></div>
  </div>



  <!-- Gallery -->
  <div class="container py-5 bg-eigengrau" id="gallery">
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

<?php require_once 'components/layout-bottom.php' ?>
