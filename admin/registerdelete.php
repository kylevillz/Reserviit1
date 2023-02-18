<?php

include_once 'connectdb.php';

$id = $_POST['useridd'];

$sql = "delete from tbl_user where userid=$id";


$delete=$pdo->prepare($sql);

if($delete->execute()){


}else{
  echo'error in deleting';
}








 ?>
