<?php

include 'include/connection.php';
include 'header_data.php';

$id=$_GET['id'];


$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM present where id='$id'"));


if (isset($_POST['submit'])) {
	
	$login=$_POST['login'];
	$logout=$_POST['logout'];



   $result=mysqli_query($conn,"UPDATE present set login='$login',logout='$logout' where id='$id'");

   if ($result) {

                          echo '<script>';
                            echo 'alert("Attandance Update Sucessfull");';
                            echo 'window.location.href = "datewise.php";';
									echo '</script>';
   	             
   	
   }else{
       echo '<script>';
                            echo 'alert("Attandance Update faild");';
                            echo 'window.location.href = "updateattandance.php";';
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
											<label class="control-label" for="basicinput">Login</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="text" name="login" value="<?php  echo $row['login'] ?>" placeholder="" data-original-title="" class="span6 ">
											</div>
										</div>

										 <div class="control-group">
											<label class="control-label" for="basicinput">Logout</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" name="logout" placeholder="" data-original-title="" value="<?php  echo $row['logout'] ?>"  class="span6 ">
											</div>
										</div>
										

										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn" name="submit" >Update</button>
											</div>
										</div>
									</form>

									<br>

                </div>
            </div>
