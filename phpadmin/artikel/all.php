<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
$artikel = mysql_query("select*from artikel order by id");

?>
<h2>Managemen Artikel</h2>
<a href="index.php?rpl=m_artikel&hal=buat">Tulis Artikel/Pengumuman</a>
	<table>
		<thead>
			<td>
				No
			</td>
			<td>
				Judul
			</td>
			<td>
				Penulis
			</td>
			<td>
				Milik Anak SMKN 10?
			</td>
			<td colspan=3><center>
				Pilihan</center>
			</td>
		</thead>
		<?php
		$a = 1;
		while($row = mysql_fetch_array($artikel)){
		$penulis = mysql_query("select*from detail_akun where id_akun='$row[penulis]'");
		$tulis = mysql_fetch_array($penulis);
		$siswa = mysql_query("select*from siswa where nis='$tulis[nis]'");
		$nis = mysql_fetch_array($siswa);
		?>
		<tbody>
			<td>
				<?php echo $a;?>
			</td>
			<td>
				<?php echo $row['nama'];?>
			</td>
			<td>
				<?php echo $tulis['nama_depan']." ".$tulis['nama_belakang'];?>
			</td>
			<td>
				<?php 
				if(empty($nis['nis'])){
				echo "Bukan";
				}
				else{
				echo "Ya";
				}?>
			</td>
			<td>
				<a href="index.php?rpl=m_artikel&hal=lihat&det=<?php echo $row['id'];?>">Detail</a>
			</td>
			<td>
				<a href="index.php?rpl=m_artikel&hal=ubah&det=<?php echo $row['id'];?>">Ubah</a>
			</td>
			<td>
				<a href="index.php?rpl=m_artikel&hal=hapus&det=<?php echo $row['id'];?>">Hapus</a>
			</td>
		</tbody>
		<?php
		$a++;
		}
		?>
	</table>