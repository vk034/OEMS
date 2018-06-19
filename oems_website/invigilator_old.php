<?php
	include "config.php";
	session_start();
	if(($_SESSION['oems']!=NULL)){
		$user=$_SESSION['oems'];
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
            <h1>OEMS | Invigilator Panel</h1>
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
         <script type="text/javascript">
              jQuery(document).ready(function($) {
                  var $table3 = jQuery("#table-3");
                  var table3 = $table3.DataTable({
                      "aLengthMenu": [
                          [10, 25, 50, -1],
                          [10, 25, 50, "All"]
                      ]
                  });
                  // Initalize Select Dropdown after DataTables is created
                  $table3.closest('.dataTables_wrapper').find('select').select2({
                      minimumResultsForSearch: -1
                  });
                  // Setup - add a text input to each footer cell
                  $('#table-3 tfoot th').each(function() {
                      var title = $('#table-3 thead th').eq($(this).index()).text();
                      $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
                  });
                  // Apply the search
                  table3.columns().every(function() {
                      var that = this;
                      $('input', this.footer()).on('keyup change', function() {
                          if (that.search() !== this.value) {
                              that
                                  .search(this.value)
                                  .draw();
                          }
                      });
                  });
              });
          </script>
          <table class="table table-bordered datatable" id="table-3">
              <thead>
                  <tr class="replace-inputs">
                      <th>ID No</th>
                      <th>Name</th>
                      <th>Branch</th>
                      <th>Year</th>
                      <th>Reset Status</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  $sql = mysqli_query($con, "SELECT * FROM users WHERE examstatus = 1");
                  while($studetails = mysqli_fetch_array($sql)){
                  ?>
                  <tr>
                      <td><?php echo $studetails['1']; ?></td>
                      <td><?php echo $studetails['2']; ?></td>
                      <td><?php echo $studetails['3']; ?></td>
                      <td><?php echo $studetails['4']; ?></td>
                      <td><a href="reset.php?sno=<?php echo $studetails['0']; ?>"><button type="button" class="btn btn-danger btn-icon btn-xs">Reset<i class="entypo-cancel"></i></button></a></td>
                  </tr>
                  <?php
                    }
                  ?>
              </tbody>
              <tfoot>
                  <tr>
                    <th>ID No</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Year</th>
                    <th>Status</th>
                  </tr>
              </tfoot>
          </table> <br />
       </div>
   </div>
 </div>
 <br /> <br /> <br />

 <link rel="stylesheet" href="assets/datatables/datatables.css" id="style-resource-1">
 <link rel="stylesheet" href="assets/select2/select2.css" id="style-resource-3">
 <script src="assets/frontend/js/bootstrap.js" id="script-resource-2"></script>
 <script src="assets/datatables/datatables.js" id="script-resource-8"></script>
 <script src="assets/select2/select2.min.js" id="script-resource-9"></script>

<?php
  include 'footer.php';

	}else{
		header("Location:login.php");
	}
?>
