<?php
session_start();
if(!isset($_SESSION['oems'])) header("location:login.php");
include 'config.php';
$sno = htmlspecialchars(mysql_real_escape_string($_GET['sno']));

$qry = mysqli_query($con, "delete  from subject_passwords where sno = '$sno' ") or die(mysql_error($con));
if($qry) echo "<script>alert('Deletion success');window.location.href='invigilator.php';</script>";
else echo "<script>alert('Error Occured..! Try again');window.location.href='admin.php';</script>";
?>
