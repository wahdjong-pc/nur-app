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

  $id_siswa = $_POST['id_siswa'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $jk = $_POST['gender'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $alamat = $_POST['alamat'];
  $kelas = $_POST['kelas'];
  $semester = $_POST['semester'];

  $status_spp = "Proses";
  $status_angsuran = "Proses";

$query = $koneksi->query("UPDATE tbl_siswa SET 
nis = '$nis', 
nama = '$nama', 
jenis_kelamin = '$jk', 
tgl_lahir = '$tgl_lahir', 
alamat = '$alamat', 
kelas = '$kelas', 
semester = '$semester' WHERE id_siswa = '$id_siswa'");

if ($query) {
    // pesan jika data berubah
    echo "<script>
    Swal.fire({
     title: 'Berhasil',
     text: 'Data siswa berhasil diubah!',
     icon: 'success',
     confirmButtonColor: '#3085d6'
   }).then((result) => {
     if (result.isConfirmed) {
       window.location.href='../data-siswa.php'
     }
   })
</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data siswa gagal diubah'); window.location.href='../data-siswa.php'</script>";
  }
}
?>
</body>
</html>