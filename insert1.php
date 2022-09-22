<?php

include 'include/connection.php';
include 'header_data.php';

if(isset($_POST['submit']))
	{
		

       $type=$conn -> real_escape_string($_POST['type']);
       $description=$conn -> real_escape_string($_POST['description']);
       $date=$conn -> real_escape_string($_POST['date']);


       mysqli_query($conn,"INSERT INTO `holiday` (`id`, `holiday_type`, `holiday_description`, `date`) VALUES (NULL, '$type', '$description', '$date')");

       
									echo '<script>';

                            echo 'window.location.href = "insert1.php";';
									echo '</script>';

	}



?>


						<div class="module">
							<div class="module-body">
								<div class="span9">
	<div class="content">
		<div class="module-body">
			<form action="" method="POST" class="form-horizontal row-fluid" id="form1" enctype="multipart/form-data">
				<div class="control-group">
					<label class="control-label" for="basicinput">Holiday Type</label>
					<div class="controls">
						<select tabindex="1" data-placeholder="Select here.." class="span8" name="type">
							<option value="">Select here..</option>
							<option value="General Holiday">General Holiday</option>
							<option value="Restricted Holiday">Restricted Holiday</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="basicinput">Holiday Description</label>
					<div class="controls">
						<input data-title="A tooltip for the input" type="text" placeholder="Type Description Here....." data-original-title="" name="description" class="span8">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="basicinput">Date</label>
					<div class="controls">
						<input data-title="A tooltip for the input"  type="date" name="date" placeholder="" data-original-title="" class="span6 ">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn" name="submit">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
								
                            <br><br>
                         
						<div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">

								<table class="table table-striped table-bordered table-condensed">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>Holiday Type</th>
									  <th>Holiday Description</th>
									  <th>Date</th>
									  <th></th>
									</tr>
								  </thead>
								  <tbody>
									<?php
                                     $sql="SELECT * from holiday" ;
                                     $res=mysqli_query($conn,$sql);

                                     if(isset($_POST['search']))
                                     {
                                     	$date=$_POST['date'];
                                     	$sql="SELECT * From holiday where date='$date'";
                                     	$res=mysqli_query($conn,$sql);
                                     }

                             

                                     while($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       
                                      
                                       <td> <?php  echo $row['id'];  ?> </td>
                                       <td> <?php  echo $row['holiday_type'];  ?> </td>
                                       <td> <?php  echo $row['holiday_description'];  ?></td>
                                      <td> <?php  echo $row['date'];  ?></td>
                                      <td> 
                                      		
                                      		<a href="insert1.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                      <td>
                                     </tr>
                                      
                                 <?php   }  ?>
								  </tbody>
								</table>
								<?php
								if(isset($_GET['delete']))
								{
									$id=$_GET['delete'];
									$sql="DELETE From holiday where id=$id";
									$res=mysqli_query($conn,$sql);

									echo '<script>';

                            echo 'window.location.href = "insert1.php";';
									echo '</script>';
								}
						
								?>					
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js" type="text/javascript"></script>
  

    <script>

</html>