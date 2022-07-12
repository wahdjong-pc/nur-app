<?php 
include '../../koneksi/config.php';

$nis = $_GET['nis'];

$query = $koneksi->query("SELECT * FROM tbl_siswa WHERE nis = '$nis' AND status_spp = 'Proses'");

$siswa = mysqli_fetch_array($query);

$data = array(
 'nama' => @$siswa['nama'],
 'kelas' => @$siswa['kelas'],
 'semester' => @$siswa['semester'],
 'status_spp' => @$siswa['status_spp'],
);

echo json_encode($data);




?>