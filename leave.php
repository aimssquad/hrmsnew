<?php

include 'include/connection.php';
include 'header_data.php';

?>



						<div class="module">
							
							<div class="module-body">

									

									
                               <!-- add employee from -->

								<form action="leave.php" method="post" class="form-horizontal row-fluid" id="form1" enctype="multipart/form-data">
    <div class="control-group">
        <label class="control-label" for="basicinput">From Date</label>
        <div class="controls">
            <input data-title="A tooltip for the input" type="date" name="startdate" placeholder="" data-original-title="" class="span6" value="<?php echo isset($_POST['startdate']) ? $_POST['startdate'] : ''; ?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="basicinput">To Date</label>
        <div class="controls">
            <input data-title="A tooltip for the input" type="date" name="enddate" placeholder="" data-original-title="" class="span6" value="<?php echo isset($_POST['enddate']) ? $_POST['enddate'] : ''; ?>">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="basicinput">Status</label>
        <div class="controls">
            <select name="status">
                <option value="">Please select</option>
                <option value="0" <?php echo isset($_POST['status']) && $_POST['status'] == '0' ? 'selected' : ''; ?>>Pending</option>
                <option value="1" <?php echo isset($_POST['status']) && $_POST['status'] == '1' ? 'selected' : ''; ?>>Approved</option>
                <option value="2" <?php echo isset($_POST['status']) && $_POST['status'] == '2' ? 'selected' : ''; ?>>Rejected</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="basicinput">Employee</label>
        <div class="controls">
            <select name="emp">
                <option value="">Please select Employee..</option>
                <?php 
                $emp_sql=mysqli_query($conn,"SELECT * FROM `emp` WHERE `status`=0");
                while ($emp_row=mysqli_fetch_assoc($emp_sql)) { 
                    $selected = isset($_POST['emp']) && $_POST['emp'] == $emp_row['emp_id'] ? 'selected' : '';
                ?>
                    <option value="<?php echo $emp_row['emp_id'] ?>" <?php echo $selected ?>><?php echo $emp_row['emp'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn" name="submit" id="submit">Search</button>
        </div>
    </div>
</form>


									<br>


				
									<!-- End Form -->


									<!-- Start View part -->

									<ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Table View</a></li>
                                   
                                </ul>



                                   <!-- Table View part -->

                                 <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">


                            <div class="module-option clearfix">
                                <form action="" method="post" id="form2">
                                <div class="input-append pull-left">
                                    <input type="text" class="span3" placeholder="Filter by id..." name="filter">
                                    <button type="submit" class="btn" name="search">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                                <div class="btn-group pull-right" data-toggle="buttons-radio">
                              <button  class="export-btn btn btn-primary">
                                        Export</button>
                                    
                                </div>
								<div class="btn-group pull-right" style="margin-right:10px;">
                              		<a href="leave_request.php" class="btn btn-primary">Leave Request</a>
                                </div>
                            </div>
                                </form>
                                
                            </div>


                            	<table class="table table-striped table-bordered table-condensed">
								  <thead>
									<tr>
									  <th>EMPNAME</th>
                                      <th>Applied Date</th>
									  <th>DATE</th>
                                      <th>Todate</th>
									  <th>No of Days</th>
									  <th>Request Type</th>
									  <th>Remarks</th>
									  <th>Hr Remarks</th>
									  <th>Status</th>
									  <th>Created By</th>
									  <th>Action</th>
									</tr>
								  </thead>
								  <tbody>
									<?php

									
										$sql="SELECT * from leavea order by date desc limit 20" ;
										$res=mysqli_query($conn,$sql);
   
									   
										if (isset($_POST['submit'])) {
											// Process form data
											$checkdate = $_POST['startdate'];
											$todate = $_POST['enddate'];
											$status = $_POST['status'];
											$emp_id = $_POST['emp'];
										
											// Store filter criteria in session
											$_SESSION['filter_criteria'] = compact('checkdate', 'todate', 'status', 'emp_id');
										}
										
										// Check if filter criteria is set in session
										if (isset($_SESSION['filter_criteria'])) {
											$filter_criteria = $_SESSION['filter_criteria'];
										
											// Construct SQL query based on filter criteria
											$sql = "SELECT * FROM leavea WHERE 1=1";
										
											// Add conditions based on filter criteria
											if (!empty($filter_criteria['checkdate']) && !empty($filter_criteria['todate'])) {
												$sql .= " AND date BETWEEN '{$filter_criteria['checkdate']}' AND '{$filter_criteria['todate']}'";
											}
										
											if (!empty($filter_criteria['status'])) {
												$sql .= " AND status='{$filter_criteria['status']}'";
											}
										
											if (!empty($filter_criteria['emp_id'])) {
												$sql .= " AND emp_id='{$filter_criteria['emp_id']}'";
											}
										
											// Add ORDER BY clause
											$sql .= " ORDER BY date DESC";
										
											// Execute the SQL query
											$res = mysqli_query($conn, $sql);
										}
									
                                 


									if (isset($res) && mysqli_num_rows($res) > 0) {
                                     while($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       
                                      
                                      
                                     
				      				   <td> <?php  echo $row['emp_name'];  ?></td>
                                       <td> <?php  echo $row['datetime'];  ?> </td>
				       				   <td> <?php  echo $row['date'];  ?></td>
                                       <td> <?php  echo $row['todate'];  ?></td>
									   <td> <?php  echo $row['no_of_days'];  ?></td>
                                       <td> <?php  echo $row['type'];  ?></td>
                                       <td> <?php  echo $row['remarks'];  ?></td>
                                       <td> <?php  echo $row['hr_remarks'];  ?></td>
                                     

                                     <?php 


                                       if ($row['status']==0) {
                                 	echo "<td>" . "Pending". "</td>";
                                 }elseif ($row['status']==1) {
                                 	echo "<td>" . "Approved". "</td>";
                                 }else{
                                 	echo "<td>" . "Rejectd". "</td>";
                                 }


                                      ?>




                                   <td> <?php  echo $row['created_by'];  ?></td>
                                       <td>
									   
                                       	<?php
                                           echo "<span class='badge badge-edit' ><a href='updateleave.php?id=".$row['id']."' class='text-color' class='text-color'>Update</a></span>";
                                        ?>
                                       </td>
                                     
                                    
                                       
                                          
                                     
                                    </tr>


                                 <?php  } 
									}else {
										// Handle case where no data is found
										echo "<tr><td colspan='11' style='color:red;'>No data found</td></tr>";
									}
								 ?>
								  </tbody>
								</table>

                                </div>


                                <!-- End Table View  -->


                                    <!-- End List View part -->
							</div>
						</div>

			</form>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>

						
	<script src="test.js" type="text/javascript"></script>
  

    <script>

  $(document).ready(function() {
  $("#search").click(function() {
    $("#form2").toggle();
  });
});
</script>


