<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    // Initialize faculty and notices arrays
    $faculty = [
        ["name" => "Shruti Gupta", "email" => "abcd@gmail.com", "phone" => "123456789"]
    ];
    $notices = [];

    // Handle form submissions
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action'])) {
            if ($_POST['action'] === 'addFaculty') {
                // Add faculty
                $name = $_POST['faculty-name'];
                $email = $_POST['faculty-email'];
                $phone = $_POST['faculty-phone'];
                $faculty[] = ["name" => $name, "email" => $email, "phone" => $phone];
            } elseif ($_POST['action'] === 'deleteFaculty') {
                // Delete faculty
                $index = $_POST['index'];
                unset($faculty[$index]);
                $faculty = array_values($faculty); // Reindex array
            } elseif ($_POST['action'] === 'postNotice') {
                // Post notice
                $noticeContent = $_POST['noticeContent'];
                $notices[] = $noticeContent;
            }
        }
    }
    ?>

    <!-- Faculty Management Module -->
    <section id="faculty-management">
        <h2>Faculty Management</h2>
        <form method="POST">
            <input type="hidden" name="action" value="addFaculty">
            <label for="faculty-name">Faculty Name:</label>
            <input type="text" id="faculty-name" name="faculty-name" required><br><br>
            <label for="faculty-email">Faculty Email:</label>
            <input type="email" id="faculty-email" name="faculty-email" required><br><br>
            <label for="faculty-phone">Faculty Phone:</label>
            <input type="tel" id="faculty-phone" name="faculty-phone" required><br><br>
            <button type="submit">Submit</button><br><br>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Faculty Name</th>
                    <th>Faculty Email</th>
                    <th>Faculty Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($faculty as $index => $member): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($member['name']); ?></td>
                        <td><?php echo htmlspecialchars($member['email']); ?></td>
                        <td><?php echo htmlspecialchars($member['phone']); ?></td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="deleteFaculty">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Notice Board -->
    <div class="section" id="notice-board">
        <h2>Post Notice</h2>
        <form method="POST">
            <input type="hidden" name="action" value="postNotice">
            <label for="noticeContent">Notice:</label>
            <textarea id="noticeContent" name="noticeContent" required></textarea><br><br>
            <button type="submit">Post Notice</button>
        </form>
        <div id="notices">
            <h3>Notices:</h3>
            <?php foreach ($notices as $notice): ?>
                <p><?php echo htmlspecialchars($notice); ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
``` 