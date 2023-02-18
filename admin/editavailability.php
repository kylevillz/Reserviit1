<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="" OR $_SESSION['role']=="customer" OR $_SESSION['role']=="user") {
  header('location:index.php');
}




include_once 'header.php';

$id= isset($_GET['id']) ? $_GET['id'] : '';

$select = $pdo->prepare("select * from tbl_availability where availid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['availid'];

$name_db = $row['name'];

$buildingname_db = $row['buildingname'];
$roomnumber_db = $row['roomnumber'];
$date_db = $row['date'];

$start_time_db = $row['start_time'];
$end_time_db = $row['end_time'];

$description_db = $row['description'];


if(isset($_POST['btnupdate'])){
  $name_txt = $_POST['txtname'];
  $buildingname_txt = $_POST['txtbuildingname'];
  $roomnumber_txt = $_POST['txtroomnumber'];
  $date_txt = $_POST['txtdate'];
  $start_time_txt = $_POST['txtstart_time'];
  $end_time_txt = $_POST['txtend_time'];

  $description_txt = $_POST['txtdescription'];
  $update = $pdo->prepare("update tbl_availability set name=:name,buildingname=:buildingname, roomnumber=:roomnumber,
  date=:date, start_time=:start_time, end_time=:end_time, description=:description where availid=$id");
  $update->bindParam(':name',$name_txt);

  $update->bindParam(':buildingname',$buildingname_txt);
  $update->bindParam(':roomnumber',$roomnumber_txt);
  $update->bindParam(':date',$date_txt);
  $update->bindParam(':start_time',$start_time_txt);
  $update->bindParam(':end_time',$end_time_txt);

  $update->bindParam(':description',$description_txt);


  if($update->execute()){

    echo'<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "Good Job!",
      text: "Update successful!",
      icon: "success",
      button: "Ok",
    });



    });

    </script>';

  }else{
    echo'<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "Error!",
      text: "Update failed!",
      icon: "error",
      button: "Ok",
    });



    });

    </script>';

  }


    }













$select = $pdo->prepare("select * from tbl_availability where availid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['availid'];
$name_db = $row['name'];
$buildingname_db = $row['buildingname'];
$roomnumber_db = $row['roomnumber'];
$date_db = $row['date'];

$start_time_db = $row['start_time'];
$end_time_db = $row['end_time'];

$description_db = $row['description'];





 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title"><a href="coet.php" class="btn btn-primary" role="button">Back to Schedule list</a></h3>
          </div>

          <form action="" method="post" name="form" enctype="multipart/form-data">

            <div class="box-body">


                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="txtname" value="<?php echo $name_db;?>" placeholder="Enter name..." >
                  </div>


                  <div class="form-group">
                    <label>Venue</label>
                    <select class="form-control" name="txtbuildingname">
                      <option value="" disabled selected>Select category</option required>
                        <?php
                        $select=$pdo->prepare("select * from tbl_building order by bid desc");
                        $select->execute();

                        while($row=$select->fetch(PDO::FETCH_ASSOC)){

                          extract($row)

                         ?>
                      <option <?php if($row['buildingname']==$buildingname_db) {?>

                        selected="selected"
                      <?php } ?>>


                        <?php echo $row['buildingname']; ?></option>

                      <?php
                      }
                      ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label>Room</label>
                    <input type="text" class="form-control" name="txtroomnumber" value="<?php echo $roomnumber_db;?>" placeholder="Enter room..." required>
                  </div>
                  <div class="form-group">
                    <label >Date</label>
                    <input type="date" min="1" step="1" class="form-control" name="txtdate" value="<?php echo $date_db;?>" placeholder="Enter date..." required>
                  </div>

                  <button type="submit" class="btn btn-info" name="btnupdate">Update Schedule</button>






                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label >Start time</label>
                    <input type="time" min="1" step="1" class="form-control" name="txtstart_time" value="<?php echo $start_time_db;?>" placeholder="Enter start time..." required>
                  </div>

                  <div class="form-group">
                    <label >End time</label>
                    <input type="time" min="1" step="1" class="form-control" name="txtend_time" value="<?php echo $end_time_db;?>" placeholder="Enter start time..." required>
                  </div>

                  <div class="form-group">
                    <label >Description</label>
                    <textarea class="form-control" name="txtdescription"  rows="3" placeholder="Enter..."><?php echo $description_db;?></textarea>
                  </div>







                  </div>
                  <div class="box-footer">




                  </div>









              </form>
              </div>


            </div>
          </div>

    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
