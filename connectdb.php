<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=reserviit','root','');

  // echo "connection succesful";
} catch (PDOException $e) {

  echo $e->getmessage();

}

 ?>
