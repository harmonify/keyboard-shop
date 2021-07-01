<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

echo "<script>
        alert('Terima kasih, Silahkan Login kembali nanti');
        window.location='../pages/index.php';
      </script>";
?>
