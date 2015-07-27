<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>3D Book Showcase</title>
		<meta name="description" content="3D Book Showcase with CSS 3D Transforms" />
		<meta name="keywords" content="3d transforms, css3 3d, book, jquery, open book, css transitions" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container" style="margin-top:150px;">	
			<!-- Codrops top bar -->
			<div class="main">
				<ul id="bk-list" class="bk-list clearfix">
				
				<?php
				
				?>
					<li>
					<style>
					/* Buku */
					.book-1 .bk-front > div,
					.book-1 .bk-back,
					.book-1 .bk-left,
					.book-1 .bk-front:after {
						background-color: #ff924a;
					}

					.book-1 .bk-cover {
						background-image: url(../images/1.png);	
						background-repeat: no-repeat;
						background-position: 10px 40px;
					}

					.book-1 .bk-cover h2 {
						position: absolute;
						bottom: 0;
						right: 0;
						left: 0;
						padding: 30px;
						background: rgba(255,255,255,0.2);
						color: #fff;
						text-shadow: 0 -1px 0 rgba(0,0,0,0.1);
					}

					.book-1 .bk-cover h2 span:first-child,
					.book-1 .bk-left h2 span:first-child {
						text-transform: uppercase;
						font-weight: 400;
						font-size: 13px;
						padding-right: 20px;
					}

					.book-1 .bk-cover h2 span:first-child {
						display: block;
					}

					.book-1 .bk-cover h2 span:last-child,
					.book-1 .bk-left h2 span:last-child {
						font-family: "Big Caslon", "Book Antiqua", "Palatino Linotype", Georgia, serif;
					} 

					.book-1 .bk-content p {
						font-family: Georgia, Times, "Times New Roman", serif;
					}

					.book-1 .bk-left h2 {
						color: #fff;
						font-size: 15px;
						line-height: 40px;
						padding-right: 10px;
						text-align: right;
					}

					.book-1 .bk-back p {
						color: #fff;
						font-size: 13px;
						padding: 40px;
						text-align: center;
						font-weight: 700;
					}
					</style>
						<div class="bk-book book-1 bk-bookdefault">
							<div class="bk-front">
								<div class="bk-cover">
									<h2>
										<span>Anthony Burghiss</span>
										<span>A Catwork Orange</span>
									</h2>
								</div>
								<div class="bk-cover-back"></div>
							</div>
							<div class="bk-page">
								<div class="bk-content bk-content-current">
									<p>Red snapper Kafue pike fangtooth humums slipmouth, salmon cutlassfish; swallower European perch mola mola sunfish, threadfin bream. Billfish hog sucker trout-perch lenok orbicular velvetfish. Delta smelt striped bass, medusafish dragon goby starry flounder cuchia round whitefish northern anchovy spadefish merluccid hake cat shark Black pickerel. Pacific cod.</p>
								</div>
								<div class="bk-content">
									<p>Whale catfish leatherjacket deep sea anglerfish grenadier sawfish pompano dolphinfish carp large-eye bream, squeaker amago. Sandroller; rough scad, tiger shovelnose catfish snubnose parasitic eel? Black bass soldierfish duckbill--Rattail Atlantic saury Blind shark California halibut; false trevally warty angler!</p>
								</div>
								<div class="bk-content">
									<p>Trahira giant wels cutlassfish snapper koi blackchin mummichog mustard eel rock bass whiff murray cod. Bigmouth buffalo ling cod giant wels, sauger pink salmon. Clingfish luderick treefish flatfish Cherubfish oldwife Indian mul gizzard shad hagfish zebra danio. Butterfly ray lizardfish ponyfish muskellunge Long-finned sand diver mullet swordfish limia ghost carp filefish.</p>
								</div>
							</div>
							<div class="bk-back">
								<p>In this nightmare vision of cats in revolt, fifteen-year-old Alex and his friends set out on a diabolical orgy of robbery, rape, torture and murder. Alex is jailed for his teenage delinquency and the State tries to reform him - but at what cost?</p>
							</div>
							<div class="bk-right"></div>
							<div class="bk-left">
								<h2>
									<span>Anthony Burghiss</span>
									<span>A Catwork Orange</span>
								</h2>
							</div>
							<div class="bk-top"></div>
							<div class="bk-bottom"></div>
						</div>
						<div class="bk-info">	
							<button class="bk-bookview">View inside</button>
						</div>
					</li>
				</ul>
			</div>
		</div><!-- /container -->
		<script src="js/books1.js"></script>
		<script>
			$(function() {

				Books.init();

			});
		</script>
	</body>
</html>
