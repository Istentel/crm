<?php
    $id = $_GET['id'];

    include('get_clients.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clienti</title>
    <style type="text/css">
        td
        {
            padding:0 15px;
        }
        </style>
</head>
<body>
    <h3>Clients List</h3>
    <table>
        <tr>
            <th>Nume</th>
            <th>Companie</th>
            <th>Email</th>
            <th>Pozitie</th>
            <th>Telefon</th>
            <th>Activ</th>
        </tr>

        <?php foreach($clients as $client) : ?>
        <tr>
            <td><?php echo $client['nume'] . " " . $client['prenume']; ?></td>
            <td><?php echo $client['companie']; ?></td>
            <td><?php echo $client['email']; ?></td>
            <td><?php echo $client['pozitie']; ?></td>
            <td><?php echo $client['telefon']; ?></td>
            <td><?php echo $client['activ']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Insert Clients</h3>

    <form action="add_client.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id;  ?>">
        <label >Nume: </label>
        <input type="text" name="nume"><br>
        <label >Prenume: </label>
        <input type="text" name="prenume"><br>
        <label >Email: </label>
        <input type="text" name="email"><br>
        <label >Telefon: </label>
        <input type="text" name="telefon"><br>
        <label >Pozitie: </label>
        <input type="text" name="pozitie"><br>
        <input type="submit" name="submit" value="Add Client">
    </form>

</body>
</html>