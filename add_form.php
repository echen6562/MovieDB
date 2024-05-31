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
        .notification{
            background-color: rgb(135, 206, 235);
            width: 330px;
            margin-bottom: 3px;
        }
        .notification2{
            background-color: red;
            width: 330px;
            margin-bottom: 3px;
        }
        .bold{
            font-weight: bold;
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
        else if($_GET['status'] == 'success'){
            print "<div class='notification'> Movie was added successfully! </div>";
        }
    ?>
    <form action="add.php" method="POST">
            <div class="bold">
                Title:
                <input type="text" name="title">
            </div>
            <div class="bold">
                Year:
                <input type="text" name="year" id="year">
                <input id="submit" type="submit" value="Save">
            </div>
        </form> 
    <form>
</body>
</html>