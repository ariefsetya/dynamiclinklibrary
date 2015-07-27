<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
include "phpcon/link.php";
?>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
var auto_refresh2 = setInterval(
function ()
{
$('#load_level').load('hitung.php').fadeIn("fast");
}, 100); // refresh every 10000 milliseconds


var auto_refresh = setInterval(
function ()
{
$('#load_penulis').load('penulis.php').fadeIn("fast");
}, 100); // refresh every 10000 milliseconds

</script>
<div id="load_level"></div>
<body>
<div id="load_penulis"></div>
</body>


