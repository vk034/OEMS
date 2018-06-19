<?php 
include '../config.php';
if(isset($_POST['sno'])){
    $sno = $_POST['sno'];
    $sql = mysqli_query($con, "UPDATE  subject_passwords set visible = 1 WHERE sno = '$sno'");
    if($sql){
        echo '1';
    }else{
        echo '2';
    }
}
if(isset($_POST['studentId']) && isset($_POST['password'])){
	$studentId = htmlentities(mysql_real_escape_string($_POST["studentId"]));
	$password =  md5(htmlentities(mysql_real_escape_string($_POST["password"])));
	$sql = mysqli_query($con, "UPDATE users set passwd = '$password' WHERE idno = '$studentId'");
	if($sql){
		echo '1';
	}else{
		echo '2';
	}
}
if(isset($_POST['resetSno'])){
	$sno = htmlspecialchars(mysql_real_escape_string($_POST['resetSno']));
	$qry = mysqli_query($con, "UPDATE users SET examstatus=0 WHERE sno='$sno'") or die(mysqli_error($con));
	if($qry){
		echo '1';
	}
	else{
		echo "2";
	}
}
?>