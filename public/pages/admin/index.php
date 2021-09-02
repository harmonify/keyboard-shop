<?php
require_once '../../../helpers/bootstrap.php';

// query data admin yang sedang online
$admin = adminAuth();

$pagination = pagination();

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

  a {
    text-decoration: none;
    color: black;
  }

</style>


  <main class="min-vh-100 container p-5 d-flex flex-column align-content-center">

    <!-- Navigation -->
    <nav class="ps-n5">
      <ul class="pagination">
        <!-- Tombol Previous -->
        <?php ($pagination['ACTIVE_PAGE'] > 1) ? $isOne = "" : $isOne = "disabled"; ?>
        <li class="page-item <?= $isOne ?>">
          <a class="page-link" href="?page=<?= $pagination['ACTIVE_PAGE']-1 ?>">
            &laquo;
          </a>
        </li>

        <!-- Pages -->
        <?php for($i = 1; $i <= $pagination['TOTAL_PAGE']; $i++) : ?>
        <?php ($i == $pagination['ACTIVE_PAGE']) ? $isActive = "active" : $isActive = "" ; ?>
        <li class="page-item <?= $isActive ?>">
          <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
        </li>
        <?php endfor; ?>

        <!-- Tombol Next -->
        <?php ($pagination['ACTIVE_PAGE'] < $pagination['TOTAL_PAGE']) ? $isLast = "" : $isLast = "disabled"; ?>
        <li class="page-item <?= $isLast ?>">
          <a class="page-link" href="?page=<?= $pagination['ACTIVE_PAGE']+1 ?>">
            &raquo;
          </a>
        </li>

      </ul>
    </nav>
    <!-- /Navigation -->


    <!-- Tabel Data User -->
    <div class="row table-responsive w-100 bg-light rounded-3 shadow-lg" id="table-container">
      <table class="table table-striped caption-top border-bottom shadow shadow-lg">
        <caption class="ps-3">Rows <?= $pagination['FIRST_DATA']+1 ?>-<?= $pagination['FIRST_DATA']+$pagination['DATA_PER_PAGE'] ?> of
          <?= $pagination['TOTAL_DATA'] ?> users.</caption>
        <thead>
          <th scope="col">#</th>
          <th scope="col" class="order-first order-lg-last">Action</th>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">Profile Picture</th>
          <th scope="col">Role User</th>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach($pagination['USERS_DATA'] as $row) : ?>
          <tr>
            <th scope="row"><?= $i+$pagination['FIRST_DATA'] ?></th>
            <td class="order-first order-lg-last">
              <!-- Tombol Edit User -->
              <a href="edit-user.php?id=<?= $row["id"] ?>" class="text-decoration-none">
                <i class="bi bi-pencil-square text-primary fs-4"></i>
              </a>
              <!-- Tombol Hapus User -->
              <a href="del-user.php?id=<?= $row["id"]; ?>" class="text-decoration-none"
                onclick="return confirm('Are you sure?');">
                <i class="bi bi-trash-fill text-danger fs-4"></i>
              </a>
            </td>
            <td><?= $row["username"] ?></td>
            <td>••••••••</td>
            <td><img src='<?= PUBLIC_DIR ?>/img/<?= $row["userimg"] ?>' class="d-block rounded-circle mx-4 text-center" width="50"
                height="50" alt="User image"></td>
            <td><?= $row["userrole"] ?></td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /Tabel Data User -->

  </main>

<?php require_once 'components/layout-bottom.php' ?>
