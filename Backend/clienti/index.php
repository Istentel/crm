<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companie</title>
    <style type="text/css">
        td
        {
            padding:0 15px;
        }
    </style>
</head>
<body>
    <h3>Lista companii</h3>
    <table>
        <tr>
            <td>Companie</td>
            <td>Contact Principal</td>
            <td>Email Principal</td>
            <td>Telefon</td>
            <td>Activ</td>
            <td>Grupuri</td>
            <td>Data Creare</td>
        </tr>

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
            </select>
        </form>
    </table>
</body>
</html>