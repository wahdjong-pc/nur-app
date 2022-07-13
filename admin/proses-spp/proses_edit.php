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

  $kode_bayar = $_POST['kodebayar'];
  $jml_bayar  = $_POST['jumlah_bayar'];
  $tgl_bayar  = $_POST['tgl_bayar'];
  $bulan      = $_POST['bulan'];
  $tahun      = $_POST['tahun'];

  $jumlahBayarExplode = explode('.', $jml_bayar);
  
  $jumlahBayarImplode = (int)implode($jumlahBayarExplode);

$query_cek = $koneksi->query("SELECT * FROM tbl_spp WHERE bulan = '$bulan' AND tahun = '$tahun'");

  $cek = mysqli_num_rows($query_cek);
  if($cek > 0){

        echo "<script>
        Swal.fire({
         title: 'Gagal',
         text: 'Bulan atau tahun sudah ada!',
         icon: 'error',
         confirmButtonColor: '#3085d6'
       }).then((result) => {
         if (result.isConfirmed) {
           window.location.href='../data-spp.php'
         }
       })
    </script>";
  }else {
    if (isset($_POST['submit'])) {


    $query = $koneksi->query("UPDATE tbl_spp SET 
    kode_bayar   = '$kode_bayar', 
    jumlah_bayar = '$jumlahBayarImplode', 
    tgl_bayar    = '$tgl_bayar', 
    bulan        = '$bulan', 
    tahun        = '$tahun' WHERE kode_bayar = '$kode_bayar'");

    if ($query) {
        // pesan jika data berubah
        echo "<script>
        Swal.fire({
         title: 'Berhasil',
         text: 'Data spp berhasil diubah!',
         icon: 'success',
         confirmButtonColor: '#3085d6'
       }).then((result) => {
         if (result.isConfirmed) {
           window.location.href='../data-spp.php'
         }
       })
    </script>";
      } else {
        // pesan jika data gagal diubah
        echo "<script>alert('Data siswa gagal diubah'); window.location.href='../data-spp.php'</script>";
      }
    }
  }
?>
</body>
</html>