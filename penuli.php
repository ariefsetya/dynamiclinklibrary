<?php
include "phpcon/link.php";
$qw = mysql_query("select*from penulis order by level desc limit 0,20");
?>
<h2>Daftar Penulis</h2>
<table>
	<thead>
		<td>
			Peringkat
		</td>
		<td>
			Nama
		</td>
		<td>
			Level
		</td>
		<td>
			Jumlah Artikel
		</td>
		<td>
			Warga SMK Negeri 10?
		</td>
	</thead>
	<?php
	$pr=1;
	while($w = mysql_fetch_array($qw)){
	$sa = mysql_query("select*from detail_akun where id_akun=$w[id_akun]");
	$s = mysql_fetch_array($sa);
	$se = mysql_query("select*from siswa where nis=$s[nis]");
	$e = mysql_fetch_array($se);
	$su = mysql_query("select count(*) from artikel where penulis=$w[id_akun]");
	$u = mysql_fetch_array($su);
	?>
	<tbody>
		<td>
			<?php echo $pr;?>
		</td>
		<td>
			<?php echo $s['nama_depan']." ".$s['nama_belakang'];?>
		</td>
		<td>
			<?php echo $w['level'];?>
		</td>
		<td>
			<?php echo $u['count(*)'];?>
		</td>
		<td>
			<?php if(empty($e['nis'])){
			echo "Bukan";}
			else{
			echo "Ya";
			}?>
		</td>
	</tbody>
	
<?php
$pr++;
}
?>
</table>

