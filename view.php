<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM blogs WHERE id = $id");
$blog = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $blog['title']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .blog { max-width: 800px; margin: 2rem auto; }
    </style>
</head>
<body>
    <div class="blog">
        <h1><?php echo $blog['title']; ?></h1>
        <p><?php echo $blog['content']; ?></p>
    </div>
</body>
</html>
