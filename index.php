<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blogger - Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
        }
        header {
            background: #4CAF50;
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
        }
        form {
            background: white;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        form input, form textarea {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form button {
            padding: 0.7rem 1.5rem;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        form button:hover {
            background: #45a049;
        }
        .blog-block {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 2rem;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .blog-block img {
            width: 100%;
            height: auto;
        }
        .blog-content {
            padding: 1rem;
        }
        .blog-content h2 {
            margin: 0;
            color: #333;
        }
        .blog-content p {
            color: #666;
            line-height: 1.6;
        }
        .read-more {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .read-more:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to My Blogger</h1>
    </header>
    <div class="container">
        <!-- Blog Submission Form -->
        <form method="POST" action="">
            <h2>Add a New Blog</h2>
            <label for="title">Blog Title</label>
            <input type="text" name="title" id="title" required>
            
            <label for="content">Blog Content</label>
            <textarea name="content" id="content" rows="5" required></textarea>
            
            <label for="image">Image URL</label>
            <input type="text" name="image" id="image" placeholder="Optional (e.g., https://example.com/image.jpg)">
            
            <button type="submit" name="add_blog">Add Blog</button>
        </form>

        <!-- Blog Display Section -->
        <?php
        // Handle Blog Submission
        if (isset($_POST['add_blog'])) {
            $title = $conn->real_escape_string($_POST['title']);
            $content = $conn->real_escape_string($_POST['content']);
            $image = $conn->real_escape_string($_POST['image']);

            $sql = "INSERT INTO blogs (title, content, image) VALUES ('$title', '$content', '$image')";
            if ($conn->query($sql)) {
                echo "<p style='color: green;'>Blog added successfully!</p>";
            } else {
                echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
            }
        }

        // Fetch Blogs from Database
        $result = $conn->query("SELECT * FROM blogs ORDER BY created_at DESC");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='blog-block'>
                        <img src='" . ($row['image'] ? $row['image'] : 'placeholder.jpg') . "' alt='Blog Image'>
                        <div class='blog-content'>
                            <h2>{$row['title']}</h2>
                            <p>" . substr($row['content'], 0, 150) . "...</p>
                            <a href='view.php?id={$row['id']}' class='read-more'>Read More</a>
                        </div>
                      </div>";
            }
        } else {
            echo "<p>No blogs found. Add some blogs using the form above.</p>";
        }
        ?>
    </div>
</body>
</html>
