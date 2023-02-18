<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>

<script src="bower_components/sweetalert/sweetalert.js"></script>


<?php
include_once 'connectdb.php';
session_start();

if(isset($_POST['btnsave'])){
  $username=$_POST['txtname'];
  $useremail=$_POST['txtemail'];
  $password=$_POST['txtpassword'];
  $role=$_POST['txtrole'];
  $approval=$_POST['txt_approval'];


  // echo $username .'-'. $useremail .'-'. $password .'-'. $userrole;
  if(!isset($username) || trim($username) == ''){

    echo '<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "ERROR!",
      text: "Name Field Empty! Try again",
      icon: "error",
      button: "Ok",
    });



    });

    </script>';
  }elseif (!isset($password) || trim($password) == '') {
    echo '<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "ERROR!",
      text: "Password Field Empty! Try again",
      icon: "error",
      button: "Ok",
    });



    });

    </script>';
  }


  else if(isset($_POST['txtemail'])){

    $row=$select=$pdo->prepare("select useremail from tbl_customer where useremail='$useremail'");
    $select->execute();

    if($select->rowCount() > 0){
      echo'<script type ="text/javascript">
      jQuery(function validation(){

        swal({
        title: "Warning!",
        text: "Email Already Exists!",
        icon: "warning",
        button: "Ok",
      });



      });

      </script>';
    }
    else {

      $insert=$pdo->prepare("insert into tbl_customer(username,useremail,password,role,approval)values(:name,:email,:pass,:role,:approval)");

      $insert->bindParam(':name',$username);
      $insert->bindParam(':email',$useremail);
      $insert->bindParam(':pass',$password);
      $insert->bindParam(':role',$role);
      $insert->bindParam(':approval',$approval);


       $insert->execute();
        echo'<script type ="text/javascript">
        jQuery(function validation(){

          swal({
          title: "Good Job!",
          text: "Registration Successful!",
          icon: "success",
          button: "Ok",
        });



        });

        </script>';


    }
  }
}






 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
	<style>
		.register-background{
			background: url(campus.png);
			background-repeat: no-repeat;
			background-size: cover;
			backdrop-filter: blur(10px);
		}
	</style>

  <style>
		.card.mt-5.p-3{
			top: 110px;
		}
	</style>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-background">
	<div class="container d-flex flex-row justify-content-center">

		<div class="card mt-5 p-3">
		  <div class="register-logo">
			 <a href="index.php"><b>RESERV</b>IIT</a>
		  </div>

		  <div class="card-body">
			 <p class="login-box-msg">Register a new membership</p>

			 <form action="" method="post" role="form">
				<div class="form-group mt-3 has-feedback">
				  <input name="txtname" type="text" class="form-control" placeholder="Full name">
				  <span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group mt-3 has-feedback">
				  <input name="txtemail" type="email" class="form-control" placeholder="Email">
				  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group mt-3 has-feedback">
				  <input name="txtpassword" type="password" class="form-control" placeholder="Password">
				  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="form-group mt-3">
				  <label></label>
				  <input type="text" class="form-control" name="txtrole" value="customer" style="display:none;"  placeholder="Enter name..." required>
				</div>
        <div class="data">
          <label></label>
          <input type="text" name="txt_approval" value="not yet approved!" style="display:none;" required />
        </div>

				<div class="row">
				  <div class="col-xs-8">
					 <div class="checkbox icheck">
						<label>
						  <input type="checkbox" > I agree to the <a href="https://www.msuiit.edu.ph/legalities/index.php#terms-conditions"  style="color:#d73925;">terms</a>
						</label>
					 </div>
				  </div>
				  <!-- /.col -->
				  <div class="col-xs-4">
					 <button type="submit" name="btnsave" class="btn btn-danger btn-block btn-flat mt-3">Register</button>
				  </div>
				  <!-- /.col -->
				</div>
			 </form>



			 <a href="index.php" class="text-center" style="color:#d73925;">I already have a membership</a>
		  </div>
		  <!-- /.form-box -->
		</div>
	</div>
<!-- /.register-box -->
<!-- jQuery 3 -->

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

</body>
</html>
