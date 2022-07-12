<?php 
include '../../koneksi/config.php';

$nis = $_GET['nis'];

$query = $koneksi->query("SELECT * FROM tbl_siswa WHERE nis = '$nis'");

$siswa = mysqli_fetch_array($query);

$data = array(
 'nama' => @$siswa['nama'],
 'jk' => @$siswa['jenis_kelamin'],
 'tgl_lahir' => @$siswa['tgl_lahir'],
 'alamat' => @$siswa['alamat'],
 'semester' => @$siswa['alamat'],
);

echo json_encode($data);




?>