<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
$a = mysql_query("select*from akun  where user_akses=1 order by id");
?>
<h2>Managemen Anggota</h2>
<label><a href="index.php?rpl=m_anggota&hal=daftar">Daftarkan Anggota baru</a></label>
<table>
	<thead>
		<td>
			Nama Pengguna
		</td>
		<td>
			Nama Depan
		</td>
		<td>
			Nama Belakang
		</td>
		<td>
			Akses
		</td>
		<td>
			Penulis?
		</td>
		<td>
			Warga SMK Negeri 10?
		</td>
		<td colspan=3>
			<center>Pilihan</center>
		</td>
	</thead>
		
<?php
while($e = mysql_fetch_array($a)){
$w = mysql_query("select*from detail_akun where id_akun='$e[id]'");
$q = mysql_fetch_array($w);
$qw = mysql_query("select*from penulis where id_akun='$e[id]'");
$we = mysql_fetch_array($qw);
$ww = mysql_query("select*from siswa where nis='$q[nis]'");
$qq = mysql_fetch_array($ww);
?>
<tbody>
	<td>
		<?php echo $e['username'];?>
	</td>
	<td>
		<?php echo $q['nama_depan'];?>
	</td>
	<td>
		<?php echo $q['nama_belakang'];?>
	</td>
	<td>
		<?php echo $e['user_akses'];?>
	</td>
	<td>
		<?php
		if(empty($we)){
		echo "Bukan";
		}
		else{
		echo "Ya";
		}
		?>
	</td>
	<td>
		<?php
		if(empty($qq)){
		echo "Bukan";
		}
		else{
		echo "Ya";
		}
		?>
	</td>
	<td>
		<a href="index.php?rpl=m_anggota&hal=detail&det=<?php echo $e[id];?>">Detail</a>
	</td>
	<td>
		<a href="index.php?rpl=m_anggota&hal=ubah&det=<?php echo $e[id];?>">Ubah</a>
	</td>
	<td>
		<a href="index.php?rpl=m_anggota&hal=hapus&det=<?php echo $e[id];?>">Hapus</a>
	</td>
</tbody>
<?php
}
?>