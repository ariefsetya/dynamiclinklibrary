<?php
$e = mysql_query("select*from penulis where id_akun='$_SESSION[id]'");
$d = mysql_fetch_array($e);
$tampilan = mysql_query("select*from detail_tampilan where id_aku='$_SESSION[id]'");
$degradasi2 = mysql_fetch_array($tampilan);
?>
<style>
.tick{
color:<?php echo $_SESSION['background']; ?>!important;
}
.nav-bar-inner{
margin-left:auto;
margin-right:auto;
}
.aaaa{
<?php
session_start();
if($_SESSION['user_akses']=="10"){
echo "width:100%;";
}
else if($_SESSION['user_akses']=="1"){
echo "width:800px;";
}
?>
}

</style>
<div class="nav-bar fixed-top" style="width:100%;background:<?php echo $degradasi2['navbar']; ?>;">
		<div class="nav-bar-inner padding10 aaaa">
			<span class="pull-menu"></span>
			<a href="index.php"><span class="element brand tick">
				<span style="font-family:Khmer UI;font-size:16pt;">dynamic.Link</span><span style="font-family:MS Sans Serif;font-size:19pt;"> library</span>
			</span></a>
			<style>
			.dropdown-menu li a {
			  background-color: <?php echo $_SESSION['background']; ?> !important;
			  color: <?php echo $_SESSION['navbar']; ?>!important;
			}
			.dropdown-menu li a:hover {
			  background-color: <?php echo $_SESSION['navbar']; ?> !important;
			  color: <?php echo $_SESSION['background']; ?>!important;
			}
			button .bbaa{
			color:<?php echo $_SESSION['background']; ?>!important;
			background-color: <?php echo $_SESSION['navbar']; ?> !important;
			}
			</style>
			<div class="divider"></div>
			<ul class="menu">
			<?php
				if($_SESSION['user_akses']==10){
			?>
				<li data-role="dropdown">
					<a class="tick" href="#">Master</a>
					<ul class="dropdown-menu">
						<li><a href="index.php?rpl=m_anggota"><i class="icon-user-3">Anggota</i></a></li>
						<li><a href="index.php?rpl=m_penulis"><i class="icon-user-3">Penulis</i></a></li>
						<li><a href="index.php?rpl=m_artikel"><i class="icon-user-3">Artikel</i></a></li>
						<li><a href="index.php?rpl=m_rak"><i class="icon-user-3">Rak Buku</i></a></li>
						<li><a href="index.php?rpl=m_buku"><i class="icon-user-3">Buku</i></a></li>
						<li><a href="index.php?rpl=m_denda"><i class="icon-user-3">Denda</i></a></li>
					</ul>
				</li>
				<li data-role="dropdown">
					<a class="tick" href="#">Transaksi</a>
					<ul class="dropdown-menu">
						<li><a href="index.php?rpl=peminjaman_buku"><i class="icon-user-3">Peminjaman Buku</i></a></li>
						<li><a href="index.php?rpl=pengembalian_buku"><i class="icon-user-3">Pengembalian Buku</i></a></li>
					</ul>
				</li>
				<li data-role="dropdown">
					<a class="tick" href="#">Laporan</a>
					<ul class="dropdown-menu">
						<li><a href="index.php?rpl=laporan_buku"><i class="icon-user-3">Laporan Buku</i></a></li>
						<li><a href="index.php?rpl=laporan_peminjaman"><i class="icon-user-3">Laporan Peminjaman</i></a></li>
					</ul>
				</li>
				<?php
				}
				if($_SESSION['tranz']=="penulis" or $_SESSION['user_akses']==10){
				?>
				<li data-role="dropdown">
					<a class="tick" href="#">Profil</a>
					<ul class="dropdown-menu">
						<li><a href="direct.php?rpl=profil"><i class="icon-user-2">Lihat Profil</i></a></li>
						<li><a href="index.php?rpl=teman"><i class="icon-accessibility">Lihat Teman</i></a></li>
					</ul>
				</li>
				<?php
				}	
				?>
				<li data-role="dropdown">
					<a class="tick" href="#">Artikel</a>
					<ul class="dropdown-menu">
						<?php
						if($_SESSION['tranz']=="penulis" or $_SESSION['user_akses']==10){
						?>
						<li><a href="index.php?rpl=tulis_artikel"><i class="icon-pencil">Tulis Artikel</i></a></li>
						<li><a href="index.php?rpl=artikel_saya"><i class="icon-file">Artikel Saya</i></a></li>
						<?php
						}
						?>
						<li><a href="index.php?rpl=daftar_artikel"><i class="icon-list">Daftar Artikel</i></a></li>
						<li><a href="index.php?rpl=semua_artikel"><i class="icon-clipboard-2">Semua Artikel</i></a></li>
					</ul>
				</li>
				<li data-role="dropdown">
					<a class="tick" href="#">Penulis</a>
					<ul class="dropdown-menu">
						<?php
						if(empty($d['id_akun']) and $_SESSION['user_akses']==1)
						{
						?>
						<li><a href="index.php?rpl=mendaftar_penulis"><i class="icon-user">Mendaftar Penulis</i></a></li>
						<?php
						}
						else if($_SESSION['tranz']=="pengguna" and $_SESSION['user_akses']==1){
						?>
						<li><a href="index.php?rpl=beralih_ke_penulis"><i class="icon-user">Beralih Ke Penulis</i></a></li>
						<?php
						}
						else if($_SESSION['tranz']=="penulis" and $_SESSION['user_akses']==1){
						?>
						<li><a href="index.php?rpl=beralih_ke_pengguna"><i class="icon-user">Beralih Ke Pengguna</i></a></li>
						<?php
						}
						?>
						<li><a href="index.php?rpl=daftar_penulis"><i class="icon-list">Daftar Penulis</i></a></li>
						<li><a href="index.php?rpl=hak_penulis"><i class="icon-award-stroke">Hak Penulis</i></a></li>
					</ul>
				</li>
				<li data-role="dropdown">
					<a class="tick" href="#">Buku</a>
					<ul class="dropdown-menu">
						<?php
						if($_SESSION['tranz']=="pengguna" and $_SESSION['user_akses']==1){
						?>
						<li><a href="index.php?rpl=bukupenulis"><i class="icon-book">Buku Online</i></a></li>
						<?php
						}
						if($_SESSION['tranz']=="penulis" or $_SESSION['user_akses']==10){
						?>
						<li><a href="index.php?rpl=bukupenulis"><i class="icon-book">Buku Online</i></a></li>
						<li><a href="index.php?rpl=tulis_buku"><i class="icon-book">Buat Buku Online</i></a></li>
						<li><a href="index.php?rpl=kelolabuku"><i class="icon-book">Kelola Buku Online Saya</i></a></li>
						<?php
						}
						?>
						<li><a href="index.php?rpl=rak_buku"><i class="icon-cabinet">Rak Buku</i></a></li>
					</ul>
				</li>
				<li>
					<a style="color:<?php echo $_SESSION['background'];?>" href="index.php?rpl=kotaksaran">Kotak Saran</a>
				</li>
				
				<li class="place-right" data-role="dropdown">
					<a class="tick" href="#"><i class="icon-cog"></i></a>
					<ul class="dropdown-menu menu-left">
						<?php
						if($_SESSION['tranz']=="penulis"){
						?>
							<li><a href="index.php?rpl=pengaturan"><i class="icon-cog">Pengaturan</i></a></li>
						<?php
						}
						?>
						<li><a href="index.php?rpl=pulang"><i class="icon-exit">Keluar</i></a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>