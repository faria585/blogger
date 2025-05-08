<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM blogs WHERE id = $id");
$blog = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE blogs SET title = '$title', content = '$content' WHERE id = $id";
    $conn->query($sql);

    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Blog</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        form { max-width: 600px; margin: 2rem auto; }
        label { display: block; margin: 0.5rem 0; }
    </style>
</head>
<body>
    <form method="POST">
        <label>Title</label>
        <input type="text" name="title" value="<?php echo $blog['title']; ?>" required>
        <label>Content</label>
        <textarea name="content" required><?php echo $blog['content']; ?></textarea>
        <button type="submit">Update Blog</button>
    </form>
</body>
</html>
