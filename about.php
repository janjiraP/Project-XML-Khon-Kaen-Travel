<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Khon Kaen Attractions Reviews</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
	<!-- Custom styles for this template -->
    <link href="css/full-slider.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/form-elements.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">	
	

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
				<li class="nav-item my-auto mx-2">
					<a class="nav-link" href="index.php">Home
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item my-auto mx-2 active">
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

			<div class="row">
                <div class="col-lg-2 mb-3"></div>
                <div class="col-lg-4 mb-3">
                    <img style="height: 250px;" src="image/jiab.jpg" alt="Jiab">
                </div>
                <div class="col-lg-4 mb-3">
                    <p></p>
                    <p>รหัสนักศึกษา : 593020485-3</p>
                    <p>ชื่อ : นางสาวจันทร์จิรา ผดุงเวียง</p>
                    <p>อีเมล : Janjirappr@kkumail.com</p>
                    <p>Facebook : <a href="https://www.facebook.com/janjira.padungwiang">Janjira Padungwiang</a></p>
                </div>
                <div class="col-lg-2 mb-3"></div>
            </div>
            
			<div class="row">
                <div class="col-lg-2 mb-3"></div>
                <div class="col-lg-4 mb-3">
                    <img style="height: 250px;" src="image/tan.jpg" alt="tan">
                </div>
                <div class="col-lg-4 mb-3">
                    <p></p>
                    <p>รหัสนักศึกษา : 593020510-0</p>
                    <p>ชื่อ : นายภาณุพงศ์ ชัยศร</p>
                    <p>อีเมล : panupongc@kkumail.com</p>
                    <p>Facebook : <a href="https://www.facebook.com/phanuphong.chaison">TanKhun Panupong</a></p>
                </div>
                <div class="col-lg-2 mb-3"></div>
            </div>
                        
			<div class="row">
                <div class="col-lg-2 mb-3"></div>
                <div class="col-lg-4 mb-3">
                    <img style="height: 250px;" src="image/nune.jpg" alt="nune">
                </div>
                <div class="col-lg-4 mb-3">
                    <p></p>
                    <p>รหัสนักศึกษา : 593020831-0</p>
                    <p>ชื่อ : นางสาวพัฑฒิดา ตาดไธสง</p>
                    <p>อีเมล : pattida.t@kkumail.comll</p>
                    <p>Facebook : <a href=""></a>Pattida Nune</p>
                </div>
                <div class="col-lg-2 mb-3"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 mb-3"></div>
                <div class="col-lg-4 mb-3">
                    <img style="height: 250px;" src="image/jas.jpg" alt="Jiab">
                </div>
                <div class="col-lg-4 mb-3">
                    <p></p>
                    <p>รหัสนักศึกษา : 593021290-3</p>
                    <p>ชื่อ : นายเจษฎา สมศรี</p>
                    <p>อีเมล : </p>
                    <p>Facebook : <a href="https://www.facebook.com/Jatsada.somsri">Somsri Jatsada</a></p>
                </div>
                <div class="col-lg-2 mb-3"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 mb-3"></div>
                <div class="col-lg-4 mb-3">
                    <img style="height: 250px;" src="image/nut.jpg" alt="Jiab">
                </div>
                <div class="col-lg-4 mb-3">
                    <p></p>
                    <p>รหัสนักศึกษา : 593021295-3</p>
                    <p>ชื่อ : นายณัฐวุฒิ หมู่หัวนา</p>
                    <p>อีเมล : M_natthawut@kkumail.com</p>
                    <p>Facebook : <a href="https://www.facebook.com/nuth.ta"></a>Natha NewNuttha</p>
                </div>
                <div class="col-lg-2 mb-3"></div>
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