<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
$r = mysql_query("select*from artikel where id='$_GET[det]'");
$e = mysql_fetch_array($r);
if(empty($e['id'])){
echo "<script>alert('Maaf, artikel yang Anda cari tidak ada')</script>";
}
?>
	<table>
		<tr>
			<td colspan=2>
				<h2><a href="index.php?rpl=m_artikel"><i style="font-size:18pt;" class="icon-arrow-left-3"></i></a> <?php echo $e['nama'];?></h2>
			</td>
		</tr>
		<tr>
			<td style="width:70%;">
				
				<div style="line-height:1px;word-wrap:break-all;height:480px;width:100%;overflow-y:scroll;border:0px;background-color:transparent;font-family:Segoe Print;font-size:13pt;line-height:18pt;text-overflow:ellipsis;"><?php if(empty($e['id'])){echo "<a href=index.php?rpl=capcus>Kembali ke Cari Artikel</a>";}echo $e['isi'];?></div>
				
			</td>
			<td valign=top>
			<table>
				<tr>
					<td>
						Penulis
					</td>
					<td>
						:
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
						:
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
						:
					</td>
					<td>
						<?php echo $e['lihat'];?> kali
					</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>