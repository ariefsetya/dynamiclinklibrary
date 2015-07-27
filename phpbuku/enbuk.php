<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_POST['simpen'])){

include "wwgombel.php";


	mkdir("cover/$_POST[kode_buku]",0700);
		$namafolder="cover/$_POST[kode_buku]/"; 
		if (!empty($_FILES["cover"]["tmp_name"])) 
		{     
			$jenis_gambar=$_FILES['cover']['type'];     
		  
			if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     
				{                    
				$gambar = $namafolder . rand() .basename($_FILES['cover']['name']);                
				if (move_uploaded_file($_FILES['cover']['tmp_name'], $gambar)) 
					{                          
					$res=mysql_query("insert into buku values('','$_POST[kode_buku]','$_POST[judul_buku]','$_POST[pengarang]','$_POST[penerbit]','$_POST[tahun_terbit]','$_POST[isbn]','$_POST[ukuran]','$_POST[jumlah]','$_POST[bahasa]','$_POST[harga]','$_POST[masuk]','$gambar','$_POST[rak]','$_POST[sinopsis]','0')") or die (mysql_error()); 
					echo "<script>alert('Buku berhasil disimpan');</script>";             
					        
					} else {            
					echo "<script>alert('Buku gagal disimpan');</script>";         
					}    
				} else {         
				echo "<script>alert('Jenis gambar cover yang anda kirim salah. Harus .jpg .gif .png');</script>";    
				} 
			} else {     
			echo "<script>alert('Anda belum memasukkan gambar cover');</script>"; 
			}

}

?>

<div style="margin:60px 250px 20px 250px;">
<h3>Entri Data Buku</h3>
	<form method="POST" action="" enctype="multipart/form-data">
		<table>
			<tr>
				<td>
					Kode Buku
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="kode_buku"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Judul Buku
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="judul_buku"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Pengarang
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="pengarang"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Penerbit
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="penerbit"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Tahun Terbit
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="tahun_terbit"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					ISBN
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="isbn"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Foto Cover
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="file" name="cover"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Ukuran
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="ukuran"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Jumlah
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="jumlah"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Bahasa
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="bahasa"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Harga
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="harga"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Tahun Masuk
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="tahun_masuk"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Rak
				</td>
				<td>
					<div class="input-control text">
						<select type="text" name="rak" raquired="true">
							<?php
							include "wwgombel.php";
							$asdf = mysql_query("select*from rak");
							while($www = mysql_fetch_array($asdf)){
							echo "<option value="."$www[nama]".">"."$www[nama]</option>";
							}
							
							?>
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Sinopsis
				</td>
				<td>
					<div class="input-control text">
						<textarea required="true" type="text" name="sinopsis"></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<div class="input-control text place-right">
						<button type="reset" class="bg-color-blue" style="color:white">Reset</button>
						<button type="submit" name="simpen" class="bg-color-blue" style="color:white">Simpan</button>
					</div>
				</td>
			</tr>
			
		</table>
	</form>
</div>