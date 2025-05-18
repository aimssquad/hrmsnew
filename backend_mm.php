<?php
include 'include/connection.php';

if (isset($_POST['submit'])) {
    $tl = $_POST['cm_tl'];
    $name = $_POST['cm_name'];
    $company = $_POST['cm_company'];
    $session = $_POST['cm_session_duration'];
    $audit_date = $_POST['cm_auditdate'];
    $follow_up = $_POST['cm_date'];
    $key_strengths = $_POST['key_strengths'];
    $areas_improvement = $_POST['areas_improvement'];

    // Store question answers
    $questions_data = [];
    for ($i = 1; $i <= 5; $i++) {
        $questions_data[] = [
            'text' => $_POST["q{$i}_text"],
            'point' => $_POST["q{$i}_point"],
            'select' => $_POST["q{$i}_select"],
            'comment' => $_POST["q{$i}_comment"]
        ];
    }

    // Store action items
    $action_items = [];
    for ($i = 1; $i <= 3; $i++) {
        $action_items[] = [
            'area' => $_POST["improve_area_$i"],
            'item' => $_POST["action_item_$i"],
            'timeline' => $_POST["timeline_$i"]
        ];
    }

    // Insert main report
    $insert = mysqli_query($conn, "INSERT INTO mirror_monitoring 
        (tl, emp_id, company, session_duration, audit_date, follow_up_date, key_strengths, areas_improvement) 
        VALUES ('$tl', '$name', '$company', '$session', '$audit_date', '$follow_up', 
        '".mysqli_real_escape_string($conn, $key_strengths)."', 
        '".mysqli_real_escape_string($conn, $areas_improvement)."')");

    $report_id = mysqli_insert_id($conn);

    // Insert questions
    foreach ($questions_data as $q) {
        mysqli_query($conn, "INSERT INTO cm_questions 
            (report_id, question, score, answer, comment) 
            VALUES ('$report_id', 
            '".mysqli_real_escape_string($conn, $q['text'])."', 
            '{$q['point']}', 
            '{$q['select']}', 
            '".mysqli_real_escape_string($conn, $q['comment'])."')");
    }

    // Insert action items
    foreach ($action_items as $a) {
        if (!empty($a['area'])) {
            mysqli_query($conn, "INSERT INTO cm_action_items 
                (report_id, improvement_area, action_item, timeline) 
                VALUES ('$report_id', 
                '".mysqli_real_escape_string($conn, $a['area'])."', 
                '".mysqli_real_escape_string($conn, $a['item'])."', 
                '".mysqli_real_escape_string($conn, $a['timeline'])."')");
        }
    }

    echo "<script>alert('Report submitted successfully.'); window.location.href='view_mm.php';</script>";
}
?>
