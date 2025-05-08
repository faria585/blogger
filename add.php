<?php include 'db.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image']; // Optional, use file upload for advanced users

    $sql = "INSERT INTO blogs (title, content, image) VALUES ('$title', '$content', '$image')";
    $conn->query($sql);

    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Blog</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        form { max-width: 600px; margin: 2rem auto; }
        label { display: block; margin: 0.5rem 0; }
    </style>
</head>
<body>
    <form method="POST">
        <label>Title</label>
        <input type="text" name="title" required>
        <label>Content</label>
        <textarea name="content" required></textarea>
        <label>Image URL (optional)</label>
        <input type="text" name="image">
        <button type="submit">Add Blog</button>
    </form>
</body>
</html>
