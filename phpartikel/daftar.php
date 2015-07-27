<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<div class="span12" style="margin:80px 0px 20px 20px;height:500px;">
<div class="page-control span10" data-role="page-control">
	<span class="menu-pull"></span>
		<ul style="display: block; overflow: visible;">
			<li class="active"><a style="color:<?php echo $_SESSION['navbar'];?>;" href="#terbaru">Artikel Terbaru</a></li>
			<li class=""><a style="color:<?php echo $_SESSION['navbar'];?>;" href="#populer">Artikel Terpopuler</a></li>
		</ul>
		<div class="frames">
			<div class="frame active" id="terbaru" style="display: block;">
				<table>
					<thead>	
						<td>
							Judul
						</td>
						<td>
							Penulis
						</td>
					<thead>			
					<?php
					$e = mysql_query("select*from artikel order by id desc limit 0,10");
					while($w = mysql_fetch_array($e)){
					?>
					<tbody>
						<td>
							<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="redir.php?art=<?php echo $w['id'];?>"><?php echo $w['nama'];?></a>
						</td>
						<td>
							<?php 
							$df = mysql_query("select*from akun where id='$w[penulis]'");
							$er = mysql_fetch_array($df);
							echo $er['username'];?>
						</td>
					</tbody>
					<?php
					}
					?>			
				</table>
			</div>
			<div class="frame" id="populer" style="display: none;">
				<table>
					<thead>
						<td>
							Judul
						</td>
						<td>
							Penulis
						</td>
					<thead>
					<?php
					$e = mysql_query("select*from artikel order by lihat desc limit 0,10");
					while($w = mysql_fetch_array($e)){
					?>
					<tbody>
						<td>
							<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="redir.php?art=<?php echo $w['id'];?>"><?php echo $w['nama'];?></a>
						</td>
						<td>
							<?php 
							$df = mysql_query("select*from akun where id='$w[penulis]'");
							$er = mysql_fetch_array($df);
							echo $er['username'];?>
						</td>
					</tbody>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>