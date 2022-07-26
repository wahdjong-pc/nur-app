<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <!-- SweatAlert -->
  <link rel="stylesheet" href="../../sweatalert/dist/sweetalert2.min.css">
  <!-- SweetAlert -->
<script src="../../sweatalert/dist/sweetalert2.all.min.js"></script>
</head>
<body>

<?php
include '../../koneksi/config.php';

if (isset($_POST['submit'])) {

  $id_user = $_POST['id_user'];
  $nama = $_POST['nama'];
  $jabatan = $_POST['jabatan'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $pass_hash = password_hash($password, PASSWORD_DEFAULT);

$query = $koneksi->query("UPDATE tbl_user SET 
nama = '$nama', 
jabatan = '$jabatan', 
username = '$username', 
password = '$pass_hash' WHERE id_user = '$id_user'");

if ($query) {
    // pesan jika data berubah
    echo "<script>
    Swal.fire({
     title: 'Berhasil',
     text: 'Data user berhasil diubah!',
     icon: 'success',
     confirmButtonColor: '#3085d6'
   }).then((result) => {
     if (result.isConfirmed) {
       window.location.href='../data-user.php'
     }
   })
</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data produk gagal diubah'); window.location.href='index.php'</script>";
  }
}
?>
</body>
</html>