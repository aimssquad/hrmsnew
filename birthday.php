<?php 
$conn=mysqli_connect('10.128.0.9','abbas','Abbas@1995','hrms');
//$conn=mysqli_connect('localhost','root','','hrms');



$today=date('m-d');

//echo $today;



$birthday_query=mysqli_query($conn,"SELECT * FROM employee WHERE DATE_FORMAT(`dob`, '%m-%d')='$today' and status=0");

$num_birthday=mysqli_num_rows($birthday_query);

 if ($num_birthday < 1) {

 	echo "no birthday today";
 	
 }else{

 	while($birthday_row=mysqli_fetch_assoc($birthday_query)){

 		$name= $birthday_row['name'];
 		$email=$birthday_row['omail'];
 		$pmail=$birthday_row['pmail'];

 		$allmail="allensomerge@ensomerge.com";




      //email coding 



$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$allmail\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"abbas.uddin@ensomerge.com\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n\n\n  \"template_id\": \"4366\",\n  \"variables\": {\n    \"VAR1\": \"$name\"\n    \n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
}







 		

   }

 }








?>