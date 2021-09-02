<?php
require "../../helpers/bootstrap.php";

isLoggedIn();


//apabila user telah mengisi form login
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $userpass = $_POST["userpass"];

  //cek username
  $result = $conn->query("SELECT * FROM tb_users WHERE username='$username'");
  if (mysqli_num_rows($result) === 1) {
    //cek password
    $row = mysqli_fetch_assoc($result);
    if(password_verify($userpass, $row["userpass"])) {
      //set session login
      $_SESSION["id"] = $row["id"];
      $_SESSION["login"] = true;

      if($row["userrole"] === "administrator") {
        //set session untuk admin
        $_SESSION["administrator"] = true;
        header("Location: ".PUBLIC_DIR."/pages/admin/index.php");
        exit;
      }
      else {
        header("Location: ".PUBLIC_DIR."/pages/index.php");
        exit;
      }
    }
    else {
      echo '<script>
              alert("Username atau Password anda salah");
              document.location.href="login.php";
            </script>';
    }
  }
}


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
<div class="container d-flex flex-column justify-content-center align-items-center mb-5 min-vh-100">
  <div class="text-white text-center mb-2">
    <a href="index.php" class="text-reset text-decoration-none">
      <i class="bi bi-keyboard-fill mb-3" style="font-size: 60px;"></i>
      <h1 class="h3 fw-normal" style="font-family: 'Yellowtail','cursive';">Harmonikeys</h1>
    </a>
  </div>
  <main class="d-flex col-5 align-items-center text-center py-4">
    <div class="form-login">
      <form action="" method="post">

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username" required autocomplete="off" autofocus>
          <label for="floatingInput" class="text-muted">Username</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingPassword" name="userpass" placeholder="Password"
            required>
          <label for="floatingPassword" class="text-muted">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary bg-gradient" type="submit" name="submit">Login</button>
      </form>
      <hr class="dropdown-divider text-white border border-white my-4">
      <div>
        <a href="register.php" class="w-100 btn btn-lg mb-4 btn-success">Create New Account</a>
      </div>
      <p class="mt-4 mb-3 text-white">&copy; 2021</p>
    </div>
  </main>
</div>

<?php require_once 'components/layout-bottom.php' ?>
