<?php 
  // Add
  function addUser($username,$password) {
    $user_xml = "data/users.xml";

    $dom = new DOMDocument();
    $dom->load($user_xml);
    $users = $dom->documentElement;

    $user = $dom->createElement('user');
    $user->setAttribute('id', $username);

    $uname = $dom->createElement('username');
    $text = $dom->createTextNode($username);
    $uname->appendChild($text);
    $user->appendChild($uname);

    $pwd = $dom->createElement('password');
    $text = $dom->createTextNode($password);
    $pwd->appendChild($text);
    $user->appendChild($pwd);

    $users->appendChild($user);

    $dom->save($user_xml);
  }

  function login($username, $password) {
    $user_xml = "data/users.xml";

    $dom = new DOMDocument();
    $dom->load($user_xml);
    $users = $dom->documentElement;
    $xpath = new DOMXPath($dom);

    $result = $xpath->query("/users/user[@id='".$username."']");

    if($result->length == 0){ 
      return false;
    }
    
    if(!is_null($result)){
      $usr = $result->item(0)->getElementsByTagName('username');
      $pwd = $result->item(0)->getElementsByTagName('password');

      if($password == $pwd->item(0)->nodeValue){
        return true;
      }
      return false;
    } 
    
    else {
      return false;
    }
  }

?>