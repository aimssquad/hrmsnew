<?php
// Include your database connection file here
include 'include/connection.php';
include 'include/function.php';

// Check if form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data and sanitize
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
    $balance = mysqli_real_escape_string($conn, $_POST['balance']);
    $leave_balance_type = mysqli_real_escape_string($conn, $_POST['leave_balance_type']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    // Update query
    $sql = "UPDATE `leave_balance` SET `emp_id`='$emp_id', `balance`='$balance', `leave_balance_type`='$leave_balance_type', `remarks`='$remarks', `type`='$type' WHERE `id`='$id'";

    // Execute the query
    if(mysqli_query($conn, $sql)) {
        // Update successful
        echo "<script>alert('Leave balance updated successfully!'); window.history.back();</script>";
        exit();
    } else {
        // Update failed
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Redirect to error page if form is not submitted
    header("Location: error_page.php");
    exit();
}

