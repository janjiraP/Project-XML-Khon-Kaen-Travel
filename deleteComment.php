<?php 

session_start();
$username = $_SESSION["username"];
$id = $_POST["attractionId"];
$commentId = $_POST["commentId"];
// $detail = $_POST["commentDetail"];
$attraction_xml = "data/attractions.xml";

$doc = new DOMDocument();
	$doc->load($attraction_xml);

    $attractions = $doc->documentElement;
    
    $xpath = new DOMXPath($doc);

	$result = $xpath->query("/attractions/attraction[@id='".$id."']/comments/comment[@id='".$commentId."']");
	$result->item(0)->parentNode->removeChild($result->item(0));
	// print_r($result);

	// echo $id;

	$doc->save($attraction_xml);
    
	header('Location: /detail.php?id='.$id);
	exit(0);
?>
