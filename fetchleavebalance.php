<?php
// Include your database connection file here
include 'include/connection.php';
include 'include/function.php';

// Check if ID is set and not empty
if(isset($_POST['id']) && !empty($_POST['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Query to fetch leave balance data based on ID
    $sql = "SELECT * FROM `leave_balance` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if($result) {
        // Check if record exists
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Prepare data to be returned as JSON
            $data = array(
                'id' => $row['id'],
                'emp_id' => $row['emp_id'],
                'balance' => $row['balance'],
                'leave_balance_type' => $row['leave_balance_type'],
                'remarks' => $row['remarks'],
                'type' => $row['type'] 
            );

            // Output data as JSON
            echo json_encode($data);
        } else {
            // No record found
            echo json_encode(array('error' => 'No record found'));
        }
    } else {
        // Query failed
        echo json_encode(array('error' => 'Query failed'));
    }
} else {
    // ID not provided
    echo json_encode(array('error' => 'ID not provided'));
}
?>
