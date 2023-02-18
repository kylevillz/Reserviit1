<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="" OR $_SESSION['role']=="customer" OR $_SESSION['role']=="user") {
  header('location:index.php');
}




include_once 'header.php';

$id= isset($_GET['id']) ? $_GET['id'] : '';

$select = $pdo->prepare("select * from tbl_customer where customerid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);



$approval_db = $row['approval'];




if(isset($_POST['btnupdate'])){
  $approval_txt = $_POST['txtapproval'];

  $update = $pdo->prepare("update tbl_customer set approval=:approval where customerid=$id");

  $update->bindParam(':approval',$approval_txt);



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











$id= isset($_GET['id']) ? $_GET['id'] : '';

$select = $pdo->prepare("select * from tbl_customer where customerid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);


$approval_db = $row['approval'];





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
            <h3 class="box-title"><a href="customerlist.php" class="btn btn-primary" role="button">Back to Customer list</a></h3>
          </div>

          <form action="" method="post" name="form" enctype="multipart/form-data">

            <div class="box-body">
              <div class="col-md-4">







                  <div class="form-group">
                    <label>Approval Status</label>
                    <select class="form-control" name="txtapproval">
                      <option value="" disabled selected>Select status</option required>
                        <?php
                        $select=$pdo->prepare("select * from tbl_approval_status order by approvalid desc");
                        $select->execute();

                        while($row=$select->fetch(PDO::FETCH_ASSOC)){

                          extract($row)

                         ?>
                      <option <?php if($row['approval']==$approval_db) {?>

                        selected="selected"
                      <?php } ?>>


                        <?php echo $row['approval']; ?></option>

                      <?php
                      }
                      ?>

                    </select>
                  </div>
                  <button type="submit" class="btn btn-info" name="btnupdate">Update Schedule</button>

                  </div>









                </div>










              </form>
              </div>


            </div>
          

    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
