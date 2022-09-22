 <?php
include 'include/connection.php';
$id =$_GET['id'];

$status=$_GET['status'];

if ($status==0) {
     mysqli_query($conn, "UPDATE `emp` SET `status`= '1' WHERE `emp_id`='$id' ");
     mysqli_query($conn, "UPDATE `employee` SET `status`= '1' WHERE `emp_id`='$id' ");
 header('location:credintial.php');
}else{

  mysqli_query($conn, "UPDATE `emp` SET `status`= '0' WHERE `emp_id`='$id' ");
  mysqli_query($conn, "UPDATE `employee` SET `status`= '0' WHERE `emp_id`='$id' ");
   header('location:credintial.php');

}
 ?>