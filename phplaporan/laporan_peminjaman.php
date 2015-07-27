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
if($_GET[kembali]=="belum"){
$sql = mysql_query("select*from peminjaman where tglkembali=''");
$a = "yang belum dikembalikan";
}
else if($_GET[kembali]=="sudah"){
$sql = mysql_query("select*from peminjaman where tglkembali!='' or denda!=''");
$a = "yang sudah dikembalikan";
}
else{
$sql = mysql_query("select*from peminjaman");
}
$pdf->text(10,32,'Laporan Buku '.$a);
$pdf->text(10,22.5,'Perpustakaan Online SMK Negeri 10 Jakarta');
$pdf->setFont('Helvetica','',15,'C');
$pdf->text(10,39,'Bulan '.$_GET[bulan]);

$yi = 50;
$ya = 44;
$pdf->setFont('Arial','',9);
$pdf->setFillColor(183,199,93);
$pdf->setXY(10,$ya);
$pdf->CELL(8,6,'No',1,0,'C',1);
$pdf->CELL(20,6,'ID',1,0,'C',1);
$pdf->CELL(50,6,'Nama Peminjam',1,0,'C',1);
$pdf->CELL(25,6,'Tgl Pinjam',1,0,'C',1);
$pdf->CELL(25,6,'Tgl Kembali',1,0,'C',1);
$pdf->CELL(25,6,'Sudah Kembali',1,0,'C',1);
$ya = $yi + $row;

$i = 1;
$no = 1;
$max = 31;
$row = 6;

while($data = mysql_fetch_array($sql)){
$rak = mysql_query("select*from detail_akun where id_akun='$data[id_peminjam]'");
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
$pdf->cell(8,6,$no,1,0,'C',1);
$pdf->cell(20,6,$data[id],1,0,'C',1);
$pdf->cell(50,6,$kar[nama_depan]." ".$kar[nama_belakang	],1,0,'L',1);
$pdf->cell(25,6,$data[tglmulai],1,0,'C',1);
if(empty($data[tglkembali])){
$sudah = "Belum";
}
else{
$sudah = "Sudah";
}
$pdf->cell(25,6,$data[tglabis],1,0,'C',1);
$pdf->cell(25,6,$sudah,1,0,'C',1);
$ya = $ya+$row;
$no++;
$i++;

if($no < 3){
$pdf->text(10,280,'Perpustakaan Online SMK Negeri 10 Jakarta');

}
}

$pdf->Output();


?>