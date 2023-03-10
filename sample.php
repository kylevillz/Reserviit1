<?php
include_once 'connectdb.php';
require_once 'dbconnect.php';
$query   = "SELECT * FROM tbl_availability";
$results = mysqli_query($conn, $query);
session_start();

if ($_SESSION['useremail']=="" OR $_SESSION['role']=="user" OR $_SESSION['role']=="Admin") {
  header('location:index.php');
}



include_once 'header.php';

if(isset($_POST['btnaddreservation']) || isset($_POST['txtname'])){
  $name = $_POST['txtname'];
  $customerid = $_POST['txtid'];
  $buildingname = $_POST['region'];
  $saleprice = $_POST['txtprice'];
  $date = $_POST['txtdate'];
  $roomnumber = $_POST['country'];
  $reserve_time = $_POST['txtreserve_time'];
  $reserve_endtime = $_POST['txtreserve_endtime'];
  $payment_type = $_POST['payment_type'];


if(!empty($name) AND !empty($buildingname) AND !empty($date) AND !empty($customerid) AND !empty($payment_type)){
  $insert=$pdo->prepare("insert into tbl_appointment(name,customerid,buildingname,saleprice,roomnumber,reserve_date,reserve_time,reserve_endtime,payment_type)
  values(:name,:customerid,:buildingname,:saleprice,:roomnumber,:reserve_date,:reserve_time,:reserve_endtime,:payment_type)");

  $insert->bindParam(':name',$name);
  $insert->bindParam(':customerid',$customerid);
  $insert->bindParam(':buildingname',$buildingname);
  $insert->bindParam(':roomnumber',$roomnumber);
  $insert->bindParam(':saleprice',$saleprice);
  $insert->bindParam(':reserve_date',$date);
  $insert->bindParam(':reserve_time',$reserve_time);
  $insert->bindParam(':reserve_endtime',$reserve_endtime);
  $insert->bindParam(':payment_type',$payment_type);


  if($insert->execute()){

    echo'<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "Good Job!",
      text: "Reservation successful!",
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
      text: "Reservation failed!",
      icon: "error",
      button: "Ok",
    });



    });

    </script>';

  }

  }
  }



 ?>
 <script>
function getCountry(val) {
$.ajax({
    type: "POST",
    url: "get_country.php",
    data:'bid='+val,

   success: function(data){
    $("#country-list").html(data);
  }
  });
  }

  function selectRegion(val) {
  $("#search-box").val(val);
  $("#suggesstion-box").hide();
  }
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ReservIIT
        <small>(Venue Reservation System)</small>
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
        <div class="box box-info">
          <div class="box-header with-border">


          </div>

          <form role="form" action="" method="post">

            <div class="box-body">


                <div class="col-md-6">


                  <div class="form-group service">
                    <label for="service">Venue</label>
                    <select name="region" id="region-list" class="form-control"      onChange="getCountry(this.value);">
    <option value="">Select Venue</option>

        <?php
$sql = "SELECT tbl_availability.bid, tbl_availability.buildingname , tbl_building.saleprice FROM `tbl_availability`
INNER JOIN tbl_building ON tbl_availability.bid = tbl_building.bid;";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    if ($bul[$row['buildingname']] != true && $row['buildingname'] != 'buildingname') {
?>
               <option data-price="<?php echo $row['saleprice']; ?>" value="<?php
        echo $row['buildingname'];
?>"><?php
        echo $row['buildingname'];
?></option>
        <?php
        $bul[$row['buildingname']] = true;
    }
}
?>

    </select>
                  </div>

                  <div class="form-group">
                    <label >Room</label>
                    <select name="country" id="country-list" class="form-control">
        <option value="">Select Room</option>
    </select>
                  </div>







                  <div class="form-group">
                    <label for"price">Price</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                      ???
                    </div>
                    <input type="text" name="txtprice"class="form-control price-input"   readonly>
                  </div>
                  </div>
                  <div class="form-group">
                    <label >Date</label>
                    <input type="date" min="1" step="1" class="form-control" name="txtdate" placeholder="Enter price..." required>
                  </div>
                  

                  <button type="submit" class="btn btn-info" name="btnaddreservation">Book appointment</button>



                </div>

                <div class="col-md-6">


                  <div class="form-group">
                    <label >Start Time</label><small> Reservation time(6:30 am to 7:00 pm)</small>
                    <input type="time" min="1" step="1" class="form-control" name="txtreserve_time" placeholder="Enter price..." required>
                  </div>

                  <div class="form-group">
                    <label >End Time</label><small> Reservation time(6:30 am to 7:00 pm)</small>
                    <input type="time" min="1" step="1" class="form-control" name="txtreserve_endtime" placeholder="Enter price..." required>
                  </div>



                  <div class="form-group">
                    <label>Mode of payment</label>
                    <select class="form-control" name="payment_type">
                      <option value="" disabled selected>Select payment type</option required>
                        <?php
                        $select=$pdo->prepare("select * from tbl_payment order by paymentid desc");
                        $select->execute();

                        while($row=$select->fetch(PDO::FETCH_ASSOC)){

                          extract($row)

                         ?>
                      <option><?php echo $row['payment_type']; ?></option>

                      <?php
                      }
                      ?>

                    </select>
                  </div>


                  <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control" name="txtname" value="<?php echo $_SESSION['username']; ?>" style="display:none;"  placeholder="Enter name..." required>
                  </div>
                  <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control" name="txtid" value="<?php echo $_SESSION['customerid']; ?>" style="display:none;"  placeholder="Enter name..." required>
                  </div>

                  </div>



              </div>


              <div class="box-footer">







              </div>


              </div>

      </section>
      <!-- /.content -->
    </div>
    <script>
     $(document).ready(function() {
       $('#tableservice').DataTable({

         "order":[[0,"desc"]]




       });
    });
    </script>

    <script>

    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();


   });

    </script>
    <script>

    $('.service').on('change', function() {
  $('.price-input')
  .val(
    $(this).find(':selected').data('price')
  );
});

    </script>



  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
