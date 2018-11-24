<?php 
	include 'function.php';

	if($_SERVER["REQUEST_METHOD"] == "GET") {
		$id = $_GET["id"];
		$name = '';
		$imageURL = '';
		$detail = '';

		getAttractionById($id, $name, $imageURL, $detail);
	} 
?>

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
	<link rel="stylesheet" href="css/style.css">


</head>

<body>
	<div id="LoginForm">
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
		<div class="py-5">
			<div class="container">
				<div>
					<div class="row">
						<div class="col-sm-8 mx-auto">
							<div class="form-box">
								<div class="form-top">
									<div class="form-top mt-3">
										<h3 class="text-center">Edit attractions</h3>
									</div>
								</div>
								<div class="form-bottom">
									<form role="form" action="editdata.php" method="post" class="login-form">
									<input type="hidden" value="<?php echo $id?>" name="attractionId">
										<div class="form-group">
											<label class="sr-only" for="form-username">ชื่อสถานที่</label>
											<input type="text" id="nameFacility" name="nameFacility" placeholder="ชื่อสถานที่..." class="form-username form-control" value="<?php echo $name;?>">
										</div>
										<div class="form-group">
											<label class="sr-only" for="form-password">รูปภาพ</label>
											<input type="text" id="imageURL" name="imageURL" placeholder="URL รูปภาพ..." class="form-password form-control" value="<?php echo $imageURL;?>">
										</div>
										<div class="form-group">
											<label class="sr-only" for="form-password">รายละเอียด</label>
											<textarea name="discription" id="discription" class="form-control" rows="10" placeholder="รายระเอียด..."><?php echo $detail;?></textarea>
										</div>
										<button type="submit" class="btn">Edit attractions</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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