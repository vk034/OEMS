<?php
  include 'header.php';
  include 'config.php';
 ?>
 <section class="breadcrumb">
    <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <h1>Result</h1>
            <ol class="breadcrumb bc-3">
                <li> <a href="index.php"><i class="fa-home"></i>Home</a> </li>
                <li> <strong> Result</strong> </li>
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
                      <th>S.No</th>
                      <th>ID No</th>
                      <th>Subject Code</th>
                      <th>Marks</th>
                  </tr>
              </thead>
              <tbody>
				  <?php
				  $i = 0;
                  $resultSql = mysqli_query($con, "SELECT * FROM answers");
                  while($result = mysqli_fetch_array($resultSql)){
                  ?>
                  <tr>
                      <td><?php echo ++$i; ?></td>
                      <td><?php echo $result['1']; ?></td>
                      <td><?php echo $result['2']; ?></td>
                      <td><?php echo $result['4']; ?></td>
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
                      <th>Marks</th>
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

<?php include 'footer.php'; ?>
