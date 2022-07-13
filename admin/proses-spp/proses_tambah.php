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


  $kode_bayar      = $_POST['kodebayar'];
  $nis             = $_POST['nis'];
  $nama            = $_POST['nama'];
  $kelas           = $_POST['kelas'];
  $semester        = $_POST['semester'];
  $status_spp      = "Proses";
  $jumlah_bayar    = $_POST['jumlah_bayar'];
  $tgl_bayar       = $_POST['tgl_bayar'];
  $bulan           = $_POST['bulan'];
  $tahun           = $_POST['tahun'];

  $jumlahBayarExplode = explode('.', $jumlah_bayar);
  
  $jumlahBayarImplode = (int)implode($jumlahBayarExplode);
  $status_bayar    = "LUNAS";

  $query_cek_bulan_tahun = $koneksi->query("SELECT * FROM tbl_spp WHERE nis ='$nis' AND bulan = '$bulan' AND tahun = '$tahun'");
  $cek_bulan_tahun = mysqli_num_rows($query_cek_bulan_tahun);

  $query_cek = $koneksi->query("SELECT * FROM tbl_spp WHERE nis = '$nis' AND status_spp = 'Proses'");
  $cek = mysqli_num_rows($query_cek);

  if($cek_bulan_tahun > 0){

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
  }else if($cek == 5){

   $query_u_status_spp = $koneksi->query("UPDATE tbl_spp SET status_spp = 'Selesai' WHERE nis = '$nis'");

   $query_u_status_siswa = $koneksi->query("UPDATE tbl_siswa SET status_spp = 'Selesai' WHERE nis = '$nis'");

   $query_update = $koneksi->query("INSERT INTO tbl_spp VALUES ('', '$kode_bayar', '$nis', '$nama', '$kelas', '$semester', 'Selesai', '$jumlahBayarImplode', '$tgl_bayar', '$bulan', '$tahun', '$status_bayar')");

   

    if ($query_update) {
        // pesan jika data tersimpan
        echo "<script>
        Swal.fire({
         title: 'Berhasil',
         text: 'Data SPP berhasil ditambah!',
         icon: 'success',
         confirmButtonColor: '#3085d6'
       }).then((result) => {
         if (result.isConfirmed) {
           window.location.href='../data-spp.php'
         }
       })
    </script>";
      } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data spp gagal ditambahkan'); window.location.href='../data-spp.php'</script>";
      }
  }else {
if (isset($_POST['submit'])) {

  $query = $koneksi->query("INSERT INTO tbl_spp VALUES ('', '$kode_bayar', '$nis', '$nama', '$kelas', '$semester', '$status_spp', '$jumlahBayarImplode', '$tgl_bayar', '$bulan', '$tahun', '$status_bayar')");

if ($query) {
    // pesan jika data tersimpan
    echo "<script>
    Swal.fire({
     title: 'Berhasil',
     text: 'Data SPP berhasil ditambah!',
     icon: 'success',
     confirmButtonColor: '#3085d6'
   }).then((result) => {
     if (result.isConfirmed) {
       window.location.href='../data-spp.php'
     }
   })
</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data siswa gagal ditambahkan'); window.location.href='../data-spp.php'</script>";
  }
}
}


?>

</body>
</html>