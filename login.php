<?php
session_start();
if(!empty($_SESSION['id'])){
header("location:index.php");
}else{
if(isset($_POST['daftar'])){
$r = mysql_query("select username from akun where username='".htmlentities($_POST[nama_pengguna])."'");
$a = mysql_fetch_array($r);
$nis = mysql_query("select nis from detail_akun where nis='$_POST[nis]'");
$ro = mysql_fetch_array($nis);
if(empty($a['username'])){
if(empty($ro['nis'])){
$nampeng = htmlentities($_POST[nama_pengguna]);
$pass = md5(htmlentities($_POST['kata_sandi']));
mysql_query("insert into enkrip values('".htmlentities($_POST[kata_sandi])."','$pass')");
mysql_query("insert into akun values('','$nampeng','$pass','1')");
mysql_query("insert into detail_akun values('','".htmlentities($_POST[nama_depan])."','".htmlentities($_POST[nama_belakang])."','".htmlentities($_POST[nis])."','".htmlentities($_POST[email])."','','','','','','')");
mysql_query("insert into detail_tampilan values('','#2d89ef','7','#fff','#fff','pengguna','#2d89ef','#fff','#fff','#2d89ef')");
echo "<script>alert('Selamat, Anda berhasil mendaftar, silahkan Masuk')</script>";
}else{
echo "<script>alert('Maaf, NIS Anda telah terdaftar')</script>";
}
}
else
{
echo "<script>alert('Maaf, silahkan gunakan Nama Pengguna yang lain')</script>";
}
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>dynamic.Link</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration" />
        <meta name="keywords" content="dynamic.Link" />
        <meta name="author" content="dynamic.Link" />    
		<!-- icon library-->
		<link rel="shortcut icon" href="icon.png">
		<!-- CSS login-->
		<link rel="stylesheet" type="text/css" href="css/login.css"/>
	</head>
<body style="background-image:url(images/egg.png)">
        <!--container_12 start here-->
		<div class="container_12">
  
		<!--grid_12 start here-->
		<div class="grid_12"> 
		
		<!--logo_container start here-->
	<div id="logo_container"> <a id="logo"></a>
		<div class="clear"></div>
    </div>
    <!--logo_container end here-->
	</div>
    <!--grid_12 end here-->
	<div class="clear"></div>	
		</div>
		<br>
		<br>
	<div class="container_12">
<div class="grid_7">
	<img src="images/slide1.jpg" width="550" height="360"/>
</div>	<!-- End here grid 7 -->
<div class="grid_5">
		<!-- register user smkn10 -->
		<div class="content">
			<div id="form_wrapper" class="form_wrapper">
				<form class="register" action="" method="POST">
				<h3>Sign up</h3>
				<?php
				if($_GET['daftar']=="success"){
				?>
				<script>alert('Akun berhasil dibuat, silahkan Masuk');</script>
				<?php
				}
				?>			
					<div class="column">
						<div>
							<label>First Name:</label>
							<input type="text" name="nama_depan" required="true"/>
							<span class="error">This is an error</span>
						</div>			
						<div>
							<label>Last Name:</label>
							<input type="text" name="nama_belakang" required="true"/>
							<span class="error">This is an error</span>
						</div>				
						<div>
							<label>Your NIS:</label>
							<input type="text" name="nis" required="true"/>
							<span class="error">This is an error</span>
						</div>			
					</div>			
					<div class="column">
						<div>
							<label>Username:</label>
							<input type="text" name="nama_pengguna" required="true"/>
							<span class="error">This is an error</span>
						</div>				
						<div>
							<label>Email:</label>
							<input type="text" name="email" required="true"/>
							<span class="error">This is an error</span>
						</div>				
						<div>
							<label>Password:</label>
							<input type="password" name="kata_sandi" required="true"/>
							<span class="error">This is an error</span>
						</div>
					</div>			
					<div class="bottom" style="padding-top:10px;padding-right:10px;">	
						<button type="submit" name="daftar" style="width:100px;height:40px;float:right;border-radius:10px;-o-border-radius:10px;-webkit-border-radius:10px;-moz-border-radius:10px;-ms-border-radius:10px;" >Sign Up</button>
							<a href="index.html" rel="login" class="linkform">You have an account already? Sign in here</a>				
							<div class="clear"></div>
					</div>		
				</form>	
		<!-- register all user end here-->
		<?php
		if($_GET['rpl']=="galau"){
		echo "<script>alert('Nama Pengguna atau Kata Sandi Anda mungkin salah, silahkan ulangi lagi');</script>";
		}
		?>
		<!-- Login all user -->			
				<form class="login active" method="POST" action="proses.php">
					<h3>Sign in</h3>	
						<div>
							<label>Username:</label>
							<input type="text" name="nama_pengguna" required="true"/>
							<span class="error">This is an error</span>
						</div>	
						<div>
							<label>Password: <a href="forgot_password.html" rel="forgot_password" class="forgot linkform">Forgot your password?</a></label>
							<input type="password" name="kata_sandi" required="true"/>
							<span class="error">This is an error</span>
						</div>	
						<div class="bottom" style="padding-top:10px;padding-right:10px;">
							<button type="submit"  style="width:100px;height:40px;float:right;border-radius:10px;-o-border-radius:10px;-webkit-border-radius:10px;-moz-border-radius:10px;-ms-border-radius:10px;" name="submit">Login</button>
							<a href="register.html" rel="register" class="linkform">Not yet have Account ? Sign up here</a>
							<div class="clear"></div>
						</div>
				</form>
				<!-- Login all user -->
				<form class="forgot_password">
					<h3>Forgot Password</h3>
						<div>
							<label>Username or Email:</label>
							<input type="text" />
							<span class="error">This is an error</span>
						</div>
						<div class="bottom">
							<input type="submit" value="Send reminder"></input>
							<a href="index.html" rel="login" class="linkform">Suddenly remebered? Sign in here</a>
							<a href="register.html" rel="register" class="linkform">Not yet have Account ? Sign up here</a>
							<div class="clear"></div>
						</div>
				</form>
			</div>
		</div>
	</div> <!-- end here grid 5 -->
	<div class="container_12" style="padding-top:400px;font-size:15pt;">
	<center>Copyright 2013 dynamic.Link</center>
	</div>
	</div>
	

	<!-- end container 12 -->
<!-- ------- jquery ------------------------------------------------------------------------ -->
	<script src="jquery/1.8.3/jquery.min.js"></script>		
<!-- ------- Script form ------------------------------------------------------------------------------------------- -->
<!-- The JavaScript -->
		<script type="text/javascript">
			$(function() {
				//the form wrapper (includes all forms)
				var $form_wrapper	= $('#form_wrapper'),
					//the current form is the one with class active
					$currentForm	= $form_wrapper.children('form.active'),
					//the change form links
					$linkform		= $form_wrapper.find('.linkform');
				//get width and height of each form and store them for later						
				$form_wrapper.children('form').each(function(i){
					var $theForm	= $(this);
					//solve the inline display none problem when using fadeIn fadeOut
					if(!$theForm.hasClass('active'))
						$theForm.hide();
					$theForm.data({
						width	: $theForm.width(),
						height	: $theForm.height()
					});
				});
				//set width and height of wrapper (same of current form)
				setWrapperWidth();
				/*
				clicking a link (change form event) in the form
				makes the current form hide.
				The wrapper animates its width and height to the 
				width and height of the new current form.
				After the animation, the new form is shown
				*/
				$linkform.bind('click',function(e){
					var $link	= $(this);
					var target	= $link.attr('rel');
					$currentForm.fadeOut(400,function(){
						//remove class active from current form
						$currentForm.removeClass('active');
						//new current form
						$currentForm= $form_wrapper.children('form.'+target);
						//animate the wrapper
						$form_wrapper.stop()
									 .animate({
										width	: $currentForm.data('width') + 'px',
										height	: $currentForm.data('height') + 'px'
									 },500,function(){
										//new form gets class active
										$currentForm.addClass('active');
										//show the new form
										$currentForm.fadeIn(400);
									 });
					});
					e.preventDefault();
				});
				function setWrapperWidth(){
					$form_wrapper.css({
						width	: $currentForm.data('width') + 'px',
						height	: $currentForm.data('height') + 'px'
					});
				}
				/*
				for the demo we disabled the submit buttons
				if you submit the form, you need to check the 
				which form was submited, and give the class active 
				to the form you want to show
				*/
				$form_wrapper.find('input[type="submit"]')
							 .click(function(e){
								e.preventDefault();
							 });	
			});
        </script>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------- -->

</body>
</html>
<?php
}
?>