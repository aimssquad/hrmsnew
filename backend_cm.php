<?php 

include 'include/connection.php';
include 'include/function.php';

// print_r($_POST);

// die();

if (isset($_POST['submit'])) {
	
	  // CM_Report

	  $cm_tl=get_safe_value($conn,$_POST['cm_tl']);
	  $cm_name=get_safe_value($conn,$_POST['cm_name']);
	  $cm_date=get_safe_value($conn,$_POST['cm_date']);
	  $cm_phoneno=get_safe_value($conn,$_POST['cm_phoneno']);
	  $cm_callrecord=NULL;
	  $cm_auditdate=get_safe_value($conn,$_POST['cm_auditdate']);
	  $cm_company=get_safe_value($conn,$_POST['cm_company']);
     $coaching_plan=get_safe_value($conn,$_POST['coaching_plan']);

	 
	 // Cm_Report ends


  // prospecting statrt 
 
    $q1=get_safe_value($conn,$_POST['q1']);
    $q1_point=get_safe_value($conn,$_POST['q1_point']);
    $q1_select=get_safe_value($conn,$_POST['q1_select']);

     if ($q1_select=='Yes') {
     	$q1_score=$q1_point;
     	$q1_point=$q1_point;	
     }elseif ($q1_select=='No') {
     	$q1_score=$q1_point;
     	$q1_point=0;
     }else{
     	$q1_score=0;
     	$q1_point=0;
     }


    $q1_comment=get_safe_value($conn,$_POST['q1_comment']);

    $q2=get_safe_value($conn,$_POST['q2']);
    $q2_point=get_safe_value($conn,$_POST['q2_point']);
    $q2_select=get_safe_value($conn,$_POST['q2_select']);
       if ($q2_select=='Yes') {
     	$q2_score=$q2_point;
     	$q2_point=$q2_point;	
     }elseif ($q2_select=='No') {
     	$q2_score=$q2_point;
     	$q2_point=0;
     }else{
     	$q2_score=0;
     	$q2_point=0;
     }
    $q2_comment=get_safe_value($conn,$_POST['q2_comment']);

     $q3=get_safe_value($conn,$_POST['q3']);
    $q3_point=get_safe_value($conn,$_POST['q3_point']);
    $q3_select=get_safe_value($conn,$_POST['q3_select']);
       if ($q3_select=='Yes') {
     	$q3_score=$q3_point;
     	$q3_point=$q3_point;	
     }elseif ($q3_select=='No') {
     	$q3_score=$q3_point;
     	$q3_point=0;
     }else{
     	$q3_score=0;
     	$q3_point=0;
     }
    $q3_comment=get_safe_value($conn,$_POST['q3_comment']);

    $q4=get_safe_value($conn,$_POST['q4']);
    $q4_point=get_safe_value($conn,$_POST['q4_point']);
    $q4_select=get_safe_value($conn,$_POST['q4_select']);
       if ($q4_select=='Yes') {
     	$q4_score=$q4_point;
     	$q4_point=$q4_point;	
     }elseif ($q4_select=='No') {
     	$q4_score=$q4_point;
     	$q4_point=0;
     }else{
     	$q4_score=0;
     	$q4_point=0;
     }
    $q4_comment=get_safe_value($conn,$_POST['q4_comment']);

    $q5=get_safe_value($conn,$_POST['q5']);
    $q5_point=get_safe_value($conn,$_POST['q5_point']);
    $q5_select=get_safe_value($conn,$_POST['q5_select']);
       if ($q1_select=='Yes') {
     	$q5_score=$q5_point;
     	$q5_point=$q5_point;	
     }elseif ($q5_select=='No') {
     	$q5_score=$q5_point;
     	$q5_point=0;
     }else{
     	$q5_score=0;
     	$q5_point=0;
     }
    $q5_comment=get_safe_value($conn,$_POST['q5_comment']);


    $q6=get_safe_value($conn,$_POST['q6']);
    $q6_point=get_safe_value($conn,$_POST['q6_point']);
    $q6_select=get_safe_value($conn,$_POST['q6_select']);
       if ($q6_select=='Yes') {
     	$q6_score=$q6_point;
     	$q6_point=$q6_point;	
     }elseif ($q6_select=='No') {
     	$q6_score=$q6_point;
     	$q6_point=0;
     }else{
     	$q6_score=0;
     	$q6_point=0;
     }
    $q6_comment=get_safe_value($conn,$_POST['q6_comment']);


    $q7=get_safe_value($conn,$_POST['q7']);
    $q7_point=get_safe_value($conn,$_POST['q7_point']);
    $q7_select=get_safe_value($conn,$_POST['q7_select']);
       if ($q7_select=='Yes') {
     	$q7_score=$q7_point;
     	$q7_point=$q7_point;	
     }elseif ($q7_select=='No') {
     	$q7_score=$q7_point;
     	$q7_point=0;
     }else{
     	$q7_score=0;
     	$q7_point=0;
     }
    $q7_comment=get_safe_value($conn,$_POST['q7_comment']);

    $q8=get_safe_value($conn,$_POST['q8']);
    $q8_point=get_safe_value($conn,$_POST['q8_point']);
    $q8_select=get_safe_value($conn,$_POST['q8_select']);
       if ($q8_select=='Yes') {
     	$q8_score=$q8_point;
     	$q8_point=$q8_point;	
     }elseif ($q8_select=='No') {
     	$q8_score=$q8_point;
     	$q8_point=0;
     }else{
     	$q8_score=0;
     	$q8_point=0;
     }
    $q8_comment=get_safe_value($conn,$_POST['q8_comment']);


    $q9=get_safe_value($conn,$_POST['q9']);
    $q9_point=get_safe_value($conn,$_POST['q9_point']);
    $q9_select=get_safe_value($conn,$_POST['q9_select']);
       if ($q9_select=='Yes') {
     	$q9_score=$q9_point;
     	$q9_point=$q9_point;	
     }elseif ($q9_select=='No') {
     	$q9_score=$q9_point;
     	$q9_point=0;
     }else{
     	$q9_score=0;
     	$q9_point=0;
     }
    $q9_comment=get_safe_value($conn,$_POST['q9_comment']);



    $q10=get_safe_value($conn,$_POST['q10']);
    $q10_point=get_safe_value($conn,$_POST['q10_point']);
    $q10_select=get_safe_value($conn,$_POST['q10_select']);
       if ($q10_select=='Yes') {
     	$q10_score=$q10_point;
     	$q10_point=$q10_point;	
     }elseif ($q10_select=='No') {
     	$q10_score=$q10_point;
     	$q10_point=0;
     }else{
     	$q10_score=0;
     	$q10_point=0;
     }
    $q10_comment=get_safe_value($conn,$_POST['q10_comment']);

    $q11=get_safe_value($conn,$_POST['q11']);
    $q11_point=get_safe_value($conn,$_POST['q11_point']);
    $q11_select=get_safe_value($conn,$_POST['q11_select']);
       if ($q11_select=='Yes') {
     	$q11_score=$q11_point;
     	$q11_point=$q11_point;	
     }elseif ($q11_select=='No') {
     	$q11_score=$q11_point;
     	$q11_point=0;
     }else{
     	$q11_score=0;
     	$q11_point=0;
     }
    $q11_comment=get_safe_value($conn,$_POST['q11_comment']);


   $q12=get_safe_value($conn,$_POST['q12']);
    $q12_point=get_safe_value($conn,$_POST['q12_point']);
    $q12_select=get_safe_value($conn,$_POST['q12_select']);
       if ($q12_select=='Yes') {
     	$q12_score=$q12_point;
     	$q12_point=$q12_point;	
     }elseif ($q12_select=='No') {
     	$q12_score=$q12_point;
     	$q12_point=0;
     }else{
     	$q12_score=0;
     	$q12_point=0;
     }
    $q12_comment=get_safe_value($conn,$_POST['q12_comment']);

    $q13=get_safe_value($conn,$_POST['q13']);
    $q13_point=get_safe_value($conn,$_POST['q13_point']);
    $q13_select=get_safe_value($conn,$_POST['q13_select']);
       if ($q13_select=='Yes') {
     	$q13_score=$q13_point;
     	$q13_point=$q13_point;	
     }elseif ($q13_select=='No') {
     	$q13_score=$q13_point;
     	$q13_point=0;
     }else{
     	$q13_score=0;
     	$q13_point=0;
     }
    $q13_comment=get_safe_value($conn,$_POST['q13_comment']);


   $q14=get_safe_value($conn,$_POST['q14']);
    $q14_point=get_safe_value($conn,$_POST['q14_point']);
    $q14_select=get_safe_value($conn,$_POST['q14_select']);
       if ($q14_select=='Yes') {
     	$q14_score=$q14_point;
     	$q14_point=$q14_point;	
     }elseif ($q14_select=='No') {
     	$q14_score=$q14_point;
     	$q14_point=0;
     }else{
     	$q14_score=0;
     	$q14_point=0;
     }
    $q14_comment=get_safe_value($conn,$_POST['q14_comment']);


   $q15=get_safe_value($conn,$_POST['q15']);
    $q15_point=get_safe_value($conn,$_POST['q15_point']);
    $q15_select=get_safe_value($conn,$_POST['q15_select']);
       if ($q15_select=='Yes') {
     	$q15_score=$q15_point;
     	$q15_point=$q15_point;	
     }elseif ($q15_select=='No') {
     	$q15_score=$q15_point;
     	$q15_point=0;
     }else{
     	$q15_score=0;
     	$q15_point=0;
     }
    $q15_comment=get_safe_value($conn,$_POST['q15_comment']);


  $q16=get_safe_value($conn,$_POST['q16']);
    $q16_point=get_safe_value($conn,$_POST['q16_point']);
    $q16_select=get_safe_value($conn,$_POST['q16_select']);
       if ($q16_select=='Yes') {
     	$q16_score=$q16_point;
     	$q16_point=$q16_point;	
     }elseif ($q16_select=='No') {
     	$q16_score=$q16_point;
     	$q16_point=0;
     }else{
     	$q16_score=0;
     	$q16_point=0;
     }
    $q16_comment=get_safe_value($conn,$_POST['q16_comment']);

    $q17=get_safe_value($conn,$_POST['q17']);
    $q17_point=get_safe_value($conn,$_POST['q17_point']);
    $q17_select=get_safe_value($conn,$_POST['q17_select']);
       if ($q17_select=='Yes') {
     	$q17_score=$q17_point;
     	$q17_point=$q17_point;	
     }elseif ($q17_select=='No') {
     	$q17_score=$q17_point;
     	$q17_point=0;
     }else{
     	$q17_score=0;
     	$q17_point=0;
     }
    $q17_comment=get_safe_value($conn,$_POST['q17_comment']);


    $q18=get_safe_value($conn,$_POST['q18']);
    $q18_point=get_safe_value($conn,$_POST['q18_point']);
    $q18_select=get_safe_value($conn,$_POST['q18_select']);
       if ($q18_select=='Yes') {
     	$q18_score=$q18_point;
     	$q18_point=$q18_point;	
     }elseif ($q18_select=='No') {
     	$q18_score=$q18_point;
     	$q18_point=0;
     }else{
     	$q18_score=0;
     	$q18_point=0;
     }
    $q18_comment=get_safe_value($conn,$_POST['q18_comment']);

  $q19=get_safe_value($conn,$_POST['q19']);
    $q19_point=get_safe_value($conn,$_POST['q19_point']);
    $q19_select=get_safe_value($conn,$_POST['q19_select']);
       if ($q19_select=='Yes') {
     	$q19_score=$q19_point;
     	$q19_point=$q19_point;	
     }elseif ($q19_select=='No') {
     	$q19_score=$q19_point;
     	$q19_point=0;
     }else{
     	$q19_score=0;
     	$q19_point=0;
     }
    $q19_comment=get_safe_value($conn,$_POST['q19_comment']);


  $q20=get_safe_value($conn,$_POST['q20']);
    $q20_point=get_safe_value($conn,$_POST['q20_point']);
    $q20_select=get_safe_value($conn,$_POST['q20_select']);
       if ($q20_select=='Yes') {
     	$q20_score=$q20_point;
     	$q20_point=$q20_point;	
     }elseif ($q20_select=='No') {
     	$q20_score=$q20_point;
     	$q20_point=0;
     }else{
     	$q20_score=0;
     	$q20_point=0;
     }
    $q20_comment=get_safe_value($conn,$_POST['q20_comment']);


  $q21=get_safe_value($conn,$_POST['q21']);
    $q21_point=get_safe_value($conn,$_POST['q21_point']);
    $q21_select=get_safe_value($conn,$_POST['q21_select']);
       if ($q21_select=='Yes') {
     	$q21_score=$q21_point;
     	$q21_point=$q21_point;	
     }elseif ($q21_select=='No') {
     	$q21_score=$q21_point;
     	$q21_point=0;
     }else{
     	$q21_score=0;
     	$q21_point=0;
     }

    $q21_comment=get_safe_value($conn,$_POST['q21_comment']);




 
   $total=$q1_score + $q2_score + $q3_score + $q4_score  + $q5_score + $q6_score + $q7_score + $q8_score + $q9_score + $q10_score + $q11_score + $q12_score + $q13_score + $q14_score + $q15_score + $q16_score + $q17_score + $q18_score + $q19_score + $q20_score + $q21_score;

     $score = $q1_point + $q2_point + $q3_point + $q4_point  + $q5_point + $q6_point + $q7_point + $q8_point + $q9_point + $q10_point + $q11_point + $q12_point + $q13_point + $q14_point + $q15_point + $q16_point + $q17_point + $q18_point + $q19_point + $q20_point + $q21_point;

   // echo $total;
   // echo "<br>";

   //  echo $total_score ;

   $cmreport_query=mysqli_multi_query($conn,"INSERT INTO `cmreport` (`id`, `cm_id`, `cm_tl`, `cm_date`, `cm_empid`, `cm_phoneno`, `cm_auditdate`, `cm_company`, `cm_callrecord`, `total`,`score`,`c_plan`,`status`, `created_at`) VALUES (NULL, '2', '$cm_tl', '$cm_date', '$cm_name', '$cm_phoneno', '$cm_auditdate', '$cm_company', NULL,'$total','$score','$coaching_plan','0', current_timestamp())");
   $cm_id = mysqli_insert_id($conn);
  

   if ($cmreport_query) {
      echo $cm_id ;
     mysqli_multi_query($conn,"INSERT INTO `q1_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q1', '$q1_point', '$q1_score', '$q1_select', '$q1_comment', current_timestamp())");

     mysqli_multi_query($conn,"INSERT INTO `q2_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q2', '$q2_point', '$q2_score', '$q2_select', '$q2_comment', current_timestamp())");

      mysqli_multi_query($conn,"INSERT INTO `q3_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q3', '$q3_point', '$q3_score', '$q3_select', '$q3_comment', current_timestamp())");

       mysqli_multi_query($conn,"INSERT INTO `q4_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q4', '$q4_point', '$q4_score', '$q4_select', '$q4_comment', current_timestamp())");

        mysqli_multi_query($conn,"INSERT INTO `q5_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q5', '$q5_point', '$q5_score', '$q5_select', '$q5_comment', current_timestamp())");

          mysqli_multi_query($conn,"INSERT INTO `q6_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q6', '$q6_point', '$q6_score', '$q6_select', '$q6_comment', current_timestamp())");

          mysqli_multi_query($conn,"INSERT INTO `q7_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q7', '$q7_point', '$q7_score', '$q7_select', '$q7_comment', current_timestamp())");

          mysqli_multi_query($conn,"INSERT INTO `q8_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q8', '$q8_point', '$q8_score', '$q8_select', '$q8_comment', current_timestamp())");

       mysqli_multi_query($conn,"INSERT INTO `q9_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q9', '$q9_point', '$q9_score', '$q9_select', '$q9_comment', current_timestamp())");

       mysqli_multi_query($conn,"INSERT INTO `q10_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q10', '$q10_point', '$q10_score', '$q10_select', '$q10_comment', current_timestamp())");


          mysqli_multi_query($conn,"INSERT INTO `q11_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q11', '$q11_point', '$q11_score', '$q11_select', '$q11_comment', current_timestamp())");

          mysqli_multi_query($conn,"INSERT INTO `q12_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q12', '$q12_point', '$q12_score', '$q12_select', '$q12_comment', current_timestamp())");

          mysqli_multi_query($conn,"INSERT INTO `q13_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q13', '$q13_point', '$q13_score', '$q13_select', '$q13_comment', current_timestamp())");

          mysqli_multi_query($conn,"INSERT INTO `q14_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q14', '$q14_point', '$q14_score', '$q14_select', '$q14_comment', current_timestamp())");

       mysqli_multi_query($conn,"INSERT INTO `q15_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q15', '$q15_point', '$q15_score', '$q15_select', '$q15_comment', current_timestamp())");

       mysqli_multi_query($conn,"INSERT INTO `q16_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q16', '$q16_point', '$q16_score', '$q16_select', '$q16_comment', current_timestamp())");

         mysqli_multi_query($conn,"INSERT INTO `q17_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q17', '$q17_point', '$q17_score', '$q17_select', '$q17_comment', current_timestamp())");

          mysqli_multi_query($conn,"INSERT INTO `q18_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q18', '$q18_point', '$q18_score', '$q18_select', '$q18_comment', current_timestamp())");

          mysqli_multi_query($conn,"INSERT INTO `q19_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q19', '$q19_point', '$q19_score', '$q19_select', '$q19_comment', current_timestamp())");
       mysqli_multi_query($conn,"INSERT INTO `q20_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q20', '$q20_point', '$q20_score', '$q20_select', '$q20_comment', current_timestamp())");

       mysqli_multi_query($conn,"INSERT INTO `q21_table` (`id`, `cm_id`, `q1`, `q1_point`, `q1_score`, `q1_select`, `q1_comment`, `created_at`) VALUES (NULL, '$cm_id', '$q21', '$q21_point', '$q21_score', '$q21_select', '$q21_comment', current_timestamp())");




      header('location:cmreport.php');



   }else{

   	echo "failed";
   }



	  
}

?>

