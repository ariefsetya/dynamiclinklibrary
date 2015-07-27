<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_POST['simpan'])){
$peminjam = mysql_query("select*from akun where username='$_POST[username]'");
$detail = mysql_fetch_array($peminjam);
$idpem = $detail['id'];
$buku = mysql_query("select*from buku where kode_buku='$_POST[kode_buku]'");
$det = mysql_fetch_array($buku);
$idbuk = $det['id'];
$jum = $det['Jumlah'];
$peminjaman = mysql_query("select*from peminjaman where id_buku='$idbuk' and id_peminjam='$idpem' order by id desc");
$bu = mysql_fetch_array($peminjaman);
$tgl1 = $_POST['tglmulai']; 
$tgl2 = $_POST['tglabis']; 
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
if(empty($idpem)){
?>
<script>alert('Nama Pengguna tidak ada');</script>
<?php
}else if(empty($idbuk)){
?>
<script>alert('Buku tidak ada');</script>
<?php
}else if(!empty($bu['id']) and empty($bu['tglkembali'])){
?>
<script>alert('Pengguna sudah meminjam buku yang sama');</script>
<?php
}else if($jum < 3){
?>
<script>alert('Buku tidak boleh dipinjam, hanya boleh di baca di perpustakaan');</script>
<?php
}else if($selisih < 0){
?>
<script>alert('Tanggal harus benar');</script>
<?php
}else{
$jam = date("H");
mysql_query("insert into peminjaman values('','$idpem','$idbuk','$_POST[tglmulai]','$jam','13','$_POST[tglabis]','','')");
mysql_query("update buku set Jumlah=Jumlah-1 where id='$idbuk'");
?>
<script>alert('Buku berhasil dipinjam');</script>
<?php
}
}
?>
<h2>Peminjaman Buku</h2>
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
		<!-- buat tambahan detail peminjam mulai -->	
		<!-- buat tambahan detail peminjam selesai -->
		<tr>
			<td>
				Kode Buku
			</td>
			<td class="input-control">
				<input type="text" name="kode_buku" required="true"></input>
			</td>
		</tr>
		<!-- buat tambahan detail buku mulai -->
		<!-- buat tambahan detail buku selesai -->
		<tr>
			<td>
				Tanggal Peminjaman
			</td>
			<td class="input-control">
				<input type="date" style="width:100%;height:33px;" name="tglmulai" required="true"></input>
			</td>
		</tr>
		<tr>
			<td>
				Tanggal Pengembalian
			</td>
			<td class="input-control">
				<input type="date" style="width:100%;height:33px;" name="tglabis" required="true"></input>
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
</div>