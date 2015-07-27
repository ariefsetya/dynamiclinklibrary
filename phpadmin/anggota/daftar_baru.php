<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_POST['simpan'])){
$pass = md5($_POST['kata_sandi']);
mysql_query("insert into akun values('','$_POST[nama_pengguna]','$pass','1')");
mysql_query("insert into detail_akun values('','$_POST[nama_depan]','$_POST[nama_belakang]','$_POST[nis]','$_POST[email]','','','','','','')");
mysql_query("insert into detail_tampilan values('','#2d89ef','7','#2d89ef','#fff','pengguna')");

}
?>
<h2><a href="index.php?rpl=m_anggota"><i style="font-size:18pt;" class="icon-arrow-left-3"></i></a> Mendaftar Anggota</h2>
<form method="POST" action="">
	<table>
		<tr>
			<td>
				Nama Depan
			</td>
			<td class="input-control text">
				<input required="true" type="text" name="nama_depan"></input>
			</td>	
		</tr>
		<tr>
			<td>
				Nama Belakang
			</td>
			<td class="input-control text">
				<input required="true" type="text" name="nama_belakang"></input>
			</td>			
		</tr>
		<tr>
			<td>
				Nomor Induk Siswa
			</td>	
			<td class="input-control text">
				<input required="true" type="text" name="nis"></input>
			</td>	
		</tr>
		<tr>
			<td>
				Nama Pengguna
			</td>	
			<td class="input-control text">
				<input required="true" type="text" name="nama_pengguna"></input>
			</td>	
		</tr>
		<tr>
			<td>
				Kata Sandi
			</td>	
			<td class="input-control text">
				<input required="true" type="password" name="kata_sandi"></input>
			</td>	
		</tr>
		<tr>
			<td>
				E-mail
			</td>	
			<td class="input-control text">
				<input required="true" type="text" name="email"></input>
			</td>	
		</tr>
		<tr>
			<td>
				
			</td>	
			<td class="input-control text">
				<button type="submit" name="simpan" style="float:right;">Simpan</button>
				<button type="reset" style="float:right;">Reset</button>
			</td>	
		</tr>
	</table>
</form>