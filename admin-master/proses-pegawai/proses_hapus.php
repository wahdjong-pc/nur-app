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
if (isset($_GET['id'])) {
  $id = $_GET['id'];
// perintah hapus data berdasarkan id yang dikirimkan
  $query = $koneksi->query("DELETE FROM tbl_user WHERE id_user = '$id'");
// cek perintah
  if ($query) {
    // pesan apabila hapus berhasil
    echo "<script>Swal.fire(
      'Terhapus!',
      'Data berhasil di hapus!',
      'success' 
    ).then((result) => {
       window.location.href='../data-user.php'
   })</script>";
  } else {
    // pesan apabila hapus gagal
    echo "<script>alert('Data berhasil dihapus'); window.location.href='index.php'</script>";
  }
}

?>
</body>
</html>