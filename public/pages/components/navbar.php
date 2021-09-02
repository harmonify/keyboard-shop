<div class="site-header sticky-top px-5 bg-eigengrau">
  <div class="navbar navbar-expand-lg p-1">
    <div class="container d-flex flex-column flex-md-row">
      <div class="row w-100">
        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bi bi-keyboard-fill text-white fs-1 align-center"></i>
        </button>

        <a href="<?= PUBLIC_DIR ?>/pages/index.php" class="navbar-brand d-none d-lg-inline-block col-2">
          <i class="bi bi-keyboard-fill fs-1 d-inline-block"></i>
          <span class="d-inline-block fs-4 p-0 ps-2 position-relative" style="top: -4px;  font-family: 'Yellowtail', cursive;">Harmonikeys</span>
        </a>

        <nav class="collapse navbar-collapse justify-content-lg-center col-7 ps-3" id="navbar">
          <ul class="navbar-nav mb-2 mb-sm-0 text-center" id="menu">
            <li class="nav-item me-lg-4">
              <a class="nav-link fs-5" aria-current="page" href="<?= PUBLIC_DIR ?>/pages/index.php#home">
                <i class="bi bi-house-door-fill"></i>
                <span>Home</span>
              </a>
            </li>
            <li class="nav-item me-lg-4">
              <a class="nav-link fs-5" href="<?= PUBLIC_DIR ?>/pages/index.php#features">
                <i class="bi bi-stars"></i>
                <span>Features</span>
              </a>
            </li>
            <li class="nav-item me-lg-4">
              <a class="nav-link fs-5" href="<?= PUBLIC_DIR ?>/pages/index.php#getstarted">
                <i class="bi bi-tag-fill"></i>
                <span>Get Started</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5" href="<?= PUBLIC_DIR ?>/pages/index.php#gallery">
                <i class="bi bi-images"></i>
                <span>Gallery</span>
              </a>
            </li>
            <div>
              <hr class="dropdown-divider text-white">
            </div>
            <!-- List item yg tampil saat layar kecil -->
            <?php if( !(isset($_SESSION["login"])) ) : ?>
            <li class="d-block d-lg-none nav-item me-5">
              <a href="<?= PUBLIC_DIR ?>/pages/login.php" class="nav-link fs-5 text-decoration-none">Login</a>
            </li>
            <?php else : ?>
            <li class="d-block d-lg-none nav-item dropdown me-5">
              <a class="dropdown-toggle text-decoration-none" href="#" id="dropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= PUBLIC_DIR ?>/img/<?= $user['userimg'] ?>" class="rounded-pill" width="30" height="30" alt="User Profile Image">
                <span><?= $user['username'] ?></span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdown1">
                <li class="d-block"><a href="<?= PUBLIC_DIR ?>/pages/profile.php" class="dropdown-item text-reset">Your Profile</a></li>
                <li class="d-block"><a href="<?= PUBLIC_DIR ?>/pages/edit-profile.php" class="dropdown-item text-reset">Edit Profile</a></li>
                <?php if (isset($_SESSION["administrator"])) : ?>
                <li class="d-block"><a href="<?= PUBLIC_DIR ?>/pages/admin/index.php" class="dropdown-item text-reset">Go to Dashboard</a>
                </li>
                <?php endif; ?>
                <li class="d-block">
                  <div class="dropdown-divider"></div>
                </li>
                <li class="d-block"><a href="<?= PUBLIC_DIR ?>/pages/logout.php" class="dropdown-item text-reset">Logout</a></li>
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
            <a class="dropdown-toggle text-decoration-none" href="#" id="dropdown2" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?= PUBLIC_DIR ?>/img/<?= $user['userimg'] ?>" class="rounded-pill" width="30" height="30" alt="User Profile Image">
              <span><?= $user['username'] ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdown2">
              <li><a href="<?= PUBLIC_DIR ?>/pages/profile.php" class="dropdown-item text-reset mb-2">Your Profile</a></li>
              <li><a href="<?= PUBLIC_DIR ?>/pages/edit-profile.php" class="dropdown-item text-reset mb-2">Edit Profile</a></li>
              <?php if (isset($_SESSION["administrator"])) : ?>
              <li><a href="<?= PUBLIC_DIR ?>/pages/admin/index.php" class="dropdown-item text-reset mb-2">Go to Dashboard</a></li>
              <?php endif; ?>
              <div class="dropdown-divider"></div>
              <li><a href="<?= PUBLIC_DIR ?>/pages/logout.php" class="dropdown-item text-reset">Logout</a></li>
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

</div>
