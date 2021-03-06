<?php session_start();
include 'management/account.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST["username"];
        $password = $_POST["password"];

        addUser($username,$password);
        
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
	<link href="css/login.css" rel="stylesheet">

	<link rel="stylesheet" href="css/form-elements.css">
	<link rel="stylesheet" href="css/style.css">


</head>

<body>
	<div id="LoginForm">
		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 fixed-top">
			<div class="container">
				<a class="navbar-brand" href="index.php"><img src="image/logo.png" alt="logo"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
				 aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

			</div>
		</nav>

		<!-- Page Content -->
		<div class="py-5">
			<div class="container mt-5">
				<div>
					<div class="row">
						<div class="col-sm-5 mx-auto">

							<div class="form-box">
								<div class="form-top">
									<div class="form-top mt-3">
										<h3 class="text-center">Sign up</h3>
									</div>
								</div>
								<div class="form-bottom">
									<form role="form" action="" method="post" class="registration-form">
										<div class="form-group">
											<label class="sr-only" for="form-first-name">user name</label>
											<input type="text" name="username" placeholder="user name..." class="form-first-name form-control" id="username">
										</div>
										<div class="form-group">
											<label class="sr-only" for="form-last-name">password</label>
											<input type="password" name="password" placeholder="password..." class="form-last-name form-control" id="password">
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-success">Sign me up!</button>
										</div>
									</form>
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