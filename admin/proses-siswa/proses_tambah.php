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

  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $jk = $_POST['gender'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $alamat = $_POST['alamat'];
  $kelas = $_POST['kelas'];
  $semester = $_POST['semester'];

  $status_spp = "Proses";
  $status_angsuran = "Proses";

$query_cek = $koneksi->query("SELECT * FROM tbl_siswa WHERE nis = '$nis'");

  $cek = mysqli_num_rows($query_cek);
  if($cek >= 1){
    // pesan jika data tersimpan
    echo "<script>
    Swal.fire({
     title: 'error',
     text: 'Data nis tidak boleh sama!',
     icon: 'error',
     confirmButtonColor: '#3085d6'
   }).then((result) => {
     if (result.isConfirmed) {
       window.location.href='../data-siswa.php'
     }
   })
</script>";
  }else {

if (isset($_POST['submit'])) {
// id_produk bernilai '' karena kita set auto increment
  $query = $koneksi->query("INSERT INTO tbl_siswa VALUES ('', '$nis', '$nama', '$jk', '$tgl_lahir', '$alamat', '$kelas', '$semester', '$status_spp', '$status_angsuran')");

if ($query) {
    // pesan jika data tersimpan
    echo "<script>
    Swal.fire({
     title: 'Berhasil',
     text: 'Data siswa berhasil ditambah!',
     icon: 'success',
     confirmButtonColor: '#3085d6'
   }).then((result) => {
     if (result.isConfirmed) {
       window.location.href='../data-siswa.php'
     }
   })
</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data siswa gagal ditambahkan'); window.location.href='../data-siswa.php'</script>";
  }
}

}

?>

</body>
</html>