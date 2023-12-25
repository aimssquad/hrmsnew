<?php

include 'include/connection.php';
include 'header_data.php';

$id=$_GET['id'];


$sql_query=mysqli_query($conn,"SELECT * FROM `employee` where emp_id=$id");
$row=mysqli_fetch_assoc($sql_query);
$sql_query1=mysqli_query($conn,"SELECT * FROM `emp` where emp_id=$id");
$row1=mysqli_fetch_assoc($sql_query1);

$emp_id=$row1['emp_id'];
$process=$row1['process'];
$password=$row1['password'];
$role=$row['role'];
$position=$row['position'];
$tl=$row['tl'];
$doj=$row['doj'];
$omail=$row['omail'];
$salary=$row['salary'];
$salary_date=$row['salary_date'];
$name=$row['name'];
?>
									<div class="module-head">
								

								<ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Job Information</a></li>
                                   
                                </ul>
							</div>

									
                                 


                                   <!-- Table View part -->

                                 <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">
                              
                               <div class="module">

                                  	<div class="module-body">

                                  		<form action="employee_update.php" method="post">

                                  			<input type="hidden" name="id"  value="<?php echo $id ; ?>">
                              

                              <div class="control-group">
											<label class="control-label" for="basicinput">Emp_id</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" placeholder="Type Emp_id....." data-original-title="" name="emp_id"  class="span8 " value="<?php echo $emp_id ?>" readonly>
											
											</div>
											
										</div>

										     <div class="control-group">
											<label class="control-label" for="basicinput">Name</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" placeholder="Type Emp_id....." data-original-title="" name="name"  class="span8 " value="<?php echo $name ?>" readonly>
											
											</div>
											
										</div>

										   <div class="control-group">
											<label class="control-label" for="basicinput">Password</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" placeholder="" data-original-title="" name="password"  class="span8 " value="<?php echo $password ?>" >
											
											</div>
											
										</div>

										   <div class="control-group">
											<label class="control-label" for="basicinput">Process</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text"  data-original-title="" name="process"  class="span8 " value="<?php echo $process ?>" >
											
											</div>
											
										</div>


											<div class="control-group">
											<label class="control-label" for="basicinput">Role</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span4" name="role" required>
													<option value="<?php echo $role ?>"><?php echo $role ?></option>
													<option>Production</option>
													<option>Support</option>
													
												</select>
											</div>
										</div>

											<div class="control-group">
											<label class="control-label" for="basicinput">Position</label>
											<div class="controls">
												<div class="input-append">
													<input type="text" name="position"  placeholder="" class="span6" value="<?php echo $position ?>" >
												</div>
											</div>
										</div>
										
                                      <div class="control-group">
											<label class="control-label" for="basicinput">Team Leader</label>
											<div class="controls">
													<select tabindex="1" data-placeholder="Select here.." class="span6" name="tl">
													<option value="<?php echo $tl; ?>" ><?php echo $tl ?></option>
													<option value="Jaison">Jaison</option>
													<option value="Jincy">Jincy</option>
													<option value="Riya">Riya</option>
													<option value="Mukund">Mukund</option>
												
												
												</select>
											</div>
											
										</div>

										  <div class="control-group">
											<label class="control-label" for="basicinput">Date of Joining</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="date" name="doj" placeholder="" data-original-title="" class="span6 " value="<?php echo $doj ?>" >
											</div>
										</div>

											<div class="control-group">
											<label class="control-label" for="basicinput">Official Mail Id</label>
											<div class="controls">
												<div class="input-append">
													<input type="text" name="omail"  placeholder="" class="span6" value="<?php echo $omail ?>" >
												</div>
											</div>
										</div>

										  <div class="control-group">
											<label class="control-label" for="basicinput">Salary Date</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="text" name="salary_date" placeholder="" data-original-title="" class="span6 " value="<?php echo $salary_date ?>" >
											</div>
										</div>

											<div class="control-group">
											<label class="control-label" for="basicinput">Salary</label>
											<div class="controls">
												<div class="input-append">
													<input type="text" name="salary"  placeholder="" value="<?php echo  $salary ?>"  class="span4">
												</div>
											</div>
										</div>

                                         	<div class="control-group">
										 <button type="submit" name="job" class="btn btn-success btn-left">Update</button>
										</div>

										</form>

                                </div>
                            </div>

                               


                             


                            

                                </div>


                                <!-- End Table View  -->



                             






                                  </div>

                                  




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


