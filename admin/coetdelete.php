<?php

include_once 'connectdb.php';

$id = $_POST['availidd'];

$sql = "delete from tbl_availability where availid=$id";


$delete=$pdo->prepare($sql);

if($delete->execute()){


}else{
  echo'error in deleting';
}








 ?>
