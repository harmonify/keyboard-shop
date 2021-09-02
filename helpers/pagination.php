<?php 

function pagination () {
  $dataPerPage = DATA_PER_PAGE;
  $totalData = count(query("SELECT * FROM tb_users"));
  $totalPage = ceil($totalData / $dataPerPage);


  //halaman yg sedang aktif
  $activePage = isset($_GET["page"]) ? $_GET["page"] : 1;


  //data awal yg tampil pada halaman yang sedang aktif
  $firstDataOnPage = ($dataPerPage * $activePage) - $dataPerPage;


  //query semua data dari tb_users dengan limit per halaman sebanyak $dataPerPage
  $users = query("SELECT * FROM tb_users LIMIT $firstDataOnPage, $dataPerPage");

  return [
    'DATA_PER_PAGE' => $dataPerPage,
    'TOTAL_DATA' => $totalData,
    'TOTAL_PAGE' => $totalPage,
    'ACTIVE_PAGE' => $activePage,
    'FIRST_DATA' => $firstDataOnPage,
    'USERS_DATA' => $users,
  ];
}

?>