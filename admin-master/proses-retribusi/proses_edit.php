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

if (isset($_POST['submit-edit-retribusi'])) {

  $id_retribusi   = $_POST['id_retribusi'];
  $pasar          = $_POST['pasar'];
  $tgl            = $_POST['tanggal'];
  $jenis_tiket    = $_POST['jenis_tiket'];
  $biaya          = $_POST['biaya'];
  $no_kios        = $_POST['no_kios'];
  $kode_karcis    = $_POST['kode_karcis'];
  $nik            = "123";
  $nama_peg       = "Admin";


$query = $koneksi->query("UPDATE tbl_retribusi SET 
pasar = '$pasar', 
tanggal = '$tgl', 
jenis_tiket = '$jenis_tiket', 
biaya = '$biaya', 
no_kios = '$no_kios',
kode_karcis = '$kode_karcis',
nik = '$nik',
nama_pegawai = '$nama_peg' WHERE id_retribusi = '$id_retribusi'");

if ($query) {
    // pesan jika data berubah
    echo "<script>
    Swal.fire({
     title: 'Berhasil',
     text: 'Data retribusi berhasil diubah!',
     icon: 'success',
     confirmButtonColor: '#3085d6'
   }).then((result) => {
     if (result.isConfirmed) {
       window.location.href='../data-retribusi.php'
     }
   })
</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data retribusi gagal diubah'); window.location.href='../data-retribusi.php'</script>";
  }
}
?>
</body>
</html>