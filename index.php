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
        table{
            border: solid 1px black;
        }
        th{
            border: solid 1px black;
        }
        tr{
            border: solid 1px black;
        }
        #title{
            width: 310px;
            text-align: left;
        }
        .movie{
            text-align: left;
            font-weight: normal;
        }
        #year{
            width: 40px;
            text-align: left;
        }
        #options{
            width: 70px;
            text-align: left;
        }
        .notification{
            background-color: rgb(135, 206, 235);
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
        if($_GET['delete'] == 'success'){
            print "<div class='notification'> Movie was deleted successfully! </div>";
        }
    ?>
    <div>
        <table>
            <tr>
                <th id="title">Title</th>
                <th id="year">Year</th>
                <th id="options">Options</th>
            </tr>
            <?php
                include('config.php');

                $db = new SQLite3($path.'/movies.db');

                $sql = 'SELECT id, title, year FROM movie';

                $statement = $db->prepare($sql);

                $result = $statement->execute();

                while ($row = $result->fetchArray()) {
                    $id = $row[0];
                    $title = stripslashes($row[1]);
                    $year = $row[2];

                    print "<tr>";

                    print "<th class='movie'>$title</th>";
                    print "<th class='movie'>$year</th>";
                    $link_delete = "<a href=\"delete.php?id=$id\">Delete</a>";
                    print "<th class='movie'>$link_delete</th>";

                    print "</tr>";
                }

                $db->close();
                unset($db);

            ?>
        </table>
    </div>
</body>
</html>