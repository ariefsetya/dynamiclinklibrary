<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
$ko = repp($_GET['artcl']);

if(isset($_POST['komen'])){
	$d = date("d");
	$m = date("m");
	$y = date("Y");
	$h = date("H");
	$i = date("i");
	$s = date("s");
	$postkomenannya = htmlentities($_POST[komen]);
	$artclnya = $ko;
mysql_query("insert into komenartikel values('','$_SESSION[id]','$artclnya','$postkomenannya','$h','$i','$s','$d','$m','$y')");
}



$r = mysql_query("select*from artikel where id='$ko'");
$e = mysql_fetch_array($r);
?>
	<table>
		<tr>
			<td colspan=3 style="z-index:1000;position:fixed;background-color:<?php echo $degradasi2['background']; ?>;margin-top:-11px;width:62.5%;">
				<h2><?php echo $e['nama'];?></h2>
			</td>
		</tr>
		<tr>
			<td style="width:70%;padding-top:50px;" colspan=2>
				<div style="line-height:1px;word-wrap:break-all;width:100%;border:0px;background-color:<?php echo $degradasi2['background'];?>;font-family:Segoe Print;font-size:13pt;line-height:18pt;text-overflow:ellipsis;"><?php if(empty($e['id'])){echo "<a href=index.php?rpl=daftar_artikel>Kembali ke Daftar Artikel</a>";}echo $e['isi'];?></div>
			</td>
			<td valign=top rowspan=2>
			<table style="padding-top:50px;position:fixed;margin-top:40px;width:17%;">
				<tr>
					<td>
						Penulis
					</td>
					<td>
						<?php 
						$df = mysql_query("select*from detail_akun where id_akun='$e[penulis]'");
						$er = mysql_fetch_array($df);
						echo $er['nama_depan']." ".$er['nama_belakang'];?>
					</td>
				</tr>
				<tr>
					<td>
						Kategori
					</td>
					<td>
						<?php echo $e['kategori'];?>
					</td>
				</tr>
				<tr>
					<td>
						Dilihat
					</td>
					<td>
						<?php echo $e['lihat'];?> kali
					</td>
				</tr>
			</table>
			<?php
			
			?>
			</td>
		</tr>
		<tr>
			<td valign=top>
			Komentar
			</td>
			<td>
				<ul class="replies">
				<?php
				$komenan = mysql_query("select*from komenartikel where id_artikel='$ko' order by id");
				while($kom = mysql_fetch_array($komenan)){
				$det = mysql_query("select*from detail_akun where id_akun='$kom[id_akun]'");
				$wer = mysql_fetch_array($det);
				?>
					<li style="width:100%;color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>">
						<div class="avatar"><img src="<?php echo $wer['fp'];?>"/></div>
						<div class="reply">
							<div class="date" style="font-size:12pt;"><?php echo $kom['jam'].":".$kom['menit'].":".$kom['detik']." ".$kom['tgl']."/".$kom['bln']."/".$kom['thn']; if($e['penulis']==$_SESSION['id'] or $_SESSION['id']==$kom['id_akun']){?> <a href="puskomen.php?det=<?php echo $kom['id']; ?>&id=<?php echo $ko; ?>"><i title="Hapus" class="icon-remove" style="color:lightgreen;"></i></a><?php } ?></div>
							<div class="author"><b><?php echo $wer['nama_depan']." ".$wer['nama_belakang']; ?></b></div> 
							<div class="text" style="font-size:10pt;"><?php echo $kom['isi'];?></div>
						</div>
					</li>
					<?php
					}
					$qwere = mysql_query("select*from penulis where id_akun='$_SESSION[id]'");
					$qwe = mysql_fetch_array($qwere);
					$qwer = mysql_query("select*from detail_akun where id_akun='$_SESSION[id]'");
					$qwa = mysql_fetch_array($qwer);
					if(!empty($qwe['id_akun']) or $_SESSION['user_akses']==10){
					?>
					<li style="width:100%;color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>">
						<div class="avatar"><img src="<?php echo $qwa['fp'];?>"/></div>
						<div class="reply">
							<div class="author"><b><?php echo $qwa['nama_depan']." ".$qwa['nama_belakang']; ?></b></div>
							<div class="text"><form method="POST" action=""><input placeholder="Tulis Komentar..." style="width:100%;height:30px;padding:5px;font-family:Segoe UI Light;font-size:11pt;" type="text" name="komen"></input></form></div>
						</div>
					</li>
					<?php
					}
					?>
					
				</ul>
			</td>
		</tr>
	</table>