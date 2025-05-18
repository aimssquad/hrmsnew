<?php
   include 'include/connection.php';
   include 'header_data.php';

   $emp_id = $_GET['emp_id'];

   $emp_name_sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `emp` WHERE `emp_id`='$emp_id'"));
   $emp_name = $emp_name_sql['emp'];
   
 


   
   ?>
<div class="module">

<div class="module-body">
<!-- add employee from  -->

<br>
<!-- End Form -->
<!-- Start View part -->
<ul class="profile-tab nav nav-tabs">
   <li class="active"><a href="#activity" data-toggle="tab"><?php echo $emp_name ?> Leave Balance Details</a></li>
</ul>
<!-- Table View part -->
<div class="profile-tab-content tab-content">
<div class="tab-pane fade active in" id="activity">
<table class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th>Date</th>
            <th>Emp_ID</th>
            <th>Emp_Name</th>
            <th>Balance</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $totalBalance = 0; // Initialize total balance variable
        $sql = "SELECT emp.emp,leave_balance.* FROM `leave_balance`,`emp` WHERE leave_balance.emp_id=emp.emp_id and leave_balance.`emp_id`='$emp_id' order by leave_balance.id DESC";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res)) {
            // Calculate total balance
            if ($row['type'] == 1) {
                $totalBalance += $row['balance'];
            } else {
                $totalBalance -= $row['balance'];
            }
            ?>
            <tr>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['emp_id']; ?></td>
                <td><?php echo $row['emp']; ?></td>
                <?php if ($row['type'] == 1) { ?>
                    <td style="color:green">+ <?php echo $row['balance']; ?></td>
                <?php } else { ?>
                    <td style="color:red">- <?php echo $row['balance']; ?></td>
                <?php } ?>
                <td><?php echo $row['remarks']; ?></td>
                <td>
                    <?php
                    echo "<span class='badge badge-edit'><a href='#' class='text-color' data-toggle='modal' data-target='#updateModal' data-id='".$row['id']."'>Update</a></span>";
                    echo "<span class='badge badge-delete'><a href='javascript:void(0);' onclick='confirmDelete(".$row['id'].")' class='text-color'>Delete</a></span>";
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2"></td>
            <td>Total Balance:</td>
            <td><?php echo $totalBalance; ?></td>
            <td></td>
        </tr>
    </tfoot>
</table>
</div>
<!-- End Table View  -->
<!-- End List View part -->
<?php
   include 'footer.php';
   ?>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Leave Balance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="updateForm" action="updateleavebalance.php" method="post" class="form-horizontal row-fluid" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="updateId">
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Employee Name</label>
                        <div class="controls">
                            <select tabindex="1" data-placeholder="Select here.." class="span8" name="emp_id" required>
                                <option value="">Select here..</option>
                                <?php  
                                    $sql=mysqli_query($conn,"SELECT `emp`,`emp_id` FROM `emp` WHERE `status`=0");
                                    
                                    while($row=mysqli_fetch_assoc($sql)){
                                        echo '<option value="'.$row['emp_id'].'">'.$row['emp'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Leave Balance</label>
                        <div class="controls">
                            <input data-title="A tooltip for the input" type="number" data-original-title="" name="balance" class="span8" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Leave Balance Type</label>
                        <div class="controls">
                            <select name="leave_balance_type" id="" class="span8" required>
                                <option value="">Select..</option>
                                <?php 
                                    $sql_type = mysqli_query($conn,"SELECT * FROM `leave_balance_type`");
                                    while ($row_type = mysqli_fetch_assoc($sql_type)) {
                                        echo '<option value="' . $row_type['name'] . '">' . $row_type['name'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Type</label>
                        <div class="controls">
                            <select name="type" class="span8" required>
                                <option value="1">Add</option>
                                <option value="0">Subtract</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Remarks</label>
                        <div class="controls">
                            <textarea name="remarks" id="" cols="20" rows="6" class="span8" required></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-info" name="submit">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle click event for "Update" link
        $('.badge-edit a').click(function(e) {
            e.preventDefault(); // Prevent default link behavior

            var id = $(this).data('id'); // Get the ID from data attribute
            // You can perform additional actions here, such as AJAX request to fetch data

            // Example: Populate form fields with ID
            $.ajax({
                url: 'fetchleavebalance.php', // File to fetch data from
                type: 'POST',
                data: {id: id},
                dataType: 'json',
                success: function(response) {
                    $('#updateId').val(response.id);
                    $('select[name="emp_id"]').val(response.emp_id);
                    $('input[name="balance"]').val(response.balance);
                    $('select[name="leave_balance_type"]').val(response.leave_balance_type);
                    $('textarea[name="remarks"]').val(response.remarks);
                    $('select[name="type"]').val(response.type);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error
                }
            });

            // Show modal
            $('#updateModal').modal('show');
        });
    });

    function confirmDelete(id) {
        var result = confirm("Are you sure you want to delete this leave balance?");
        if (result) {
            window.location.href = "delete_leave.php?id=" + id;
        }
    }
</script>