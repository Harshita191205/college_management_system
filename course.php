<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Management System</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .bar-chart {
            display: flex;
            gap: 10px;
            align-items: flex-end;
        }
        .bar {
            width: 50px;
            background-color: #4CAF50;
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>

    <?php
    // Initialize courses array
    $courses = [
        ["name" => "NSP", "code" => "CSE 101", "credits" => 3],
    ];

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action']) && $_POST['action'] === 'add') {
            $name = $_POST['course-name'];
            $code = $_POST['course-code'];
            $credits = $_POST['course-credits'];
            $courses[] = ["name" => $name, "code" => $code, "credits" => $credits];
        } elseif (isset($_POST['action']) && $_POST['action'] === 'delete') {
            $index = $_POST['index'];
            unset($courses[$index]);
            $courses = array_values($courses); // Reindex array
        }
    }
    ?>


    <!-- Course Management Module -->
    <section id="course-management">
        <h2>Course Management</h2>
        <form method="POST">
            <input type="hidden" name="action" value="add">
            <label for="course-name">Course Name:</label>
            <input type="text" id="course-name" name="course-name" required><br><br>
            <label for="course-code">Course Code:</label>
            <input type="text" id="course-code" name="course-code" required><br><br>
            <label for="course-credits">Course Credits:</label>
            <input type="number" id="course-credits" name="course-credits" required><br><br>
            <button type="submit">Add Course</button><br><br>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Course Credits</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $index => $course): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($course['name']); ?></td>
                        <td><?php echo htmlspecialchars($course['code']); ?></td>
                        <td><?php echo htmlspecialchars($course['credits']); ?></td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Static Bar Chart -->
        <div class="chart-container">
            <h3>Course Enrollments</h3>
            <div class="bar-chart">
                <div class="bar" style="height: 80%;" title="Computer Science - 80%">80%</div>
                <div class="bar" style="height: 60%;" title="Mechanical - 60%">60%</div>
                <div class="bar" style="height: 40%;" title="Civil - 40%">40%</div>
                <div class="bar" style="height: 70%;" title="Electrical - 70%">70%</div>
                <div class="bar" style="height: 90%;" title="Biotechnology - 90%">90%</div>
            </div>
        </div>
    </section>
</body>
</html>
