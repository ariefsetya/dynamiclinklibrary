<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
$buku = mysql_query("select*from buku order by id");
?>
<h2>Managemen Buku</h2>
<a href="index.php?rpl=m_buku&hal=entri">Entri Data Buku</a>
<table>
	<thead>
		<td>
			No
		</td>
		<td>
			Kode Buku
		</td>
		<td>
			Judul
		</td>
		<td>
			Pengarang
		</td>
		<td>
			Penerbit
		</td>
		<td>
			Rak
		</td>
		<td colspan=3><center>
			Pilihan</center>
		</td>
	</thead>
	<?php
	$a = 1;
	while($row = mysql_fetch_array($buku)){
	
	?>
	<tbody>
		<td>
			<?php echo $a;?>
		</td>
		<td>
			<?php echo $row['kode_buku'];?>
		</td>
		<td>
			<?php echo $row['Judul'];?>
		</td>
		<td>
			<?php echo $row['pengarang'];?>
		</td>
		<td>
			<?php echo $row['penerbit'];?>
		</td>
		<td>
			<?php 
			$rak = mysql_query("select*from rak where id='$row[rak]'");
			$ra = mysql_fetch_array($rak);
			echo $ra['nama'];?>
		</td>
		<td>
			<a href="index.php?rpl=m_buku&hal=detail&det=<?php echo $row['id'];?>">Detail</a>
		</td>
		<td>
			<a href="index.php?rpl=m_buku&hal=ubah&det=<?php echo $row['id'];?>">Ubah</a>
		</td>
		<td>
			<a href="index.php?rpl=m_buku&hal=hapus&det=<?php echo $row['id'];?>">Hapus</a>
		</td>
	</tbody>
	<?php
	$a++;
	}
	?>
</table>
