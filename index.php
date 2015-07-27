<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	include("phpcon/link.php");
	include("phpfunc/num.php");
	$tampilan = mysql_query("select*from detail_tampilan where id_aku='$_SESSION[id]'");
	$degradasi2 = mysql_fetch_array($tampilan);
	$limia = mysql_query("select*from detail_tampilan where id_aku='$_SESSION[id]'");
	$limitan = mysql_fetch_array($limia);
	$limitan = $limitan['maxindex'];
	date_default_timezone_set('Asia/Jakarta');
	if($_GET['rpl']=="pulang"){
	header("location:pulang.php");
	}
	else if($_SESSION['tranz']=="pengguna" and $_GET['rpl']=="beralih_ke_penulis" and $_SESSION['user_akses']==1){
	$_SESSION['tranz']="penulis";
	header("location:index.php");
	}
	else if($_GET['rpl']=="setuju" and $_SESSION['user_akses']==1){
	mysql_query("insert into penulis values('$_SESSION[id]','1')");
	mysql_query("update detail_tampilan set pas='penulis' where id_aku='$_SESSION[id]'");
	$_SESSION['tranz']="penulis";
	header("location:index.php");
	}
	else if($_SESSION['tranz']=="penulis" and $_GET['rpl']=="beralih_ke_pengguna" and $_SESSION['user_akses']==1){
	$_SESSION['tranz']="pengguna";
	header("location:index.php");
	}
	
	else if(!empty($_SESSION['username'])){
	//-------------------Jika session masuk sudah membaca akun, akan di buka index.php dengan akun apa gitu dll
	
	//-------------------Waktunya manggil css dan js
		?>
		<html>
			<head>
				
				
				<!-- Ini buat title nya -->
				<title>dynamic.Link | E-Learning, Social Network, Library</title>
				
				<!-- Ini buat manggil css -->
				<link href="css/modern.css" rel="stylesheet">
				<link href="ckeditor/content.css" rel="stylesheet" type="text/css"/>
				<link rel="shortcut icon" href="icon.png" type="image/png" />
				
				<!-- Ini buat manggil js -->
				<script type="text/javascript" src="js/assets/jquery-1.9.0.min.js"></script>
				<script type="text/javascript" src="js/assets/jquery-1.8.2.min.js"></script>


			</head>
			
		<!-- Sekarang kita ke tag body -->
			<style>
			.gerak{
			margin-left:-230px;
			width:310px;
			transition:margin-left 1s;
			-webkit-transition:margin-left 1s, width .5s;
			-moz-transition:margin-left 1s, width .5s;
			-o-transition:margin-left 1s, width .5s;
			-ms-transition:margin-left 1s, width .5s;

			}
			.gerak:hover{
			margin-left:0px;
			padding-left:10px;
			width:250px;
			}
			.shortcut:hover{
			border:1px solid #2d89ef;
			}
			
			
			</style>
			<body style="background-color:<?php echo $degradasi2['background'] ?>;">
			
			
			<div class="gerak place-left" style="z-index:10000;margin-top:28px;position:fixed;">
			<?php
			
			if($_SESSION['user_akses']==1 and $_SESSION['tranz']=="pengguna"){
			?>
			<a href="index.php"><button class="shortcut">
				<span class="icon">
					<i class="icon-home"></i>
				</span>
				<span class="label">
					Beranda
					
				</span>
			</button></a>
			<?php
			}
			if($_SESSION['user_akses']==10 or $_SESSION['tranz']=="penulis"){
			?>
			<a href="index.php"><button class="shortcut">
				<span class="icon">
					<i class="icon-home"></i>
				</span>
				<span class="label">
					Beranda
				</span>
			</button></a>
			<a href="direct.php?rpl=profil"><button class="shortcut">
				<span class="icon">
					<i class="icon-user-2"></i>
				</span>
				<span class="label">
					Profil
				</span>
			</button></a>
			<a href="index.php?rpl=tulis_artikel"><button class="shortcut">
				<span class="icon">
					<i class="icon-pencil"></i>
				</span>
				<span class="label">
					Tulis Artikel
				</span>
			</button></a>
			<?php } 
			$e = mysql_query("select*from penulis where id_akun='$_SESSION[id]'");
			$d = mysql_fetch_array($e);
			if(empty($d['id_akun']) and $_SESSION['user_akses']==1)
			{
			?>
			<a href="index.php?rpl=mendaftar_penulis"><button class="shortcut">
				<span class="icon">
					<i class="icon-stats-up"></i>
				</span>
				<span class="label">
					Upgrade ke Sosial Media
				</span>
			</button></a>
			<a href="index.php?rpl=rak_buku"><button class="shortcut">
				<span class="icon">
					<i class="icon-cabinet"></i>
				</span>
				<span class="label">
					Rak Buku
					
				</span>
			</button></a>
			
			<a href="index.php?rpl=bukupenulis"><button class="shortcut">
				<span class="icon">
					<i class="icon-book"></i>
				</span>
				<span class="label">
					Buku Online
				</span>
			</button></a>
			<a href="index.php?rpl=daftar_penulis"><button class="shortcut">
				<span class="icon">
					<i class="icon-list"></i>
				</span>
				<span class="label">
					Level Penulis
				</span>
			</button></a>
			
			<a href="index.php?rpl=daftar_artikel"><button class="shortcut">
				<span class="icon">
					<i class="icon-list"></i>
				</span>
				<span class="label">
					Daftar Artikel
				</span>
			</button></a>	
			<?php } 
			if($_SESSION['user_akses']==10){
			?>
			<a href="index.php?rpl=peminjaman_buku"><button class="shortcut">
				<span class="icon">
					<i class="icon-book"></i>
				</span>
				<span class="label">
					Peminjaman Buku
				</span>
			</button></a>
			<a href="index.php?rpl=laporan_buku"><button class="shortcut">
				<span class="icon">
					<i class="icon-clipboard-2"></i>
				</span>
				<span class="label">
					Laporan Buku
				</span>
			</button></a>
			<a href="index.php?rpl=pengembalian_buku"><button class="shortcut">
				<span class="icon">
					<i class="icon-book"></i>
				</span>
				<span class="label">
					Pengembalian Buku
				</span>
			</button></a>
			<a href="index.php?rpl=m_anggota"><button class="shortcut">
				<span class="icon">
					<i class="icon-user-2"></i>
				</span>
				<span class="label">
					Managemen Anggota
				</span>
			</button></a>
			<a href="index.php?rpl=m_artikel"><button class="shortcut">
				<span class="icon">
					<i class="icon-copy"></i>
				</span>
				<span class="label">
					Managemen Artikel
				</span>
			</button></a>
			
			
			<?php
			}
			if(!empty($d['id_akun']) and $_SESSION['tranz']=="pengguna" and $_SESSION['user_akses']==1)
			{
			?>
			<a href="index.php?rpl=beralih_ke_penulis"><button class="shortcut">
				<span class="icon">
					<i class="icon-user"></i>
				</span>
				<span class="label">
					Beralih ke Penulis
				</span>
			</button></a>
			<?php } 
			if(!empty($d['id_akun']) and $_SESSION['tranz']=="penulis" and $_SESSION['user_akses']==1)
			{
			?>
			<a href="index.php?rpl=beralih_ke_pengguna"><button class="shortcut">
				<span class="icon">
					<i class="icon-user"></i>
				</span>
				<span class="label">
					Beralih ke Pengguna
				</span>
			</button></a>
			<?php } 
			if($_SESSION['user_akses']==1 and !empty($d['id_akun'])){
			?>
			<a href="index.php?rpl=rak_buku"><button class="shortcut">
				<span class="icon">
					<i class="icon-cabinet"></i>
				</span>
				<span class="label">
					Rak Buku
				</span>
			</button></a>
			
			<a href="index.php?rpl=bukupenulis"><button class="shortcut">
				<span class="icon">
					<i class="icon-book"></i>
				</span>
				<span class="label">
					Buku Online
				</span>
			</button></a>
			<a href="index.php?rpl=daftar_penulis"><button class="shortcut">
				<span class="icon">
					<i class="icon-list"></i>
				</span>
				<span class="label">
					Level Penulis
				</span>
			</button></a>
			
			<a href="index.php?rpl=daftar_artikel"><button class="shortcut">
				<span class="icon">
					<i class="icon-list"></i>
				</span>
				<span class="label">
					Daftar Artikel
				</span>
			</button></a>
			
			<?php
			}
			?>
			
			<div style="height:27px;width:82.5%;background-color:<?php echo $degradasi2['navbar'];?>">
			<label style="font-size:13pt;color:<?php echo $degradasi2['navbartext'];?>"><center>Copyright DLL 2013</center></label>

			</div>
			</div>
			<style>
			button
			{
			background-color:<?php echo $degradasi2['button'];?>;
			color:<?php echo $degradasi2['buttontext'];?>;
			}
			</style>
			
			
				<!-- Kita akan manggil menunya -->
				<?php
				include "phpmenu/menu.php";
				echo "<script type=text/javascript src=js/modern/dropdown.js></script>";

				
				?>
				<style>
				.box{
				margin-left:auto;
				margin-right:auto;
				width:800px;
				margin-top:65px;
				margin-bottom:10px;
				}

				</style>

				
				<div class="box">
				
				<?php
				
				//---head menu master mulai-----
				if($_GET['rpl']=="m_anggota" and $_SESSION['user_akses']==10){
				include "phpadmin/m_anggota.php";
				}
				else if($_GET['rpl']=="m_penulis" and $_SESSION['user_akses']==10){
				include "phpadmin/m_penulis.php";
				}
				else if($_GET['rpl']=="m_artikel" and $_SESSION['user_akses']==10){
				include "phpadmin/m_artikel.php";
				echo "<script type=text/javascript src=ckeditor/ckeditor.js></script>";
				}
				else if($_GET['rpl']=="m_rak" and $_SESSION['user_akses']==10){
				include "phpadmin/m_rak.php";
				}
				else if($_GET['rpl']=="m_buku" and $_SESSION['user_akses']==10){
				include "phpadmin/m_buku.php";
				}
				else if($_GET['rpl']=="m_denda" and $_SESSION['user_akses']==10){
				include "phpadmin/m_denda.php";
				}
				else if($_GET['rpl']=="m_pengaturan" and $_SESSION['user_akses']==10){
				include "phpadmin/m_pengaturan.php";
				}
				//---head menu master selesai-----
				
				
				//---head menu transaksi mulai-----
				else if($_GET['rpl']=="peminjaman_buku" and $_SESSION['user_akses']==10){
				include "phptransaksi/peminjaman.php";
				}
				else if($_GET['rpl']=="pengembalian_buku" and $_SESSION['user_akses']==10){
				include "phptransaksi/pengembalian.php";
				}
				//---head menu transaksi selesai-----
				
				//---head menu profil mulai-----
				else if($_GET['rpl']=="profil" and $_SESSION['tranz']=="penulis"){
				include "phpprofil/profil.php";
				}
				else if($_GET['rpl']=="profil" and $_SESSION['user_akses']==10){
				include "phpprofil/profil.php";
				}
				else if($_GET['rpl']=="friend" and $_SESSION['tranz']=="penulis"){
				include "phpprofil/friendprofil.php";
				}
				else if($_GET['rpl']=="teman" and $_SESSION['tranz']=="penulis"){
				include "phpprofil/teman.php";
				}
				else if($_GET['rpl']=="teman" and $_SESSION['user_akses']==10){
				include "phpprofil/teman.php";
				}
				else if($_GET['rpl']=="myfriend" and $_SESSION['user_akses']==10){
				include "phpprofil/prof.php";
				}
				else if($_GET['rpl']=="myfriend" and $_SESSION['tranz']=="penulis"){
				include "phpprofil/prof.php";
				}
				//---head menu profil selesai-----
				
				//---head menu laporan mulai-----
				else if($_GET['rpl']=="laporan_peminjaman" and $_SESSION['user_akses']==10){
				include "phplaporan/laporanpeminjaman.php";
				}
				else if($_GET['rpl']=="laporan_buku" and $_SESSION['user_akses']==10){
				include "phplaporan/laporan_buku.php";
				}
				//---head menu profil selesai-----
				
				//---head menu artikel mulai-----
				else if($_GET['rpl']=="tulis_artikel" and $_SESSION['tranz']=="penulis"){
				include "phpartikel/tulis.php";
				echo "<script type=text/javascript src=ckeditor/ckeditor.js></script>";

				}
				else if($_GET['rpl']=="tulis_artikel" and $_SESSION['user_akses']==10){
				include "phpartikel/tulis.php";
				echo "<script type=text/javascript src=ckeditor/ckeditor.js></script>";

				}
				else if($_GET['rpl']=="baca_artikel"){
				include "phpartikel/baca_artikel.php";
				}
				else if($_GET['rpl']=="artikel_saya" and $_SESSION['tranz']=="penulis"){
				include "phpartikel/saya.php";
				}
				else if($_GET['rpl']=="artikel_saya" and $_SESSION['user_akses']==10){
				include "phpartikel/saya.php";
				}
				else if($_GET['rpl']=="daftar_artikel"){
				include "phpartikel/daftar.php";
				echo "<script type=text/javascript src=js/modern/pagecontrol.js></script>";

				}
				else if($_GET['rpl']=="ubah"){
				echo "<script type=text/javascript src=ckeditor/ckeditor.js></script>";
				include "phpartikel/ubah.php";
				}
				else if($_GET['rpl']=="semua_artikel"){
				include "phpartikel/semua.php";
				}
				
				//---head menu artikel selesai-----
				
				//---head menu penulis mulai-----
				else if($_GET['rpl']=="mendaftar_penulis"){
				include "phppenulis/mendaftar.php";
				}
				else if($_GET['rpl']=="daftar_penulis"){
				include "phppenulis/daftar.php";
				}
				else if($_GET['rpl']=="hak_penulis"){
				include "phppenulis/hak.php";
				}
				//---head menu penulis selesai-----
				
				//---head menu buku mulai-----
				else if($_GET['rpl']=="bukupenulis"){
				include "phpbuku/buku.php";
				}
				else if($_GET['rpl']=="rak_buku"){
				include "phpbuku/rak.php";
				}
				else if($_GET['rpl']=="tulis_buku"){
				include "phpbuku/tulis.php";
				}
				else if($_GET['rpl']=="perhal"){
				include "phpbuku/perhal.php";
				}
				else if($_GET['rpl']=="detail"){
				include "phpbuku/detail.php";
				}
				else if($_GET['rpl']=="kelolabuku"){
				include "phpbuku/kelola.php";
				}
				//---head menu buku selesai-----
				
				//---head menu akun mulai-----
				else if($_GET['rpl']=="pengaturan" and $_SESSION['tranz']=="penulis"){
				echo "<script type=text/javascript src=jscolor/jscolor.js></script>";
				include "phppengaturan/pengaturan.php";
				}
				else if($_GET['rpl']=="pengaturan" and $_SESSION['user_akses']==10){
				include "phppengaturan/pengaturan.php";
				}
				//---head menu akun selesai-----
				
				//---head menu salah mulai-----
				else if($_GET['rpl']=="artikel"){
				include "phpsalah/timeline.php";
				}
				else if($_GET['rpl']=="status"){
				include "phpsalah/status.php";
				}
				else if($_GET['rpl']=="bukuonline"){
				include "phpsalah/bukuonline.php";
				}
				else if($_GET['rpl']=="detstat"){
				include "phpsalah/detstat.php";
				}
				//---head menu salah selesai-----
				
				//---head menu saran mulai-----
				else if($_GET['rpl']=="kotaksaran"){
				include "phpsaran/kotaksaran.php";
				}
				//---head menu saran selesai-----
				
				//---head menu detik mulai-----
				else{
					$detik = date("s");
					if($detik%3==1){
					include "phpsalah/status.php";
					}
					else if($detik%3==0){
					include "phpsalah/timeline.php";
					}
					else if($detik%3==2)
					{
					include "phpsalah/bukuonline.php";
					}
				}
				//---head menu detik selesai-----

				?>
				</div>
				
			</body>
		</html>
		<?php
	
	
	
	}
	else if(empty($_SESSION['username']))
	{
	//-------------------Jika session masuk belum ada, akan dibuka login.php lah pastinya
	include "login.php";
	
	}
?>