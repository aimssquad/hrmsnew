<?php

include 'include/connection.php';
include 'header_data.php';

$id=$_GET['id'];


$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM leavea where id='$id'"));


if (isset($_POST['submit'])) {
	
	$status=$_POST['status'];
	$hr_remarks=$conn -> real_escape_string($_POST['hr_remarks']);;



   $result=mysqli_query($conn,"UPDATE `leavea` SET `status` = '$status', `hr_remarks` = '$hr_remarks' WHERE `leavea`.`id` = '$id'");

   if ($result) {

                          echo '<script>';
                            echo 'alert("Leave Reuest Update Sucessfull");';
                            echo 'window.location.href = "leave.php";';
									echo '</script>';
   	             
   	
   }else{
       echo '<script>';
                            echo 'alert("Leave Reuest  Update faild");';
                            echo 'window.location.href = "updateleave.php";';
									echo '</script>';
   		                    
   }

}

?>



						<div class="module">
							
							<div class="module-body">

									

									
                               <!-- add employee from -->

									<form action="" method="post" class="form-horizontal row-fluid" >
										
                                       <div class="control-group">
											<label class="control-label" for="basicinput">EMP_ID</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="text"  value="<?php echo $row['emp_id'];  ?>" data-original-title="" class="span6 " disabled>
											</div>
										</div>


										 <div class="control-group">
											<label class="control-label" for="basicinput">EMP_NAME</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="text"  value="<?php echo $row['emp_name'];  ?>"  data-original-title="" class="span6 " disabled>
											</div>
										</div>

										 <div class="control-group">
											<label class="control-label" for="basicinput">Date</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="date" value="<?php echo $row['date'];  ?>" placeholder="" data-original-title="" class="span6 " disabled>
											</div>
										</div>



										 <div class="control-group">
											<label class="control-label" for="basicinput">Request Type</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="text"  value="<?php  echo $row['type'] ?>" placeholder="" data-original-title="" class="span6 " disabled>
											</div>
										</div>

										   <div class="control-group">
											<label class="control-label" for="basicinput">Remarks</label>
											<div class="controls">
												<textarea class="span8" rows="3" disabled><?php echo $row['remarks'];  ?></textarea>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Status</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span8" name="status" required>
													<option value="">Select here..</option>
													<option value="0" >Pending</option>
													<option value="1">Approved</option>
													<option value="2">Rejected</option>
													
												</select>
											</div>
										</div>

										  <div class="control-group">
											<label class="control-label" for="basicinput">HR Remarks</label>
											<div class="controls">
												<textarea class="span8" rows="3" name="hr_remarks"></textarea>
											</div>
										</div>
										

										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn" name="submit" >Update Leave</button>
											</div>
										</div>
									</form>

									<br>

                </div>
            </div>
