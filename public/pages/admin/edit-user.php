<?php
require_once '../../../helpers/bootstrap.php';

$admin = adminAuth();

//ambil data di url
$id = $_GET['id'];

//query data user yang bersangkutan
$row = query("SELECT * FROM tb_users WHERE id=$id")[0];

//apabila user telah selesai mengubah data di form
if(isset($_POST["submit"])) {
  //ubah data dan cek apakah data berhasil diganti
  if(editUser($_POST) > 0) {
    echo '<script>
            alert("Data User Berhasil Diganti");
            document.location.href = "index.php";
          </script>';
  } else {
    echo '<script>
            alert("Data User Gagal Diganti");
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
  <main class="min-vh-100 container d-flex flex-column justify-content-center align-items-center my-5">
    <div class="row w-75 d-flex flex-column align-items-center text-center shadow-lg bg-light py-5 px-5 m-5"
      style="border-radius: 2rem;">

      <div class="mt-4 mb-5">
        <h1 class="display-2">Edit User Profile</h1>
      </div>

      <div class="mb-5 d-flex align-items-center justify-content-center">
        <img src="<?= PUBLIC_DIR ?>/img/<?= $row["userimg"] ?>" class="rounded-circle" style="height: 15rem; width: 15rem;">
      </div>

      <form action="" method="post" enctype="multipart/form-data" class="text-start align-self-center w-100 px-lg-5">
      <input type="hidden" name="id" value="<?= $row["id"] ?>">
      <input type="hidden" name="userpass_old" value="">
      <input type="hidden" name="userimg_old" value="<?= $row["userimg"] ?>">
        <div class="mb-3">
          <label for="formName" class="form-label">Username</label>
          <input type="text" class="form-control form-control-lg" id="formName" name="username" placeholder="Example"
            value="<?= $row["username"] ?>" required>
        </div>
        <div class="mb-3">
          <label for="formPassword" class="form-label">New Password</label>
          <input type="password" class="form-control form-control-lg" id="formPassword" name="userpass"
            placeholder="••••••••">
        </div>
        <div class="mb-3">
          <label for="formPassword2" class="form-label">Confirm Password</label>
          <input type="password" class="form-control form-control-lg" id="formPassword2" name="userpass_confirm"
            placeholder="••••••••">
        </div>

        <div class="mb-3">
          <label for="formFile" class="form-label">Profile Picture</label>
          <input class="form-control form-control-lg" type="file" id="formFile" name="userimg">
        </div>

        <div class="mb-5">
          <label for="userrole">Role User</label>
          <select class="form-select form-select-lg" name="userrole" id="userrole">
            <?php $roles = query("SELECT * FROM tb_roles");
            foreach($roles as $role) : ?>
            <?php if(!($row["userrole"] === $role["rolename"])) {
              $check = "";
            } else {
              $check = "selected";
            }
            ?>
            <option value="<?= $role["rolename"] ?>" <?= $check ?>>
              <?= $role["rolename"] ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mt-5 mb-4">
          <a href="index.php" class="btn btn-lg btn-default">Batal</a>
          <button type="submit" name="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>

      </form>
    </div>
  </main>
  <!-- /Main -->

<?php require_once 'components/layout-bottom.php' ?>
