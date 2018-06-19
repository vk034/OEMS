<?php
include "config.php";

//Declare marks for positive answers
$pos = 2;
//Declare marks for negative answers
$neg = 0.6;
$sub = mysql_real_escape_string($_GET['sub']);
$qry =  mysqli_query($con, "Select * from answers where subjectcode ='$sub' ") or die(mysqli_error($con));
$ans = array();
$org = array();
$array2 = mysqli_fetch_array(mysqli_query($con, "Select * from orginal_answers where subjectcode ='$sub' ")) or die(mysqli_error($con));
$array2 =  $array2['answers'];
$org = split('~',$array2);

while($array = mysqli_fetch_array($qry)){
	$count = 0;
	$answers = $array['answers'];
	$userid = $array['userid'];
	$ans = split('~',$answers);
	for($i =0; $i<10;$i++){
		if($ans[$i] == $org[$i]){
			$count = $count + $pos;
		}else if($ans[$i] != 'N'){
			$count = $count - $neg;
		}
	 }
	$ok = mysqli_query($con, "update answers set marks='$count' where subjectcode = '$sub' and userid = '$userid' ") or die(mysqli_error($con));
}

/*
while($array = mysqli_fetch_array($qry)){
	$count = 0;
	$answers = $array['answers'];
	$userid = $array['userid'];
	$ans = split('~',$answers);
	for($i =0; $i<20;$i++){
		if(empty($org[$i])){
			$count = $count;
		}else if($ans[$i] == $org[$i]){
			$count = $count + $pos;
		}else{
			$count = $count - $neg;
		}
	 }
	$ok = mysqli_query($con, "update answers set marks='$count' where subjectcode = '$sub' and userid = '$userid' ") or die(mysqli_error($con));
}
*/
	if($ok) echo "<script>alert('Successfully Evalution completed');window.location.href='invigilator.php'</script>";
?>
