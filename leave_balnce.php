<?php

include 'include/connection.php';
include 'header_data.php';

?>




						<div class="module">
							<div class="module-head">
								<button type="button" id="formButton" style="display: block; border:none; " class="btn-success">Add Leave Balance</button>
							</div>
							<div class="module-body">

									

									
                               <!-- add employee from  -->

									<form name="myForm" action="insertleavebalance.php" method="post" class="form-horizontal row-fluid" id="form1" style="display: none;" enctype="multipart/form-data" >


									


											<div class="control-group">
											<label class="control-label" for="basicinput">Employee Name</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span8" name="emp_id" required>
													<option value="">Select here..</option>
   
                                                      <?php  

                                                            $sql=mysqli_query($conn,"SELECT `emp`,`emp_id` FROM `emp` WHERE `status`=0");

                                                            while($row=mysqli_fetch_assoc($sql)){


                                                      ?>
													
													<option value="<?php echo $row['emp_id'] ?>"><?php echo $row['emp']; ?></option>
												

													<?php
												}

													?>
													
												</select>
											</div>
										</div>
										
                                      <div class="control-group">
											<label class="control-label" for="basicinput">Leave Balance</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" placeholder="Enter Levae blance(Number only)....." data-original-title="" name="balance"  class="span8 ">
											
												
											</div>
											
										</div>

										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn" name="submit">Submit Form</button>
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
                           
                                <div class="btn-group pull-right " data-toggle="buttons-radio">
                                    <button type="button" class="btn btn-success">
                                        Update Leave Balnce(Monthly)</button>
                                   
                                </div>
                            </div>


                            	<table class="table table-striped table-bordered table-condensed">
								  <thead>
									<tr>
									  
									  <th>Emp_ID</th>
									  <th>Emp_Name</th>
									  <th>Leave Balance</th>
									  <th>Update_date_time</th>
									  <th>Status</th>
									  <th></th>
									</tr>
								  </thead>
								  <tbody>
									<?php
                                     $sql="SELECT leave_balance.*,emp.emp FROM `leave_balance` ,emp WHERE leave_balance.emp_id=emp.emp_id and leave_balance.status=0" ;
                                     $res=mysqli_query($conn,$sql);

                                   
                                  

                                     while($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       
                                      
                                       <td> <?php  echo $row['emp_id'];  ?> </td>
                                       <td> <?php  echo $row['emp'];  ?> </td>
                                       <td> <?php  echo $row['balance'];  ?></td>
                                       <td> <?php  echo $row['update_at'];  ?></td>
                                       


                                       <td> 
                                          <?php
                                              if ($row['status'] == 0) {
                                                 echo "<span class='badge badge-complete' >
                                                 <a href='#?status=".$row['status']." &id=".$row['id']." ' class='text-color'>Active</a></span>&nbsp;";
                                              }
                                              else
                                              {
                                                echo "<span class='badge badge-delete' >
                                                 <a href='#?status=".$row['status']." &id=".$row['id']." ' class='text-color'>Deactive</a></span>&nbsp;";

                                              }

                                               echo "<span class='badge badge-edit' ><a href='#?id=".$row['id']."' class='text-color' class='text-color'>Update</a></span>";

                                               echo "&nbsp;<span class='badge badge-delete' > <a href='#?id=".$row['id']."' class='text-color'>Delete</a></span> &nbsp;";
                                             

                                              
                                          ?>

                                        </td>
                                     
                                    </tr>

                                 <?php   }  ?>
								  </tbody>
								</table>

                                </div>


                                <!-- End Table View  -->

                                    <!-- End List View part -->
						<?php
                     include 'footer.php';
						?>
  

    <script>

  $(document).ready(function() {
  $("#formButton").click(function() {
    $("#form1").toggle();
  });
});
</script>


