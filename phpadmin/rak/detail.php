<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
$tab = mysql_query("select*from rak where id='$_GET[det]'");
$bu = mysql_fetch_array($tab);
?>
<h2><a href="index.php?rpl=m_rak"><i style="font-size:18pt;" class="icon-arrow-left-3"></i></a> Detail Rak <?php echo $bu['nama']; ?></h2>
<table>
	<tr>
		<td>
			Nama Rak
		</td>
		<td>
			<?php echo $bu['nama']; ?>
		</td>
	</tr>
	<tr>
		<td colspan=2>
			Keterangan
		</td>
	</tr>
	<tr>
		<td colspan=2>
			<?php echo $bu['ket']; ?>
		</td>
	</tr>
</table>
<h2>Semua buku di Rak <?php echo $bu['nama']; ?></h2>
<?php 
$semua = mysql_query("select*from buku where rak='$_GET[det]'");
?>
<table>
	<thead>
		<td>
			Kode Buku
		</td>
		<td>
			Nama Buku
		</td>
		<td>
			Pengarang 
		</td>
		<td>
			Penerbit
		</td>
		<td>
			Jumlah
		</td>
	</thead>
	<?php
	while($buku = mysql_fetch_array($semua)){
	?>
	<tbody>
		<td>
			<?php echo $buku['kode_buku'] ?>
		</td>
		<td>
			<?php echo $buku['Judul'] ?>
		</td>
		<td>
			<?php echo $buku['pengarang'] ?>
		</td>
		<td>
			<?php echo $buku['penerbit'] ?>
		</td>
		<td>
			<?php echo $buku['Jumlah'] ?>
		</td>
	</tbody>
	<?php
	}
	?>
</table>