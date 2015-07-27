<br>
<fieldset>
	<legend style="color:blue;">Kotak Saran</legend>
	<form method="POST" action="postsaran.php">
		<textarea style="font-size:14pt;font-family:Segoe UI Light;width:100%;height:200;" class="input text" name="isi"></textarea>
		<br>
		<br>
		<div style="float:right"><button style="color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>" type="submit" name="simpan">Kirim</button></div>
	</form>
</fieldset>
<br>
	<div style="width:100%;border:2px solid <?php echo $_SESSION['navbar'];?>;border-radius:4px;">
		<div style="height:200px;overflow-y:scroll;">
		<table>
			<thead>
					<td><center>Pengirim</center></td>
					<td><center>Isi</center></td>
					<td><center>Waktu</center></td>
					<td><center>Tanggal</center></td>
			</thead>
			<tbody>
			<?php
			include "phpcon/link.php";
			$rownya = mysql_query("select*from kotaksaran order by id desc");
			while($datarownya = mysql_fetch_array($rownya))
			{
			?>
				<tr>
					<td valign="top"><?php 
					$sele = mysql_query("select*from detail_akun where id_akun='$datarownya[pengirim]'");
					$rowselse = mysql_fetch_array($sele);
					echo $rowselse['nama_depan']." ".$rowselse['nama_belakang'];?></td>
					<td valign="top" style="max-width:400px;"><div style="white-space: pre;white-space: pre-wrap;word-wrap:break-all"><?php echo $datarownya['isi'];?></div></td>
					<td valign="top"><?php echo $datarownya['jam'].":".$datarownya['menit'].":".$datarownya['detik'];?></td>
					<td valign="top"><?php echo $datarownya['tanggal'].":".$datarownya['bulan'].":".$datarownya['tahun'];?></td>
				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
		</div>
	</div>