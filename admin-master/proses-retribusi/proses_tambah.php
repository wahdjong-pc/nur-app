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

if (isset($_POST['submit-retribusi'])) {
  $pasar        = $_POST['pasar'];
  $tgl          = $_POST['tanggal'];
  $jenis_tiket  = $_POST['jenis_tiket'];
  $biaya        = $_POST['biaya'];
  $no_kios      = $_POST['no_kios'];
  $kode_karcis  = $_POST['kode_karcis'];
  $nik          = "123";
  $nama_peg     = "Admin";
  


  $query = $koneksi->query("INSERT INTO tbl_retribusi(pasar,tanggal,jenis_tiket,biaya,no_kios,kode_karcis,nik,nama_pegawai) VALUES('$pasar', '$tgl', '$jenis_tiket', '$biaya', '$no_kios', '$kode_karcis', '$nik', '$nama_peg')");


if ($query) {
    // pesan jika data tersimpan
    echo "<script>
    Swal.fire({
     title: 'Berhasil',
     text: 'Data retribusi berhasil ditambah!',
     icon: 'success',
     confirmButtonColor: '#3085d6'
   }).then((result) => {
     if (result.isConfirmed) {
       window.location.href='../data-retribusi.php'
     }
   })
</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data retribusi gagal ditambahkan'); window.location.href='../data-retribusi.php'</script>";
  }
}

?>

</body>
</html>