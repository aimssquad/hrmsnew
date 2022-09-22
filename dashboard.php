<?php 
 include 'include/connection.php';
 include 'include/tconnection.php';
 include 'header_data.php';

                    
                    $today=date('Y-m-d');
                    $sql=mysqli_query( $conn,"SELECT * from `present` WHERE date='$today'");
                    $attandance=mysqli_num_rows($sql);

                    $sql=mysqli_query( $conn,"SELECT * FROM `emp` where status=0");
                    $employee=mysqli_num_rows($sql);
                   

                    $sql=mysqli_query( $user,"SELECT * FROM `tests` GROUP by companyname");
                    $client=mysqli_num_rows($sql);

                    $total=$client+6;

                    $sql=mysqli_query( $tv,"SELECT * FROM `login` where process='Reva'");
                    $reva=mysqli_num_rows($sql);
                    
                    

                    $sql=mysqli_query( $user,"SELECT * FROM `employeelogin` ");
                    $b2b=mysqli_num_rows($sql);

                    $sql=mysqli_query( $tv,"SELECT * FROM `login` where process IN('TeamViewer','Logmein','Eset')");
                    $teamviewer=mysqli_num_rows($sql);

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
                                    </a><a href="#" class="btn-box big span4"><i class="icon-group"></i><b><?php echo $total; ?></b>
                                        <p class="text-muted">
                                            Clients</p>
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <div class="span8">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="employee.php" class="btn-box small span3"><i class="icon-group"></i><b><?php echo $reva; ?></b>
                                        <p class="text-muted">
                                            Reva</p>
                                    </a> 

                                   

                                    <a href="employee.php" class="btn-box small span3"><i class="icon-group"></i><b><?php echo $b2b; ?></b>
                                        <p class="text-muted">
                                            B2B</p>
                                    </a>

                                      <a href="employee.php" class="btn-box small span3"><i class="icon-group"></i><b><?php echo $teamviewer; ?></b>
                                        <p class="text-muted">
                                            TV/Eset/TB</p>
                                    </a>

                                        <a href="employee.php" class="btn-box small span3"><i class="icon-group"></i><b><?php echo '3'; ?></b>
                                        <p class="text-muted">
                                            Bluewater/TMM</p>
                                    </a>

                                    
                                            </div>

                                        </div>

                                      
                                    </div>
                                  

                                        
                                </div>
                            </div>
                            <!--/#btn-controls-->



                            <!--daily attandance start -- >

                             
                              
                                    <!-- Table View part -->


                                 <div class="profile-tab-content tab-content">
                                     <h4 style="margin-left: 10px;"><b>Today's Attendance </b></h4>
                                    <div class="tab-pane fade active in">


                            <div class="module-option clearfix">
                              
                              
                            </div>


                                <table class="table table-striped table-bordered table-condensed">
                                  <thead>
                                    <tr>
                                      
                                      <th></th>
                                      <th>Present</th>
                                      <th>Absent</th>
                                      <th>Total</th>
                                     
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php
                                   $today=date('Y-m-d');

                        // production start

                             $sql=mysqli_query( $conn,"SELECT * FROM `emp` WHERE `status`=0 and `roll`='Production'");
                             $empproduction=mysqli_num_rows($sql);

                             $sql=mysqli_query( $conn,"SELECT * from `present` WHERE date='$today' and roll='Production'");
                             $prsentp=mysqli_num_rows($sql);

                             $absentp=($empproduction - $prsentp );

                        //production end


                         // Support start

                             $sql=mysqli_query( $conn,"SELECT * FROM `emp` WHERE `status`=0 and `roll`='Support'");
                             $empsupport=mysqli_num_rows($sql);

                             $sql=mysqli_query( $conn,"SELECT * from `present` WHERE date='$today' and roll ='Support'");
                             $prsents=mysqli_num_rows($sql);

                             $absents=($empsupport - $prsents );

                        //Support end


                             // total start

                             $totalpresent = ($prsentp + $prsents);
                             $toatlabsent= ($absentp + $absents);

                             $totalemp=($empproduction + $empsupport);


                             //total end



                                    ?>
             
              <tr>
                <th>Production</th>
                <td><?php echo $prsentp; ?></td>
                <td><?php echo $absentp; ?></td>
                <td><?php echo $empproduction; ?></td>
                </tr>
                <tr>
                <th>Support</th>
                 <td><?php echo $prsents; ?></td>
                <td><?php echo $absents; ?></td>
                <td><?php echo $empsupport; ?></td>
            </tr>
            <tr>
               <th>Total</th>
             <td> <a href="attend.php"><?php echo $totalpresent; ?></a></td>
                <td><a href="absent.php"><?php echo $toatlabsent; ?></a></td>
                <td><a href="credintial.php"><?php echo $totalemp; ?></a></td>
            </tr>
                
              
              

              

                 </tbody>
                                </table>

                                </div>


                                <!-- End Table View  -->


                                <!--daily attandance end -->
                                <br><br>
                          
                            <!--/.module-->
                            <div class="module ">
                                <br>
                               <h4 style="margin-left: 10px;"><b>Todays Productivity</b></h4>
                                <div class="module-body">
                                    <ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Reva</a></li>
                                <li><a href="#friends" data-toggle="tab">BlueWater</a></li>
                                
                                </ul>



                                   <!-- Table View part -->

                                 <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">


                            <div class="module-option clearfix">
                              
                              
                            </div>


                                <table class="table table-striped table-bordered table-condensed">
                                  <thead>
                                    <tr>
                                      
                                      <th>Name</th>
                          <th>Calls</th>
                            <th>Connects</th>
                            <th>Not Connects</th>
                            <th>DMC</th>
                            <th>AD</th>
                            <th>AAD</th>
                            <th>EN</th>
                            <th>AE</th>
                            <th>Time</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                $sql="SELECT associate,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(id) as ids,SUM(case WHEN disposition NOT IN ('No Response','No Response Closed','Wrong Number') then 1 else 0 end) as connect,SUM(case WHEN disposition  IN ('No Response','No Response Closed','Wrong Number') then 1 else 0 end) as notconnect,SUM(case WHEN dmc='yes' then 1 else 0 end) as dmc,SUM(case WHEN disposition='Application Done' then 1 else 0 end) as ad,SUM(case WHEN disposition='Already Application Done' then 1 else 0 end) as aad,SUM(case WHEN disposition='Already Enrolled' then 1 else 0 end) as ae,SUM(case WHEN disposition='Enrolled' then 1 else 0 end) as en FROM rworksheet WHERE date ='$today'  GROUP BY associate"; 
            $result=mysqli_query($tv,$sql);
            while ($row=mysqli_fetch_array($result)):
              ?>
              <tr>
               <td><?php echo $row['associate']; ?></td>
                                <td><?php echo $row['ids']; ?></td>
                                <td><?php echo $row['connect']; ?></td>
                                <td><?php echo $row['notconnect']; ?></td>
                                <td><?php echo $row['dmc']; ?></td>
                                <td><?php echo $row['ad']; ?></td>
                                <td><?php echo $row['aad']; ?></td>
                                <td><?php echo $row['ae']; ?></td>
                                <td><?php echo $row['en']; ?></td>
                                <td><?php echo $row['timeSum']; ?></td>
              </tr>

              <?php endwhile; ?>     

                 </tbody>
                                </table>

                                </div>


                                <!-- End Table View  -->

                                <!-- List View part -->

                                  <div class="tab-pane fade" id="friends">
                                        <div class="module-option clearfix">
                                      
                                        </div>
                                        
                                                                                
                                             <table class="table table-striped table-bordered table-condensed">
                                  <thead>
            <tr>
             <th>Associate</th>
                                        <th>Dials</th>
                                        <th>Connected</th>
                                      
                                        <th>DMC</th>
                                        <th>Company</th>
                                        <th>UDMC</th>
                                    
                                 
                                        <th>Call Duration</th>
                            
            </tr>
          </thead>
          <tbody>
            

            <?php
           // $today=date('Y-m-d');
              $sql="SELECT associate,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(case when dmc in ('Yes') then dmc else null end) as cmp,COUNT(*) as dial,COUNT(case when disposition  NOT IN('Not Reachable','Switched off','Wrong Number','Busy','RNR','No Response Closed','Invalid Number') then disposition else null end) as connect,COUNT(case when disposition IN('Not Reachable','Switched off','Wrong Number','Busy','RNR','No Response Closed','Invalid Number') then disposition else null end) as notconnect ,COUNT(DISTINCT case when  dmc='yes' then `cpname` else null end) as cpname, COUNT(distinct cname) as cname FROM `worksheet` WHERE  date ='$today' GROUP BY associate order by associate asc";


            $result=mysqli_query($bluewater,$sql);
            while ($row=mysqli_fetch_array($result)):
              ?>
              <tr>
           <td><?php echo $row['associate']; ?></td>
                      
                        <td><?php echo $row['dial']; ?></td>
                        <td><?php echo $row['connect']; ?></td>
                      
                        
                        <td><?php echo $row['cmp']; ?></td>
                        <td><?php echo $row['cname']; ?></td>
                        <td><?php echo $row['cpname']; ?></td>
                       
                        
                       <td><?php echo $row['timeSum'] ; ?></td>
                        </tr>
                       
                        
              

              <?php endwhile; ?>


            

          </tbody>
                                </table>
   
 
                                        

                                  </div>


                                  <!--b2b -- >

                                    
                                    <div class="slider-range">
                                    </div>
                                </div>
                            </div>

                              <br />
                   
                          
                            <!--/.module-->
                        </div>

                        <!-- Anpther model -->
                          <br>
                         <div class="module ">
                               
                                <div class="module-body">
                                    <ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#reva" data-toggle="tab">B2B</a></li>
                                <li><a href="#tcn" data-toggle="tab">TV/Logmein/Eset</a></li>
                                
                                </ul>



                                   <!-- Table View part -->

                                 <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="reva">


                            <div class="module-option clearfix">
                              
                              
                            </div>


                                <table class="table table-striped table-bordered table-condensed">
                                  <thead>
                                    <tr>
                                    <th>Associate</th>
                            <th>Process</th>
                            <th>Dials</th>
                            <th>Connects</th>
                            <th>NotConnects</th>
                            <th>DMC</th>
                            <th>Company.</th>
                            <th>Time</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                 $sql="SELECT lead,process,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(DISTINCT company) as cmp, COUNT(case when dmconnected = 'yes' then dmconnected else null end) as dm, COUNT(*) as dial,COUNT(case when disposition  NOT IN('Not Reachable','RNR','Switched off','Wrong Number','Busy','No Response Closed') then disposition else null end) as connect,COUNT(case when disposition IN('Not Reachable','RNR','Switched off','Wrong Number','Busy','No Response Closed') then disposition else null end) as notconnect FROM `worksheet` WHERE  date1='$today' GROUP BY lead order by lead asc";


                                    $result=mysqli_query($user,$sql);

                                   
                                  
                       while ($row=mysqli_fetch_array($result)):
                     ?>
              <tr>
                <td><?php echo $row['lead']; ?></td>
                        <td><?php echo $row['process']; ?></td>
                        <td><?php echo $row['dial']; ?></td>
                        <td><?php echo $row['connect']; ?></td>
                        <td><?php echo $row['notconnect']; ?></td>
                         <td><?php echo $row['dm']; ?></td>
                        <td><?php echo $row['cmp']; ?></td>
                        
                       <td><?php echo $row['timeSum'] ; ?></td>
              </tr>

              <?php endwhile; ?>

                  </tbody>
                </table>

                                </div>


                                <!-- End Table View  -->

                                <!-- List View part -->

                                  <div class="tab-pane fade" id="tcn">
                                        <div class="module-option clearfix">
                                      
                                        </div>
                                        
                                                                                
                                             <table class="table table-striped table-bordered table-condensed">
                                  <thead>
                                    <tr>
                                     <th>Associate</th>
                            <th>Process</th>
                            <th>Dials</th>
                            <th>Connects</th>
                            <th>NotConnects</th>
                            <th>DMC</th>
                            <th>SalesPerson.</th>
                            <th>Time</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                $sql="SELECT lead,process,SEC_TO_TIME( SUM( TIME_TO_SEC( `cduration` ) ) ) AS timeSum,COUNT(DISTINCT sales_person) as cmp, COUNT(case when dmconnected = 'yes' then dmconnected else null end) as dm, COUNT(*) as dial,COUNT(case when disposition  NOT IN('Not Reachable','RNR','Switched off','Wrong Number','Busy','No Response Closed') then disposition else null end) as connect,COUNT(case when disposition IN('Not Reachable','RNR','Switched off','Wrong Number','Busy','No Response Closed') then disposition else null end) as notconnect FROM `worksheet` WHERE  date1='$today' GROUP BY lead order by lead asc";


                                    $result=mysqli_query($tv,$sql);

                                   
                                  
                       while ($row=mysqli_fetch_array($result)):
                     ?>
              <tr>
                 <td><?php echo $row['lead']; ?></td>
                        <td><?php echo $row['process']; ?></td>
                        <td><?php echo $row['dial']; ?></td>
                        <td><?php echo $row['connect']; ?></td>
                        <td><?php echo $row['notconnect']; ?></td>
                         <td><?php echo $row['dm']; ?></td>
                        <td><?php echo $row['cmp']; ?></td>
                        
                       <td><?php echo $row['timeSum'] ; ?></td>
              </tr>

              <?php endwhile; ?>
            </tbody>

                                </table>
   
 
                                        

                                  </div>


                                  <!--b2b -- >

                                    
                                    <div class="slider-range">
                                    </div>
                                </div>
                            </div>

                              <br />
                   
                          
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
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
