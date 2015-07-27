<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
$bulan = date("m");
$angka = array("01","02","03","04","05","06","07","08","09","10","11","12");
$huruf   = array("Januari", "Februari", "Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$jadi = str_replace($angka,$huruf,$bulan);

?>
<h2>Laporan Peminjaman</h2>

<h1 style="color:black;">Lihat laporan bulan ini</h1>
<div style="padding-left:400px;float:left;"><a href="phplaporan/laporan_peminjaman.php?bulan=<?php echo $jadi;?>"><h2>Lanjutkan</h2></a></div>
<br>
<br>
<br>
<h1 style="color:black;">Lihat yang sudah dikembalikan</h1>
<div style="padding-left:600px;float:left;"><a href="phplaporan/laporan_peminjaman.php?kembali=sudah&bulan=<?php echo $jadi;?>"><h2>Lanjutkan</h2></a></div>
<br>
<br>
<br>
<h1 style="color:black;">Lihat yang belum dikembalikan</h1>
<div style="padding-left:600px;float:left;"><a href="phplaporan/laporan_peminjaman.php?kembali=belum&bulan=<?php echo $jadi;?>"><h2>Lanjutkan</h2></a></div>