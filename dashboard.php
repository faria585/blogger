<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        header { background: #4CAF50; color: white; padding: 1rem; text-align: center; }
        a { color: #4CAF50; text-decoration: none; }
    </style>
</head>
<body>
    <header>
        <h1>Dashboard</h1>
    </header>
    <a href="add.php">Add New Blog</a>
    <h2>Your Blogs</h2>
    <div>
        <?php
        $result = $conn->query("SELECT * FROM blogs");
        while ($row = $result->fetch_assoc()) {
            echo "<div>
                    <h3>{$row['title']}</h3>
                    <a href='edit.php?id={$row['id']}'>Edit</a> | 
                    <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Delete this blog?\")'>Delete</a>
                  </div>";
        }
        ?>
    </div>
</body>
</html>
