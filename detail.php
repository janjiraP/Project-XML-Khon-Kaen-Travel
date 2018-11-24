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
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
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
					<!-- _____________________________Check Login_____________________________ -->
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

<?php 
  $id = $_GET["id"];

  $attraction_xml = "data/attractions.xml";
	$doc = new DOMDocument();
	$doc->load($attraction_xml);

    $attractions = $doc->documentElement;
    
    $xpath = new DOMXPath($doc);

    $result = $xpath->query("/attractions/attraction[@id='".$id."']");

    if($result->length == 0){ 
      return false;
    }

    if(!is_null($result)){
        $attraction = $result->item(0);
?>

	<div class="container">
		<!-- _____________________________Show Detail_____________________________ -->

		<div class="row mt-5 border border-warning py-5 p-3 bg-w">
			<div class="col-md-6">
				<img src="
					<?php 
					$imageURL = $attraction->getElementsByTagName("imageURL");
					$imageURL = $imageURL->item(0)->nodeValue;
					
					$name = $attraction->getElementsByTagName("name");
					$name = $name->item(0)->nodeValue;

					$detail = $attraction->getElementsByTagName("detail");
					$detail = $detail->item(0)->nodeValue;

					echo $imageURL; ?>" class="img-fluid w-100 h-100 img-head">
			</div>

			<div class="col-md-6 pl-5">
				<h2>
					<?php echo $name; ?>
				</h2>
				<p>
					<?php echo $detail; ?>
				</p>

			</div>
		</div>
		<hr>

		<h3>Comment</h3>
		<hr>
		<!-- _____________________________Show Comment_____________________________ -->
		<div class="row">
			<?php 
            $comments = $attraction->getElementsByTagName("comment");
            foreach($comments as $comment){

				$commentId = $comment->getAttribute("id");

                $commentName = $comment->getElementsByTagName("commentName");
                $commentName = $commentName->item(0)->nodeValue;

                $commentDetail = $comment->getElementsByTagName("commentDetail");
                $commentDetail = $commentDetail->item(0)->nodeValue;

                $commentDatetime = $comment->getElementsByTagName("commentDatetime");
                $commentDatetime = $commentDatetime->item(0)->nodeValue;

              ?>
				<div class="col-12">

					<!-- ลบข้อมูล comment -->
						<?php

							if(isset($_SESSION["isAuth"]) && !empty($_SESSION["isAuth"])) {
						
								if($_SESSION["isAuth"]==true){
						?>
						<button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete<?php echo $commentId ?>">
							x
						</button>

							<form action="deleteComment.php" method="POST">
								<input type="hidden" name="attractionId" value="<?php echo $attraction->getAttribute('id'); ?>">
								<input type="hidden" name="commentId" value="<?php echo $commentId; ?>">
								
								

								<div class="modal fade" id="delete<?php echo $commentId ?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel<?php echo $commentId ?>" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title text-danger" id="deleteLabel<?php echo $commentId ?>">ลบ  Comment</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											คุณต้องการลบ  Comment นี้หรือไม่?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
											<button type="submit" class="btn btn-danger ">ลบ</button>
										</div>
										</div>
									</div>
								</div>

							</form>
						<?php
								}
							}
						?>
					<!-- ลบข้อมูล comment -->
					<h4 style="text-indent: 50px;color:#cc4400;">
						<?php echo $commentName; ?>
					</h4>
					<p style="text-indent: 50px;">
						<?php echo $commentDetail; ?>
					</p>
					<p style="color:#6E6E6E; text-indent: 50px; font-size:12pt;">
						<?php echo $commentDatetime; ?>
					</p>
					<hr>
				</div>
			<?php
            }
        	 ?>
		</div>

		<!-- _____________________________ช่อง Comment_____________________________ -->
		<?php
          if(isset($_SESSION["isAuth"]) && !empty($_SESSION["isAuth"])) {
            if($_SESSION["isAuth"]==true){
        ?>
			<div class="row my-5 mx-auto">
				<div class="col-12">
					<form action="addComment.php" method="POST">
						<input type="hidden" name="attractionId" value="<?php echo $id; ?>">
						<textarea name="commentDetail" class="form-control" cols="100" rows="5"></textarea>
						<button type="submit" class="mt-5 btn btn-success btn-block">Comment</button>
					</form>
				</div>
			</div>
		<?php
            }
          }
        ?>
	</div>
	<?php
      }
	?>

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