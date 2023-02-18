<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="" OR $_SESSION['role']=="customer" OR $_SESSION['role']=="Admin") {
  header('location:index.php');
}



include_once 'headeruser.php';


 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customer Reservation List
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

          </div>

            <div class="box-body">
              <table id = "tablereservation" class = "table table-striped"  >
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Venue</th>
                    <th>Room</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>END Time</th>
                    <th>Payment type</th>
                    <th>Payment status</th>
                    <th>Appointment status</th>
                    <th>Approval status</th>
                    <th>User</th>
                    <th></th>

                  </tr>

                </thead>
                <tbody>

                  <?php
                  $phrase="Not yet done";
                  $phrase2="";
                  $phrase1="customer";

                  $select=$pdo->prepare("select * from tbl_appointment where role ='$phrase1' AND (appointment_status= '$phrase' OR appointment_status= '$phrase2') order by appointmentid desc");
                  $select->execute();

                  while($row=$select->fetch(PDO::FETCH_OBJ)){

                    echo'<tr>
                    <td>
                    '.$row->appointmentid.'
                    </td>
                    <td>
                    '.$row->name.'
                    </td>
                    <td>
                    '.$row->buildingname.'
                    </td>
                    <td>
                    '.$row->roomnumber.'
                    </td>
                    <td>
                    '.$row->saleprice.'
                    </td>
                    <td>
                    '.$row->reserve_date.'
                    </td>
                    <td>
                    '.$row->reserve_time.'
                    </td>
                    <td>
                    '.$row->reserve_endtime.'
                    </td>
                    <td>
                    '.$row->payment_type.'
                    </td>

                    <td>
                    '.$row->payment_status.'
                    </td>
                    <td>
                    '.$row->appointment_status.'
                    </td>
                    <td>
                    '.$row->approval.'
                    </td>
                    <td>
                    '.$row->user.'
                    </td>
                    <td>
                    <a href = "usereditreservation.php?id='.$row->appointmentid.'"  class="btn btn-info" role = "button" ><span class = "glyphicon glyphicon-edit" style = "color:#ffffff" data-toggle="tooltip" title="edit"></span></a>
                    </td>


                        </tr>';




                  }








                   ?>












                </tbody>

              </table>


            </div>
            </div>

    </section>
    <!-- /.content -->
  </div>
  <script>
   $(document).ready(function() {
     $('#tablereservation').DataTable({

       "order":[[0,"desc"]]




     });
  });
  </script>

  <script>

  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();


 });

  </script>





  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
