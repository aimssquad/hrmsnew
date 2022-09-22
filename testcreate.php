<?php

include 'include/connection2.php';
include 'header_data.php';

?>




						<div class="module">
							<div class="module-head">
								<button type="button" id="formButton" style="display: block; border:none; " class="btn-success">Create Test Account</button>
							</div>
							<div class="module-body">

									

									
                               <!-- add employee from  -->

									<form name="myForm" action="inserttest.php" method="post" class="form-horizontal row-fluid" id="form1" style="display: none;" enctype="multipart/form-data" onsubmit="return validateForm()">
										
                                      <div class="control-group">
											<label class="control-label" for="basicinput">User Name</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" placeholder="Type full name here....." data-original-title="" name="name" id = "fname" class="span8 ">
												<br>
												<p id="demo" style="color:red;"></p>
											</div>
											
										</div>

										  <div class="control-group">
											<label class="control-label" for="basicinput">Password</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="text" name="password" placeholder="" data-original-title="" class="span6 ">
											</div>
										</div>

										 


										<div class="control-group">
											<label class="control-label" for="basicinput">Mail ID</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="text" name="mail" placeholder="" data-original-title="" class="span6 ">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Test Paper</label>
											<div class="controls">
												
													<select tabindex="1" data-placeholder="Select here.." class="span6" name="paper">
												<option value="">Select Test Paper</option>
												<option>Test Paper 1</option>
												<option>Test Paper 2</option>
												<option>Test Paper 3</option>
														
													</select>
												
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
                                <form action="" method="post">
                                <div class="input-append pull-left">
                                    <input type="text" class="span3" placeholder="Filter by name..." name="filter">
                                    <button type="submit" class="btn" name="search">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                                </form>
                               
                            </div>


                            	<table class="table table-striped table-bordered table-condensed">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>UseName</th>
									  <th>Password</th>
									  <th>Mail ID</th>
									  <th>Test Paper</th>
									  >
									  <th></th>
									</tr>
								  </thead>
								  <tbody>
									<?php
                                     $sql="SELECT * from log_in order by user_name asc" ;
                                     $res=mysqli_query($conn2,$sql);

                                     if (isset($_POST['search'])) {
                                     	$filter=$_POST['filter'];

                                     	if ($filter == '') {
                                     		$sql="SELECT * from log_in order by user_name asc" ;
                                            $res=mysqli_query($conn,$sql);

                                     	}
                                     	elseif ($filter != '') {
                                     	 $sql="SELECT * from log_in where user_name='$filter' order by user_name asc" ;
                                         $res=mysqli_query($conn,$sql);
                                     	}
                                     }
                                  

                                     while($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       
                                      
                                       <td> <?php  echo $row['id'];  ?> </td>
                                       <td> <?php  echo $row['user_name'];  ?> </td>
                                       <td> <?php  echo $row['password'];  ?></td>
                                       <td> <?php  echo $row['email_id'];  ?></td>
                                       <td> <?php  echo $row['paper'];  ?></td>
                                       
                                       <td> 
                                          <?php
                                              if ($row['status'] == 0) {
                                                 echo "<span class='badge badge-complete' >
                                                 <a href='active_test.php?id=".$row['id']."' class='text-color'>Active</a></span>&nbsp;";
                                              }
                                              else
                                              {
                                                 echo "<span class='badge badge-pending' ><a href=' ? type=status&operation=active&id=".$row['id']."' class='text-color'>Deactive</a></span>&nbsp;";

                                              }

                                             

                                               echo "&nbsp;<span class='badge badge-delete' > <a href='delete_test.php?id=".$row['id']."' class='text-color'>Delete</a></span> &nbsp;";
                                              

                                              
                                          ?>

                                        </td>
                                     
                                    </tr>

                                 <?php   }  ?>
								  </tbody>
								</table>

                                </div>


                                <!-- End Table View  -->

                                <!-- List View part -->

								
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
