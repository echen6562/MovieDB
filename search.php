<?php
    $title = $_POST['title'];
    $year = $_POST['year'];

    if (strlen($title) == 0 && strlen($year) == 0) {
        header("Location: search_form.php?status=missinginfo");
        exit();
    }
    else if(strlen($title) != 0 && strlen($year) == 0){
        header('Location: search_form.php?title=' . $title );
        exit();
    }
    else if(strlen($title) == 0 && strlen($year) != 0){
        header('Location: search_form.php?year=' . $year);
        exit();
    }
    else{
        header('Location: search_form.php?year=' . $year . '&title=' .$title);
        exit();
    }


?>