<table>
    <tr>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Action</th>
    </tr>
    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?php echo $article['title']; ?></td>
            <td><?php echo $article['content']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $article['id']; ?>">Modifier</a>
                <a href="delete.php?id=<?php echo $article['id']; ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="create.php">Ajouter un nouvel article</a>
