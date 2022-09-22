
<?php 

include 'include/connection.php';
include 'include/function.php';

if (isset($_POST['job'])) {
	// print_r($_POST);

 //  die();

$emp_id=$_POST['emp_id'];
$name=$_POST['name'];
$process=$_POST['process'];
$password=$_POST['password'];
$role=$_POST['role'];
$position=$_POST['position'];
$tl=$_POST['tl'];
$doj=$_POST['doj'];
$omail=$_POST['omail'];
$salary=$_POST['salary'];
$salary_date=get_safe_value($conn,$_POST['salary_date']);

  mysqli_query($conn,"UPDATE `employee` SET `role` = '$role', `doj` = '$doj', `omail` = '$omail', `position` = '$position', `tl` = '$tl', `salary` = '$salary', `salary_date` = '$salary_date' WHERE emp_id ='$emp_id'");



$result=mysqli_query($conn,"UPDATE `emp` SET  `roll` = '$role', `process` = '$process', `password` = '$password', `tl` = '$tl' WHERE emp_id = '$emp_id'");

   if ($result) {



                 echo '<script>';
                 echo 'alert("Job Information Update Sucessfull");';
                 echo 'window.location.href = "credintial.php";';
			         	echo '</script>';
   	             
   	
   }else{
                echo '<script>';
                echo 'alert("Job Information Update faild");';
                echo 'window.location.href = "credintial.php";';
                echo '</script>';
   		                    
   }


}

?>
