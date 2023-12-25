<?php
   include 'include/connection.php';
   include 'header_data.php';

   if (isset($_POST['submit'])) {
    $emp = $_POST['emp'];
    $production = $_POST['production'];
    $emp_id = $_POST['emp_id'];
    $date = $_POST['date'];
    $login = $_POST['login'];
    $logout = $_POST['logout'];

    // Check if a record with the same date and emp_id already exists
    $existingRecordQuery = "SELECT * FROM present WHERE date = '$date' AND emp_id = '$emp_id'";
    $existingRecordResult = mysqli_query($conn, $existingRecordQuery);

    if (mysqli_num_rows($existingRecordResult) > 0) {
        // Record already exists
        echo '<script type="text/javascript">'; 
        echo 'alert("Attendance for this employee on this date already exists");'; 
        echo '</script>';
    } else {
        // Insert data into the database
        $sql = "INSERT INTO present (emp_id, emp_name, roll, type, date, login, logout) 
                VALUES ('$emp_id', '$emp', '$production', 1, '$date', '$login', '$logout')";

        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Attendance Added Successfully");'; 
            echo 'window.location.href = "datewise.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">'; 
            echo 'alert("Something went wrong, please contact Abbas");'; 
            echo '</script>';
        }
    }
}

// Close the database connection
//mysqli_close($conn);
   
   ?>
<div class="module">
<div class="module-head">
   <button type="button" id="formButton" style="display: block; border:none; " class="btn-success">Add Attandance</button>
</div>
<div class="module-body">
<!-- add employee from  -->
<form name="myForm" action="" method="post" class="form-horizontal row-fluid"   enctype="multipart/form-data" >

<div class="control-group">
    <label class="control-label" for="basicinput">Employee-Name</label>
    <div class="controls">
        <select name="emp" id="emp_name" class="form-control" required>
            <option value="">Select Employee...</option>
            <?php
            $sql_emp = mysqli_query($conn, "SELECT * FROM `emp` WHERE `status` = 0 ORDER BY `emp` ASC");
            while ($row = mysqli_fetch_assoc($sql_emp)) {
                echo '<option data-empid="' . $row['emp_id'] . '">' . $row['emp'] . '</option>';
            }
            ?>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="basicinput">Employee ID</label>
    <div class="controls">
        <input type="text" id="emp_id_field" name="emp_id" class="form-control" readonly>
    </div>
</div>

   <div class="control-group">
      <label class="control-label" for="basicinput">Employee Type</label>
      <div class="controls">
         <select name="production" class="form-control" required>
            <option value="">Sleect Type...</option>
            <option>Production</option>
            <option>Support</option>
         </select>
      </div>
   </div>
   <div class="control-group">
      <label class="control-label" for="basicinput">Date</label>
      <div class="controls">
         <input data-title="A tooltip for the input" type="date" data-original-title="" name="date"  class="span6 ">
      </div>
   </div>
 
   <div class="control-group">
        <label class="control-label" for="basicinput">Login</label>
        <div class="controls">
            <input data-title="A tooltip for the input" type="time" step="1" data-original-title="" name="login" class="span8">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="basicinput">Logout</label>
        <div class="controls">
            <input data-title="A tooltip for the input" type="time" step="1" data-original-title="" name="logout" class="span8">
        </div>
    </div>
  


 
   <div class="control-group">
      <div class="controls">
         <button type="submit" class="btn btn-info" name="submit">Submit Form</button>
      </div>
   </div>
</form>

<?php
   include 'footer.php';
   ?>
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   <script>
    $(document).ready(function () {
        $("#emp_name").change(function () {
            // Get the selected option's data-empid attribute value
            var selectedEmpId = $("#emp_name option:selected").data('empid');
            
            // Set the value of emp_id_field based on the selected value
            $("#emp_id_field").val(selectedEmpId);
        });
    });
</script>
