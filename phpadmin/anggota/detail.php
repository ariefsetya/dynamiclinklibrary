<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
$e = $_GET['det'];
$a = mysql_query("select*from akun where id='$e'");
$akun = mysql_fetch_array($a);
$b = mysql_query("select*from detail_akun where id_akun='$e'");
$detail = mysql_fetch_array($b);
$c = mysql_query("select*from detail_tampilan where id_aku='$e'");
$tampilan = mysql_fetch_array($c);
?>
<h2><a href="index.php?rpl=m_anggota"><i style="font-size:18pt;" class="icon-arrow-left-3"></i></a> Detail <?php echo $detail['nama_depan']." ".$detail['nama_belakang'];?>	</h2>
<table>
	<tr>
		<td colspan=2>
			Foto Profil
		</td>
	</tr>
	<tr>
		<td colspan=2>
			<img src="<?php echo $detail['fp'];?>" style="width:150px;"></img>
		</td>
	</tr>
	<tr>
		<td colspan=2>
			
		</td>
	</tr>
	<tr>
		<td colspan=2>
			Informasi Akun
		</td>
	</tr>
	<tr>
		<td>
			Nama Pengguna
		</td>
		<td>
			<?php echo $akun['username'];?>
		</td>
	</tr>
	<tr>
		<td>
			Akses
		</td>
		<td>
			<?php echo $akun['user_akses'];?>
		</td>
	</tr>
	<tr>
		<td colspan=2>

		</td>
	</tr>
	<tr>
		<td colspan=2>
			Informasi Pribadi
		</td>
	</tr>
	<tr>
		<td>
			Nama Depan
		</td>
		<td>
			<?php echo $detail['nama_depan'];?>
		</td>
	</tr>
	<tr>
		<td>
			Nama Belakang
		</td>
		<td>
			<?php echo $detail['nama_belakang'];?>
		</td>
	</tr>
	<tr>
		<td>
			NIS
		</td>
		<td>
			<?php echo $detail['nis'];?>
		</td>
	</tr>
	<tr>
		<td>
			E-mail
		</td>
		<td>
			<?php echo $detail['email'];?>
		</td>
	</tr>
	<tr>
		<td>
			Tempat Lahir
		</td>
		<td>
			<?php echo $detail['tl'];?>
		</td>
	</tr>
	<tr>
		<td>
			Tanggal Lahir
		</td>
		<td>
			<?php echo $detail['tgl'];?>
		</td>
	</tr>
	<tr>
		<td>
			Jenis Kelamin
		</td>
		<td>
			<?php echo $detail['jk'];?>
		</td>
	</tr>
	<tr>
		<td>
			Tentang
		</td>
		<td>
			<?php echo $detail['aboutme'];?>
		</td>
	</tr>
	<tr>
		<td>
			Alamat
		</td>
		<td>
			<?php echo $detail['alamat'];?>
		</td>
	</tr>
	<tr>
		<td colspan=2>
			
		</td>
	</tr>
	<tr>
		<td colspan=2>
			Informasi Tampilan
		</td>
	</tr>
	<tr>
		<td>
			Navbar
		</td>
		<td>
			<?php echo $tampilan['navbar'];?>
		</td>
	</tr>
	<tr>
		<td>
			Dropdown
		</td>
		<td>
			<?php echo $tampilan['dropdown'];?>
		</td>
	</tr>
	<tr>
		<td>
			Latar Belakang
		</td>
		<td>
			<?php echo $tampilan['background'];?>
		</td>
	</tr>
	<tr>
		<td>
			Maksimal Berita
		</td>
		<td>
			<?php echo $tampilan['maxindex'];?>
		</td>
	</tr>
	<tr>
		<td>
			PAS
		</td>
		<td>
			<?php echo $tampilan['pas'];?>
		</td>
	</tr>
</table>
</table>