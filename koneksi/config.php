<?php
$koneksi = new mysqli("localhost","root","","app_sd");

// Check connection
if ($koneksi -> connect_errno) {
  echo "Failed to connect to MySQL: " . $koneksi -> connect_error;
  exit();
}
?>