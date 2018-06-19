<?php
  include 'header.php';
 ?>
 <section class="breadcrumb">
    <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <h1>Check your Exam Status</h1>
            <ol class="breadcrumb bc-3">
                <li> <a href="index.php"><i class="fa-home"></i>Home</a> </li>
                <li> <strong> Selfcheck</strong> </li>
            </ol>
          </div>
          <!--div class="col-sm-3">
            <h2 class="text-muted text-right">Updated</h2>
          </div-->
      </div>
    </div>
  </section>
 <div class="container">
   <div class="row">
       <div class="col-md-10 col-sm-offset-4">
         <form method="post" action="selfcheck.php">
           <div class="form-group">
                <div class="col-sm-5">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="ID No" name="id" id="id" required>
						<!--input type="text" class="form-control" placeholder="Subject code" name="subcode" id="subcode" required-->
                       <span class="input-group-btn"> <button class="btn btn-primary" type="submit" name="check">Check..!!</button> </span>
                    </div>
                </div>
            </div>
         </form>
       </div>
   </div>
   <div>
     <center>
       <h3 id="selfcheck" style="display:none;font-weight:bold;color:red;">NOT SUBMITTED</h3>
       <h3 id="selfchecknot" style="display:none;font-weight:bold;">SUBMITTED</h3>
     </center>
   </div>
 </div>
 <br /> <br /> <br />
<?php
    include 'footer.php';

    if(isset($_POST['check'])){
  		$id = htmlentities(mysql_real_escape_string($_POST['id']));
  		//$subcode = htmlentities(mysql_real_escape_string($_POST['subcode']));
		//$code = strtoupper($subcode);
  		include "config.php";
  		$sql = mysqli_query($con, "SELECT * FROM answers WHERE userid='$id'");
  		$row = mysqli_fetch_array($sql);
  		if(empty($row)){
  			echo "<script>document.getElementById('selfcheck').style.display='block';</script>";
  		}else{
        echo "<script>document.getElementById('selfchecknot').style.display='block';</script>";
  		}
  	}
?>
