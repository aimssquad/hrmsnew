<?php
   include 'include/connection.php';
   include 'header_data.php';


   if (isset($_POST['submit'])) {
    // Get data from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    // Insert data into the database
    $sql = "INSERT INTO leave_balance_type (name, status) VALUES ('$name', 0)";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Record inserted successfully");';
        echo 'window.location.href = "leave_balance_type.php";</script>';
        exit;
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
   }

   if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform the delete operation
    $sql = "DELETE FROM leave_balance_type WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Record Deleted successfully");';
        echo 'window.location.href = "leave_balance_type.php";</script>';
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    } 

   ?>
<div class="module">
<div class="module-head">
   <button type="button" id="formButton" style="display: block; border:none; " class="btn-success">Add Leave Balance</button>
</div>
<div class="module-body">
<!-- add employee from  -->
<form name="myForm" action="" method="post" class="form-horizontal row-fluid" id="form1" style="display: none;" enctype="multipart/form-data" >
  
   <div class="control-group">
      <label class="control-label" for="basicinput">Leave Balance Type</label>
      <div class="controls">
         <input data-title="A tooltip for the input" type="text"  data-original-title="" name="name"  class="span8" required>
      </div>
   </div>
  
   <div class="control-group">
      <div class="controls">
         <button type="submit" class="btn btn-info" name="submit">Submit </button>
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
   </div>
   <table class="table table-striped table-bordered table-condensed">
   <thead>
      <tr>
         <th>Sl No</th>
         <th>Type</th>
         <th></th>
      </tr>
   </thead>
   <tbody>
      <?php
         $sql="SELECT * FROM `leave_balance_type` WHERE status=0";
         $res=mysqli_query($conn,$sql);
         
         $counter = 1;
         
         while($row=mysqli_fetch_assoc($res)) { ?>
         <tr>
            <td><?php echo $counter; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td> 
               <?php
                  echo "&nbsp;<span class='badge badge-delete' > <a href='?id=".$row['id']."' class='text-color'>Delete</a></span> &nbsp;";
                  ?>
            </td>
         </tr>
         <?php
            $counter++;
            }
         ?>
   </tbody>
</table>
</div>
<!-- End Table View  -->
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