<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="" OR $_SESSION['role']=="Admin" OR $_SESSION['role']=="user") {
  header('location:index.php');
}


include_once 'myiitheader.php';


 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        College Of Education
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
            <h4><strong>NOTE:</strong> These are the list of the venues that are taken, to get your reservation approved make sure that the venue and schedule that you chose is not in the list.</h4>
            <h4>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Make sure to use the search bar to easily find a reservation</h4>
          </div>

            <div class="box-body">
              <table id = "tableservice" class = "table table-striped"  >
                <thead>
                  <tr>

                    <th>Venue</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Start time</th>
                    <th>End time</th>


                  </tr>

                </thead>
                <tbody>

                  <?php
                  $phrase = 'ced';
                  $select=$pdo->prepare("select * from tbl_availability where buildingname ='$phrase' AND date >= CURRENT_DATE order by availid desc");

                  $select->execute();

                  while($row=$select->fetch(PDO::FETCH_OBJ)){

                    echo'<tr>

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

       "order":[[2,"desc"]]




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
    $('.btndelete').click(function(){

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
