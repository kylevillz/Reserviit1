<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="" OR $_SESSION['role']=="customer" OR $_SESSION['role']=="Admin") {
  header('location:index.php');
}




include_once 'headeruser.php';

$id= isset($_GET['id']) ? $_GET['id'] : '';

$select = $pdo->prepare("select * from tbl_appointment where appointmentid= $id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['appointmentid'];



$name_db = $row['name'];
$buildingname_db = $row['buildingname'];
$roomnumber_db = $row['roomnumber'];
$approval_db = $row['approval'];
$saleprice_db = $row['saleprice'];
$reserve_date_db = $row['reserve_date'];
$reserve_time_db = $row['reserve_time'];
$reserve_endtime_db = $row['reserve_endtime'];
$payment_type_db = $row['payment_type'];
$payment_status_db = $row['payment_status'];
$appointment_status_db = $row['appointment_status'];
$user_db = $row['user'];



if(isset($_POST['btnupdate'])){

  error_reporting(1);

  $name_txt = $_POST['txtname'];
  $buildingname_txt = $_POST['txtselect_option'];
  $roomnumber_txt = $_POST['txtroomnumber'];
  $price_txt = $_POST['txtprice'];
  $approval_txt = $_POST['txtapproval'];
  $reserve_date_txt = $_POST['txtreserve_date'];
  $reserve_time_txt = $_POST['txtreserve_time'];
  $reserve_endtime_txt = $_POST['txtreserve_endtime'];
  $payment_type_txt = $_POST['txtpayment_type'];
  $payment_status_txt = $_POST['txtpayment_status'];
  $appointment_status_txt = $_POST['txtappointment_status'];
  $user_txt = $_POST['txtuser'];


          $update = $pdo->prepare("update tbl_appointment set name=:name,
          buildingname=:buildingname,roomnumber=:roomnumber,saleprice=:saleprice,approval=:approval,reserve_date=:reserve_date, reserve_time=:reserve_time,reserve_endtime=:reserve_endtime, payment_type=:payment_type, payment_status=:payment_status, appointment_status=:appointment_status, user=:user where appointmentid=$id");


          $update->bindParam(':name',$name_txt);
          $update->bindParam(':buildingname',$buildingname_txt);
          $update->bindParam(':roomnumber',$roomnumber_txt);
          $update->bindParam(':approval',$approval_txt);
          $update->bindParam(':saleprice',$price_txt);
          $update->bindParam(':reserve_date',$reserve_date_txt);
          $update->bindParam(':reserve_time',$reserve_time_txt);
          $update->bindParam(':reserve_endtime',$reserve_endtime_txt);
          $update->bindParam(':payment_type',$payment_type_txt);

          $update->bindParam(':payment_status',$payment_status_txt);
          $update->bindParam(':appointment_status',$appointment_status_txt);
          $update->bindParam(':user',$user_txt);

          if($update->execute()){

            $phrase3="approved!";

            $insert2=$pdo->prepare("insert into tbl_availability(bid,buildingname,roomnumber,date,start_time,end_time,description)
SELECT bid,buildingname,roomnumber,reserve_date,reserve_time,reserve_endtime,description FROM tbl_appointment where NOT EXISTS (SELECT bid,buildingname,roomnumber,date,start_time,end_time,description FROM tbl_availability where tbl_appointment.reserve_date = tbl_availability.date AND tbl_appointment.reserve_time = tbl_availability.start_time AND tbl_appointment.reserve_endtime = tbl_availability.end_time AND tbl_appointment.buildingname = tbl_availability.buildingname AND tbl_appointment.roomnumber = tbl_availability.roomnumber) AND approval = '$phrase3';");


            if($insert2->execute()){



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
          }

          }else{
            echo'<script type ="text/javascript">
            jQuery(function validation(){

              swal({
              title: "Error",
              text: "Update failed!",
              icon: "error",
              button: "Ok",
            });



            });

            </script>';

          }
          }










$select = $pdo->prepare("select * from tbl_appointment where appointmentid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['appointmentid'];




$name_db = $row['name'];
$buildingname_db = $row['buildingname'];
$roomnumber_db = $row['roomnumber'];
$approval_db = $row['approval'];
$saleprice_db = $row['saleprice'];
$reserve_date_db = $row['reserve_date'];
$reserve_time_db = $row['reserve_time'];
$reserve_endtime_db = $row['reserve_endtime'];
$payment_type_db = $row['payment_type'];

$payment_status_db = $row['payment_status'];
$appointment_status_db = $row['appointment_status'];
$user_db = $row['user'];

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
            <h3 class="box-title"><a href="usercustomerreservationlist.php" class="btn btn-primary" role="button">Back to Reservation list</a></h3>
          </div>

          <form role="form" action="" method="post" enctype="multipart/form-data">

            <div class="box-body">


                <div class="col-md-6">
                  <div class="form-group">
                    <label>Customer</label>
                    <input type="text" class="form-control" name="txtname" value="<?php echo $name_db;?>" placeholder="Enter name..." required>
                  </div>
                  <div class="form-group service">
                    <label for="service">Venue</label>
                    <select class="form-control" name="txtselect_option">
                      <option value="" disabled selected>Select Venue</option required>
                        <?php
                        $select=$pdo->prepare("select * from tbl_building order by bid desc");
                        $select->execute();

                        while($row=$select->fetch(PDO::FETCH_ASSOC)){

                          extract($row)

                         ?>
                      <option data-price="<?php echo $row['saleprice']; ?>" <?php if($row['buildingname']==$buildingname_db) {?>

                        selected="selected"
                      <?php } ?>  ><?php echo $row['buildingname']; ?></option>

                      <?php
                      }
                      ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label>Room</label>
                    <input type="text" class="form-control" name="txtroomnumber" value="<?php echo $roomnumber_db;?>" placeholder="Enter name..." required>
                  </div>
                  <div class="form-group">
                    <label for"price">Price</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                      ₱
                    </div>
                    <input type="text" name="txtprice"class="form-control price-input" value="<?php echo $saleprice_db;?>"   readonly>
                  </div>
                  </div>

                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="txtreserve_date" value="<?php echo $reserve_date_db;?>" placeholder="Enter name..." required>
                  </div>



                  </div>
                  <div class="col-md-6">
                    <div class="col-md-6">
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="time" class="form-control" name="txtreserve_time" value="<?php echo $reserve_time_db;?>" placeholder="Enter name..." required>
                    </div>
                      </div>
                      <div class="col-md-6">
                    <div class="form-group">
                      <label>End Time</label>
                      <input type="time" class="form-control" name="txtreserve_endtime" value="<?php echo $reserve_endtime_db;?>" placeholder="Enter name..." required>
                    </div>
                    </div>
                  </div>

                <div class="col-md-6">



                  <div class="form-group">
                    <label>Payment type</label>
                    <select class="form-control" name="txtpayment_type">
                      <option value="" disabled selected>Select payment_type</option required>
                        <?php
                        $select=$pdo->prepare("select * from tbl_payment order by paymentid desc");
                        $select->execute();

                        while($row=$select->fetch(PDO::FETCH_ASSOC)){

                          extract($row)

                         ?>
                      <option <?php if($row['payment_type']==$payment_type_db) {?>

                        selected="selected"
                      <?php } ?>>




                        <?php echo $row['payment_type']; ?></option>

                      <?php
                      }
                      ?>

                    </select>
                  </div>


                  <div class="form-group">
                    <label>Payment status</label>
                    <select class="form-control" name="txtpayment_status">
                      <option value="" disabled selected>Select payment status</option required>
                        <?php
                        $select=$pdo->prepare("select * from tbl_payment_status order by paystatid desc");
                        $select->execute();

                        while($row=$select->fetch(PDO::FETCH_ASSOC)){

                          extract($row)

                         ?>
                      <option <?php if($row['payment_status']==$payment_status_db) {?>

                        selected="selected"
                      <?php } ?>>




                        <?php echo $row['payment_status']; ?></option>

                      <?php
                      }
                      ?>

                    </select>
                  </div>
                  <div class="form-group">
                      <label>Appointment status</label>
                      <select class="form-control" name="txtappointment_status">
                        <option value="" disabled selected>Select appointment status</option required>
                          <?php
                          $select=$pdo->prepare("select * from tbl_appointment_status order by appstatid desc");
                          $select->execute();

                          while($row=$select->fetch(PDO::FETCH_ASSOC)){

                            extract($row)

                           ?>
                        <option <?php if($row['appointment_status']==$appointment_status_db) {?>

                          selected="selected"
                        <?php } ?>>




                          <?php echo $row['appointment_status']; ?></option>

                        <?php
                        }
                        ?>

                      </select>
                    </div>
                    <div class="form-group">
                        <label>Approval status</label>
                        <select class="form-control" name="txtapproval">
                          <option value="" disabled selected>Select approval status</option required>
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
                    <div class="form-group">
                      <label></label>
                      <input type="text" class="form-control" name="txtuser" style=display:none;  value="<?php echo $_SESSION['username'];?>" placeholder="Enter name..." required>
                    </div>


                </div>






                  </div>
                  <div class="box-footer">


                    <button type="submit" class="btn btn-info" name="btnupdate">Update Appointment</button>

                  </div>









              </form>
              </div>


            </div>


    </section>
    <script>

    $('.service').on('change', function() {
  $('.price-input')
  .val(
    $(this).find(':selected').data('price')
  );
});

    </script>

    <!-- /.content -->

  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
