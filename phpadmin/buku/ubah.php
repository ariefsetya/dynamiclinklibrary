<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_POST['updetgambar'])){
		$namafolder="cover/$_GET[det]/"; 
		if (!empty($_FILES["cover"]["tmp_name"])) 
		{     
			$jenis_gambar=$_FILES['cover']['type'];     
		  
			if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     
				{                    
				$gambar = $namafolder .rand() .basename($_FILES['cover']['name']);                
				if (move_uploaded_file($_FILES['cover']['tmp_name'], $gambar)) 
					{                          
					$res=mysql_query("update buku set Cover='$gambar' where id='$_GET[det]'") or die (mysql_error()); 
					mysql_query("insert into aktivitas values('','$_SESSION[id]','Cover buku $_POST[judul_buku] telah diperbarui','$d','$m','$y','$h','$i','$s')");

					echo "<script>alert('Cover berhasil disimpan');</script>";             
					        
					} else {            
					echo "<script>alert('Cover gagal disimpan');</script>";         
					}    
				} else {         
				echo "<script>alert('Jenis gambar cover yang anda kirim salah. Harus .jpg .gif .png');</script>";    
				} 
			} else {     
			echo "<script>alert('Anda belum memasukkan gambar cover');</script>"; 
			}

}
elseif(isset($_POST['updet'])){
	mysql_query("update buku set Judul='$_POST[judul_buku]', kode_buku='$_POST[kode_buku]', pengarang='$_POST[pengarang]', penerbit='$_POST[penerbit]', tahun_terbit='$_POST[tahun_terbit]', ISBN='$_POST[isbn]', Ukuran='$_POST[ukuran]', Jumlah='$_POST[jumlah]', Bahasa='$_POST[bahasa]', Harga='$_POST[harga]', Masuk='$_POST[tahun_masuk]', rak='$_POST[rak]', sinopsis='$_POST[sinopsis]' where id='$_GET[det]'");
	mysql_query("insert into aktivitas values('','$_SESSION[id]','Detail buku $_POST[judul_buku] telah diperbarui','$d','$m','$y','$h','$i','$s')");

	echo "<script>alert('Data buku berhasil diperbarui')</script>";
}

$ubah = mysql_query("select*from buku where id='$_GET[det]'");
$ro = mysql_fetch_array($ubah);

?>

<h2><a href="index.php?rpl=m_buku"><i style="font-size:18pt;" class="icon-arrow-left-3"></i></a> Ubah Data Buku</h2>
	<form method="POST" action="" enctype="multipart/form-data">
		<table>
			<tr>
				<td>
					Foto Cover
				</td>
			</tr>
			<tr>
				<td>
					<div style="width:220px;height:200px;max-height:200px;overflow-y:scroll;border:1px solid #999;">
					<img src="<?php echo $ro['Cover'];?>" style="width:200px;"></img>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="input-control text">
						<input type="file" name="cover" value="<?php echo $ro['Cover'];?>"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="input-control text">
						<button type="reset">Reset</button>
						<button type="submit" name="updetgambar">Perbarui</button>
					</div>
				</td>
			</tr>
		</table>
	</form>

	<form method="POST" action="">
		<table>
			<tr>
				<td>
					Kode Buku
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="kode_buku" value="<?php echo $ro['kode_buku'];?>"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Judul Buku
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="judul_buku" value="<?php echo $ro['Judul'];?>"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Pengarang
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="pengarang" value="<?php echo $ro['pengarang'];?>"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Penerbit
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="penerbit" value="<?php echo $ro['penerbit'];?>"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Tahun Terbit
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="tahun_terbit" value="<?php echo $ro['tahun_terbit'];?>"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					ISBN
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="isbn" value="<?php echo $ro['ISBN'];?>"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Ukuran
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="ukuran" value="<?php echo $ro['Ukuran'];?>"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Jumlah
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="jumlah" value="<?php echo $ro['Jumlah'];?>"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Bahasa
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="bahasa" value="<?php echo $ro['Bahasa'];?>"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Harga
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="harga" value="<?php echo $ro['Harga'];?>"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Tahun Masuk
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="tahun_masuk" value="<?php echo $ro['Masuk'];?>"></input>
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
							$asdf = mysql_query("select*from rak");
							$rak = mysql_query("select*from rak where id='$ro[rak]'");
							$ra = mysql_fetch_array($rak);
							$nama = $ra['nama'];
							$id=$ra['id'];
							echo "<option selected="."true"." value=$id>$nama</option>";
							while($www = mysql_fetch_array($asdf)){
							echo "<option value="."$www[id]".">"."$www[nama]</option>";
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
						<textarea required="true" type="text" name="sinopsis"><?php echo $ro['sinopsis'];?></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<div class="input-control text place-right">
						<button type="reset">Reset</button>
						<button type="submit" name="updet" >Perbarui</button>
					</div>
				</td>
			</tr>
			
		</table>
	</form>

</div>