<?php
include 'include/connection.php';
$id =$_GET['id'];

$status=$_GET['status'];

if ($status==0) {
       mysqli_query($conn, "UPDATE `process_update` SET `status`= '1' WHERE `id`='$id' ");
       header('location:process.php');
}else{
     mysqli_query($conn, "UPDATE `process_update` SET `status`= '0' WHERE `id`='$id' ");
     header('location:process.php');

}
 ?>