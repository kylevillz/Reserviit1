<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="" OR $_SESSION['role']=="customer" OR $_SESSION['role']=="Admin") {
  header('location:index.php');
}




include_once 'headeruser.php';


//
$select=$pdo->prepare("select SUM(saleprice) AS january from tbl_appointment where monthname(reserve_date)='January' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$january=($row->january);

$select=$pdo->prepare("select SUM(saleprice) AS february from tbl_appointment where monthname(reserve_date)='February' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$february=($row->february);

$select=$pdo->prepare("select SUM(saleprice) AS march from tbl_appointment where monthname(reserve_date)='March' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$march=($row->march);

$select=$pdo->prepare("select SUM(saleprice) AS april from tbl_appointment where monthname(reserve_date)='April' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$april=($row->april);

$select=$pdo->prepare("select SUM(saleprice) AS may from tbl_appointment where monthname(reserve_date)='May' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$may=($row->may);

$select=$pdo->prepare("select SUM(saleprice) AS june from tbl_appointment where monthname(reserve_date)='June' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$june=($row->june);

$select=$pdo->prepare("select SUM(saleprice) AS july from tbl_appointment where monthname(reserve_date)='July' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$july=($row->july);
//
$select=$pdo->prepare("select SUM(saleprice) AS august from tbl_appointment where monthname(reserve_date)='August' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$august=($row->august);
//
$select=$pdo->prepare("select SUM(saleprice) AS september from tbl_appointment where monthname(reserve_date)='September' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$september=($row->september);
//
$select=$pdo->prepare("select SUM(saleprice) AS october from tbl_appointment where monthname(reserve_date)='October' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$october=($row->october);
//
$select=$pdo->prepare("select SUM(saleprice) AS november from tbl_appointment where monthname(reserve_date)='November' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$november=($row->november);
//
$select=$pdo->prepare("select SUM(saleprice) AS december from tbl_appointment where monthname(reserve_date)='December' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$december=($row->december);

//


//Donut chart

$select=$pdo->prepare("select SUM(saleprice) AS coet from tbl_appointment where buildingname='coet' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$coet=($row->coet);

//

$select=$pdo->prepare("select SUM(saleprice) AS ccs from tbl_appointment where buildingname='ccs' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$ccs=($row->ccs);
//

$select=$pdo->prepare("select SUM(saleprice) AS csm from tbl_appointment where buildingname='csm' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$csm=($row->csm);
//

$select=$pdo->prepare("select SUM(saleprice) AS ced from tbl_appointment where buildingname='ced' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$ced=($row->ced);
//

$select=$pdo->prepare("select SUM(saleprice) AS cbaa from tbl_appointment where buildingname='cbaa' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$cbaa=($row->cbaa);
//

$select=$pdo->prepare("select SUM(saleprice) AS gymnasium from tbl_appointment where buildingname='gymnasium' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$gymnasium=($row->gymnasium);
//

$select=$pdo->prepare("select SUM(saleprice) AS court from tbl_appointment where buildingname='court' AND appointment_status='done';");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$court=($row->court);









 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <strong>Welcome back <?php echo $_SESSION['username']; ?> !</strong>
        <small></small>
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

        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <?php
				$phrase='Done';
				$select=$pdo->prepare("select SUM(saleprice) AS total from tbl_appointment where appointment_status='$phrase';");

                $select->execute();

                $row=$select->fetch(PDO::FETCH_OBJ);

                echo '<h3>'.$row->total.'</h3>';

                ?>

                <p>Total sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <?php  $select=$pdo->prepare("select COALESCE(SUM(saleprice) ,0) AS total from tbl_appointment where CURRENT_DATE = reserve_date AND appointment_status='Done';");

                $select->execute();

                $row=$select->fetch(PDO::FETCH_OBJ);
				
				
				

                echo '<h3>'.$row->total.'</h3>';

                ?>


                <p>Total sales for today</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-calculator"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                 <?php  $select=$pdo->prepare("select COUNT(customerid) AS total from tbl_customer;");

                $select->execute();

                $row=$select->fetch(PDO::FETCH_OBJ);

                echo '<h3>'.$row->total.'</h3>';

                ?>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                 <?php
				$phrase='Not yet done';
				$phrase1='';
				$select=$pdo->prepare("select COUNT(appointmentid) AS total from tbl_appointment where appointment_status='$phrase' or appointment_status = '$phrase1';");

                $select->execute();

                $row=$select->fetch(PDO::FETCH_OBJ);

                echo '<h3>'.$row->total.'</h3>';

                ?>

                <p>New Reservations</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-calendar"></i>
              </div>
             
            </div>
          </div>
          <div class="col-md-6">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Total sales per venue</h3>

                
              </div>
              <div class="box-body">
                <canvas id="pieChart" style="height:250px"></canvas>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Monthly sales</h3>
              </div>
              <div class="box-body">
                <div class="chart">
                  <canvas id="areaChart" style="height:309px"></canvas>
                </div>
              </div>
              <!-- /.box-body -->
            </div>

          </div>



          <!-- ./col -->
        </div>

    </section>
    <!-- ChartJS -->
    <script src="bower_components/chart.js/Chart.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <script>
      $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------
	

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
        // This will get the first returned node in the jQuery collection.
        var areaChart       = new Chart(areaChartCanvas)

        var areaChartData = {
          labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          datasets: [

            {
              label               : 'Digital Goods',
              fillColor           : 'rgba(60,141,188,0.9)',
              strokeColor         : 'rgba(60,141,188,0.8)',
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : [<?php echo $january; ?>,<?php echo $february; ?> , <?php echo $march; ?>, <?php echo $april; ?>, <?php echo $may; ?>, <?php echo $june; ?>, <?php echo $july; ?>, <?php echo $august; ?>, <?php echo $september; ?>, <?php echo $october; ?>, <?php echo $november; ?>, <?php echo $december; ?>]
            }
          ]
		  
        }
			var config ={
		  type: 'areaChart',
		  areaChartData,
		options: {
			
			  
			  scales: {
				  y: {
					  beginAtZero: true,
					  ticks: {
						  stepSize: 5000
					  }
				  }
			  }
		  }
	  };

        var areaChartOptions = {
			
          //Boolean - If we should show the scale at all
          showScale               : true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines      : false,
          //String - Colour of the grid lines
          scaleGridLineColor      : 'rgba(0,0,0,.05)',
          //Number - Width of the grid lines
          scaleGridLineWidth      : 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines  : true,
          //Boolean - Whether the line is curved between points
          bezierCurve             : true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension      : 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot                : false,
          //Number - Radius of each point dot in pixels
          pointDotRadius          : 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth     : 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius : 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke           : true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth      : 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill             : true,
          //String - A legend template
          legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio     : true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive              : true
		  
		  
        }
	  

        //Create the line chart
        areaChart.Line(areaChartData, areaChartOptions)

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
        var lineChart                = new Chart(lineChartCanvas)
        var lineChartOptions         = areaChartOptions
        lineChartOptions.datasetFill = false
        lineChart.Line(areaChartData, lineChartOptions)


      })
    </script>
    <script>
    $(function () {
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
	
	  {
        value    : <?php echo $coet;?>,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'COET'
      },
      {
        value    : <?php echo $ccs;?>,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'CCS'
      },
      {
        value    : <?php echo $csm;?>,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'CED'
      },
      {
        value    : <?php echo $ced;?>,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'CSM'
      },
      {
        value    : <?php echo $cbaa;?>,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'CBAA'
      },
      {
        value    : <?php echo $gymnasium;?>,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'GYMNASIUM'
      },
	  {
        value    : <?php echo $court;?>,
        color    : '#99A799',
        highlight: '#99A799',
        label    : 'COURT'
      }
   
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
})

    </script>
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
