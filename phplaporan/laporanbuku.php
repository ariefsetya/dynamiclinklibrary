<?php
require('fpdf.php');
include "link.php";
$pdf = new FPDF('P','mm','A4');
$pdf->addPage();
$pdf->setFont('Times','B',30,'C');

$pdf->text(10,15,'Dynamic Link Library');

$pdf->setFont('Helvetica','I',20,'C');
$pdf->text(10,22.5,'Perpustakaan Online SMK Negeri 10 Jakarta');

$pdf->setFont('Helvetica','',20,'C');
$pdf->text(10,32,'Laporan Buku');
$pdf->text(10,22.5,'Perpustakaan Online SMK Negeri 10 Jakarta');
$pdf->setFont('Helvetica','',15,'C');
$pdf->text(10,39,'Bulan '.$_GET[bulan]);

$yi = 50;
$ya = 44;
$pdf->setFont('Arial','',9);
$pdf->setFillColor(183,199,93);
$pdf->setXY(10,$ya);
$pdf->CELL(10,6,'No',1,0,'C',1);
$pdf->CELL(20,6,'ID',1,0,'C',1);
$pdf->CELL(80,6,'Judul',1,0,'C',1);
$pdf->CELL(60,6,'Rak',1,0,'C',1);
$pdf->CELL(20,6,'Jumlah',1,0,'C',1);
$ya = $yi + $row;

$sql = mysql_query("select*from buku");
$i = 1;
$no = 1;
$max = 31;
$row = 6;

while($data = mysql_fetch_array($sql)){
$rak = mysql_query("select*from rak where id='$data[rak]'");
$kar = mysql_fetch_array($rak);

if($ya > 250){
$pdf->addPage();
$ya = 6;

$pdf->text(10,280,'Perpustakaan Online SMK Negeri 10 Jakarta');

}
$pdf->setXY(10,$ya);
$pdf->setFont('arial','',9);
if($no%2==0){
$pdf->setFillColor(183,255,255);
}
else if($no%2==1){
$pdf->setFillColor(183,255,127);
}
$pdf->cell(10,6,$no,1,0,'C',1);
$pdf->cell(20,6,$data[id],1,0,'C',1);
$pdf->cell(80,6,$data[Judul],1,0,'L',1);
$pdf->cell(60,6,$kar[nama],1,0,'L',1);
$pdf->cell(20,6,$data[Jumlah],1,0,'C',1);
$ya = $ya+$row;
$no++;
$i++;

if($no < 3){
$pdf->text(10,280,'Perpustakaan Online SMK Negeri 10 Jakarta');

}
}

$pdf->Output();


?>