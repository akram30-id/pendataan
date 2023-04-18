<?php
require_once("../../assets/lib/fpdf/fpdf.php");
require_once("../../config/koneksi.php");

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('../../assets/img/logo-jakbar.jpg', 20, 10);

        // Arial bold 15
        $this->SetFont('Times', 'B', 15);
        // Move to the right
        // $this->Cell(60);
        // Title
        $this->Cell(308, 8, 'PENGURUS RT. 003 RW 016', 0, 1, 'C');
        $this->Cell(308, 8, 'KEL. TOMANG, KEC. GROGOL PETAMBURAN', 0, 1, 'C');
        $this->Cell(308, 8, 'JAKARTA BARAT', 0, 1, 'C');
        // Line break
        $this->Ln(5);

        $this->SetFont('Times', 'BU', 12);
        for ($i = 0; $i < 10; $i++) {
            $this->Cell(308, 0, '', 1, 1, 'C');
        }

        $this->Ln(1);

        $this->Cell(308, 8, 'LAPORAN DATA KEMATIAN', 0, 1, 'C');
        $this->Ln(2);

        $this->SetFont('Times', 'B', 9.5);

        // header tabel
        $this->cell(10, 7, 'NO.', 1, 0, 'C');
        $this->cell(70, 7, 'NIK', 1, 0, 'C');
        $this->cell(85, 7, 'NAMA WARGA', 1, 0, 'C');
        $this->cell(45, 7, 'TGL. MENINGGAL', 1, 0, 'C');
        $this->cell(98, 7, 'LOKASI PEMAKAMAN', 1, 0, 'C');
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// ambil dari database
$query = "SELECT * FROM mortalitas INNER JOIN warga ON mortalitas.id_warga = warga.id_warga";
$hasil = mysqli_query($db, $query);
$data_mortalitas = array();
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_mortalitas[] = $row;
}

$pdf = new PDF('L', 'mm', [210, 330]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times', '', 9);

// set penomoran
$nomor = 1;

foreach ($data_mortalitas as $mortalitas) {

    $pdf->cell(10, 7, $nomor++ . '.', 1, 0, 'C');
    $pdf->cell(70, 7, strtoupper($mortalitas['nik_warga']), 1, 0, 'C');
    $pdf->cell(85, 7, strtoupper($mortalitas['nama_warga']), 1, 0, 'C');
    $pdf->cell(45, 7, strtoupper($mortalitas['tgl_kematian']), 1, 0, 'C');
    $pdf->cell(98, 7, strtoupper($mortalitas['lokasi_pemakaman']), 1, 0, 'C');
}

// $pdf->Ln(2);

$pdf->Output();
