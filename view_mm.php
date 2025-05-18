<?php
include 'include/connection.php';
include 'header_data.php';


?>

<style>
    h3 { text-align: center; }
    table { width: 100%; border-collapse: collapse; font-size: 14px; }
    th, td { border: 1px solid #000; padding: 8px; text-align: center; }
    th { background-color: #6c3483; color: white; }
    .scrollable-cell {
        max-width: 200px;      /* Adjust width as needed */
        overflow-x: auto;
        white-space: nowrap;
    }
</style>


    <h3>Mirror Monitoring  Report</h3>

  <div style="margin-bottom: 8px; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 5px; align-items: flex-end;">
    
        <div style="display: flex; flex-direction: column;">
            <label for="filterName">Associate:</label>
            <select id="filterName" onchange="filterTable()">
                <option value="">All</option>
            </select>
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="filterProcess">Process:</label>
            <select id="filterProcess" onchange="filterTable()">
                <option value="">All</option>
            </select>
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="filterDateFrom">Audit Date From:</label>
            <input type="date" id="filterDateFrom" onchange="filterTable()">
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="filterDateTo">Audit Date To:</label>
            <input type="date" id="filterDateTo" onchange="filterTable()">
        </div>

        <div style="display: flex; gap: 10px;">
            <a href="cr_form.php" class="btn btn-primary">Create</a>
            <button onclick="downloadTableAsExcel()" class="btn btn-success">Download Excel</button>
        </div>

    </div>


    <table id="summaryTable">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Associate Name</th>
                <th>TL Name</th>
                <th>Process</th>
                <th>Audit Date</th>
                <th style="width: 200px;">Key Strengths</th>
                <th style="width: 200px;">Areas for Improvement</th>
                <th>Areas for Improvement</th>
                <th width="200">Result</th>
                <th>View</th>
            </tr>
        </thead>
      <tbody>
            <?php
            $query = "SELECT mm.*, e.name FROM mirror_monitoring mm JOIN employee e ON mm.emp_id = e.emp_id ORDER BY mm.id DESC";
            $result = mysqli_query($conn, $query);
            $sr = 1;
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$sr}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['tl']}</td>";
                echo "<td>{$row['company']}</td>";
                echo "<td>{$row['audit_date']}</td>";
                echo "<td>{$row['follow_up_date']}</td>";
                echo "<td><div class='scrollable-cell'>{$row['key_strengths']}</div></td>";
                echo "<td><div class='scrollable-cell'>{$row['areas_improvement']}</div></td>";

                // Fetch Yes, No, Average count from cm_questions table for current report ID
                $reportId = $row['id'];
                $questionQuery = "
                    SELECT 
                        SUM(answer = 'Yes') AS yes_count,
                        SUM(answer = 'No') AS no_count,
                        SUM(answer = 'Average') AS average_count
                    FROM cm_questions
                    WHERE report_id = '$reportId'
                ";
                $questionResult = mysqli_query($conn, $questionQuery);
                $counts = mysqli_fetch_assoc($questionResult);

                echo "<td>";
                echo "Yes: {$counts['yes_count']}<br>";
                echo "No: {$counts['no_count']}<br>";
                echo "Average: {$counts['average_count']}";
                echo "</td>";

                echo "<td><a href='view_cm_report.php?id={$row['id']}'>View</a></td>";
                echo "</tr>";
                $sr++;
            }
            ?>
            </tbody>
    </table>



<?php include 'footer.php'; ?>
<script>
function downloadTableAsExcel() {
    const table = document.getElementById("summaryTable");
    const wb = XLSX.utils.table_to_book(table, { sheet: "Summary" });
    XLSX.writeFile(wb, "Call_Monitoring_Summary.xlsx");
}

// Populate dropdowns dynamically
window.onload = function () {
    const rows = document.querySelectorAll("#summaryTable tbody tr");
    const nameSet = new Set();
    const processSet = new Set();

    rows.forEach(row => {
        nameSet.add(row.cells[1].innerText.trim());
        processSet.add(row.cells[3].innerText.trim());
    });

    nameSet.forEach(name => {
        const option = document.createElement("option");
        option.value = name;
        option.innerText = name;
        document.getElementById("filterName").appendChild(option);
    });

    processSet.forEach(proc => {
        const option = document.createElement("option");
        option.value = proc;
        option.innerText = proc;
        document.getElementById("filterProcess").appendChild(option);
    });
};

function filterTable() {
    var name = document.getElementById("filterName").value.toLowerCase();
    var process = document.getElementById("filterProcess").value.toLowerCase();
    var dateFrom = document.getElementById("filterDateFrom").value;
    var dateTo = document.getElementById("filterDateTo").value;

    var rows = document.querySelectorAll("#summaryTable tbody tr");

    rows.forEach(function (row) {
        var nameText = row.cells[1].textContent.toLowerCase();
        var processText = row.cells[3].textContent.toLowerCase();
        var auditDate = row.cells[4].textContent;

        var show = true;

        if (name && !nameText.includes(name)) {
            show = false;
        }

        if (process && !processText.includes(process)) {
            show = false;
        }

        if (dateFrom && auditDate < dateFrom) {
            show = false;
        }

        if (dateTo && auditDate > dateTo) {
            show = false;
        }

        row.style.display = show ? "" : "none";
    });
}
</script>