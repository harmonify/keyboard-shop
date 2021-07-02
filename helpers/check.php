<?php
//untuk mengecek status user, seperti status login dan role.
session_start();

//fungsi redirect user apabila blm login
function isNotLoggedIn($href) {
  if (!isset($_SESSION['login'])) {
    echo "<script>
            alert('Login dulu...');
            document.location.href = '$href';
          </script>";
  }
}

//fungsi redirect user apabila sudah login
function isLoggedIn($href) {
  if (isset($_SESSION['login'])) {
    echo "<script>
            alert('Logout dulu...');
            document.location.href = '$href';
          </script>";
  }
}

//fungsi redirect user apabila bukan role administrator
function isNotAdministrator($href) {
  if (!isset($_SESSION['administrator'])) {
    echo "<script>
            alert('Anda tidak memiliki izin');
            document.location.href = '$href';
          </script>";
  }

}


?>
