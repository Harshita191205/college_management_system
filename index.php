<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>COLLEGE MANAGEMENT SYSTEM</h1>
        <nav>
            <ul>
                <li><a href="student.php">Student Management</a></li>
                <li><a href="faculty.php">Faculty Management</a></li>
                <li><a href="course.php">Course Management</a></li>
                <li><a href="department.php">Department Management</a></li>
                <li><a href="library.php">Library Management</a></li>
                <li><a href="report.php">Reporting & Analytics</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="content">
            <h2>Welcome to the College Management System</h2>
            <p>This system helps in managing the college's students, faculty, and courses efficiently.</p>
            <div class="features">
                <div class="feature">
                    <h3>Student Management</h3>
                    <p>Track student details, enrollment, and academic performance.</p>
                </div>
                <div class="feature">
                    <h3>Faculty Management</h3>
                    <p>Manage faculty details, designations, and departments.</p>
                </div>
                <div class="feature">
                    <h3>Course Management</h3>
                    <p>Track courses offered by each department.</p>
                </div>
                <div class="feature">
                    <h3>Department Management</h3>
                    <p>Manage departments like Computer Science, Electrical Engineering, and more.</p>
                </div>
                <div class="feature">
                    <h3>Library Management</h3>
                    <p>Manage the library books according to the title and author's name.</p>
                </div>
            </div>
        </section>

        <!-- PHP Example: Dynamic Announcements -->
        <section class="announcements">
            <h2>Announcements</h2>
            <div class="announcement-panel">
                <?php
                // Example PHP code to fetch announcements dynamically
                $announcements = []; // Fetch announcements from the database
                if (empty($announcements)) {
                    echo "<p>No announcements available.</p>";
                } else {
                    foreach ($announcements as $announcement) {
                        echo "<p>$announcement</p>";
                    }
                }
                ?>
            </div>
        </section>

        <!-- PHP Example: Dynamic Year in Footer -->
        <footer>
            <p>&copy; <?php echo date("Y"); ?> College Management System</p>
        </footer>
    </main>
</body>

</html>