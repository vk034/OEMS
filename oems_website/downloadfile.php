<?php
  include 'header.php';
  include "config.php";
 ?>
 <section class="breadcrumb">
    <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <h1>Download JAR Files</h1>
            <ol class="breadcrumb bc-3">
                <li> <a href="index.php"><i class="fa-home"></i>Home</a> </li>
                <li> <strong>Download Files</strong> </li>
            </ol>
          </div>
          <div class="col-sm-3">
            <h2 class="text-muted text-right">Updated</h2>
          </div>
      </div>
    </div>
  </section>
 <div class="container">
   <div class="row">
       <div class="col-md-12">
		   <!--h3 style="text-align:center;"><a href="exam_files/BlindCodingRound1Problem.pdf" download>Download Blind Coding Question Paper</a></h3-->
		   <br><br>
           <table class="table table-bordered responsive">
               <thead>
                   <tr>
                       <th>S.No</th>
                       <th>Subject name</th>
                       <th>Subject code</th>
                       <th>Subject Password</th>
                       <th>Filename</th>
                       <th>Download</th>
                   </tr>
               </thead>
               <tbody>
                 <?php
				   $i = 0;
                   $sql = mysqli_query($con, "SELECT * FROM subject_passwords WHERE visible = 1");
                   while($details = mysqli_fetch_array($sql) or die(mysqli_error($con))){
                   ?>
                   <tr>
                       <td><?php echo ++$i; ?></td>
                       <td><?php echo $details['1']; ?></td>
                       <td><?php echo $details['2']; ?></td>
                       <td><?php echo $details['3']; ?></td>
                       <td><?php echo $details['4']; ?></td>
                       <td><a href="exam_files/<?php echo $details['4']; ?>">Download here</a></td>
                   </tr>
                   <?php
                     }
                   ?>
               </tbody>
           </table>
       </div>
   </div>
 </div>
<p>venkatesh</p>

<?php 
	include 'footer.php';
?>
