<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="" OR $_SESSION['role']=="customer" OR $_SESSION['role']=="Admin") {
  header('location:index.php');
}




include_once 'headeruser.php';

if(isset($_POST['btnaddservice'])){
  $buildingname = $_POST['txtbuildingname'];
  $name = $_POST['txtname'];
  $bid = $_POST['txtbid'];
  $roomnumber = $_POST['txtroomnumber'];
  $date = $_POST['txtdate'];
  $start_time = $_POST['txtstart_time'];
  $end_time = $_POST['txtend_time'];
  $description = $_POST['txtdescription'];

  $row=$select=$pdo->prepare("select * FROM tbl_availability where date ='$date' AND start_time ='$start_time' AND end_time ='$end_time' AND buildingname ='$buildingname' AND roomnumber ='$roomnumber'");

  $select->execute();

  if($select->rowCount() > 0){

    echo'<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "Reservation Already Exists!",
      text: "Check the venue availability tab to find an available reservation.",
      icon: "warning",
      button: "Ok",
    });



    });

    </script>';
  }else{

  $insert=$pdo->prepare("insert into tbl_availability(buildingname,name,bid,roomnumber,date,start_time,end_time,description)
  values(:buildingname,:name,:bid,:roomnumber,:date,:start_time,:end_time,:description)");

  $insert->bindParam(':buildingname',$buildingname);
  $insert->bindParam(':name',$name);
  $insert->bindParam(':bid',$bid);
  $insert->bindParam(':roomnumber',$roomnumber);
  $insert->bindParam(':date',$date);
  $insert->bindParam(':start_time',$start_time);
  $insert->bindParam(':end_time',$end_time);

  $insert->bindParam(':description',$description);



  if($insert->execute()){

    echo'<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "Good Job!",
      text: "Schedule is added successfuly!",
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
      text: "Upload failed!",
      icon: "error",
      button: "Ok",
    });



    });

    </script>';

  }

  }
  }




 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Venue
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
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"><a href="usercoet.php" class="btn btn-primary" role="button">Back to Schedule list</a></h3>
          </div>

          <form action="" method="post" name="form" enctype="multipart/form-data">

            <div class="box-body">


                <div class="col-md-6">

                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="txtname" placeholder="Enter name..." >
                  </div>


                  <div class="form-group service">
                    <label for="service">Venue</label>
                    <select class="form-control" name="txtbuildingname">
                      <option value="" disabled selected>Select venue</option required>
                        <?php
                        $select=$pdo->prepare("select * from tbl_building order by bid desc");
                        $select->execute();

                        while($row=$select->fetch(PDO::FETCH_ASSOC)){

                          extract($row)

                         ?>
                      <option data-price="<?php echo $row['bid']; ?>" ><?php echo $row['buildingname']; ?></option>

                      <?php
                      }
                      ?>

                    </select>
                  </div>





                  <div style=display:none; class="form-group">
                    <label for"price">Price</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                      ₱
                    </div>
                    <input type="text" name="txtbid" class="form-control price-input"   readonly>
                  </div>
                  </div>
                  <div class="form-group">
                    <label>Room</label>
                    <input type="text" class="form-control" name="txtroomnumber" placeholder="Enter room..." required>
                  </div>
                  <div class="form-group">
                    <label >Date</label>
                    <input type="date" min="1" step="1" class="form-control" name="txtdate" placeholder="Enter date..." required>
                  </div>

                  <div class="form-group">
                    <label >Start time</label>
                    <input type="time" min="1" step="1" class="form-control" name="txtstart_time" placeholder="Enter start time..." required>
                  </div>




                </div>
                <div class="col-md-6">

                  <div class="form-group">
                    <label >End time</label>
                    <input type="time" min="1" step="1" class="form-control" name="txtend_time" placeholder="Enter end time..." required>
                  </div>

                  <div class="form-group">
                    <label >Description</label>
                    <textarea class="form-control" name="txtdescription" rows="6" placeholder="Enter..."></textarea>
                  </div>





                  </div>





              </div>

              <div class="box-footer">


                <button type="submit" class="btn btn-info" name="btnaddservice">Add Schedule</button>

              </div>
              </form>




    </section>

    <!-- /.content -->
  </div>

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
