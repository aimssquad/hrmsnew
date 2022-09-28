<?php
session_start();
include 'include/connection.php';
include 'include/function.php';


if (isset($_POST['submit'])) {
     $username=get_safe_value($conn,$_POST['name']);
	 $password=get_safe_value($conn,$_POST['pass']);
    

    $query = mysqli_query($conn,"SELECT * FROM  `admin` WHERE `username`='$username' AND `password`='$password'");
    
     if (mysqli_num_rows($query) != 0)
    {

       $result=mysqli_fetch_assoc($query);
       $username=$result['username'];
       $role=$result['role'];
       
       if ($role==2) {
        echo "<script language='javascript' type='text/javascript'> location.href='dashboard2.php' </script>"; 
        $_SESSION['items']=array($username,$role);
       
       }else{
        echo "<script language='javascript' type='text/javascript'> location.href='dashboard.php' </script>"; 
        $_SESSION['items']=array($username,$role);
       }
      
    
      }
      else
      {
		
        echo '<script type="text/javascript">'; 
        echo 'alert("Username or password Invalid");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';

      }
}
?>