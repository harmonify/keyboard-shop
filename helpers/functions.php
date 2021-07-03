<?php
/* Connect ke database */
$conn = new mysqli("localhost", "root", "", "db_finalproject");
if($conn->connect_error) {
  trigger_error('Koneksi ke database gagal: ' .$conn->connect_error, E_USER_ERROR);
}



/***** FUNGSI ADMINISTRATOR *****/

/* Fungsi Untuk Mempersiapkan Hasil Query */
function query($query) {
  global $conn;

  //query data yang diperlukan
  $result = $conn->query($query);

  //masukkan semua hasil query ke array $rows
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }

  //mengembalikan hasil query
  return $rows;
}



/* Fungsi Untuk Menambah User */
function addUser($data) {
  global $conn;
  //tangkap data
  $username = strtolower(htmlspecialchars($data["username"]));
  $userpass = mysqli_real_escape_string($conn, $data["userpass"]);
  $userrole = $data["userrole"];

  //cek username valid
  if (empty(trim($username))) {
    return false;
  }

  //cek username sudah ada atau belum
	$result = $conn->query("SELECT username FROM tb_users WHERE username = '$username'");
	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	};

  // enkripsi password
  $userpass = password_hash($userpass, PASSWORD_DEFAULT);

  //jalankan fungsi upload gambar
  $userimg = upload();

  //tambah data baru
  $query = "INSERT INTO tb_users VALUES ('', '$username', '$userpass', '$userimg', '$userrole')";
  $conn->query($query);

  //mengembalikan status query
  return mysqli_affected_rows($conn);
}



/* Fungsi Untuk Mengupload Gambar */
function upload() {
  //tangkap file data
  $userimg_name = htmlspecialchars($_FILES["userimg"]["name"]);
  $userimg_tmp = htmlspecialchars($_FILES["userimg"]["tmp_name"]);

  //ubah value $userimg menjadi default apabila user tidak menambahkan foto
  if(!(is_uploaded_file($userimg_tmp))){
    return "default_user_img.png";
  }
  //cek apakah file belum ada dalam folder img
  else if(!(file_exists("../img/".$userimg_name))){
    move_uploaded_file($userimg_tmp, "../img/".$userimg_name);
  }

  //kembalikan string nama gambar
  return $userimg_name;
}



/* Fungsi Untuk Menghapus Data User */
function delUser($id) {
	global $conn;

  //hapus data user
	$conn->query("DELETE FROM tb_users WHERE id=$id");

  //mengembalikan status query
	return mysqli_affected_rows($conn);
}



/* Fungsi Untuk Mengubah Data User */
function editUser($data) {
  global $conn;

  //tangkap data
  $id = $data["id"];
  $userpass_old = mysqli_real_escape_string($conn, $data["userpass_old"]);
  $userimg_old = $data["userimg_old"];

  $username = htmlspecialchars($data["username"]);
  $userpass = mysqli_real_escape_string($conn, $data["userpass"]);
  $userpass_confirm = mysqli_real_escape_string($conn, $data["userpass_confirm"]);
  $userrole = $data["userrole"];


  //cek username valid
  if (empty(trim($username))) {
    return false;
  }

  //cek apakah user lain telah menggunakan username ini atau belum
	$result = query("SELECT id, username FROM tb_users WHERE username = '$username'");

	if($result){
    if($id !== $result[0]["id"]) {
	  	echo "<script>
			      	alert('username sudah terdaftar!')
		        </script>";
		  return false;
	  };
  }

  //jika bukan administrator
  if (!(isset($_SESSION["administrator"]))) {
    //cek apakah user memasukkan password lama dengan benar
    $userpass_old_db = query("SELECT userpass FROM tb_users WHERE id = $id")[0]["userpass"];

    //apabila salah
    if (!(password_verify($userpass_old, $userpass_old_db))) {
      echo '<script>
              alert("Password Anda salah!");
              document.location.href = "index.php";
            </script>';
      return false;
    }
  }

  //cek apakah user mengganti password atau tidak
  if (empty($userpass) && empty($userpass_confirm)) {
    $userpass = $userpass_old;
    $userpass_confirm = $userpass_old;
  }

  //cek apakah user memasukkan password baru dengan benar
  if ($userpass !== $userpass_confirm) {
    echo '<script>
            alert("Konfirmasi password tidak sesuai");
            document.location.href = "index.php";
          </script>';
    return false;
  }

  // enkripsi password
  $userpass = password_hash($userpass, PASSWORD_DEFAULT);

  //cek apakah user pilih gambar baru atau tidak
	if($_FILES['userimg']['error'] === 4 ) {
    $userimg = $userimg_old;
	} else {
    $userimg = upload();
	}

  //ubah data
  $query = "UPDATE tb_users SET
              username = '$username',
              userpass = '$userpass',
              userimg = '$userimg',
              userrole = '$userrole'
            WHERE id = $id";
  $conn -> query($query);

  //mengembalikan status query
	return mysqli_affected_rows($conn);
}



/* Fungsi Menambah Role Baru */
function addRole($data) {
  global $conn;

  $rolename = strtolower(htmlspecialchars($data["rolename"]));
  $roleby = $data["roleby"];

  //apabila role sudah ada, hentikan
  $result = $conn->query("SELECT * FROM tb_roles where rolename = '$rolename'");
  if (mysqli_fetch_row($result) > 0) {
    echo "<script>alert('Role sudah ada!')</script>";
    return false;
  }

  //tambahkan role baru
  $query = "INSERT INTO tb_roles VALUES ('', '$rolename', '$roleby')";
  $conn -> query($query);

  return mysqli_affected_rows($conn);
}



/* Fungsi Menghapus Role */
function delRole($data) {
	global $conn;

  $rolename = $data["rolename"];

  //hapus role
	$conn->query("DELETE FROM tb_roles WHERE rolename='$rolename'");

  //mengembalikan status query
	return mysqli_affected_rows($conn);
}


/***** AKHIR FUNGSI ADMINISTRATOR *****/




/***** FUNGSI USER *****/

/* Fungsi Registrasi */
function registerUser($data) {
  global $conn;
  //tangkap data
  $username = strtolower(htmlspecialchars($data["username"]));
  $userpass = mysqli_real_escape_string($conn, $data["userpass"]);
	$userpass_confirm = mysqli_real_escape_string($conn, $data["userpass_confirm"]);
  $userrole = $data["userrole"];

  //cek username valid
  if (empty(trim($username))) {
    return false;
  }

  //cek username sudah ada atau belum
	$result = $conn->query("SELECT username FROM tb_users WHERE username = '$username'");
	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	};

  //cek apakah user sudah memasukkan password dengan benar
  if ($userpass !== $userpass_confirm) {
    echo '<script>
            alert("Konfirmasi password tidak sesuai");
            document.location.href = "index.php";
          </script>';
    return false;
  }

  // enkripsi password
  $userpass = password_hash($userpass, PASSWORD_DEFAULT);

  //jalankan fungsi upload gambar
  $userimg = upload();

  //tambah data baru
  $query = "INSERT INTO tb_users VALUES ('', '$username', '$userpass', '$userimg', '$userrole')";
  $conn->query($query);

  //mengembalikan status query
  return mysqli_affected_rows($conn);
}

/***** AKHIR FUNGSI USER *****/



?>
