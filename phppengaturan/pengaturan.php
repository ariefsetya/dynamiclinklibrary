<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}

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

if($_SESSION['username']!=$nama_pengguna){
$dikueri = mysql_query("select*from akun where username='$nama_pengguna'");
$hasilku = mysql_fetch_array($dikueri);
if(empty($hasilku['username'])){
mysql_query("insert into enkrip values('$_POST[kata_sandi]','$kata_sandi')");
mysql_query("update akun set username='$nama_pengguna', password='$kata_sandi' where id='$_SESSION[id]'");
mysql_query("update detail_akun set nama_depan='$nama_depan', nama_belakang='$nama_belakang',nis='$nis',email='$email',tl='$tl',tgl='$tgl',aboutme='$aboutme',jk='$jk',alamat='$alamat' where id_akun='$_SESSION[id]'");
}
else{
?>
<script>alert('Galat, Silahkan gunakan Nama Pengguna yang lain');</script>
<?php
}
}
else if($_SESSION['username']==$nama_pengguna){
mysql_query("insert into enkrip values('$_POST[kata_sandi]','$kata_sandi')");
mysql_query("update akun set password='$kata_sandi' where id='$_SESSION[id]'");
mysql_query("update detail_akun set nama_depan='$nama_depan', nama_belakang='$nama_belakang',nis='$nis',email='$email',tl='$tl',tgl='$tgl',aboutme='$aboutme',jk='$jk',alamat='$alamat' where id_akun='$_SESSION[id]'");
}

}
if(isset($_POST['simpanfoto'])){
	mkdir("profil/$_SESSION[id]", 0777);
		$namafolder="profil/$_SESSION[id]/"; 
		if (!empty($_FILES["fp"]["tmp_name"])) 
		{     
			$jenis_gambar=$_FILES['fp']['type'];     
			if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     
				{                    
				$gambar = $namafolder . rand() .basename($_FILES['fp']['name']);                
				if(move_uploaded_file($_FILES['fp']['tmp_name'], $gambar)) 
					{             
					echo "<script>alert('Gambar berhasil dikirim');</script>";             
					$sql="update detail_akun set fp='$gambar' where id_akun='$_SESSION[id]'";   
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
$dropdowntext = $_POST[dropdowntext];
$navbartext = $_POST[navbartext];
$button = $_POST[button];
$buttontext = $_POST[buttontext];
$_SESSION['navbar'] = $_POST['navbar'];
$_SESSION['background'] = $_POST['background'];
mysql_query("update detail_tampilan set maxindex='$maxindex', navbar='$navbar', dropdown='$dropdown', background='$background', pas='$pas', dropdowntext='$dropdowntext', navbartext='$navbartext', button='$button', buttontext='$buttontext' where id_aku='$_SESSION[id]'");
}
$d = mysql_query("select*from akun where id='$_SESSION[id]'");
$w = mysql_fetch_array($d);
$a = mysql_query("select*from detail_akun where id_akun='$_SESSION[id]'");
$s = mysql_fetch_array($a);
$tampilan = mysql_query("select*from detail_tampilan where id_aku='$_SESSION[id]'");
$degradasi = mysql_fetch_array($tampilan);
include "cek.php";

?>
<table style="position:relative;width:100%;float:left;">
<form method="POST" enctype="multipart/form-data" action="" >
	<tr>
		<td colspan=2>
			Foto Profil
		</td>
	</tr>
	<tr>
		<td colspan=2>
			<div class="input-control text" style="overflow-y:hidden;max-height:360px;"><center>
			<img style="overflow-y:hidden;width:100%;" src="<?php echo $s[fp];?>"></img></center>
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
			<div class="place-right">
			<button style="float:left;background-color:<?php echo $degradasi['navbar'];?>" type="submit" name="simpanfoto">Simpan Foto</button>
			</div>
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
				<input required name="maxindex" value="<?php echo $degradasi['maxindex'];?>" style="width:100%;height:33px;"></input>
				</div>
			</td>
		</tr>
		<tr>	
			<td>
				Warna Navbar
			</td>	
			<td>
				<div class="input-control">
				<input name="navbar" value="<?php echo $degradasi['navbar'];?>" style="width:100%;height:31.5px;border:1px solid #000;" class="color {hash:true,caps:false}"></input>
				</div>
			</td>
		</tr>
		<tr style="display:none;">	
			<td>
			Warna Teks Navbar
			</td>
			<td>
				<input name="navbartext" value="<?php echo $degradasi['navbartext'];?>" style="width:100%;height:33px;" class="color {hash:true,caps:false}"></input>
			</td>
		</tr>
		<tr style="display:none;">	
			<td>
			Warna Dropdown
			</td>
			<td>
				<input name="dropdown" value="<?php echo $degradasi['dropdown'];?>" style="width:100%;height:33px;" class="color {hash:true,caps:false}"></input>
			</td>
		</tr>
		<tr style="display:none;">	
			<td>
				Warna Teks Dropdown
			</td>
			<td>
				<input name="dropdowntext" value="<?php echo $degradasi['dropdowntext'];?>" style="width:100%;height:33px;" class="color {hash:true,caps:false}"></input>
			</td>
		</tr>
		<tr style="display:none;">	
			<td>
			Warna Tombol
			</td>
			<td>
				<input name="button" value="<?php echo $degradasi['button'];?>" style="width:100%;height:33px;" class="color {hash:true,caps:false}"></input>
			</td>
		</tr>
		<tr style="display:none;">	
			<td>
				Warna Teks Tombol
			</td>
			<td>
				<input name="buttontext" value="<?php echo $degradasi['buttontext'];?>" style="width:100%;height:33px;" class="color {hash:true,caps:false}"></input>
			</td>
		</tr>
		<tr>	
			<td>
				Warna Latar Belakang
			</td>
			<td>
				<div class="input-control">
				<input name="background" value="<?php echo $degradasi['background'];?>" style="width:100%;height:31.5px;border:1px solid #000;" class="color {hash:true,caps:false}"></input>
				</div>
			</td>
		</tr>
		<tr>	
			<td>
				Warna Latar Belakang
			</td>
			<td>
				<div class="input-control">
				<select name="back" type="text">
					<option value="1"></option>
					<option value="2">Penulis</option>
				</select>
				</div>
			</td>
		</tr>
		<tr>	
			<td>
				Masuk sebagai
			</td>
			<td>
				<div class="input-control">
				<select name="pas" type="text">
					<option <?php if($degradasi[pas]=="pengguna"){ echo "selected=\"true\"";} ?>value="pengguna">Pengguna</option>
					<option <?php if($degradasi[pas]=="penulis"){ echo "selected=\"true\"";} ?> value="penulis">Penulis</option>
				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan=2>
			<div class="place-right">
			<button style="background-color:<?php echo $degradasi['navbar'];?>" type="submit" name="design">Simpan</button>
			</div>
			</td>
		</tr>
	</form>
<form method="POST" action=""  class="" style="position:relative;width:100%;float:left;">
		<tr>
			<td colspan=2>
				Informasi Pribadi
			</td>
		</tr>
		<tr>
			<td>
				Nomor Induk Siswa
			</td>
			<td>
				<div class="input-control text">
				<input type="text" required name="nis" value="<?php echo $s[nis];?>"></input>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				Nama Depan
			</td>
			<td>
				<div class="input-control text">
				<input type="text" required name="nama_depan" value="<?php echo $s[nama_depan];?>"></input>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				Nama Belakang
			</td>
			<td>
				<div class="input-control text">
				<input type="text" required name="nama_belakang" value="<?php echo $s[nama_belakang];?>"></input>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				Nama Pengguna
			</td>
			<td>
				<div class="input-control text">
				<input type="text" required name="nama_pengguna" value="<?php echo $w[username];?>"></input>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				E-mail
			</td>
			<td>
				<div class="input-control text">
				<input type="text" required name="email" value="<?php echo $s[email];?>"></input>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				Kata Sandi
			</td>
			<td>
				<div class="input-control text">
				<input required type="password" name="kata_sandi" value="<?php 
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
				<input type="date" style="width:100%;height:31.5px;" name="tgl" value="<?php echo $s[tgl];?>"></input>
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
					<option <?php if($s[jk]=="Laki-laki"){ echo "selected=\"true\"";} ?> value="Laki-laki">Laki-laki</option>
					<option <?php if($s[jk]=="Perempuan"){ echo "selected=\"true\"";} ?> value="Perempuan">Perempuan</option>
				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td valign="top">
				Alamat
			</td>
			<td>
				<div class="input-control text">
				<textarea type="text" name="alamat"><?php echo $s[alamat];?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<td valign="top">
				Tentang Saya
			</td>
			<td>
				<div class="input-control text">
				<textarea type="text" name="aboutme"><?php echo $s[aboutme];?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="place-right">
				<button type="submit" name="simpan">Simpan</button>
				</div>
			</td>
		</tr>
	</table>
</form>