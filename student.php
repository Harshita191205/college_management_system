<?php
// Start session to manage attendance and assignment data
session_start();

// Initialize data arrays
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [
        ["name" => "Harshita Sharma", "email" => "sharma.harshita@gmail.com", "phone" => "123456789"],
        ["name" => "Itisha Jangid", "email" => "itisha.jangid@gmail.com", "phone" => "987654321"]
    ];
}
if (!isset($_SESSION['attendance'])) {
    $_SESSION['attendance'] = [];
}
if (!isset($_SESSION['assignments'])) {
    $_SESSION['assignments'] = [];
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'addStudent') {
            // Add a new student
            $name = $_POST['student-name'];
            $email = $_POST['student-email'];
            $phone = $_POST['student-phone'];
            $_SESSION['students'][] = ["name" => $name, "email" => $email, "phone" => $phone];
        } elseif ($_POST['action'] === 'markAttendance') {
            // Mark attendance
            $student = $_POST['student'];
            $period = $_POST['attendance-period'];
            if (!isset($_SESSION['attendance'][$period])) {
                $_SESSION['attendance'][$period] = [];
            }
            if (!in_array($student, $_SESSION['attendance'][$period])) {
                $_SESSION['attendance'][$period][] = $student;
            }
        } elseif ($_POST['action'] === 'submitAssignment') {
            // Submit assignment
            $studentName = $_POST['studentName'];
            $assignment = $_POST['assignment'];
            $_SESSION['assignments'][] = ["student" => $studentName, "assignment" => $assignment];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Management System</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .section { margin: 20px 0; }
        .attendance-table, .course-list { width: 100%; border-collapse: collapse; }
        .attendance-table th, .attendance-table td, .course-list th, .course-list td { 
            border: 1px solid #ddd; padding: 8px; text-align: center; 
        }
        button { padding: 5px 10px; margin-top: 10px; }
    </style>
</head>
<body>
    <!-- Student Management Module -->
    <section id="student-management">
        <h2>Student Management</h2>
        <form method="POST">
            <input type="hidden" name="action" value="addStudent">
            <label for="student-name">Student Name:</label>
            <input type="text" id="student-name" name="student-name" required minlength="2" maxlength="50"><br><br>
            <label for="student-email">Student Email:</label>
            <input type="email" id="student-email" name="student-email" required><br><br>
            <label for="student-phone">Student Phone:</label>
            <input type="tel" id="student-phone" name="student-phone" required><br><br>
            <button type="submit">Submit</button><br><br>
        </form>
        <p>Total Students: <span id="total-students"><?php echo count($_SESSION['students']); ?></span></p>
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Student Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['students'] as $student): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($student['name']); ?></td>
                        <td><?php echo htmlspecialchars($student['email']); ?></td>
                        <td><?php echo htmlspecialchars($student['phone']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Attendance Marking -->
    <div class="section" id="attendance-section">
        <h2>Attendance Marking</h2>
        <form method="POST">
            <input type="hidden" name="action" value="markAttendance">
            <label for="attendance-period">Select Period:</label>
            <select id="attendance-period" name="attendance-period" required>
                <option value="Period 1">Period 1</option>
                <option value="Period 2">Period 2</option>
                <option value="Period 3">Period 3</option>
            </select>
            <table class="attendance-table">
                <tr>
                    <th>Student Name</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($_SESSION['students'] as $student): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($student['name']); ?></td>
                        <td>
                            <button type="submit" name="student" value="<?php echo htmlspecialchars($student['name']); ?>">Mark Present</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </form>
        <p>Attendance Summary:</p>
        <div id="attendance-summary">
            <?php foreach ($_SESSION['attendance'] as $period => $students): ?>
                <p><strong><?php echo htmlspecialchars($period); ?>:</strong> <?php echo implode(', ', array_map('htmlspecialchars', $students)); ?></p>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Assignment Submission -->
    <div class="section" id="assignment-section">
        <h2>Submit Assignment</h2>
        <form method="POST">
            <input type="hidden" name="action" value="submitAssignment">
            <label for="studentName">Student Name:</label>
            <input type="text" id="studentName" name="studentName" required>
            <label for="assignment">Assignment:</label>
            <textarea id="assignment" name="assignment" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
