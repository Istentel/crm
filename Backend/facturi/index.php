<?php
    include('get_facturi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturi</title>
</head>
<body>
    <h3>Lista Facturi</h3>
    <table>
        <tr>
            <th>Id</th>
            <th>Nume</th>
            <th>Seria</th>
            <th>Total</th>
        </tr>

        <?php foreach($facturi as $factura) : ?>
        <tr>
            <td><a href="detalii.php?id=<?php echo $factura['id']; ?>"><?php echo $factura['id']; ?></a></td>
            <td><?php echo $factura['fi_nume']; ?></td>
            <td><?php echo $factura['f_seria_nr_fac']; ?></td>
            <td><?php echo 0; ?></td>
            
        </tr>
        <?php endforeach; ?>
    </table>

    <br>

    <button onclick="add_factura()" id="add_factura_btn">Adauga Factura</button>

    <script>
        document.getElementById("add_factura_btn").addEventListener("click", add_factura);

        function add_factura(){
            window.location.href="add_factura.html";
        }
    </script>
</body>
</html>