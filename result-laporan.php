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

// Style Text Header
$styleHeader = [
    'font' => [
        'bold' => true,
        'size'  => 18,
        'name'  => 'Verdana'
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];

// Style Tabel Border
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '000000'],
        ],
    ],
];

// Style Text Bold
$styleBold = [
    'font' => [
        'bold' => true,
        'size' => 12
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFF9CA',
        ],
        'endColor' => [
            'argb' => 'FFF9CA',
        ],
    ],
];

// Style Text Content
$styleContent = [
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];

// Style Pendapatan Header
$stylePendapatan = [
    'font' => [
        'bold' => true,
        'size' => 12
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => '53BF9D',
        ],
        'endColor' => [
            'argb' => '53BF9D',
        ],
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '000000'],
        ],
    ],
];

// Style Pendapatan Header
$stylePendapatanContent = [
    'font' => [
        'size' => 12
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '000000'],
        ],
    ],
];

// Style Total Pendapatan
$styleTotalPendapatan = [
    'font' => [
        'bold' => true,
        'size' => 13
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFC54D',
        ],
        'endColor' => [
            'argb' => 'FFC54D',
        ],
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '000000'],
        ],
    ],
];

$sheet->setCellValue('A1', 'LAPORAN PENDAPATAN RETRIBUSI')->mergeCells("A1:G1")->getStyle('A1:G1')->applyFromArray($styleHeader);

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
    $sheet->setCellValue('F' . $start,  "'".$data['nik']."'")->getColumnDimension('F')->setAutoSize(true);
    $sheet->setCellValue('G' . $start, $data['nama_pegawai'])->getColumnDimension('G')->setAutoSize(true);

    $sheet->getStyle('A6:G'.$start)->applyFromArray($styleArray);
    $sheet->getStyle('A7:G'.$start)->applyFromArray($styleContent);

    $start++;
}

 $sheet->getStyle('A6:G6')->applyFromArray($styleBold);
 $sheet->getRowDimension('6')->setRowHeight(30);

 $sheet->setCellValue('I6', 'Jenis Tiket')->getColumnDimension('I')->setAutoSize(true);
 $sheet->setCellValue('J6', 'Jumlah Pendapatan')->getColumnDimension('J')->setAutoSize(true);
 $sheet->getStyle('I6:J6')->applyFromArray($stylePendapatan);

 $sheet->setCellValue('I7', 'KIOS');
 $sheet->setCellValue('I8', 'LAPAK');
 $sheet->setCellValue('I9', 'MUSIMAN');
 $sheet->setCellValue('I10', 'Total Pendapatan');
 $sheet->getStyle('I7:J10')->applyFromArray($stylePendapatanContent);
 $sheet->getStyle('I10:J10')->applyFromArray($styleTotalPendapatan);




$writer = new Xlsx($spreadsheet);
$writer->save('laporan.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="laporan.xlsx"');
readfile('laporan.xlsx');
unlink('laporan.xlsx');
exit;

?>