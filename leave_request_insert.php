<?php
include 'include/connection.php';


if (isset($_POST['submit'])) {
    $emp_id=$_POST['name'];

   $user=mysqli_query($conn,"SELECT * from emp where emp_id ='$emp_id'  ") ;
   $query=mysqli_fetch_array($user);
   $name=$query['emp'];
   $tl=$query['tl'];
   
   if ($tl=='') {
   	$tl='HR';
   }
   
   if($tl=='Riya') {
   	$to_email='riya@ensomerge.com';
   }elseif ($tl=='Jincy') {
   	$to_email='jincy@ensomerge.com';
   }else{
   	$to_email='mukund.mukesh@ensomerge.com';
   }


    $date= $_POST['date'];
    $todate= $_POST['todate'];
    $type= $conn -> real_escape_string($_POST['type']);
    $no= $conn -> real_escape_string($_POST['no_of_days']);
    $remarks= $conn -> real_escape_string($_POST['hr_remarks']);
    $created_by= $conn -> real_escape_string($_POST['created_by']);

    date_default_timezone_set("Asia/kolkata");
    $applydate= date("d:m:Y h:i:sa");
    $admin_remarks =  $created_by .' '.'Applied your Leave Request';

// $curl = curl_init();

// curl_setopt_array($curl, [
//   CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$tl\",\n      \"email\": \"$to_email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"BookMysales\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"jincy@ensomerge.com\"\n    },\n    {\n      \"email\": \"priyanshu.mishra@ensomerge.com\"\n    }\n  ],\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n\n  \"template_id\": \"4362\",\n  \"variables\": {\n    \"VAR1\": \"$applydate\",\n    \"VAR2\": \"$emp_id\",\n    \"VAR3\": \"$username\",\n    \"VAR4\": \"$date\",\n    \"VAR5\": \"$todate \",\n    \"VAR6\": \"$type\",\n    \"VAR7\": \"$remarks\",\n    \"VAR8\": \"$name\"\n  },\n  \"authkey\": \"372323AjwXe2wBhWIR61efa85aP1\"\n}",
//   CURLOPT_HTTPHEADER => [
//     "Accept: application/json",
//     "Content-Type: application/JSON"
//   ],
// ]);
    $sqlleave="INSERT INTO `leavea` (`emp_id`, `emp_name`, `date`,`todate`, `type`, `remarks`, `status`,`hr_remarks`,`created_by`,`no_of_days`) VALUES ('$emp_id', '$name', '$date','$todate', '$type', '$admin_remarks','1','$remarks','$created_by','$no')";


      if (mysqli_query($conn, $sqlleave)) {
        //  $response = curl_exec($curl);
         //$err = curl_error($curl);
        //  curl_close($curl);

            echo '<script type="text/javascript">';
            echo 'alert("Leave  Added Sucessfully");';
            echo 'window.location.href = "leave.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Adding Leave Failed");';
            echo 'history.back()';
            echo '</script>';
        }

}
?>