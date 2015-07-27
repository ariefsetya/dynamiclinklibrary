<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_POST['simpan'])){
$nis = htmlentities($_POST[nis]);
$nama_depan = htmlentities($_POST[nama_depan]);
$nama_belakang = htmlentities($_POST[nama_belakang]);
$nama_pengguna = htmlentities($_POST[nama_pengguna]);
$kata_sandi = md5($_POST[kata_sandi]);
$email = htmlentities($_POST[email]);
$jk = htmlentities($_POST[jk]);
$tl = htmlentities($_POST[tl]);
$tgl = htmlentities($_POST[tgl]);
$aboutme = htmlentities($_POST[aboutme]);
$alamat = htmlentities($_POST[alamat]);

mysql_query("update akun set username='$nama_pengguna', password='$kata_sandi' where id='$_GET[det]'");
mysql_query("update detail_akun set nama_depan='$nama_depan', nama_belakang='$nama_belakang',nis='$nis',email='$email',tl='$tl',tgl='$tgl',aboutme='$aboutme',jk='$jk',alamat='$alamat' where id_akun='$_GET[det]'");
}
if(isset($_POST['simpanfoto'])){
	mkdir("profil/$_GET[det]",0700);
		$namafolder="profil/$_GET[det]/"; 
		if (!empty($_FILES["fp"]["tmp_name"])) 
		{     
			$jenis_gambar=$_FILES['fp']['type'];     
		  
			if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     
				{                    
				$gambar = $namafolder . rand() .basename($_FILES['fp']['name']);                
				if (move_uploaded_file($_FILES['fp']['tmp_name'], $gambar)) 
					{             
					echo "<script>alert('Gambar berhasil dikirim');</script>";             
					$sql="update detail_akun set fp='$gambar' where id_akun='$_GET[det]'";             
					$res=mysql_query($sql) or die (mysql_error());         
					} else {            
					echo "<script>alert('Gambar gagal dikirim');</script>";         
					}    
				} else {         
				echo "<script>alert('Jenis gambar yang anda kirim salah. Harus .jpg .gif .png');</script>";    
				} 
			} else {     
			echo "<script>alert('Anda belum memilih gambar');</script>"; 
			}
}
if(isset($_POST['design'])){
$maxindex = $_POST[maxindex];
$navbar = $_POST[navbar];
$dropdown = $_POST[dropdown];
$background = $_POST[background];
$pas = $_POST[pas];
mysql_query("update detail_tampilan set maxindex='$maxindex', navbar='$navbar', dropdown='$dropdown', background='$background', pas='$pas' where id_aku='$_GET[det]'");
}
$d = mysql_query("select*from akun where id='$_GET[det]'");
$w = mysql_fetch_array($d);
$a = mysql_query("select*from detail_akun where id_akun='$_GET[det]'");
$s = mysql_fetch_array($a);
$tampilan = mysql_query("select*from detail_tampilan where id_aku='$_GET[det]'");
$degradasi = mysql_fetch_array($tampilan);


