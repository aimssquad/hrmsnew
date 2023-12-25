<?php

include 'include/connection.php';
include 'header_data.php';
?>

<div class="module">
<div class="module-head">
   <h3>Leave Form</h3>
</div>
<div class="module-body">
   <form action="leave_request_insert.php" method="post" class="form-horizontal row-fluid">
      <input type="hidden" name="created_by" value="<?php echo $username ?>">
      <div class="control-group">
         <label class="control-label" for="basicinput">Employee Name</label>
         <div class="controls">
        
         <select name="name" class="span8 tip" id="" required>
            <option value="">Select...</option>
         <?php
            $emp_query = mysqli_query($conn,"SELECT * FROM `emp` WHERE status =0 order by emp asc");  
            while ($emp_row = mysqli_fetch_assoc($emp_query)) { ?>
            <option value="<?php echo $emp_row['emp_id'] ?>"><?php echo $emp_row['emp'] ?></option>

         <?php
            }
          ?>
         </select>
            
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="basicinput">From Date</label>
         <div class="controls">
            <input data-title="A tooltip for the input" type="date" placeholder="" data-original-title="" class="span8 tip" name="date" required> 
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="basicinput">To Date</label>
         <div class="controls">
            <input data-title="A tooltip for the input" type="date" placeholder="" data-original-title="" class="span8 tip" name="todate" required>
         </div>
      </div>
      <div class="control-group">
                                 <label class="control-label" for="basicinput">No of Days Leave</label>
                                 <div class="controls">
                                 <select tabindex="1" data-placeholder="Select here.." class="span8" name="no_of_days" required>
                                       <option value="">Select here..</option>
                                       <option value="0.5">Half day</option>
                                       <option>1</option>
                                       <option>2</option>
                                       <option>3</option>
                                       <option>4</option>
                                       <option>5</option>
                                       <option>6</option>
                                       <option>7</option>
                                       <option>8</option>
                                       <option>9</option>
                                       <option>10</option>
                                    </select>
                                 </div>
                              </div>
      <!-- <div class="control-group">
         <label class="control-label" for="basicinput">No of Days Leave</label>
         <div class="controls">
            <input data-title="A tooltip for the input" type="text" placeholder="" data-original-title="" class="span6 tip" name="no" required>
         </div>
      </div> -->
      <div class="control-group">
         <label class="control-label" for="basicinput">Type</label>
         <div class="controls">
            <select tabindex="1" data-placeholder="Select here.." class="span8" name="type" required>
            <option value="">Select...</option>
         <?php
            $type_query = mysqli_query($conn,"SELECT * FROM `leave_type` WHERE role IN (1,3) and status=0 order by type ASC");  
            while ($type_row = mysqli_fetch_assoc($type_query)) { ?>
            <option value="<?php echo $type_row['type'] ?>"><?php echo $type_row['type'] ?></option>

         <?php
            }
          ?>
                
            </select>
         </div>
      </div>
      <div class="control-group">
											<label class="control-label" for="basicinput">Status</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span8" name="status" required>
													<!-- <option value="">Select here..</option>
													<option value="0" >Pending</option> -->
													<option value="1">Approved</option>
													<!-- <option value="2">Rejected</option> -->
													
												</select>
											</div>
										</div>

										  <div class="control-group">
											<label class="control-label" for="basicinput">Admin Remarks</label>
											<div class="controls">
												<textarea class="span8" rows="3" name="hr_remarks" required></textarea>
											</div>
										</div>
										
      <div class="control-group">
         <div class="controls">
            <button type="submit" class="btn" name="submit">Submit Form</button>
         </div>
      </div>
   </form>
   <hr>
   <br>
</div>
</div>
</div>