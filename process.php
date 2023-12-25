<?php
   include 'include/connection.php';
   include 'header_data.php';
   ?>
<div class="module">
<div class="module-body">
<div class="module-body">
   <div class="btn-group pull-right" data-toggle="buttons-radio">
      <a href="create_process.php"><button type="submit" class="btn btn-success" name="active">
      Add Process</button></a>
   </div>
   <div class="profile-tab-content tab-content">
      <div class="tab-pane fade active in" id="activity">
         <div class="module-option clearfix">
         </div>
         <table class="table table-striped table-bordered table-condensed">
            <thead>
               <tr>
                  <th>Process</th>
                  <th>Created By</th>
                  <th>Updated at</th>
                  <th>Created at</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $sql="SELECT * FROM `process_update` ORDER BY name asc" ;
                  
                  
                  $res=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($res)) { ?>
               <tr>
                  <td> <?php  echo $row['name'];  ?> </td>
                  <td> <?php  echo $row['created_by'];  ?></td>
                  <td> <?php  echo $row['updated_at'];  ?></td>
                  <td> <?php  echo $row['created_at'];  ?> </td>
                  <td> 
                        <?php
                            if ($row['status'] == 0) {
                                echo "<span class='badge badge-complete' >
                                <a href='process_status.php?status=".$row['status']." &id=".$row['id']." ' class='text-color'>Active</a></span>&nbsp;";
                            }
                            else
                            {
                                echo "<span class='badge badge-delete' >
                                <a href='process_status.php?status=".$row['status']." &id=".$row['id']." ' class='text-color'>Deactive</a></span>&nbsp;";
                            }
                            echo "<span class='badge badge-edit' ><a href='process_update.php?id=".$row['id']."' class='text-color' class='text-color'>Update</a></span>";
                             ?>
                     </td>
                 
               </tr>
               <?php   }  ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<!-- End Table View  -->
<!-- List View part -->
<!-- End List View part -->
<?php
   include 'footer.php';
   ?>