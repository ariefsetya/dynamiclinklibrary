<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
$time = mysql_query("select*from artikel order by id desc limit 0,19");
$a = 1;

function text_limit($str,$limit=10)
	{
    if(stripos($str," ")){
    
	  $ex_str = explode(" ",$str);
	  if(count($ex_str)>$limit){
		for($i=0;$i<$limit;$i++){
		 $str_s.=$ex_str[$i]." ";
		}
	   return $str_s;
	   }else{
		return $str;
	   }
	  }else{
	  return $str;
		}
	}

while($row = mysql_fetch_array($time)){

if($a==1){
?>
	<style>
	.line1{
	width:100%;
	height:auto;
	display:block;
	position:relative;
	padding:5px 5px 5px 5px;
	overflow:hidden;
	}
	.line1 img{
	width:40%;
	height:40%;
	display:table;
	}
	.line1 p{
	align:justify;
	}
	
	</style>
<?php
}
else if($a>1 and $a<11){
?>
	<style>
	.line<?php echo $a;?>{
	width:33.33%;position:relative;float:left;
	padding:5px 5px 5px 5px;
	overflow:hidden;
	}
	.line<?php echo $a;?> img{
	width:30%;
	height:30%;
	overflow:hidden;
	display:block;
	}
	.line<?php echo $a;?> p{
	align:justify;
	}
	
	</style>
<?php
}

?>

<div class="line<?php echo $a;?>">
<?php 
if($a == 1){
?>
<a href="redir.php?art=<?php echo $row[id];?>"><h2><?php echo $row['nama'];?></h2></a>
<?php
echo text_limit($row[isi],100)."..."." <a href=redir.php?art=$row[id]".">"."Selengkapnya</a>";
}
else if($a>1 and $a<11){
echo "<a href=redir.php?art=$row[id]>".$row['nama']."</a><br>";
echo text_limit($row[isi],30)."..."." <a href=redir.php?art=$row[id]>"."Selengkapnya</a>";
}
else
{
if($a==11){
echo "<h3>Artikel Lainnya</h3>";
}
echo "&nbsp;> <a href=redir.php?art=$row[id]>".$row['nama']."</a>";
}
?>
</div>
<?php
$a++;
}
}
?>