<?php

include_once 'connectdb.php';

$id = $_POST['catidd'];

$sql = "delete from tbl_category where catid=$id";


$delete=$pdo->prepare($sql);

if($delete->execute()){


}else{
  echo'error in deleting';
}








 ?>
