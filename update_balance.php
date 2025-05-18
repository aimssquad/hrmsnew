<?php
include 'include/connection.php';

$balance = 1.5;
$type = 1;
$remarks = "monthly balance added";
$date = date('Y-m-d');
$status = 0;

// Insert leave balance records for employees with status=0
$sql = "INSERT INTO leave_balance (emp_id, balance, type, remarks, `date`, status)
        SELECT emp_id, $balance, $type, '$remarks', '$date', $status FROM emp WHERE status = 0";

if (mysqli_query($conn, $sql)) {
    // Insert a record into update_balance_status table
    $month_yr = date('m/Y');
    $date = date('Y-m-d');
    $sql2 = "INSERT INTO update_balance_status (`id`, `month_yr`, `date`) VALUES (NULL, '$month_yr', '$date')";
    
    if (mysqli_query($conn, $sql2)) {
        // Display alert and redirect to the previous page using JavaScript
        echo '<script>alert("Leave balance records updated successfully");';
        echo 'window.location.href = document.referrer;</script>';
        exit;
    } else {
        echo "Error inserting into update_balance_status: " . mysqli_error($conn);
    }
} else {
    echo "Error inserting leave balance records: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);

