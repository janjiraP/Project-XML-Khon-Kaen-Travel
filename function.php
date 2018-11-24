<?php

function EditAttraction($id,$name,$imageURL,$detail) {
    $dom = new DOMDocument();
    $dom->load('data/attractions.xml');
    $library = $dom->documentElement;
    $xpath = new DOMXPath($dom);

    $result = $xpath->query('/attractions/attraction[@id='.$id.']');
    $result->item(0)->getElementsByTagName('name')->item(0)->nodeValue = $name;
    $result->item(0)->getElementsByTagName('imageURL')->item(0)->nodeValue = $imageURL;
    $result->item(0)->getElementsByTagName('detail')->item(0)->nodeValue = $detail;


    $dom->save('data/attractions.xml');
}

function getAttractionById($id, &$name, &$imageURL, &$detail){
    $dom = new DOMDocument();
    $dom->load('data/attractions.xml');
    $library = $dom->documentElement;
    $xpath = new DOMXPath($dom);

    $result = $xpath->query('/attractions/attraction[@id='.$id.']');
    $name = $result->item(0)->getElementsByTagName('name')->item(0)->nodeValue;
    $imageURL = $result->item(0)->getElementsByTagName('imageURL')->item(0)->nodeValue;
    $detail = $result->item(0)->getElementsByTagName('detail')->item(0)->nodeValue;
     
}

?>