<?php
	include "config.php";
	session_start();
	if(($_SESSION['oems']!=NULL)){
		$user = $_SESSION['oems'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="Laborator.co" />
    <link rel="icon" href="assets/frontend/images/favicon.ico">
    <title>OEMS | Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css" id="style-resource-1">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css" id="style-resource-2">
    <link rel="stylesheet" href="assets/css/neon.css" id="style-resource-3">
    <link rel="stylesheet" href="assets/css/neon-core.css" id="style-resource-3">
    <script src="assets/js/jquery-1.11.3.min.js"></script>

</head>

<body>
    <div class="wrap">

 <section class="breadcrumb">
    <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <h1>OEMS | Admin Panel</h1>
            <!--ol class="breadcrumb bc-3" >
                <li style="color:#0ff; font-size:18px;font-weight:bold;text-transform:uppercase;" ><i class="fa fa-user"></i>Venkatesh</li>
            </ol-->
          </div>
          <div class="col-sm-3">
            <h2 class="text-muted text-right"><a href="logout.php" class="btn btn-secondary">Logout&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a> </h2>
          </div>
      </div>
    </div>
  </section>
 <div class="container">
   <div class="row">
         <div class="col-md-12">
                   <ul class="nav nav-tabs">
                       <li class="active">
                           <a href="#examfiles" data-toggle="tab"> <span class="visible-xs"><i class="entypo-home"></i></span> <span class="hidden-xs">Exam Files</span> </a>
                       </li>
                       <li>
                           <a href="#uploadfile" data-toggle="tab"> <span class="visible-xs"><i class="entypo-user"></i></span> <span class="hidden-xs">Upload File</span> </a>
                       </li>
                       <li>
                           <a href="#others" data-toggle="tab"> <span class="visible-xs"><i class="entypo-mail"></i></span> <span class="hidden-xs">Evalute Answers</span> </a>
                       </li>
                   </ul>
                   <div class="tab-content">
                       <div class="tab-pane active" id="examfiles">
                         <div class="col-md-12">
                   <table class="table table-bordered responsive">
                       <thead>
                           <tr>
                               <th>SNo</th>
                               <th>Year</th>
                               <th>Branch</th>
                               <th>Subject Name</th>
                               <th>Subject Code</th>
                               <th>Subject Password</th>
                               <th>Filename</th>
                               <th>Delete</th>
                           </tr>
                       </thead>
                       <tbody>
                          <?php
                            $sql = mysqli_query($con, "SELECT * FROM subject_passwords");
                            while($details = mysqli_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?php echo $details['0']; ?></td>
                                <td><?php echo $details['1']; ?></td>
                                <td><?php echo $details['2']; ?></td>
                                <td><?php echo $details['3']; ?></td>
                                <td><?php echo $details['4']; ?></td>
                                <td><?php echo $details['5']; ?></td>
                                <td><?php echo $details['6']; ?></td>
                                <td><a href="delete.php?sno=<?php echo $details['0']; ?>"><button type="button" class="btn btn-danger btn-icon btn-xs">Delete<i class="entypo-cancel"></i></button></a></td>
                            </tr>
                            <?php
                              }
                            ?>

                       </tbody>
                   </table>
               </div>
                       </div>
                       <div class="tab-pane" id="uploadfile">
                           <div class="panel-body">
                             <form role="form" class="form-horizontal" method="post" action="examfile_values.php" enctype="multipart/form-data">
                               <div class="form-group"> <label class="col-sm-3 control-label">Year :</label>
                                    <div class="col-sm-5">
                                    <select class="form-control" name="year" required>
                                      <option name="">-Select-</option>
                                      <option name="PUC">PUC</option>
                                      <option name="E1">E1</option>
                                      <option name="E2">E2</option>
                                      <option name="E3">E3</option>
                                      <option name="E4">E4</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group"> <label class="col-sm-3 control-label">Branch :</label>
                                     <div class="col-sm-5">
                                     <select class="form-control" name="branch" required>
                                       <option name="">-Select-</option>
                                       <option name="PUC">PUC</option>
                                       <option name="CSE">CSE</option>
                                       <option name="ECE">ECE</option>
                                       <option name="ME">ME</option>
                                       <option name="CE">CE</option>
                                     </select>
                                   </div>
                                 </div>
                               <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">Subject Name :</label>
                                    <div class="col-sm-5"> <input type="text" class="form-control" id="subname" name="subname" placeholder="Ex : Computer Networks" required> </div>
                                </div>
                                <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">Subject Code :</label>
                                     <div class="col-sm-5"> <input type="text" class="form-control" id="subcode" name="subcode" placeholder="Ex : CS105" required></div>
                                 </div>
                                 <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">Subject Password :</label>
                                      <div class="col-sm-5"> <input type="text" class="form-control" id="subpasswd" name="subpasswd" placeholder="Ex : rguktwifi" required></div>
                                  </div>
                                  <div class="form-group"> <label for="field-1" class="col-sm-3 control-label">Exam JAR File :</label>
                                    <div class="col-sm-5"> <input type="file" class="form-control" id="subfile" name="subfile" placeholder="Jar File" required></div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-sm-offset-5 col-sm-5"> <button type="submit" class="btn btn-success" name="examsubmit">Submit</button> </div>
                                  </div>
                             </form>
                           </div>
                       </div>
                       <div class="tab-pane" id="others">
                         <div class="col-md-12 col-sm-offset-3">
                           <form role="form" class="form-horizontal"  method="get" action="evalute.php">
                             <div class="form-group">
                                  <div class="col-sm-5">
                                      <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Subject Code" name="sub" id="sub">
                                        <span class="input-group-btn"> <button class="btn btn-primary" type="submit">Submit..!!</button> </span>
                                      </div>
                                  </div>
                              </div>
                          </form>
                         </div>
                       </div>
                   </div> <br />
                 </div>
           </div>
   </div>
 </div>
 <br /> <br /> <br />

<?php
  include 'footer.php';

	}else{
		header("Location:login.php");
	}
?>
