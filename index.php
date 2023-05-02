<?php
include 'config.php';

// Supprimer un article
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];

    $sql = "DELETE FROM articles WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Sélectionner tous les articles
$sql = "SELECT * FROM articles";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" type"text/css" href="style.css">
</head>
<body>
    <div class="title">
    <h1>Liste des articles</h1>
    </div>
    <div class="container">
    <a href="create.php" class="a-ajout">Ajouter un article</a>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>   
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row["title"]; ?></td>
                    <td><?php echo $row["content"]; ?></td>
                    <td>
                        <a class="a-modifier" href="edit.php?id=<?php echo $row['id']; ?>">Modifier</a>
                        <a class="a-supprimer" href="index.php?delete=<?php echo $row['id']; ?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
