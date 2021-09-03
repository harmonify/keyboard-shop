<?php
require "../../helpers/bootstrap.php";

//cek sesi dan cek role user
isNotLoggedIn();

//query data user yang sedang online
$user = userAuth();

//apabila user telah selesai mengubah data di form
if(isset($_POST["submit"])) {
  //ubah data dan cek apakah data berhasil diganti
  if(editUser($_POST) > 0) {
    echo '<script>
            alert("Profile Berhasil Diganti");
            document.location.href = "profile.php";
          </script>';
  } else {
    echo '<script>
            alert("Profile Gagal Diganti");
            document.location.href = "profile.php";
          </script>';
  }
}
?>

<!doctype html>
<html lang="en">

<?php require_once 'components/layout-top.php'; ?>

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

  <main class="min-vh-100 container d-flex justify-content-center align-items-center my-5">
    <div class="row w-75 d-flex flex-column align-items-center text-center shadow-lg bg-light py-5 px-5 m-5"
      style="border-radius: 2rem;">

      <div class="mt-4 mb-5">
        <h1 class="display-2">Edit Profile</h1>
      </div>

      <div class="mb-5 d-flex align-items-center justify-content-center">
        <img src="../img/<?= $user["userimg"] ?>" class="rounded-circle" style="height: 15rem; width: 15rem;">
      </div>

      <form action="" method="post" enctype="multipart/form-data" class="text-start align-self-center w-100 px-lg-5">
        <input type="hidden" name="id" value="<?= $user["id"] ?>">
        <input type="hidden" name="userrole" value="<?= $user["userrole"] ?>">
        <input type="hidden" name="userimg_old" value="<?= $user["userimg"] ?>">
        <div class="mb-4">
          <label for="formName" class="form-label">Your Username</label>
          <input type="text" class="form-control form-control-lg" id="formName" name="username" placeholder="Example"
            value="<?= $user["username"]; ?>" required>
        </div>
        <div class="mb-4">
          <label for="formPassword" class="form-label">Your Password</label>
          <input type="password" class="text-muted form-control form-control-lg" id="formPassword" name="userpass_old"
            placeholder="••••••••" required>
        </div>

        <hr class="dropdown-divider my-4">

        <div class="form-label lead text-muted mb-4">Optional</div>
        <div class="mb-4">
          <label for="formPassword" class="form-label">Change Your Password</label>
          <input type="password" class="form-control form-control-lg" id="formPassword" name="userpass">
        </div>
        <div class="mb-4">
          <label for="formPassword" class="form-label">Confirm New Password</label>
          <input type="password" class="form-control form-control-lg" id="formPassword" name="userpass_confirm">
        </div>
        <div class="mb-5">
          <label for="formFile" class="form-label">Profile Picture</label>
          <input class="form-control form-control-lg" type="file" id="formFile" name="userimg">
        </div>
        <div class="mb-4">
          <a href="index.php" class="btn btn-lg btn-default">Batal</a>
          <button type="submit" name="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
      </form>

    </div>
  </main>
<?php require_once 'components/layout-bottom.php'; ?>
