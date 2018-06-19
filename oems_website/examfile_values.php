<?php
    include "config.php";

    //$year = htmlentities(mysql_real_escape_string($_POST["year"]));
    //$branch = htmlentities(mysql_real_escape_string($_POST["branch"]));
    $subname = htmlentities(mysql_real_escape_string($_POST["subname"]));
    $subcode = htmlentities(mysql_real_escape_string($_POST["subcode"]));
    $subpasswd = htmlentities(mysql_real_escape_string($_POST["subpasswd"]));
    $hour = htmlentities(mysql_real_escape_string($_POST["hours"]));
    $minutes = htmlentities(mysql_real_escape_string($_POST["minutes"]));
    $seconds = htmlentities(mysql_real_escape_string($_POST["seconds"]));
    $duration = htmlentities(mysql_real_escape_string($_POST['duration']));
    $time = $hour.':'.$minutes.':'.$seconds;

    $name = $_FILES['subfile']['name'];//For file uploading
    @$temp_name = $_FILES['subfile']['tmp_name'];
    $fileext = pathinfo($name,PATHINFO_EXTENSION);
    $ext = strtoupper($fileext);
    //echo $ext;
        if($ext == 'JAR'){
            $location = 'exam_files/';
            if(move_uploaded_file($temp_name, $location.$name)){
                //echo 'File uploaded successfully';
                $sql = "INSERT INTO subject_passwords (subname,subjectcode,subject_passwd,filename,starttime,duration)values('$subname','$subcode','$subpasswd','$name','$time','$duration')";
				mysqli_query($con, $sql)or die(mysqli_error($con));
            }
        }
        else{
          echo '<script>';
          echo "alert('Unsupported File....!!!');";
          echo '</script>';
        }

    echo "<script>window.location='invigilator.php';</script>";

?>
