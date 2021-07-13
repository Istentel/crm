<?php
    $id = $_GET['id'];

    include('get_detalii.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        td
        {
            padding:0 15px;
        }
        </style>
    <title>Factura detalii</title>
</head>
<body>
    <table>
        <tr>
            <td>Nr. Crt</td>
            <td>Denumire </td>
            <td>U.M </td>
            <td>Cantitate</td>
            <td>Pret Unit</td>
            <td>Valoare</td>
            <td>Cota TVA</td>
            <td>Valoare TVA</td>
            <td>Valoare Totala</td>
        </tr>
        <?php $i = 1; $val_totala = 0; ?>
        <?php foreach($factura_detalii as $detalii) : ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $detalii['denumire'];?></td>
                <td><?php echo $detalii['um'];?></td>
                <td><?php echo $detalii['cant'];?></td>
                <td><?php echo $detalii['pret_unitar'];?></td>
                <td><?php echo $detalii['valoare'];?></td>
                <td><?php echo $detalii['cota_tva'];?></td>
                <td><?php echo $detalii['val_tva'];?></td>
                <td><?php echo $detalii['val_totala'];?></td>
                <?php $val_totala += $detalii['val_totala']; ?>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td>Valoare Totala: <?php echo $val_totala ?></td>
        </tr>
    </table>

    <form action="add_detalii.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id;  ?>">
        <label >Denumire: </label>
        <input type="text" name="denumire"><br>
        <label >U.M: </label>
        <input type="text" name="um"><br>
        <label >Cantitate: </label>
        <input type="text" name="cantitate"><br>
        <label >Pret Unitar: </label>
        <input type="text" name="pret_unitar"><br>
        <label >Cota TVA: </label>
        <input type="text" name="cota_tva"><br>
        <input type="submit" name="submit" value="Adauga">
    </form>
</body>
</html>