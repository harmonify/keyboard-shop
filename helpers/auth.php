<?php
//untuk mengecek status user, seperti status login dan role.
session_start();

//fungsi redirect user apabila blm login
function isNotLoggedIn($href = 'login.php') {
  if (!isset($_SESSION['login'])) {
    echo "<script>
            alert('Login dulu...');
            document.location.href = '" . PUBLIC_DIR . "/pages/$href';
          </script>";
  }
}

//fungsi redirect user apabila sudah login
function isLoggedIn($href = 'index.php') {
  if (isset($_SESSION['login'])) {
    echo "<script>
            alert('Logout dulu...');
            document.location.href = '" . PUBLIC_DIR . "/pages/{$href}';
          </script>";
  }
}

//fungsi redirect user apabila bukan role administrator
function isNotAdministrator($href = 'index.php') {
  if (!isset($_SESSION['administrator'])) {
    echo "<script>
            alert('Anda tidak memiliki izin');
            document.location.href = '" . PUBLIC_DIR . "/pages/{$href}';
          </script>";
  }

}

// query data user online
function userAuth() {
  if (isset($_SESSION["id"])) {
    $sessionData = query("SELECT * FROM tb_users WHERE id = '". $_SESSION["id"]."'")[0];
    return $sessionData;
  }
}

// auth admin
function adminAuth() {
  //cek sesi dan cek role user
  isNotLoggedIn();
  isNotAdministrator();

  //query data admin yang sedang online
  return userAuth();
}
?>
