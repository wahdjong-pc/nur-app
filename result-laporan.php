<?php
$koneksi = new mysqli("localhost","root","","nur-app");
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$pasar = $_GET['pasar'];
$tgl = $_GET['tanggal'];
$showDataPasar = $koneksi->query("SELECT * FROM tbl_retribusi WHERE pasar='$pasar' AND tanggal='$tgl'");
$no = 1;
$start = 7;

// Style Tabel Border
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'FFFF0000'],
        ],
    ],
];

// Style Text Bold
$styleBold = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];

$sheet->setCellValue('A3', 'Nama Pasar ')->mergeCells("A3:B3");
$sheet->setCellValue('A4', 'Tanggal ')->mergeCells("A4:B4");


$sheet->setCellValue('A6', 'NO');

$sheet->setCellValue('B6', 'JENIS TIKET');
$sheet->setCellValue('C6', 'BIAYA');
$sheet->setCellValue('D6', 'NOMOR KIOS');
$sheet->setCellValue('E6', 'KODE KARCIS');
$sheet->setCellValue('F6', 'NIK');
$sheet->setCellValue('G6', 'NAMA PEGAWAI');

foreach ($showDataPasar as $data){
 $newDate = date("l, d F Y", strtotime($data['tanggal']));


 $sheet->setCellValue('C3', ': '.$data['pasar'].'');
 $sheet->setCellValue('C4', ': '.$newDate.'');

    $sheet->setCellValue('A' . $start, $no++)->getColumnDimension('A')->setAutoSize(true);
    $sheet->setCellValue('B' . $start, $data['jenis_tiket'])->getColumnDimension('B')->setAutoSize(true);
    $sheet->setCellValue('C' . $start, $data['biaya'])->getColumnDimension('C')->setAutoSize(true);
    $sheet->setCellValue('D' . $start, $data['no_kios'])->getColumnDimension('D')->setAutoSize(true);
    $sheet->setCellValue('E' . $start, $data['kode_karcis'])->getColumnDimension('E')->setAutoSize(true);
    $sheet->setCellValue('F' . $start, $data['nik'])->getColumnDimension('F')->setAutoSize(true);
    $sheet->setCellValue('G' . $start, $data['nama_pegawai'])->getColumnDimension('G')->setAutoSize(true);

    $sheet->getStyle('A6:G'.$start)->applyFromArray($styleArray);

    $start++;
}

 $sheet->getStyle('A6:G6')->applyFromArray($styleBold);




$writer = new Xlsx($spreadsheet);
$writer->save('laporan.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="laporan.xlsx"');
readfile('laporan.xlsx');
unlink('laporan.xlsx');
exit;

?>