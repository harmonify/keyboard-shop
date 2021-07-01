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

//apabila user telah mengisi form
if(isset($_POST["submit"])) {
  //tambah data dan cek apakah data berhasil ditambahkan
  if (addUser($_POST) > 0) {
    echo '<script>
            alert("Data User Berhasil Ditambahkan");
            document.location.href = "index.php";
          </script>';
  } else {
    echo '<script>
            alert("Data User Gagal Ditambahkan");
            document.location.href = "index.php";
          </script>';
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <title>Tambah Data User</title>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modalAddLabel">Tambah Data User</h4>
          <a href="index.php" role="button" class="btn-close"></a>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="mb-3">
              <label for="formName" class="form-label">Username</label>
              <input type="text" class="form-control" id="formName" name="username" placeholder="Example" required>
            </div>
            <div class="mb-3">
              <label for="formPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="formPassword" name="userpass" placeholder="********"
                required>
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Profile Picture</label>
              <input class="form-control" type="file" id="formFile" name="userimg">
            </div>
            <div class="mb-3">
              <label for="userrole">Role User</label>
              <select class="form-select" name="userrole" id="userrole">
                <option value="user" selected>User</option>
                <option value="administrator">Admin</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <a href="index.php" class="btn btn-default">Batal</a>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.container -->

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
  </script>
</body>

</html>