<?php
include 'config/config.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// $pasar = $_GET['pasar'];
// $tgl   = $_GET['tanggal'];

// $showDataPasar = $koneksi->query("SELECT * FROM tbl_retribusi WHERE pasar='$pasar' AND tanggal ='$tgl'");
// $no = 1;
// $start = 4;

$sheet->setCellValue('A1', 'Nama Pasar ');
$sheet->setCellValue('B1', ':');

$sheet->setCellValue('A2', 'Tanggal ');
$sheet->setCellValue('B2', ':');

$sheet->setCellValue('A4', 'NO');
$sheet->setCellValue('B4', 'JENIS TIKET');
$sheet->setCellValue('C4', 'BIAYA');
$sheet->setCellValue('D4', 'NOMOR KIOS');
$sheet->setCellValue('E4', 'KODE KARCIS');
$sheet->setCellValue('F4', 'NIK');
$sheet->setCellValue('G4', 'NAMA PEGAWAI');


// foreach($showDataPasar as $pasar_tanggal){
//     $sheet->setCellValue('A'. $start, $no++);
// }

$writer = new Xlsx($spreadsheet);
$writer->save('laporan.xlsx');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attachment;filename="laporan.xlsx"');
readfile('laporan.xlsx');
unlink('laporan.xlsx');
exit;