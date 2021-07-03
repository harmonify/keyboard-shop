<?php
session_start();

if (isset($_SESSION["login"])) {
  if(isset($_SESSION["administrator"])) {
    header("Location: ../admin/index.php");
    exit;
  }
  else {
    header("Location: ../pages/index.php");
    exit;
  }
}

require "../helpers/functions.php";

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
        header("Location: ../admin/index.php");
        exit;
      }
      else {
        header("Location: index.php");
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

<style>
  html,
  body {
    height: 100%;
  }

  body {
    background-color: #f5f5f5;
  }

  .form-login {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
  }

  .form-login .checkbox {
    font-weight: 400;
  }

  .form-login .form-floating:focus-within {
    z-index: 2;
  }

  .form-login input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }

  .form-login input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }

</style>

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

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

  <title>Login</title>
</head>

<body class="d-flex align-items-center text-center py-4">
  <main class="form-login">
    <form action="" method="post">
      <i class="bi bi-keyboard-fill mb-3" style="font-size: 60px;"></i>
      <h1 class="h3 mb-4 fw-normal" style="font-family: 'Yellowtail','cursive';">Harmonikeys</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username" required>
        <label for="floatingInput" class="text-muted">Username</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" name="userpass" placeholder="Password"
          required>
        <label for="floatingPassword" class="text-muted">Password</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary bg-gradient" type="submit" name="submit">Login</button>
    </form>
    <hr class="dropdown-divider my-4">
    <div>
      <a href="register.php" class="w-100 btn btn-lg mb-4 btn-success">Create New Account</a>
    </div>
    <p class="mt-4 mb-3 text-muted">&copy; 2021</p>
  </main>
</body>

</html>
