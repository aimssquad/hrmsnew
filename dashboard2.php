<?php 
 include 'include/connection.php';
 include 'include/tconnection.php';
 include 'header_data.php';

                    
                    $today=date('Y-m-d');
                    $sql=mysqli_query( $conn,"SELECT * from `present` WHERE date='$today'");
                    $attandance=mysqli_num_rows($sql);

                    $sql=mysqli_query( $conn,"SELECT * FROM `emp` where status=0");
                    $employee=mysqli_num_rows($sql);
                    

                   // $today=date('Y-m-d');

                  ?>
                 
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="attend.php" class="btn-box big span4"><i class=" icon-group"></i><b><?php echo $attandance; ?></b>
                                        <p class="text-muted">
                                           Today's Attendance</p>
                                    </a><a href="employee.php" class="btn-box big span4"><i class="icon-user"></i><b><?php   echo $employee; ?></b>
                                        <p class="text-muted">
                                            Employees</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-group"></i><b>3</b>
                                        <p class="text-muted">
                                            Clients</p>
                                    </a>
                                </div>
                            
                            </div>

                            
                         
                   
                          
                         
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                    <?php
                     include 'footer.php';
						?>
  

   
