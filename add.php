<?php 
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $namefac = $_POST["naneFacility"];
        $discription = $_POST["discription"];
        $image = $_POST["imageURL"];
        $attraction_xml = "data/attractions.xml";

        $dom = new DOMDocument();
        $dom->load($attraction_xml);
        $attractions = $dom->documentElement;

		// $id = $dom->getElementsByTagName('attraction')->length;
		$xpath = new DOMXPath($dom);

		$result = $xpath->query('/attractions/attraction[last()]');

		$attraction = $dom->createElement('attraction');

		// แก้บัค หากลบสถานที่จนเหลือ 0 แล้ว จะไม่ error
		if($result->length > 0){
			$id = $result->item(0)->getAttribute('id');
        	$attraction->setAttribute('id', $id + 1);
		}else {
			$attraction->setAttribute('id', '1');
		}
		
        $name = $dom->createElement('name');
        $text = $dom->createTextNode($namefac);
        $name->appendChild($text);
        $attraction->appendChild($name);

        $detail = $dom->createElement('detail');
        $text = $dom->createTextNode($discription);
        $detail->appendChild($text);
        $attraction->appendChild($detail);

        $imageURL = $dom->createElement('imageURL');
        $text = $dom->createTextNode($image);
        $imageURL->appendChild($text);
        $attraction->appendChild($imageURL);

        $comments = $dom->createElement('comments');
        $attraction->appendChild($comments);

        $attractions->appendChild($attraction);

        $dom->save($attraction_xml);
    
        header('Location: /index.php');
        exit(0);
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
		<div class="py-5">
			<div class="container">
				<div>
					<div class="row">
						<div class="col-sm-8 mx-auto">
							<div class="form-box">
								<div class="form-top">
									<div class="form-top mt-3">
										<h3 class="text-center">Add attractions</h3>
									</div>
								</div>
								<div class="form-bottom">
									<form role="form" action="" method="post" class="login-form">
										<div class="form-group">
											<label class="sr-only" for="form-username">ชื่อสถานที่</label>
											<input type="text" name="naneFacility" placeholder="ชื่อสถานที่..." class="form-username form-control">
										</div>
										<div class="form-group">
											<label class="sr-only" for="form-password">รูปภาพ</label>
											<input type="text" name="imageURL" placeholder="URL รูปภาพ..." class="form-password form-control">
										</div>
										<div class="form-group">
											<label class="sr-only" for="form-password">รายละเอียด</label>
											<textarea name="discription" class="form-control" rows="10" placeholder="รายระเอียด..."></textarea>
										</div>

										<button type="submit" class="btn">
											<i class="fa fa-plus-circle"></i> Add attractions</button>
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