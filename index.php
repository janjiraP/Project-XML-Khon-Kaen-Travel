<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Khon Kaen Attractions attractions</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="css/full-slider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/form-elements.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">	
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-1">
	  <div class="container">
		<a class="navbar-brand" href="index.php"><img src="image/logo.png" alt="logo"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
		 aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item my-auto mx-2 active">
					<a class="nav-link" href="index.php">Home
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item my-auto mx-2">
					<a class="nav-link" href="about.php">About</a>
				</li>
				<?php
				// เช็คเงื่อนไข ถ้ายังไม่ Login ให้โชว์ปุ่ม Login
					  if(!isset($_SESSION["isAuth"]) && empty($_SESSION["isAuth"])) {
						  echo '<li class="nav-item mx-2"> 
									  <a class="nav-link" href="login.php"> 
										<button type="button" class="btn btn-success btn-sm">
											Login
										</button>
									</a>
								</li>';
					  }
				  ?>
				<?php
				// เช็คเงื่อนไข ถ้า Login แล้ว ให้โชว์ปุ่ม Logout
					  if(isset($_SESSION["isAuth"]) && !empty($_SESSION["isAuth"])) {
						if($_SESSION["isAuth"]==true){
						  echo '<li class="nav-item mx-2"> 
									  <a class="nav-link" href="logout.php"> 
										  <button type="button" class="btn btn-success btn-sm">
											  Logout
										  </button>
									  </a>
								  </li>';
						}
					  }
				?>
			</ul>
		</div>
		</div>
	</nav>
	<header>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100 h-100" src="image/slide01.png" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100  h-100 " src="image/slide02.png" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100  h-100 " src="image/slide03.png" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</header>

	<!-- Page Content -->
	<div class="py-5">
		<div class="container">
			<?php
			// ทำการตรวจสอบว่า Login หรือยัง ถ้า Login แล้ว ให้โชว์ปุ่ม Add attractions ถ้ายัง ก็ให้ออกจาก Loop ไปเลย
          		if(isset($_SESSION["isAuth"]) && !empty($_SESSION["isAuth"])) {
            
            		if($_SESSION["isAuth"]==true){
            ?>
						<a href="add.php">
							<button type="button" class="btn btn-warning">
								<i class="fa fa-plus-circle"></i> Add attractions
							</button>
						</a>

						<a href="searchform.php">
							<button type="button" class="btn btn-success">
								<i class="fa fa-search"></i> ค้นหา
							</button>
						</a>
						

			<?php
            		}
          		}
          	?>
			<div class="mb-5">
				<h1>KHON KEAN TRAVEL</h1>
				<p>	เว็บไซต์ของเราเป็นเว็บแสดงเนื้อหาเกี่ยวกับการท่องเที่ยวโดยเนื้อหาจะประกอบด้วยสถานที่หลากหลายรูปแบบ
					ในจังหวัดขอนแก่นโดยเรารวบรวมเอาสถานที่เด่นๆภายในจังหวัดขอนแก่นและง่ายต่อการเดินทาง โดยสถานที่ส่วนใหญ่เป็นสถานที่ 
					ที่เหมะต่อการพักผ่อน และเราได้รวบรวมสถานที่ ที่แสดงถึงวัฒนธรรมภายในจังหวัดเนื้อหาภายในมีการอธิบายถึงความเป็นมา อีกด้วย
				</p>
			</div>
			<div class="row">

				<?php
				// ___________________________วน Loop แสดงค่า Detail List___________________________

				$attraction_xml = "data/attractions.xml";
				$doc = new DOMDocument();
				$doc->load($attraction_xml);

				$attractions = $doc->getElementsByTagName("attraction");
				foreach( $attractions as $attraction ){
				
				?>

				<div class="col-lg-4 mb-3">
				<table>
					<tr>
						<td>
						<!-- ___________________________แก้ไขข้อมูล___________________________ -->
							<?php

								if(isset($_SESSION["isAuth"]) && !empty($_SESSION["isAuth"])) {
							
									if($_SESSION["isAuth"]==true){
							?>
							<a href="editform.php?id=<?php echo $attraction->getAttribute('id'); ?>">
								<button type="button" class="btn btn-outline-success">Edit</button>
							</a>
							<?php
									}
								}
							?>
						</td>
						<td>
						<!-- ___________________________ลบข้อมูล___________________________ -->
						<?php

							if(isset($_SESSION["isAuth"]) && !empty($_SESSION["isAuth"])) {
						
								if($_SESSION["isAuth"]==true){
						?>
							<form action="deletedata.php" method="POST">
								<input type="hidden" name="attractionId" value="<?php echo $attraction->getAttribute('id'); ?>">

								<button type="submit" class="btn btn-outline-success">Delet</button>
							</form>

						<?php
								}
							}
						?>

					</td>
				</tr>

				</table>
				<!-- ___________________________Show Detail List___________________________ -->
					<a href="detail.php?id=<?php echo $attraction->getAttribute('id'); ?>">
						<div class="card">
							<img class="card-img-top img-fix" src="
								<?php 
								$imageURL = $attraction->getElementsByTagName("imageURL");
								$imageURL = $imageURL->item(0)->nodeValue;
								echo $imageURL; 
								?>" class="img-fluid w-100 h-100 img-head">

							<div class="card-body">
								<p class="card-text">
									<?php 
								$name = $attraction->getElementsByTagName("name");
								$name = $name->item(0)->nodeValue;
								echo $name; 
								?>
								</p>
							</div>
						</div>
					</a>
				</div>

				<?php
				}
				?>
			</div>
		</div>
	</div>


	<!-- Footer -->
	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
		</div>
		<!-- /.container -->
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>