<?php
    include('get_clients.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clienti</title>
</head>
<body>
    <h3>Clients List</h3>
    <table>
        <tr>
            <th>Id</th>
            <th>Nume</th>
            <th>Prenume</th>
            <th>Email</th>
            <th>Adresa</th>
            <th>Telefon</th>
        </tr>

        <?php foreach($clients as $client) : ?>
        <tr>
            <td><?php echo $client['id']; ?></td>
            <td><?php echo $client['first_name']; ?></td>
            <td><?php echo $client['last_name']; ?></td>
            <td><?php echo $client['email']; ?></td>
            <td><?php echo $client['adress']; ?></td>
            <td><?php echo $client['phone']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Insert Clients</h3>

    <form action="add_client.php" method="post">
        <label >First Name: </label>
        <input type="text" name="first_name"><br>
        <label >Last Name: </label>
        <input type="text" name="last_name"><br>
        <label >Email: </label>
        <input type="text" name="email"><br>
        <label >Adress: </label>
        <input type="text" name="adress"><br>
        <label >Phone: </label>
        <input type="text" name="phone"><br>
        <input type="submit" value="Add Client">
    </form>

</body>
</html>