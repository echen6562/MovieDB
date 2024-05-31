<!doctype html>
<html>
<head>
    <title>Macro 8</title>
    <style>
        .button{
            border: solid 1px black;
            padding: 10px;
            text-decoration: none;
        }
        #year{
            width: 35px;
        }
        .bold{
            font-weight: bold;
        }
        .notification2{
            background-color: red;
            width: 330px;
            margin-bottom: 3px;
        }
    </style>
</head>
<body>
    <h1>My Movie Database</h1>
    <div>
        <a class="button" href="index.php">View All</a>
        <a class="button"href="add_form.php">Add Movie</a>
        <a class="button" href="search_form.php">Search Movies</a>
    </div>
    <br>
    <?php
        if($_GET['status'] == 'missinginfo'){
            print "<div class='notification2'> Missing information! </div>";
        }
    ?>
    <form action="search.php" method="POST">
        <div class="bold">
            Title:
            <input type="text" name="title">
        </div>
        <div class="bold">
            Year:
            <input type="text" name="year" id="year">
            <input id="submit" type="submit" value="Search">
        </div>
    </form> 

    <?php
        if(isset($_GET['title'])){
            $title = $_GET['title'];
        }
        if(isset($_GET['year'])){
            $year = $_GET['year'];
        }
        if(isset($_GET['title']) || isset($_GET['year'])){
            print "<ul>";

            include('config.php');

            $db = new SQLite3($path.'/movies.db');

            $sql = "SELECT id, title, year FROM movie WHERE title LIKE :title OR year LIKE :year";
            
            $statement = $db->prepare($sql);
            $statement->bindValue(':title',  $title );
            $statement->bindValue(':year', $year);

            $result = $statement->execute();

            while ($row = $result->fetchArray()) {
                $currentTitle = stripslashes($row[1]);
                $currentYear = $row[2];

                print "<li>$currentTitle ($currentYear)</li>";
            }
            print "</ul>";
            $db->close();
            unset($db);
        }
    ?>

</body>
</html>