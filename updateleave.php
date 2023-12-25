<?php

include 'include/connection.php';
include 'header_data.php';

$id=$_GET['id'];
$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM leavea where id='$id'"));
$emp_id = $row['emp_id'];
$emp_name = $row['emp_name'];
$from = $row ['date'];
$toDate = $row ['todate'];
$no = $row ['no_of_days'];
$datetime = $row['datetime'];

$emp_row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `employee` WHERE `emp_id`='$emp_id'"));
$mail = $emp_row['omail'];

if (isset($_POST['submit'])) {
	
	$status=$_POST['status'];

    if($status == 1){
		$status1 = "Approved";
	}elseif($status == 2){
		$status1 = "Rejected";
	}else{
        $status1 = "Pending";
	}

   $hr_remarks=$conn -> real_escape_string($_POST['hr_remarks']);
   $request_type=$conn -> real_escape_string($_POST['request_type']);
   $result=mysqli_query($conn,"UPDATE `leavea` SET `status` = '$status', `hr_remarks` = '$hr_remarks',`type` = '$request_type' WHERE `leavea`.`id` = '$id'");
  
   //mail code 

   $curl = curl_init();
   curl_setopt_array($curl, [
	 CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
	 CURLOPT_RETURNTRANSFER => true,
	 CURLOPT_ENCODING => "",
	 CURLOPT_MAXREDIRS => 10,
	 CURLOPT_TIMEOUT => 30,
	 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	 CURLOPT_CUSTOMREQUEST => "POST",
	 CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$emp_name\",\n      \"email\": \"$mail\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"mukund.mukesh@ensomerge.com\"\n    },\n    {\n      \"email\": \"abbas.uddin@ensomerge.com\"\n    }\n  ],\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4361\",\n  \"variables\": {\n    
	   \"VAR1\": \"$emp_name\",\n    
	   \"VAR2\": \"$datetime\",\n    
	   \"VAR3\":\"$from\",\n   
	   \"VAR4\":\"$toDate\",\n  
	   \"VAR5\":\"$hr_remarks\",\n  
	   \"VAR6\":\"$status1\"\n 
	   }\n}",
	 CURLOPT_HTTPHEADER => [
	   "Accept: application/json",
	   "Content-Type: application/JSON",
	   "authkey: 372323AjwXe2wBhWIR61efa85aP1"
	 ],
   ]);


   if ($result) {
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		echo "cURL Error #:" . $err;
		} else {
		//echo $response;
		}
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
											<label class="control-label" for="basicinput">From Date</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="date" value="<?php echo $row['date'];  ?>" placeholder="" data-original-title="" class="span6 " disabled>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">To Date</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="date" value="<?php echo $row['todate'];  ?>" placeholder="" data-original-title="" class="span6 " disabled>
											</div>
										</div>

										<div class="control-group">
                                 <label class="control-label" for="basicinput">No of Days Leave</label>
                                 <div class="controls">
                                 <select tabindex="1" data-placeholder="Select here.." class="span8" name="no_of_days" readonly>
                                       
									   <?php
									        if($row['no_of_days'] == '0.5'){?>
                                                 <option value="0.5">Half day</option>
											<?php }else { ?>
												<option ><?php echo $row['no_of_days'];  ?></option>
											<?php }
									   ?>
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



										 <div class="control-group">
											<label class="control-label" for="basicinput">Request Type</label>
											<div class="controls">
											    <select tabindex="1" data-placeholder="Select here.." class="span8" name="request_type" >
													<option ><?php  echo $row['type'] ?></option>
													<?php
														$type_query = mysqli_query($conn,"SELECT * FROM `leave_type` WHERE role IN (1,3,2) and status=0 order by type ASC");  
														while ($type_row = mysqli_fetch_assoc($type_query)) { ?>
														<option value="<?php echo $type_row['type'] ?>"><?php echo $type_row['type'] ?></option>

													<?php
														}
													?>
													
												</select>
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
												<textarea class="span8" rows="3" name="hr_remarks" required><?php echo $row['hr_remarks'];  ?></textarea>
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
