<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Management System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .section { margin: 20px 0; }
        .attendance-table { width: 100%; border-collapse: collapse; }
        .attendance-table th, .attendance-table td { 
            border: 1px solid #ddd; padding: 8px; text-align: center; 
        }
        button { padding: 5px 10px; margin-top: 10px; }
    </style>
</head>
<body>

    <!-- Attendance Marking -->
    <div class="section" id="attendance-section">
        <h2>Attendance Marking</h2>
        <table class="attendance-table">
            <tr>
                <th>Student Name</th>
                <th>Status</th>
            </tr>
            <?php
        

            // Check if attendance is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student'])) {
                $student = $_POST['student'];
                // Save attendance (for demonstration, we'll just display it)
                echo "<p>$student marked as Present!</p>";
            }

            // Generate table rows for each student
            foreach ($students as $student) {
                echo "<tr>
                        <td>$student</td>
                        <td>
                            <form method='POST'>
                                <input type='hidden' name='student' value='$student'>
                                <button type='submit'>Mark Present</button>
                            </form>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>