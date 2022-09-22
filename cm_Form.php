<?php
   include 'include/connection.php';
   include 'header_data.php';
   $username='Riya';
   ?>
<style>
   table{
   width: 100%;
   }
   h4{
   color: white;
   }
   .heading-color{
   background: purple;
   color: white;
   }
</style>
<div class="module">
   <div class="profile-tab-content tab-content">
      <div class="tab-pane fade active in" id="activity">
         <div style="text-align:center;">
            <h3>Call Monitoring Report</h3>
         </div>
         <form action="backend_cm.php" id="form1" method="post" runat="server" enctype="multipart/form-data" >
            <div style="margin:auto;width:100%;height: auto;">
               <table border="1px solid" class="table">
                  <!-- CM_Report -->
                  <tr>
                  <th colspan="9" style="text-align:left;">TL :</th>
                     <th colspan="9" ><input type="text" name="cm_tl" value="<?php echo $username ?>" readonly></th>
                     <th colspan="9" style="text-align:left;">Name : </th>
                     <?php 
                        $emp_query=mysqli_query($conn,"SELECT * FROM `emp` where status=0 and tl='$username' ORDER BY `emp` ASC");
                        ?>
                     <th colspan="9">
                        <select name="cm_name" required>
                           <option value="">Select Associate</option>
                           <?php 
                              while($emp_row=mysqli_fetch_assoc($emp_query)){ ?>
                           <option value="<?php echo $emp_row['emp_id']; ?>"><?php echo $emp_row['emp']; ?></option>
                           <?php
                              }
                              
                              ?>
                        </select>
                     </th>
                     
                    
                  </tr>
                  <tr>
                     <th colspan="9">Customer/Company name :</th>
                     <th colspan="9"><input type="text" name="cm_company" required></th>
                     <th colspan="9">Customer Phone No :</th>
                     <th collspan="9"><input type="text" name="cm_phoneno" required></th>
                  </tr>
                  <tr class="tr-inputs">
                     
                     <th colspan="9" style="text-align:left;">Audit Date : </th>
                     <th colspan="9"><input type="text" name="cm_auditdate" value="<?php echo date('Y-m-d'); ?>" readonly></th>
                     <th colspan="9">Call Date :</th>
                     <th colspan="9"><input type="date" name="cm_date" required></th>
                  </tr>
                  <!-- CM_Report End -->
                  <!--  Call guide sale  start  -->
                  <tr>
                     <td colspan="36" style="text-align: center;background:red;">
                        <h4 >Call guide sale </h4>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="4" class="heading-color">Prospecting</td>
                     <td colspan="4" class="heading-color">Pts</td>
                     <td colspan="4" class="heading-color">YES/No/N/A</td>
                     <td colspan="16" class="heading-color">Note</td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q1" value="Company within defined Geography As per Process">
                     <td colspan="4">Company within defined Geography As per Process</td>
                     <input type="hidden" name="q1_point" value="5">
                     <td colspan="4">5</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q1_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q1_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q2" value="Sector / Segment matches Process Need">
                     <td colspan="4">Sector / Segment matches Process Need</td>
                     <input type="hidden" name="q2_point" value="10">
                     <td colspan="4">10</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q2_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q2_comment" ></textarea></td>
                  </tr>
                  <!--  Call guide sale end  -->
                  <!--  Making Contact start  -->
                  <tr>
                     <td colspan="4" class="heading-color">Greeting(Making Contact)</td>
                     <td colspan="4" class="heading-color">Pts</td>
                     <td colspan="4" class="heading-color">YES/No/N/A</td>
                     <td colspan="16" class="heading-color">Note</td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q3" value="Sector / Segment matches Process Need">
                     <td colspan="4">Was the company greeting followed</td>
                     <input type="hidden" name="q3_point" value="3" required>
                     <td colspan="4">3</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q3_select" >
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q3_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q4" value="Sector / Segment matches Process Need">
                     <td colspan="4">Did the advisor give their name when relevant</td>
                     <input type="hidden" name="q4_point" value="2">
                     <td colspan="4">2</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q4_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q4_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q5" value="Sector / Segment matches Process Need">
                     <td colspan="4">Did the advisor get the customer's name right and use it to personalize the call</td>
                     <input type="hidden" name="q5_point" value="3">
                     <td colspan="4">3</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q5_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q5_comment" ></textarea></td>
                  </tr>
                  <!--  Making Contact sale end  -->
                  <!--  Establishing Contact start  -->
                  <tr>
                     <td colspan="4" class="heading-color">Establishing Contact</td>
                     <td colspan="4" class="heading-color">Pts</td>
                     <td colspan="4" class="heading-color">YES/No/N/A</td>
                     <td colspan="16" class="heading-color">Note</td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q6" value="Sector / Segment matches Process Need">
                     <td colspan="4">Objective of Call Explained</td>
                     <input type="hidden" name="q6_point" value="4">
                     <td colspan="4">4</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q6_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q6_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q7" value="Sector / Segment matches Process Need">
                     <td colspan="4">Usage of information from Website / Other Sites to build relevance</td>
                     <input type="hidden" name="q7_point" value="4">
                     <td colspan="4">4</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q7_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q7_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q8" value="Sector / Segment matches Process Need">
                     <td colspan="4">Seeking permission to take the call further</td>
                     <input type="hidden" name="q8_point" value="2">
                     <td colspan="4">2</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q8_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q8_comment" ></textarea></td>
                  </tr>
                  <!-- Establishing Contact end  -->
                  <!--  Qualifying Prospect start  -->
                  <tr>
                     <td colspan="4" class="heading-color">Qualifying Prospect</td>
                     <td colspan="4" class="heading-color">Pts</td>
                     <td colspan="4" class="heading-color">YES/No/N/A</td>
                     <td colspan="16" class="heading-color">Note</td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q9" value="Sector / Segment matches Process Need">
                     <td colspan="4">Customer profiling accomplished</td>
                     <input type="hidden" name="q9_point" value="4">
                     <td colspan="4">4</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q9_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q9_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q10" value="Understanding challenges and Goals">
                     <td colspan="4">Understanding challenges and Goals</td>
                     <input type="hidden" name="q10_point" value="6">
                     <td colspan="4">6</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q10_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q10_comment" ></textarea></td>
                  </tr>
                  <!-- Qualifying Prospect end  -->
                  <!--  Nurturing Prospect and Placement start  -->
                  <tr>
                     <td colspan="4" class="heading-color">Nurturing Prospect and Placement</td>
                     <td colspan="4" class="heading-color">Pts</td>
                     <td colspan="4" class="heading-color">YES/No/N/A</td>
                     <td colspan="16" class="heading-color">Note</td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q11" value="Confirm Understanding of Need / Present State">
                     <td colspan="4">Confirm Understanding of Need / Present State</td>
                     <input type="hidden" name="q11_point" value="5">
                     <td colspan="4">5</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q11_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q11_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q12" value="Place the product/service using features and benefits">
                     <td colspan="4">Place the product/service using features and benefits</td>
                     <input type="hidden" name="q12_point" value="10">
                     <td colspan="4">10</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q12_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q12_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q13" value="Managing Objections">
                     <td colspan="4">Managing Objections</td>
                     <input type="hidden" name="q13_point" value="10">
                     <td colspan="4">10</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q13_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q13_comment" ></textarea></td>
                  </tr>
                  <!-- Nurturing Prospect and Placement end  -->
                  <!--  Closing start  -->
                  <tr>
                     <td colspan="4" class="heading-color">Closing</td>
                     <td colspan="4" class="heading-color">Pts</td>
                     <td colspan="4" class="heading-color">YES/No/N/A</td>
                     <td colspan="16" class="heading-color">Note</td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q14" value="Appropriate efforts made to clinch the lead">
                     <td colspan="4">Appropriate efforts made to clinch the lead</td>
                     <input type="hidden" name="q14_point" value="10">
                     <td colspan="4">10</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q14_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q14_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q15" value="Next steps explained , Callback date secured">
                     <td colspan="4">Next steps explained , Callback date secured</td>
                     <input type="hidden" name="q15_point" value="4">
                     <td colspan="4">4</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q15_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q15_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q16" value="CRM Updation Fully Done ">
                     <td colspan="4">CRM Updation Fully Done </td>
                     <input type="hidden" name="q16_point" value="3">
                     <td colspan="4">3</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q16_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q16_comment" ></textarea></td>
                  </tr>
                  <!-- Closing end  -->
                  <!--  Soft Skills start  -->
                  <tr>
                     <td colspan="4" class="heading-color">Soft Skills</td>
                     <td colspan="4" class="heading-color">Pts</td>
                     <td colspan="4" class="heading-color">YES/No/N/A</td>
                     <td colspan="16" class="heading-color">Note</td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q17" value="Call flow">
                     <td colspan="4">Call flow</td>
                     <input type="hidden" name="q17_point" value="2">
                     <td colspan="4">2</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q17_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q17_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q18" value="Active Listening">
                     <td colspan="4">Active Listening</td>
                     <input type="hidden" name="q18_point" value="4">
                     <td colspan="4">4</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q18_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q18_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q19" value="Call control">
                     <td colspan="4">Call control</td>
                     <input type="hidden" name="q19_point" value="4">
                     <td colspan="4">4</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q19_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q19_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q20" value="Correct Choice of words">
                     <td colspan="4">Correct Choice of words</td>
                     <input type="hidden" name="q20_point" value="3">
                     <td colspan="4">3</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q20_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q20_comment" ></textarea></td>
                  </tr>
                  <tr>
                     <input type="hidden" name="q21" value="Sentence Construction\ Grammar">
                     <td colspan="4">Sentence Construction\ Grammar</td>
                     <input type="hidden" name="q21_point" value="2">
                     <td colspan="4">2</td>
                     <td colspan="4">
                        <select style="width: 90%;" name="q21_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>N/A</option>
                        </select>
                     </td>
                     <td colspan="20"><textarea rows="2" style="width:95%" name="q21_comment" ></textarea></td>
                  </tr>
                  <!-- Soft Skills end  -->
                  <!--total -->
                  <!-- total end -->
                  <tr>
                     <td colspan="36" style="text-align: center;background:purple;">
                        <h4 >COACHING ACTION PLAN </h4>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="36" ><textarea rows="4" style="width:98%" name="coaching_plan" required></textarea> </td>
                  </tr>
               </table>
            </div>
            <br>
            <center>
               <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </center>
         </form>
         <br><br>
      </div>
   </div>
</div>
<?php
   include 'footer.php';
   ?>