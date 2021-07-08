<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessioin</title>
</head>
<body>
    <?php
        session_start();
        echo $_SESSION["fname"] . " " . $_SESSION["lname"] . " " . $_SESSION["email"];
    ?>
</body>
</html>