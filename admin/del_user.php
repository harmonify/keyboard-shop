<?php
session_start();

//cek sesi dan cek role user
if (!isset($_SESSION['login'])) {
  echo "<script>
          alert('Login dulu...');
          document.location.href = '../pages/login.php';
        </script>";
}
if (!isset($_SESSION['administrator'])) {
  echo "<script>
          alert('Anda tidak memiliki izin');
          document.location.href = '../pages/index.php';
        </script>";
}

require "../helpers/functions.php";

//ambil id user dri url
$id = $_GET["id"];

if (delUser($id) > 0) {
  echo "<script>
          alert('Data berhasil dihapus!');
          document.location.href='index.php';
        </script>";
} else {
  echo "<script>
          alert('Data gagal dihapus!');
          document.location.href='index.php';
        </script>";
}

?>
