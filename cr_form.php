<?php
include 'include/connection.php';
include 'header_data.php';
$username = 'Riya';
?>

<style>
   table { width: 100%; }
   h4 { color: white; }
   .heading-color { background: purple; color: white; }
</style>

<div class="module">
   <div class="profile-tab-content tab-content">
      <div class="tab-pane fade active in" id="activity">
         <div style="text-align:center;"><h3>Mirror Monitoring Report</h3></div>
         <form action="backend_mm.php" method="post" enctype="multipart/form-data">
            <table border="1" class="table">
               <tr>
                  <th colspan="6">TL:</th>
                  <td colspan="6">
                     <select name="cm_tl" id="">
                         <option>Riya</option>
                         <option>Jincy</option>
                         <option>Mukund</option>
                     </select>
                  </td>
                  <th colspan="12">Name:</th>
                  <td colspan="12">
                     <select name="cm_name" required>
                        <option value="">Select Associate</option>
                        <?php 
                        $emp_query = mysqli_query($conn, "SELECT * FROM `emp` WHERE status=0  ORDER BY `emp` ASC");
                        while($emp_row = mysqli_fetch_assoc($emp_query)) {
                           echo '<option value="'.$emp_row['emp_id'].'">'.$emp_row['emp'].'</option>';
                        } ?>
                     </select>
                  </td>
               </tr>

               <tr>
                  <th colspan="6">Process name:</th>
                  <td colspan="6">
                  
                     <select name="cm_company" required>
                        <option value="">Select Process</option>
                        <?php 
                        $emp_query = mysqli_query($conn, "SELECT Distinct `process` FROM `emp` WHERE status=0 AND `process` !=''  ORDER BY `process` ASC");
                        while($emp_row = mysqli_fetch_assoc($emp_query)) {
                           echo '<option value="'.$emp_row['process'].'">'.$emp_row['process'].'</option>';
                        } ?>
                     </select>
                  
                  </td>
                  <th colspan="12">Session Duration:</th>
                  <td colspan="12"><input type="text" name="cm_session_duration" required></td>
               </tr>

               <tr>
                  <th colspan="6"> Date:</th>
                  <td colspan="6"><input type="date" name="cm_auditdate"  ></td>
                  <th colspan="12">Follow up Date:</th>
                  <td colspan="12"><input type="date" name="cm_date" required></td>
               </tr>

               <tr>
                  <th colspan="6">Category</th>
                  <th colspan="6">Score</th>
                  <th colspan="12">Comments</th>
                  <th colspan="12">Guideline</th>
               </tr>

               <?php
               $questions = [
                  ['Call Etiquette', 'Greeting, tone, pace, active listening, professionalism, Securing next step'],
                  ['Process Adherence', 'Following call script, objection handling, compliance disclosures.'],
                  ['CRM Hygiene', 'Logging calls/emails updating stages, adding notes in real-time.'],
                  ['Tool Proficiency', 'Efficient use of Portal / Website / Intranet or other available tools'],
                  ['Time Management', 'Minimizing idle time, multitasking between calls/admin work. Movement between screens']
               ];
               $index = 1;
               foreach ($questions as $q) {
                  echo '
                  <tr>
                     <input type="hidden" name="q'.$index.'_text" value="'.htmlspecialchars($q[0]).'">
                     <input type="hidden" name="q'.$index.'_point" value="4">
                     <td colspan="6">'.$q[0].'</td>
                     <td colspan="6">
                        <select name="q'.$index.'_select" required>
                           <option value="">Select</option>
                           <option>Yes</option>
                           <option>No</option>
                           <option>Average</option>
                        </select>
                     </td>
                     <td colspan="12"><textarea rows="2" style="width:95%" name="q'.$index.'_comment"></textarea></td>
                     <td colspan="12">'.$q[1].'</td>
                  </tr>';
                  $index++;
               }
               ?>

               <tr><td colspan="36" class="heading-color"><h4>Key Strengths</h4></td></tr>
               <tr><td colspan="36"><textarea rows="4" style="width:98%" name="key_strengths" required></textarea></td></tr>

               <tr><td colspan="36" class="heading-color"><h4>Areas for Improvement</h4></td></tr>
               <tr><td colspan="36"><textarea rows="4" style="width:98%" name="areas_improvement" required></textarea></td></tr>

               <tr><td colspan="36" class="heading-color"><h4>Action Area</h4></td></tr>
               <tr><th colspan="12">Improvement Area</th><th colspan="12">Action Item</th><th colspan="12">Timeline</th></tr>
               <?php for ($i=1; $i<=3; $i++) { ?>
                  <tr>
                     <td colspan="12"><input type="text" name="improve_area_<?php echo $i; ?>"></td>
                     <td colspan="12"><input type="text" name="action_item_<?php echo $i; ?>"></td>
                     <td colspan="12"><input type="text" name="timeline_<?php echo $i; ?>"></td>
                  </tr>
               <?php } ?>
            </table>
            <br>
            <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
            <br><br>
         </form>
      </div>
   </div>
</div>

<?php include 'footer.php'; ?>
