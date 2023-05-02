<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql = "INSERT INTO articles (title, content) VALUES ('$title', '$content')";

    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter un article</h1>
        <form method="post">
            <label for="title">Titre :</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="content">Contenu :</label><br>
            <textarea id="content" name="content"></textarea><br><br>
            <button class="bouton-ajout" type="submit" value="Enregistrer">Ajouter</button>
        </form>
    </div>
</body>
</html>

