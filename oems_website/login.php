<?php
	session_start();
	if(isset($_SESSION['oems'])){
		header("location:invigilator.php");
	}else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Venkatesh Kalisetty">
  	<meta name="description" content="Regarding OEMS">
    <link rel="icon" href="assets/images/logo.png">
    <title>OEMS | Login</title>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/neon-theme.css">
</head>

<body class="page-body login-page login-form-fall">
    <div class="login-container">
        <div class="login-header login-caret">
            <div class="login-contenttitle">
                <h1>Online Exam Management System</h1>
                <p class="description" style="color:#0ff;">Dear invigilator / admin, log in to access the admin panel...!!</p>
            </div>
        </div>
        <br>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel" >
                    <div class="panel-body">
                        <form role="form" action="login.php"  method="post" >
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" id="username" >
                                </div>
                                <div class="form-group">
                                  <input class="form-control" placeholder="Password" name="password" type="password" id="password" value="">
                                </div>
                                <button type=submit name="login"  class="btn btn-lg btn-primary btn-block">Sign in&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-sign-in"></i>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

    </div>
    <script type="text/javascript">window.jQuery || document.write('<script src="assets/js/jquery-2.1.0.min.js"><\/script>')</script>
    <script src="assets/js/TweenMax.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- JavaScripts initializations and stuff -->
      <script type="text/javascript">
      function forget(){
        alert("Contact webteam....!");
      }
      </script>
</body>
</html>
<?php
	}

	if(isset($_POST['login'])){
		$user = htmlentities(mysql_real_escape_string($_POST['username']));
		$passwd = htmlentities(mysql_real_escape_string($_POST['password']));
		include "config.php";
		$sql = mysqli_query($con, "SELECT * FROM adminusers WHERE userid='$user' AND password='$passwd'");
		$row = mysqli_fetch_array($sql);
		if(empty($row)){
			echo "<script>alert('Invalid Details');</script>";
		}else{
			//echo "<script>alert('Success');</script>";
			$_SESSION['oems'] = $user;
			header("location:invigilator.php");
			//$cat = $row['category'];
			//if($cat == 'admin') echo "<script>window.location='admin.php';</script>";
			//else echo "<script>window.location='invigilator.php';</script>";
		}
	}

?>
