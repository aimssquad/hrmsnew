<?php
// Include your database connection file here
include 'include/connection.php';
include 'include/function.php';

// Check if ID is set in the URL query string
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Delete query
    $sql = "DELETE FROM `leave_balance` WHERE `id`='$id'";

    // Execute the query
    if(mysqli_query($conn, $sql)) {
        // Deletion successful
        echo "<script>alert('Leave balance deleted successfully!'); window.history.back();</script>";
        exit();
    } else {
        // Deletion failed
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Redirect to error page if ID is not provided in the URL query string
    header("Location: error_page.php");
    exit();
}
?>
