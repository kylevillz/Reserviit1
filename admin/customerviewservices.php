<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="" OR $_SESSION['role']=="customer") {
  header('location:index.php');
}




include_once 'header.php';


 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View service
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

            <div class="box-body">

              <?php
              $id= isset($_GET['id']) ? $_GET['id'] : '';

              $select = $pdo->prepare("select * from tbl_customer where customerid=$id");

              $select->execute();

              while($row=$select->fetch(PDO::FETCH_OBJ)){

                echo'<div class = "col-md-6">

                <center><p class="list-group-item list-group-item-success" ><b>Customer Details</b></p></center>

                <ul class="list-group">
                 <li class="list-group-item"><b>ID</b><span class="badge">'.$row->customerid.'</span></li>
                 <li class="list-group-item"><b>Name</b><span class="label label-info pull-right">'.$row->username.'</span></li>
                 <li class="list-group-item"><b>Email</b><span class="label label-success pull-right">'.$row->useremail.'</span></li>
                 <li class="list-group-item"><b>Phone number</b><span class="label label-primary pull-right">'.$row->phonenum.'</span></li>
                 <li class="list-group-item"><b>Approval Status</b><span class="label label-warning pull-right">'.$row->approval.'</span></li>
                </ul>

                </div>
                <div class = "col-md-6">

                <center><p class="list-group-item list-group-item-success"><b>Valid ID</b></p></center>

                <ul class="list-group">
                <center><img src = "upload/'.$row->image.'" class = "img-responsive" width="80%" height="80%"></center>

                </ul>
                </div>





                ';




              }




               ?>



            </div>
            </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
