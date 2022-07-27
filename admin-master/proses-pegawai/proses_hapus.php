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
include '../../config/config.php';
if (isset($_GET['id'])) {
  $id_pegawai = $_GET['id'];
// perintah hapus data berdasarkan id yang dikirimkan
  $query = $koneksi->query("DELETE FROM tbl_pegawai WHERE id_pegawai = '$id_pegawai'");
// cek perintah
  if ($query) {
    // pesan apabila hapus berhasil
    echo "<script>Swal.fire(
      'Terhapus!',
      'Data pegawai berhasil di hapus!',
      'success' 
    ).then((result) => {
       window.location.href='../data-pegawai.php'
   })</script>";
  } else {
    // pesan apabila hapus gagal
    echo "<script>alert('Data pegawai gagal dihapus'); window.location.href='../data-pegawai.php'</script>";
  }
}

?>
</body>
</html>