<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
$bukuline = mysql_query("select*from buatbuku where aktif=1 order by id");
?>
<h2>Buku Online</h2>
<table>
	<thead>
		<td>
			ID Buku
		</td>
		<td>
			Judul Buku
		</td>
		<td>
			Penulis
		</td>
		<td>
			Jumlah Halaman
		</td>
		<td>
			Terakhir dimodifikasi
		</td>
	</thead>
		
<?php
while($rowbukuline = mysql_fetch_array($bukuline)){

?>
<tbody>
	<td>
		<?php echo $rowbukuline['id'];?>
	</td>
	<td>
		<a href="index.php?rpl=bukupenulis&hal=baca&det=<?php echo $rowbukuline[id];?>"><?php echo $rowbukuline['judul'];?></a>
	</td>
	<td>
		<?php 
		$apolo = mysql_query("select*from detail_akun where id_akun='$rowbukuline[id_akun]'");
		$rooo = mysql_fetch_array($apolo);
		echo $rooo['nama_depan']." ".$rooo['nama_belakang'];?>
	</td>
	<td>
		<?php echo $rowbukuline['jumlah_hal'];?>
	</td>
	<td>
		<?php echo $rowbukuline['jam']." ".$rowbukuline['tanggal'];?>
	</td>
</tbody>
<?php
}
?>