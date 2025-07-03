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
    // Initialize library resources
    $libraryResources = [
        "books" => [
            ["title" => "Introduction to Algorithms", "author" => "Thomas H. Cormen"]
        ],
        "journals" => 0,
        "eBooks" => 0,
        "magazines" => 0
    ];

    // Handle form submissions
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action'])) {
            if ($_POST['action'] === 'addBook') {
                // Add a new book
                $title = $_POST['book-title'];
                $author = $_POST['book-author'];
                $libraryResources['books'][] = ["title" => $title, "author" => $author];
            } elseif ($_POST['action'] === 'deleteBook') {
                // Delete a book
                $index = $_POST['index'];
                unset($libraryResources['books'][$index]);
                $libraryResources['books'] = array_values($libraryResources['books']); // Reindex array
            }
        }
    }
    ?>

    <!-- Library Management Module -->
    <section id="library-management">
        <h2>Library Management</h2>
        <form method="POST">
            <input type="hidden" name="action" value="addBook">
            <label for="book-title">Book Title:</label>
            <input type="text" id="book-title" name="book-title" required minlength="2"><br><br>
            <label for="book-author">Book Author:</label>
            <input type="text" id="book-author" name="book-author" required minlength="2"><br><br>
            <button type="submit">Submit</button><br><br>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Book Author</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libraryResources['books'] as $index => $book): ?>
                <tr>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="action" value="deleteBook">
                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Static Pie Chart Placeholder -->
        <div class="chart-container">
            <h3>Library Resource Allocation</h3>
            <div class="pie-chart">
                <div class="slice slice-1"></div>
                <div class="slice slice-2"></div>
                <div class="slice slice-3"></div>
                <div class="slice slice-4"></div>
            </div>
            <div class="legend">
                <span>📘 Books: 40%</span>
                <span>📗 Journals: 30%</span>
                <span>📙 eBooks: 20%</span>
                <span>📕 Magazines: 10%</span>
            </div>
        </div>
    </section>
</body>
</html>
