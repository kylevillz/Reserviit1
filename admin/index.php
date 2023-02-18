<!-- jQuery 3 -->
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

if(isset($_POST['btn_login'])) {

  $useremail = $_POST['txt_email'];
  $password = $_POST['txt_password'];

  // echo $useremail." - ".$password;
$select = $pdo->prepare("select * from tbl_user where useremail='$useremail' AND password='$password'");

$select->execute();
$row= $select->fetch(PDO::FETCH_ASSOC);
if ($row) {
  if($row['useremail']==$useremail AND $row['password']==$password AND $row['role']=='Admin' ){

  $_SESSION['userid'] = $row['userid'];
  $_SESSION['username'] = $row['username'];
  $_SESSION['useremail'] = $row['useremail'];
  $_SESSION['role'] = $row['role'];



  echo'<script type ="text/javascript">
  jQuery(function validation(){

    swal({
    title: "Good job! '.$_SESSION['username'].'",
    text: "Details Matched!",
    icon: "success",
    button: "Loading...",
  });



  });

  </script>';

    header('refresh:3;dashboard.php');
}


}



if ($row) {
  if($row['useremail']==$useremail AND $row['password']==$password AND $row['role']=='user'){
  $_SESSION['userid'] = $row['userid'];
  $_SESSION['username'] = $row['username'];
  $_SESSION['useremail'] = $row['useremail'];
  $_SESSION['role'] = $row['role'];

  echo'<script type ="text/javascript">
  jQuery(function validation(){

    swal({
    title: "Good job! '.$_SESSION['username'].'",
    text: "Details Matched!",
    icon: "success",
    button: "Loading...",
  });



  });

  </script>';

  header('refresh:3;user.php');
}


}else{
  echo'<script type ="text/javascript">
  jQuery(function validation(){

    swal({
    title: "Warning!",
    text: "Email Or Password is wrong!",
    icon: "warning",
    button: "Ok",
  });



  });

  </script>';
}

}


 ?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ReservIIT | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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
		.login-page{
			background: url(backg3.jpeg);
			background-repeat: no-repeat;
			background-size: cover;
			backdrop-filter: blur(60px);
		}
	</style>
  <style>
		.login-box-body, .register-box-body{
      position: relative;
    display: flex;
    flex-direction: column;
			border-radius: 0.7rem;
      border: 1px solid rgba(0,0,0,.125);
      background-clip: border-box;
      background-color: #fff;
      word-wrap: break-word;
      min-width: 0;
      margin-top: 250px;

		}
	</style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition login-page">
  <div class="container d-flex flex-row justify-content-center">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-logo">
      <a href="index.php"><b>RESERV</b>IIT <i class="fa fa-user-secret" aria-hidden="true"></i></a>
    </div>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="txt_email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="txt_password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
            <a href="#" onclick="swal('To Get Password','Please Contact Admin OR Service Provider','error')">I forgot my password</a><br>

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn_login">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <!-- /.social-auth-links -->




  </div>
  <!-- /.login-box-body -->
</div>
</div>
<!-- /.login-box -->


<!-- <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script> -->
</body>
</html>
