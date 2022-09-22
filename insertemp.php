<?php

include 'include/connection.php';
include 'include/function.php';




if (isset($_POST['submit'])) {
	
	$emp=get_safe_value($conn,$_POST['name']);
   $roll=get_safe_value($conn,$_POST['role']);
   $process=get_safe_value($conn,$_POST['process']);
   $password=get_safe_value($conn,$_POST['password']);
   $tl=get_safe_value($conn,$_POST['tl']);
   $position=get_safe_value($conn,$_POST['position']);
   $salary=get_safe_value($conn,$_POST['salary']);
   $salary_date=get_safe_value($conn,$_POST['salary_date']);
   $omail=get_safe_value($conn,$_POST['omail']);
   $doj=get_safe_value($conn,$_POST['doj']);

 
 //echo '<br>';

 $sql=mysqli_query($conn,"SELECT MAX(id) as id FROM `emp`");
 $result=mysqli_fetch_assoc($sql);

  $id=$result['id'];

 $sql=mysqli_query($conn,"SELECT * FROM `emp` where id='$id'");
 $result=mysqli_fetch_assoc($sql);
 
  $emp_id=$result['emp_id'];

  $emp_id=$emp_id +1 ;


  // email code start 


  $curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$emp\",\n      \"email\": \"$omail\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"jincy@ensomerge.com\"\n    },\n     {\n      \"email\": \"priyanshu.mishra@ensomerge.com\"\n    },\n    {\n      \"email\": \"mukund.mukesh@ensomerge.com\"\n    }\n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n \n\n  \"template_id\": \"4365\",\n  \"variables\": {\n    \"VAR1\": \"$emp\",\n    \"VAR2\": \"$emp_id\",\n    \"VAR3\": \" $password\",\n    \"VAR4\": \"$process\",\n    \"VAR5\": \"$tl\",\n    \"VAR6\": \"$roll\",\n    \"VAR7\": \"$position\"\n   \n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);


 //email code end 
    

  //   if( in_array($imageFileType,$imageFileType1,$extensions_arr) ){



     mysqli_query($conn,"INSERT INTO `emp` (`id`, `emp_id`, `emp`, `roll`, `process`, `password`, `update_at`, `status`,`crm_status`,`tl`) VALUES (NULL, '$emp_id', '$emp', '$roll', '$process', '$password', current_timestamp(), '0','0','$tl')");

     mysqli_query($conn,"INSERT INTO `employee` (`id`, `emp_id`, `role`, `name`, `doj`, `dob`, `pmail`, `omail`, `address`, `pmaddress`, `contact`, `pcontact`, `wnumber`, `bgroup`, `gender`, `marital`, `bname`, `baccount`, `bifc`, `documents`, `status`, `position`,`tl`,`salary`,`salary_date`,`kids`,`dom`,`update_at`) VALUES (NULL, '$emp_id', '$roll', '$emp','$doj',NULL, NULL, '$omail', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0','$position','$tl','$salary','$salary_date',NULL,NULL, current_timestamp())");


     $response = curl_exec($curl);
     $err = curl_error($curl);

     curl_close($curl);

     // if ($err) {
     // echo "cURL Error #:" . $err;
     // } else {
     // echo $response;
     // }


          echo '<script>';
                 echo 'alert("Account Created Sucessfully");';
                 echo 'window.location.href = "credintial.php";';
            echo '</script>';
  }

  // else

  // {
  //        mysqli_query($conn,"INSERT INTO `employee` (`id`, `emp_id`, `role`, `name`, `doj`, `dob`, `pmail`, `omail`, `address`, `pmaddress`, `contact`, `pcontact`, `wnumber`, `bgroup`, `gender`, `marital`, `bname`, `baccount`, `bifc`, `documents`, `status`, `update_at`) VALUES (NULL, '1111', 'google', 'abbas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', current_timestamp())");

  //        header('location:index.php');



  // }



// }
?>
