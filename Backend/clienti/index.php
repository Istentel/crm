<?php
include('get_firme.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h3>Lista companii</h3>
    <table>
        <thead>
            <th>Companie</th>
            <th>Contact Principal</th>
            <th>Email Principal</th>
            <th>Telefon</th>
            <th>Activ</th>
            <th>Grupuri</th>
            <th>Data Creare</th>
        </thead>

        <tbody>
        <?php foreach ($firme as $firma) : ?>
            <?php
                $data = getFirmaData($firma['id'], $db);
            ?>
            <tbody class="hide">
                <td><a href="clienti.php?id=<?php echo $firma['id']; ?> "><?php echo $firma['companie']; ?></a></td>
                <td><?php echo $data["nume"] . " " . $data["prenume"]; ?></td>
                <td><?php echo $data["email"]; ?></td>
                <td><?php echo $firma['telefon']; ?></td>
                <td><?php echo $firma['activ']; ?></td>
                <td><?php echo $firma['grupuri']; ?></td>
                <td><?php echo $firma['data']; ?></td>
            </tbody>
        <?php endforeach; ?>
        </tbody>
        <form action="add_companie.php" method="post">
            <label>Companie:</label>
            <input type="text" name="companie"><br>
            <label>Telefon:</label>
            <input type="text" name="telefon"><br>
            <label>Grup:</label>
            <select name="grup">
                <option value="vip">Vip</option>
                <option value="low budget">Low Budget</option>
                <option value="high budget">High Budget</option>
                <option value="wholesaler">Wholesaler</option>
            </select><br>
            <input type="submit" name="submit">
        </form>
    </table>
</body>

</html>