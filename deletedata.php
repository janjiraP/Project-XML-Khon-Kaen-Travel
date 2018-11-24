<?php 

session_start();
$username = $_SESSION["username"];
$attraction_xml = "data/attractions.xml";
$id = $_POST["attractionId"];

$doc = new DOMDocument();
	$doc->load($attraction_xml);

    $attractions = $doc->documentElement;
    
    $xpath = new DOMXPath($doc);

	$result = $xpath->query('/attractions/attraction[@id='.$id.']');
    $result->item(0)->parentNode->removeChild($result->item(0));

	$doc->save($attraction_xml);
    
	header('Location: /index.php');
	exit(0);
?>
