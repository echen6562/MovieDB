<?php

    $title = $_POST['title'];
    $year = $_POST['year'];

    if (strlen($title) == 0 || strlen($year) == 0) {
        header("Location: add_form.php?status=missinginfo");
        exit();
    }

    include('config.php');

    $db = new SQLite3($path.'/movies.db');

    $sql = "INSERT INTO movie (title, year) VALUES (:title, :year)";
    $statement = $db->prepare($sql);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':year', $year);

    $result = $statement->execute();

    $id = $db->lastInsertRowID();

    $db->close();
    unset($db);

    header('Location: add_form.php?status=success');
    exit();
?>
