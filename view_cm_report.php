<?php
include 'include/connection.php';
include 'header_data.php';

$id = $_GET['id']; // e.g. view_cm_report.php?id=5

$result = mysqli_query($conn, "SELECT mm.*, e.name 
FROM mirror_monitoring mm 
JOIN employee e ON mm.emp_id = e.emp_id 
WHERE mm.id = '$id' 
ORDER BY mm.id DESC");
$data = mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($data);
// die;
?>

<style>
    table { width: 100%; border-collapse: collapse;background-color:white; }
    h4 { color: white; }
    .heading-color { background: purple; color: white; }
    th, td { border: 1px solid #000; padding: 5px; }
</style>

<div >
    <div class="profile-tab-content tab-content">
        <div class="tab-pane fade active in" id="activity">
            <div style="text-align:center;">
                <h3>Mirror Monitoring Report - View</h3>
            </div>

            <table class="table">
                <!-- TL & Associate Info -->
                <tr>
                    <th colspan="6">TL:</th>
                    <td colspan="6"><?php echo $data['tl']; ?></td>
                    <th colspan="12">Name:</th>
                    <td colspan="12"><?php echo $data['name']; ?></td>
                </tr>

                <!-- Company Info -->
                <tr>
                    <th colspan="6">Process name:</th>
                    <td colspan="6"><?php echo $data['company']; ?></td>
                    <th colspan="12">Session Duration:</th>
                    <td colspan="12"><?php echo $data['session_duration']; ?></td>
                </tr>

                <!-- Dates -->
                <tr>
                    <th colspan="6">Audit Date:</th>
                    <td colspan="6"><?php echo $data['audit_date']; ?></td>
                    <th colspan="12">Follow up Date:</th>
                    <td colspan="12"><?php echo $data['follow_up_date']; ?></td>
                </tr>

                <!-- Question Header -->
               <tr class="heading-color">
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
                $report_id = $data['id'];
                    $i = 0;
                    foreach ($questions as $q) {
                        $question = $q[0];
                        $guideline = $q[1];

                        // Fetch score and comments from cm_questions table
                        $query = "
                            SELECT answer, comment 
                            FROM cm_questions 
                            WHERE report_id = '$report_id' AND question = '$question'
                        ";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);

                        $answer = $row['answer'] ?? '';
                        $comments = $row['comment'] ?? '';

                        echo "<tr>";
                        echo "<td colspan='6'>{$question}</td>";
                        echo "<td colspan='6'>{$answer}</td>";
                        echo "<td colspan='12'>{$comments}</td>";
                        echo "<td colspan='12'>{$guideline}</td>";
                        echo "</tr>";
                    }
                    ?>

                <!-- Repeat above row structure for each question -->

                <!-- Coaching Action Plan -->
                <tr><td colspan="36" class="heading-color"><h4>Key Strengths</h4></td></tr>
                <tr><td colspan="36"><?php echo $data['key_strengths']; ?></td></tr>

                <tr><td colspan="36" class="heading-color"><h4>Areas for Improvement</h4></td></tr>
                <tr><td colspan="36"><?php echo $data['areas_improvement']; ?></td></tr>

                <tr><td colspan="36" class="heading-color"><h4>Action Area</h4></td></tr>
              <tr>
                    <th colspan="12">Improvement Area</th>
                    <th colspan="12">Action Item</th>
                    <th colspan="12">Timeline</th>
                </tr>

                <?php
                $report_id = $data['id'];
                $actionQuery = "SELECT improvement_area, action_item, timeline FROM cm_action_items WHERE report_id = '$report_id'";
                $actionResult = mysqli_query($conn, $actionQuery);

                while ($row = mysqli_fetch_assoc($actionResult)) {
                    echo "<tr>";
                    echo "<td colspan='12'>{$row['improvement_area']}</td>";
                    echo "<td colspan='12'>{$row['action_item']}</td>";
                    echo "<td colspan='12'>{$row['timeline']}</td>";
                    echo "</tr>";
                }
                ?>

                
                <tr><td colspan="36" class="heading-color"><h4>Associate Self Feedback</h4></td></tr>
                <tr><td colspan="36"><?php echo $data['feedback']; ?></td></tr>

            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
