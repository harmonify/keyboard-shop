<?php
require_once '../../../helpers/bootstrap.php';

$admin = adminAuth();

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
