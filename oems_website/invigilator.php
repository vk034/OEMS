<?php
	include "config.php";
	session_start();
	if(isset($_SESSION['oems']) && !empty($_SESSION['oems'])){
		//$user = $_SESSION['oems'];
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
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#examstatus" data-toggle="tab"> <span class="visible-xs"><i class="entypo-home"></i></span> <span class="hidden-xs">Exam Status</span> </a>
							</li>
							<li>
								<a href="#examcomplete" data-toggle="tab"> <span class="visible-xs"><i class="entypo-mail"></i></span> <span class="hidden-xs">Exam Completed</span> </a>
							</li>
							<li>
								<a href="#changepass" data-toggle="tab"> <span class="visible-xs"><i class="entypo-mail"></i></span> <span class="hidden-xs">Change Password</span> </a>
							</li>
							<li>
								<a href="#examfiles" data-toggle="tab"> <span class="visible-xs"><i class="entypo-home"></i></span> <span class="hidden-xs">Exam Files</span> </a>
							</li>
							<li>
								<a href="#uploadfile" data-toggle="tab"> <span class="visible-xs"><i class="entypo-user"></i></span> <span class="hidden-xs">Upload File</span> </a>
							</li>
							<li>
								<a href="#evalute" data-toggle="tab"> <span class="visible-xs"><i class="entypo-mail"></i></span> <span class="hidden-xs">Evalute</span> </a>
							</li>
							<li>
								<a href="#others" data-toggle="tab"> <span class="visible-xs"><i class="entypo-mail"></i></span> <span class="hidden-xs">Queries</span> </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="examstatus">
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
												<th>Batch</th>
												<th>Branch</th>
												<th>Name</th>
												<th>Reset Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
                                  $sql = mysqli_query($con, "SELECT * FROM users WHERE examstatus = 1");
                                  while($studetails = mysqli_fetch_array($sql)){
                                ?>
												<tr>
													<td>
														<?php echo $studetails['1']; ?>
													</td>
													<td>
														<?php echo $studetails['2']; ?>
													</td>
													<td>
														<?php echo $studetails['3']; ?>
													</td>
													<td>
														<?php echo $studetails['4']; ?>
													</td>
													<td>
														<span onclick="resetStatus('<?php echo $studetails['0'];?>')"><button type="button" class="btn btn-danger btn-icon btn-xs">Reset<i class="entypo-cancel"></i></button></span>
													</td>
												</tr>
												<?php
                                        }
                                      ?>
										</tbody>
										<tfoot>
											<tr>
												<th>ID No</th>
												<th>Batch</th>
												<th>Branch</th>
												<th>Name</th>
												<th>Reset Status</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="examcomplete">
								<div class="col-md-12">
									<table class="table table-bordered">
										<thead>
											<tr class="replace-inputs">
												<th>S.No</th>
												<th>ID No</th>
												<th>Subject Code</th>
											</tr>
										</thead>
										<tbody>
											<?php
                                  $sql = mysqli_query($con, "SELECT userid,subjectcode FROM answers");
                                    $i = 0;
                                  while($studetails = mysqli_fetch_array($sql)){
                                ?>
												<tr>
													<td>
														<?php echo ++$i; ?>
													</td>
													<td>
														<?php echo $studetails['0']; ?>
													</td>
													<td>
														<?php echo $studetails['1']; ?>
													</td>
												</tr>
												<?php
                                        }
                                      ?>
										</tbody>
										<tfoot>
											<tr>
												<th>S.No</th>
												<th>ID No</th>
												<th>Subject Code</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="changepass">
								<div class="col-md-12 col-sm-offset-3">
									<br>
									<form role="form" class="form-horizontal" method="get" action="evalute.php">
										<div class="form-group">
											<div class="col-sm-8">
												<div class="form-group"> <label for="idno" class="col-sm-3 control-label">Student ID : </label>
													<div class="col-sm-5"> <input type="text" class="form-control" id="idno" placeholder="N120034"> </div>
												</div>
												<div class="form-group"> <label for="passwd" class="col-sm-3 control-label">Password : </label>
													<div class="col-sm-5"> <input type="text" class="form-control" id="passwd" placeholder="Password"> </div>
												</div>
												<div class="form-group"> <label for="cpasswd" class="col-sm-3 control-label">Confirm Password : </label>
													<div class="col-sm-5"> <input type="text" class="form-control" id="cpasswd" placeholder="Confirm Password"> </div>
												</div>
											</div>
											<div class="col-sm-5 col-sm-offset-3">
												<button type="button" class="btn btn-blue" onclick="changePassword()">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="tab-pane" id="examfiles">
								<div class="col-md-12">
									<table class="table table-bordered responsive">
										<thead>
											<tr>
												<th>SNo</th>
												<th>Event Name</th>
												<th>Event Code</th>
												<th>Event Password</th>
												<th>File Name</th>
												<th>Start Time</th>
												<th>Duration</th>
												<th>Delete</th>
												<th>Visible</th>
											</tr>
										</thead>
										<tbody>
											<?php
                                $sql = mysqli_query($con, "SELECT * FROM subject_passwords");
                                while($details = mysqli_fetch_array($sql)){
                            ?>
												<tr>
													<td>
														<?php echo $details['0']; ?>
													</td>
													<td>
														<?php echo $details['1']; ?>
													</td>
													<td>
														<?php echo $details['2']; ?>
													</td>
													<td>
														<?php echo $details['3']; ?>
													</td>
													<td>
														<?php echo $details['4']; ?>
													</td>
													<td>
														<?php echo $details['5']; ?>
													</td>
													<td>
														<?php echo $details['6']; ?>
													</td>
													<td>
														<a href="delete.php?sno=<?php echo $details['0']; ?>"><button type="button" class="btn btn-danger btn-icon btn-xs">Delete<i class="entypo-cancel"></i></button></a>
													</td>
													<td>
														<?php if($details ['7'] == 0){?>
														<span onClick="visible('<?php echo $details['0'];?>')"><button type="button" class="btn btn-info btn-icon btn-xs">Visible<i class="entypo-eye"></i></button></span>
														<?php } else{ echo 'Done';}?>
													</td>
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
										<div class="form-group"> <label for="field-1" class="col-sm-3 control-label">Event Name :</label>
											<div class="col-sm-5"> <input type="text" class="form-control" id="subname" name="subname" placeholder="Ex : Ting Tong" required> </div>
										</div>
										<div class="form-group"> <label for="field-1" class="col-sm-3 control-label">Event Code :</label>
											<div class="col-sm-5"> <input type="text" class="form-control" id="subcode" name="subcode" placeholder="Ex : CS105" required></div>
										</div>
										<div class="form-group"> <label for="field-1" class="col-sm-3 control-label">Event Password :</label>
											<div class="col-sm-5"> <input type="text" class="form-control" id="subpasswd" name="subpasswd" placeholder="Ex : jaffa" required></div>
										</div>
										<div class="form-group"> <label for="hours" class="col-sm-3 control-label">Hours :</label>
											<div class="col-sm-5"> <input type="text" class="form-control" id="hours" name="hours" placeholder="Ex : 00" maxlength='2' required></div>
										</div>
										<div class="form-group"> <label for="minutes" class="col-sm-3 control-label">Minutes :</label>
											<div class="col-sm-5"> <input type="text" class="form-control" id="minutes" name="minutes" placeholder="Ex : 00" maxlength='2' required></div>
										</div>
										<div class="form-group"> <label for="seconds" class="col-sm-3 control-label">Seconds :</label>
											<div class="col-sm-5"> <input type="text" class="form-control" id="seconds" name="seconds" placeholder="Ex : 00" maxlength='2' required></div>
										</div>
										<div class="form-group"> <label for="duration" class="col-sm-3 control-label">Duration :</label>
											<div class="col-sm-5"> <input type="text" class="form-control" id="duration" name="duration" placeholder="Ex : 60" required></div>
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
							<div class="tab-pane" id="evalute">
								<div class="col-md-12 col-sm-offset-3">
									<form role="form" class="form-horizontal" method="get" action="evalute.php">
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
							<div class="tab-pane" id="others">
								<div class="col-md-12 col-sm-offset-3">
									<h3>Venkatesh Kalisetty - N120034 - 8500125473</h3>
									<h3>Durgaprasad - N120937 - 9581914911</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

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
				<script>
					function visible(sno) {
						$.ajax({
							url: "pages/register.php",
							method: "post",
							data: {
								"sno": sno
							},
							success: function(data) {
								if (data == 1) {
									window.location.reload();
								} else {
									alert(data);
									alert("Something error");
								}
							}
						});
					}

					function changePassword() {
						var studentId = $("#idno").val();
						var password = $('#passwd').val();
						var confirmPassword = $("#cpasswd").val();
						if (password == confirmPassword) {
							$.ajax({
								url: "pages/register.php",
								method: "post",
								data: {
									"studentId": studentId,
									"password": password
								},
								success: function(data) {
									if (data == 1) {
										alert("successfully password changed");
										window.location.reload();
									} else {
										alert(data);
										alert("Something error");
									}
								}
							});
						} else {
							alert("passwords should match");
						}
					}

					function resetStatus(id) {
						$.ajax({
							url: "pages/register.php",
							method: "post",
							data: {
								"resetSno": id
							},
							success: function(data) {
								if (data == 1) {
									alert("Reset Successfull");
									window.location.reload();
								} else {
									alert(data);
									alert("Something error");
								}
							}
						});
					}

				</script>
