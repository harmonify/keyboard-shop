<?php
require_once '../../../helpers/bootstrap.php';

$admin = adminAuth();

//query data tb_roles
$roles = query("SELECT * FROM tb_roles");


//apabila admin mengisi form tambah role
if(isset($_POST["addrole"])) {
  //tambah data dan cek apakah data berhasil ditambahkan
  if (addRole($_POST) > 0) {
    echo '<script>
            alert("Role Baru Berhasil Ditambahkan");
            document.location.href = "index.php";
          </script>';
  } else {
    echo '<script>
            alert("Role Baru Gagal Ditambahkan");
            document.location.href = "index.php";
          </script>';
  }
}

//apabila admin mengisi form hapus role
if(isset($_POST["delrole"])) {
  //hapus data dan cek apakah data berhasil dihapus
  if (delRole($_POST) > 0) {
    echo '<script>
            alert("Role Berhasil Dihapus");
            document.location.href = "index.php";
          </script>';
  } else {
    echo '<script>
            alert("Role Gagal Dihapus");
            document.location.href = "index.php";
          </script>';
  }
}

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

  <!-- Main -->
  <main class="min-vh-100 container d-flex flex-column justify-content-center my-5">
    <div
      class="align-self-start row d-flex flex-column align-items-center text-center shadow-lg bg-light py-5 px-5 m-5"
      style="border-radius: 2rem; width: 60%;">

      <div class="mt-4 mb-5">
        <h1 class="display-2">
          <i class="bi bi-plus"></i>
          <span>Add New Role</span>
        </h1>
      </div>

      <form action="" method="post" class="text-start align-self-center w-75 d-flex flex-column">
        <input type="hidden" name="roleby" value="<?= $row["username"] ?>">
        <div class="mb-3">
          <label for="formRole" class="form-label">New Role Name</label>
          <input type="text" class="form-control form-control-lg" id="formRole" name="rolename" placeholder="example"
            required>
        </div>

        <div class="mt-5 mb-4">
          <a href="index.php" class="btn btn-lg btn-default">Batal</a>
          <button type="submit" name="addrole" class="btn btn-lg btn-primary"
            onclick="return confirm('Are you sure you want to add this role?');">Submit</button>
        </div>

      </form>
    </div>

    <div
      class="align-self-end row d-flex flex-column align-items-center text-center shadow-lg bg-light py-5 px-5 m-5"
      style="border-radius: 2rem; width: 60%;">

      <div class="mt-4 mb-5">
        <h1 class="display-2">
          <i class="bi bi-trash"></i>
          <span>Delete Role</span>
        </h1>
      </div>

      <form action="" method="post" class="text-start align-self-center w-75 d-flex flex-column">

        <div class="mb-3">
          <label for="formRole2" class="form-label">Choose a role</label>
          <select class="form-select form-select-lg" name="rolename" id="formRole2">
            <?php foreach($roles as $role) : ?>
            <option value="<?= $role["rolename"] ?>"><?= $role["rolename"] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mt-5 mb-4 align-self-end">
          <a href="index.php" class="btn btn-lg btn-default">Batal</a>
          <button type="submit" name="delrole" class="btn btn-lg btn-danger"
            onclick="return confirm('Are you sure you want to delete this role?');">Delete</button>
        </div>

      </form>
    </div>
  </main>
  <!-- /Main -->

<?php require_once 'components/layout-bottom.php' ?>
