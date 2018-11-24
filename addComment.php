<?php 
session_start();
$username = $_SESSION["username"];
$id = $_POST["attractionId"];
$detail = $_POST["commentDetail"];
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
        $comments = $attraction->getElementsByTagName("comments")->item(0);

        $count = $xpath->query("/attractions/attraction[@id='".$id."']/comments/comment[last()]");

        $comment = $doc->createElement('comment');
        
        if($count->length > 0) {
            $maxId = $count->item(0)->getAttribute("id");
            $comment->setAttribute('id', $maxId + 1);
        }
        else {
            $comment->setAttribute('id', '1');
        }
        
        $commentName = $doc->createElement('commentName');
        $text = $doc->createTextNode($username);
        $commentName->appendChild($text);
        $comment->appendChild($commentName);

        $commentDetail = $doc->createElement('commentDetail');
        $text = $doc->createTextNode($detail);
        $commentDetail->appendChild($text);
        $comment->appendChild($commentDetail);

        $commentDatetime = $doc->createElement('commentDatetime');
        $text = $doc->createTextNode(date("Y-m-d"));
        $commentDatetime->appendChild($text);
        $comment->appendChild($commentDatetime);

        $comments->appendChild($comment);

        $doc->save($attraction_xml);
    }

header('Location: /detail.php?id='.$id);
exit(0);

?>