?>
<h2><a href="index.php?rpl=m_anggota"><i style="font-size:18pt;" class="icon-arrow-left-3"></i></a> Ubah Data Anggota</h2>
<table style="position:relative;width:100%;float:left;">
<form method="POST" enctype="multipart/form-data" action="" >
	<tr>
		<td colspan=2>
			Foto Profil
		</td>
	</tr>
	<tr>
		<td colspan=2><center>
			<div class="input-control text">
			<img style="width:20%;" src="<?php echo $s[fp];?>"></img></center>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			Unggah foto profil
		</td>
		<td>
			<div class="input-control text">
			<input type="file" name="fp"></input>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan=2>
			<button style="float:right;" type="submit" name="simpanfoto">Simpan Foto</button>
		</td>
	</tr>
	</form>
	
	<form method="POST" action="">
		<tr>	
			<td colspan=2>
				
			</td>
		</tr>
		<tr>	
			<td colspan=2>
				Tampilan
			</td>
		</tr>
		<tr>	
			<td>
				Maksimal Berita
			</td>	
			<td>
				<div class="input-control">
				<input required="true" name="maxindex" value="<?php echo $degradasi['maxindex'];?>" style="width:100%;height:33px;"></input>
				</div>
			</td>
		</tr><tr>	
			<td>
				Warna Navbar
			</td>	
			<td>
				<input name="navbar" value="<?php echo $degradasi['navbar'];?>" style="width:100%;height:33px;" class="color {hash:true,caps:false}"></input>
			</td>
		</tr>
		<tr>	
			<td>
				Warna Dropdown
			</td>	
			<td>
				<input name="dropdown" value="<?php echo $degradasi['dropdown'];?>" style="width:100%;height:33px;" class="color {hash:true,caps:false}"></input>
			</td>
		</tr>
		<tr>	
			<td>
				Warna Latar Belakang
			</td>	
			<td>
				<input name="background" value="<?php echo $degradasi['background'];?>" style="width:100%;height:33px;" class="color {hash:true,caps:false}"></input>
			</td>
		</tr>
		<tr>	
			<td>
				Masuk sebagai
			</td>	
			<td>
				<div class="input-control">
				<select name="pas" type="text">
					<option selected="true" value="<?php echo $degradasi['pas'];?>"><?php echo $degradasi['pas'];?></option>
					<option value=""></option>
					<option value="pengguna">Pengguna</option>
					<option value="penulis">Penulis</option>
				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan=2>
			<div class="place-right">
			<button type="reset" >Reset</button>
			<button type="submit" name="design">Simpan</button>
			</div>
			</td>
		</tr>
	</form>


<form method="POST" action=""  class="" style="position:relative;width:100%;float:left;">
		<tr>
			<td>
				Nomor Induk Siswa
			</td>
			<td>
				<div class="input-control text">
				<input type="text" name="nis" value="<?php echo $s[nis];?>"></input>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				Nama Depan
			</td>
			<td>
				<div class="input-control text">
				<input type="text" name="nama_depan" value="<?php echo $s[nama_depan];?>"></input>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				Nama Belakang
			</td>
			<td>
				<div class="input-control text">
				<input type="text" name="nama_belakang" value="<?php echo $s[nama_belakang];?>"></input>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				Nama Pengguna
			</td>
			<td>
				<div class="input-control text">
				<input type="text" name="nama_pengguna" value="<?php echo $w[username];?>"></input>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				E-mail
			</td>
			<td>
				<div class="input-control text">
				<input type="text" name="email" value="<?php echo $s[email];?>"></input>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				Kata Sandi
			</td>
			<td>
				<div class="input-control text">
				<input type="password" name="kata_sandi" value="<?php 
				$a = mysql_query("select*from enkrip where md5='$w[password]'");
				$asss = mysql_fetch_array($a);
				echo $asss[asal];?>"></input>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				Tempat Lahir
			</td>
			<td>
				<div class="input-control text">
				<input type="text" name="tl" value="<?php echo $s[tl];?>"></input>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				Tanggal Lahir
			</td>
			<td>
				<div class="input-control text">
				<input type="text" name="tgl" value="<?php echo $s[tgl];?>"></input>
				</div>
			</td>
			
		</tr>
		<tr>
			<td>
				Jenis Kelamin
			</td>
			<td>
				<div class="input-control">
				<select type="text" name="jk">
					<option selected="true" value="<?php echo $s[jk];?>"><?php echo $s[jk];?></option>
					<option value=""></option>
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td valign=top>
				Alamat
			</td>
			<td>
				<div class="input-control text">
				<textarea type="text" name="alamat"><?php echo $s[alamat];?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<td valign=top>
				Tentang Saya
			</td>
			<td>
				<div class="input-control text">
				<textarea type="text" name="aboutme"><?php echo $s[aboutme];?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<button style="float:right;" type="submit" name="simpan">Simpan</button>
				<button style="float:right;" type="reset" name="reset">Reset</button>
			</td>
		</tr>
	</table>
</form>
