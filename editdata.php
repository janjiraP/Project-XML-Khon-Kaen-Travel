<?php 
	
	include 'function.php';

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = $_POST["attractionId"];
		$name = $_POST["nameFacility"];
		$imageURL = $_POST["imageURL"];
		$detail = $_POST["discription"];

		EditAttraction($id,$name,$imageURL,$detail);

		header('Location: /index.php');
		exit(0);
	}
	
?>