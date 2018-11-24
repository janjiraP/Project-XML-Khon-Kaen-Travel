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
			<a class="navbar-brand" href="index.php">
				<img src="image/logo.png" alt="logo">
			</a>
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

	<!-- Page Content -->
	<div class="py-5 body-hight">
		<div class="container">
			<?php
			// ทำการตรวจสอบว่า Login หรือยัง ถ้า Login แล้ว ให้โชว์ปุ่ม Add attractions ถ้ายัง ก็ให้ออกจาก Loop ไปเลย
          		if(isset($_SESSION["isAuth"]) && !empty($_SESSION["isAuth"])) {
            
            		if($_SESSION["isAuth"]==true){
            ?>
				<center class="mb-5 pb-5">
					<div class="col-5">
						<form class="input-group" action="" method="post">
							<input type="text" class="border form-control" name="name" placeholder="ค้นหาชื่อสถานที่" aria-describedby="basic-addon1">
							<button type="submit"  class="btn btn-outline-success" class="input-group-text">
								<i class="fa fa-search"></i>
							</button>
						</form>
					</div>
				</center>
			<?php
            		}
          		}
          	?>


			<center>
				<div class="container-fluid bg-3 text-center">
					<div class="row">
						<?php
							$name = "";
							if($_SERVER["REQUEST_METHOD"] == "POST") {
							$name = $_POST["name"];
							}

							$doc = new DOMDocument();
							$doc->load("data/attractions.xml");

							$xpath = new DOMXPath($doc);
							$query = '/attractions/attraction[name="'.$name.'"]';

							$result = $xpath->query($query);
							
							foreach( $result as $attraction ){
						?>

						<div class="col-lg-4 mb-3 mx-auto">
							<div class="thumbnail">
								<div class="img-resize">
									<a href="detail.php?id=<?php echo $attraction->getAttribute('id'); ?>">
										<div class="card">
											<img class="card-img-top img-fix" src="<?php 
										$imageURL = $attraction->getElementsByTagName("imageURL");
										$imageURL = $imageURL->item(0)->nodeValue;
										echo $imageURL; ?>" class="img-fluid w-100 h-100 img-head">

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
							</div>
						</div>

						<?php
							}

						?>
					</div>
				</div>
			</center>




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