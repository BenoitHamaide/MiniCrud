<?php

include 'config.php';

$id = $_GET["id"];

$query = "DELETE FROM articles WHERE id=$id";
$result = mysqli_query($conn, $query);

if ($result) {
    header("location: index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
