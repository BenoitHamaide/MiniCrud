<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql = "UPDATE articles SET title='$title', content='$content' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$id = $_GET["id"];

$query = "SELECT * FROM articles WHERE id=$id";
$result = mysqli_query($conn, $query);

$article = mysqli_fetch_assoc($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
    <label for="title">Titre :</label><br>
    <input type="text" id="title" name="title" value="<?php echo $article['title']; ?>"><br>
    <label for="content">Contenu :</label><br>
    <textarea id="content" name="content"><?php echo $article['content']; ?></textarea><br>
    <button class="a-modifier" type="submit" value="Modifier">Modifier</button>
</form>
</body>
</html>