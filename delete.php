<?php

    $id = $_GET['id'];

    if (!isset($id)) {
        header("Location: index.php");
        exit();
    }

    include('config.php');
    $db = new SQLite3($path.'/movies.db');

    $sql = "DELETE FROM movie WHERE id = '$id'";

    $statement = $db->prepare($sql);

    $result = $statement->execute();

    $rows_affected = $db->changes();

    $db->close();
    unset($db);

    header("Location: index.php?delete=success");
    exit();
 ?>