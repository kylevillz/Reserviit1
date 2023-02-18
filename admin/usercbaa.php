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
        College Of Business And Administration
        <small>(Room Availability)</small>
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
            <h3 class="box-title"><a href="useraddavailability.php" class="btn btn-primary" role="button">Add Schedule</a></h3>
          </div>

            <div class="box-body">
              <table id = "tableservice" class = "table table-striped"  >
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Venue</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Start time</th>
                    <th>End time</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>

                </thead>
                <tbody>

                  <?php
                  $phrase = 'cbaa';
                  $select=$pdo->prepare("select * from tbl_availability where buildingname ='$phrase' order by availid desc");

                  $select->execute();

                  while($row=$select->fetch(PDO::FETCH_OBJ)){

                    echo'<tr>
                    <td>
                    '.$row->availid.'
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
                    '.$row->date.'
                    </td>
                    <td>
                    '.$row->start_time.'
                    </td>
                    <td>
                    '.$row->end_time.'
                    </td>
                    <td>
                    '.$row->description.'
                    </td>


                    <td>
                    <a href = "usereditavailability.php?id='.$row->availid.'"  class="btn btn-info" role = "button" ><span class = "glyphicon glyphicon-edit" style = "color:#ffffff" data-toggle="tooltip" title="edit"></span></a>
                    </td>
                    <td>
                    <button id='.$row->availid.'  class="btn btn-danger btndelete"><span class = "glyphicon glyphicon-trash" style = "color:#ffffff" data-toggle="tooltip" title="delete"></span></button>
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
     $('#tableservice').DataTable({

        "order":[[4,"desc"]]




     });
  });
  </script>

  <script>

  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();


 });

  </script>

  <script>
  $(document).ready(function(){
      $("#tableservice").on('click','.btndelete', function(event){

      var tdh = $(this);
      var id= $(this).attr("id");

      swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    $.ajax({
      url: 'coetdelete.php',
      type:'post',
      data:{
        availidd:id
      },
      success: function(data){
        tdh.parents('tr').hide();
      }



    });
    swal("Your file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your file is safe!");
  }
});
      // alert(id);


    });
  });


  </script>



  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
