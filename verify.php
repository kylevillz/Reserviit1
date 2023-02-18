<?php
include_once 'connectdb.php';


session_start();

// if ($_SESSION['useremail']=="" OR $_SESSION['role']=="user" OR $_SESSION['role']=="Admin" OR $_SESSION['approval']=="approved!") {
//   header('location:index.php');
// }



include_once 'notapproveheader.php';

if(isset($_POST['btnaddreservation']) AND isset($_POST['file'])){

  $phonenum = $_POST['txtphone'];


$file_name = $_FILES['file']['name'];
$file_type = $_FILES['file']['type'];
$file_size = $_FILES['file']['size'];
$file_tem_loc = $_FILES['file']['tmp_name'];
$file_store = "upload/".$file_name;
$f_extension = explode('.',$file_name);
$f_extension = strtolower(end($f_extension));

$f_newfile = uniqid().'.'.$f_extension;
$file_store = "upload/".$f_newfile;


if ($f_extension == 'jpg' || $f_extension == 'png' || $f_extension == 'gif' || $f_extension == 'jpeg') {

  if($file_size>=5000000) {
    $error ='<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "Warning!",
      text: "Max file should be 5MB!",
      icon: "warning",
      button: "Ok",
    });



    });

    </script>';
    echo $error;

  }else{
    if (move_uploaded_file($file_tem_loc, $file_store)) {

      $upload = $f_newfile;
      if(!isset($error)){
        $insert=$pdo->prepare("insert into tbl_employee(fname,lname,dob,blood_type,role,email,status,experience,phonenum,image)
        values(:fname,:lname,:dob,:blood_type,:role,:email,:status,:experience,:phonenum,:image)");

        $insert->bindParam(':fname',$fname);
        $insert->bindParam(':lname',$lname);
        $insert->bindParam(':dob',$dob);
        $insert->bindParam(':blood_type',$blood_type);
        $insert->bindParam(':role',$role);
        $insert->bindParam(':email',$email);
        $insert->bindParam(':status',$status);
        $insert->bindParam(':experience',$years);
        $insert->bindParam(':phonenum',$phonenum);
        $insert->bindParam(':image',$upload);

        if($insert->execute()){

          echo'<script type ="text/javascript">
          jQuery(function validation(){

            swal({
            title: "Good Job!",
            text: "Image is successfuly uploaded!",
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
  }
}else{
  $error = '<script type ="text/javascript">
  jQuery(function validation(){

    swal({
    title: "Warning!",
    text: "Only Jpg, Jpeg, Png and Gif file is allowed!",
    icon: "warning",
    button: "Ok",
  });



  });

  </script>';
  echo $error;
}


}




 ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ReservIIT
        <small>(Venue Reservation System)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Level</a></li>
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














                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" class="form-control" name="txtphone" placeholder="+63 123 456 789" required>
                  </div>

                  <div class="form-group">
                    <label >Upload Valid ID</label>
                    <input type="file" class="input-group" name="file" required>

                  </div>



                  <button type="submit" class="btn btn-info" name="btnaddreservation">Book appointment</button>



                </div>

                <div class="col-md-6">











                  </div>



              </div>


              <div class="box-footer">







              </div>


              </div>

      </section>
      <!-- /.content -->
    </div>





  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
