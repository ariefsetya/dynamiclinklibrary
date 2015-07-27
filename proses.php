<?php
    include "phpcon/link.php";
    $username = $_POST['nama_pengguna'];
    $password = md5($_POST['kata_sandi']);    
    $login = mysql_query("SELECT * FROM akun WHERE username='".htmlentities($username)."' AND password='$password'");
    $hasil = mysql_num_rows($login);
	

    $r = mysql_fetch_array($login);
	$ss = mysql_query("select*from detail_tampilan where id_aku='$r[id]'");
	$ee = mysql_fetch_array($ss);
	if ($hasil > 0)
    {
	
    $d = date("d");
	$m = date("m");
	$y = date("Y");
	$h = date("H");
	$i = date("i");
	$s = date("s");
	$ada = mysql_query("select*from terakhirmasuk where id_akun='$r[id]'");
	$masuk = mysql_fetch_array($ada);
	$ip = GETENV('REMOTE_ADDR');

	if(empty($masuk['id_akun'])){
	mysql_query("insert into terakhirmasuk values('$r[id]','$h','$i','$s','$d','$m','$y','$ip')");
	}
	else if(!empty($masuk['id_akun'])){
	mysql_query("update terakhirmasuk set ip='$ip', jam='$h',menit='$i',detik='$s',tgl='$d',bln='$m',tahun='$y' where id_akun='$r[id]'");
	}

      session_start();
      session_register("id");
      session_register("username");
      session_register("password");
      session_register("user_akses");
	  session_register("tranz");
	  session_register("navbar");
	  session_register("background");
	  session_register("awal");
	  session_register("limitan");
      $_SESSION['id']     = $r['id'];
      $_SESSION['username']     = $r['username'];
      $_SESSION['password']     = $r['password'];
      $_SESSION['user_akses']    = $r['user_akses'];
      $_SESSION['navbar']    = $ee['navbar'];
      $_SESSION['background']    = $ee['background'];
	  $_SESSION['tranz'] = $ee['pas'];
	  $_SESSION['awal'] = 0;
	  $_SESSION['limitan'] = $ee['maxindex'];
      header('location:index.php');
    }
    else{ 
		header("location:index.php?rpl=galau");
	}
?>