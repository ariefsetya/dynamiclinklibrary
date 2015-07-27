<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
$tanggal = date("d");
$tahun = date("Y");
$bulan = date("m");
if(isset($_POST['simpan'])){
$mysql = mysql_query("select*from buku where kode_buku='$_POST[kode_buku]'");
$buka = mysql_fetch_array($mysql);
$res = mysql_query("select*from akun where username='$_POST[username]'");
$row = mysql_fetch_array($res);
$pinjam = mysql_query("select*from peminjaman where id_peminjam='$row[id]' and id_buku='$buka[id]' and tglkembali=''");
$reck = mysql_fetch_array($pinjam);
if(empty($reck['id'])){
?>
<script>alert('Tidak ada peminjaman dengan kode buku atau nama pengguna tersebut');</script>
<?php
}
else if(empty($reck['tglkembali']))
{
$den = mysql_query("select*from denda");
$da = mysql_fetch_array($den);
if($da['hitung']=="Perjam"){
$reckap = $tahun."-".$bulan."-".$tanggal;
$tgl1 = $reck['tglabis']; 
$tgl2 = $reckap; 
// memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
// dari tanggal pertama
$pecah1 = explode("-", $tgl1);
$date1 = $pecah1[2];
$month1 = $pecah1[1];
$year1 = $pecah1[0];
// memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
// dari tanggal kedua
$pecah2 = explode("-", $tgl2);
$date2 = $pecah2[2];
$month2 = $pecah2[1];
$year2 =  $pecah2[0];
$er = mysql_query("SELECT TIMEDIFF('$year2-$month2-$date2 $reck[jammulai]', '$year1-$month1-$date1 13')");
$re = mysql_fetch_array($er);
$waktu = $re["TIMEDIFF('$year2-$month2-$date2 $reck[jammulai]', '$year1-$month1-$date1 13')"];
$waktu2 = explode(":",$waktu);
$selisih = $waktu2[0];
}elseif($da['hitung']=="Perhari"){
$reckap = $tahun."-".$bulan."-".$tanggal;
$tgl1 = $reck['tglabis']; 
$tgl2 = $reckap; 
// memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
// dari tanggal pertama
$pecah1 = explode("-", $tgl1);
$date1 = $pecah1[2];
$month1 = $pecah1[1];
$year1 = $pecah1[0];
// memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
// dari tanggal kedua
$pecah2 = explode("-", $tgl2);
$date2 = $pecah2[2];
$month2 = $pecah2[1];
$year2 =  $pecah2[0];
// menghitung JDN dari masing-masing tanggal
$jd1 = GregorianToJD($month1, $date1, $year1);
$jd2 = GregorianToJD($month2, $date2, $year2);
// hitung selisih hari kedua tanggal
$selisih = $jd2 - $jd1;
}elseif($da['hitung']=="Perminggu"){
$reckap = $tahun."-".$bulan."-".$tanggal;
$date1 = $reck['tglabis'];
$date2 = $reckap;
// memecah bagian-bagian dari tanggal $date1
$pecahTgl1 = explode("-", $date1);
// membaca bagian-bagian dari $date1
$tgl1 = $pecahTgl1[2];
$bln1 = $pecahTgl1[1];
$thn1 = $pecahTgl1[0];
// counter looping
$i = 0;
// counter untuk jumlah hari minggu
$sum = 0;
do
{
   // mengenerate tanggal berikutnya
   $tangga = date("Y-m-d", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1));
   // cek jika harinya minggu, maka counter $sum bertambah satu, lalu tampilkan tanggalnya
   if (date("w", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1)) == 0)
   {
     $sum++;
   }
   // increment untuk counter looping
   $i++;
}
while ($tangga != $date2);
// looping di atas akan terus dilakukan selama tanggal yang digenerate tidak sama dengan $date2.
// tampilkan jumlah hari Minggu
$selisih = $sum-1;
}elseif($da['hitung']=="Perbulan"){
}
$denda = $da['jumlah'];
if($selisih > 0){
$denda = $denda*$selisih;
}
$denda;
mysql_query("update peminjaman set tglkembali='$tahun-$bulan-$tanggal', denda='$denda' where id='$reck[id]'");
mysql_query("update buku set Jumlah=Jumlah+1 where id='$reck[id_buku]'");
}
else if(!empty($reck['tglkembali'])){
?>
<script>alert('Buku sudah tidak dipinjam');</script>
<?php
}
}
?>
<h2>Pengembalian Buku</h2>
<form method="POST" action="">
<table>
	<tr>
		<td>
			Nama Pengguna
		</td>
		<td class="input-control">
			<input type="text" name="username" required="true"></input>
		</td>
	</tr>
	<tr>
		<td>
			Kode Buku
		</td>
		<td class="input-control">
			<input type="text" name="kode_buku" required="true"></input>
		</td>
	</tr>
	<tr>
		<td>
			Tanggal Sekarang
		</td>
		<td class="input-control">
			<input type="text" name="username" disabled="true" value="<?php echo $tanggal."-".$bulan."-".$tahun;?>" required="true"></input>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
			<div class="place-right">
			<button type="reset" name="reset">Reset</input>
			<button type="submit" name="simpan">Simpan</input>
			</div>
		</td>
	</tr>
</table>
</form>
<?php
if($denda!=0){
?>
<div style="padding-top:50px;font-type:Bold;font-size:100pt;position:relative;">
Perhatian!
</div>
<div style="padding-top:80px;font-type:Bold;font-size:50pt;position:relative;">
Peminjam kena denda sebesar <br><br><br><br>Rp. <?php echo $denda; ?>
</div>
<?php
}
?>