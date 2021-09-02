<?php
require "../../helpers/bootstrap.php";

//cek sesi dan cek role user
isNotLoggedIn("login.php");

//query data user yang sedang online
$user = userAuth();

?>

<?php require_once 'components/layout-top.php' ?>

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

<main class="min-vh-100 container d-flex justify-content-center align-items-center my-5">
  <div class="row w-75 d-flex flex-column align-items-center text-center shadow-lg bg-light py-5 px-5 m-5"
    style="border-radius: 2rem;">

    <div class="mt-5 mb-5">
      <h1 class="display-2">Profile</h1>
    </div>

    <div class="mb-5 d-flex align-items-center justify-content-center">
      <img src="../img/<?= $user["userimg"] ?>" class="rounded-circle" style="height: 15rem; width: 15rem;">
    </div>

    <div class="mb-5">
      <h2 class="display-3">Username: <?= $user["username"] ?></h2>
    </div>

    <div class="mb-5">
      <h2 class="display-3">Role: <?= $user["userrole"] ?></h2>
    </div>

  </div>
</main>

<?php require_once 'components/layout-bottom.php' ?>
