<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
$rak = mysql_query("select*from rak order by id");

?>
<h2>Managemen Rak</h2>
<a href="index.php?rpl=m_rak&hal=entri">Entri Data Rak</a>
<table>
	<thead>
		<td>
			No
		</td>
		<td>
			Nama Rak
		</td>
		<td>
			Jumlah Buku
		</td>
		<td>
			Keterangan
		</td>
		<td colspan=3><center>
			Pilihan</center>
		</td>
	</thead>


<?php
$a = 1;
while($row = mysql_fetch_array($rak)){
$jumlahbuku = 0;
$buku = mysql_query("select*from buku where rak='$row[id]'");
while($bu = mysql_fetch_array($buku)){
$jumlahbuku += $bu['Jumlah'];
}
?>
	<tbody>
		<td>
			<?php echo $a;?>
		</td>
		<td>
			<?php echo $row['nama'];?>
		</td>
		<td>
			<?php echo $jumlahbuku;?>
		</td>
		<td>
			<?php echo $row['ket'];?>
		</td>
		<td>
			<a href="index.php?rpl=m_rak&hal=detail&det=<?php echo $row['id'];?>">Detail</a>
		</td>
		<td>
			<a href="index.php?rpl=m_rak&hal=ubah&det=<?php echo $row['id'];?>">Ubah</a>
		</td>
		<td>
			<a href="index.php?rpl=m_rak&hal=hapus&det=<?php echo $row['id'];?>">Hapus</a>
		</td>
	</tbody>

<?php
$a++;
}

?>
</table>
