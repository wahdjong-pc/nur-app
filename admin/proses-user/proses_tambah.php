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
  $nama = $_POST['nama'];
  $jabatan = $_POST['jabatan'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $pass_hash = password_hash($password, PASSWORD_DEFAULT);

// id_produk bernilai '' karena kita set auto increment
  $query = $koneksi->query("INSERT INTO tbl_user VALUES ('', '$nama', '$jabatan', '$username', '$pass_hash')");
if ($query) {
    // pesan jika data tersimpan
    echo "<script>
    Swal.fire({
     title: 'Berhasil',
     text: 'Data user berhasil ditambah!',
     icon: 'success',
     confirmButtonColor: '#3085d6'
   }).then((result) => {
     if (result.isConfirmed) {
       window.location.href='../data-user.php'
     }
   })
</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data user gagal ditambahkan'); window.location.href='../data-user.php'</script>";
  }
}

?>

</body>
</html>