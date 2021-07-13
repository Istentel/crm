<?php
#Connect to the database
    require('../connect.php');

    #Get clients names
    #Define the querry
    $query_facturi = 'SELECT * FROM facturi_detalii WHERE id=:id ORDER BY id';

    #Prepare statement to execute 
    #This creates a PDOStatement object
    $facturi_statement = $db->prepare($query_facturi);

    $facturi_statement->bindValue(":id", $id);

    #Execute the query
    $facturi_statement->execute();

    #Return an array containing the query results
    $factura_detalii = $facturi_statement->fetchAll();

    #Allow new sql statements to execute
    $facturi_statement->closeCursor();
?>