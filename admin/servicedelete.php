<?php

include_once 'connectdb.php';

$id = $_POST['bidd'];

$sql = "delete from tbl_building where bid=$id";


$delete=$pdo->prepare($sql);

if($delete->execute()){
  

}else{
  echo'error in deleting';
}








 ?>
