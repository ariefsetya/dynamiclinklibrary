<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_POST['simpen'])){
	$d = date("d");
	$m = date("m");
	$y = date("Y");
	$h = date("H");
	$i = date("i");
	$s = date("s");
	$res=mysql_query("insert into buku values('','$_POST[kode_buku]','$_POST[judul_buku]','$_POST[pengarang]','$_POST[penerbit]','$_POST[tahun_terbit]','$_POST[isbn]','$_POST[ukuran]','$_POST[jumlah]','$_POST[bahasa]','$_POST[harga]','$_POST[tahun_masuk]','','$_POST[rak]','$_POST[sinopsis]','0')") or die (mysql_error()); 
	
	mysql_query("insert into aktivitas values('','$_SESSION[id]','Buku $_POST[judul_buku] telah ditambahkan','$d','$m','$y','$h','$i','$s')");

	$up = mysql_query("select*from buku order by id desc");
	$down = mysql_fetch_array($up);
	mkdir("cover/$down[id]",0700);
		$namafolder="cover/$down[id]/"; 
		if (!empty($_FILES["cover"]["tmp_name"])) 
		{     
			$jenis_gambar=$_FILES['cover']['type'];     
		  
			if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     
				{                    
				$gambar = $namafolder .rand() .basename($_FILES['cover']['name']);                
				if (move_uploaded_file($_FILES['cover']['tmp_name'], $gambar)) 
					{                          
					echo "<script>alert('Buku berhasil disimpan');</script>";             
					       $rea=mysql_query("update buku set Cover='$gambar' where id='$down[id]'") or die (mysql_error()); 

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

<h2><a href="index.php?rpl=m_buku"><i style="font-size:18pt;" class="icon-arrow-left-3"></i></a> Entri Data Buku</h2>
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
						<select type="text" name="rak" required="true">
							<?php
							$asdf = mysql_query("select*from rak");
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
						<textarea required="true" type="text" name="sinopsis"></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<div class="input-control text place-right">
						<button type="reset">Reset</button>
						<button type="submit" name="simpen">Simpan</button>
					</div>
				</td>
			</tr>
			
		</table>
	</form>
</div>