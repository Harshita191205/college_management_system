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
    // Initialize departments array
    $departments = [
        ["name" => "Computer Science", "code" => "CS"]
    ];

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action']) && $_POST['action'] === 'add') {
            $name = $_POST['department-name'];
            $code = $_POST['department-code'];
            $departments[] = ["name" => $name, "code" => $code];
        } elseif (isset($_POST['action']) && $_POST['action'] === 'delete') {
            $index = $_POST['index'];
            unset($departments[$index]);
            $departments = array_values($departments); // Reindex array
        }
    }
    ?>

    <!-- Department Management Module -->
    <section id="department-management">
        <h2>Department Management</h2>
        <form method="POST">
            <input type="hidden" name="action" value="add">
            <label for="department-name">Department Name:</label>
            <input type="text" id="department-name" name="department-name" required><br><br>
            <label for="department-code">Department Code:</label>
            <input type="text" id="department-code" name="department-code" required><br><br>
            <button type="submit">Submit</button><br><br>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Department Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departments as $index => $department): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($department['name']); ?></td>
                        <td><?php echo htmlspecialchars($department['code']); ?></td>
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
    </section>
</body>
</html>
