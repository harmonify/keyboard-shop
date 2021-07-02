<?php
//cek sesi dan cek role user
require_once "../helpers/check.php";

isNotLoggedIn("../pages/login.php");
isNotAdministrator("../pages/login.php");

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
