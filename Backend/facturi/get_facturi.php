<?php
    #Connect to the database
    require('../connect.php');

    #Get clients names
    #Define the querry
    $query_facturi = 'SELECT * FROM facturi ORDER BY id';

    #Prepare statement to execute 
    #This creates a PDOStatement object
    $facturi_statement = $db->prepare($query_facturi);

    #Execute the query
    $facturi_statement->execute();

    #Return an array containing the query results
    $facturi = $facturi_statement->fetchAll();

    #Allow new sql statements to execute
    $facturi_statement->closeCursor();



    #Get clients names
    #Define the querry
    $query_facturi_detalii = 'SELECT id, val_totala FROM facturi_detalii';

    #Prepare statement to execute 
    #This creates a PDOStatement object
    $facturi_detalii_statement = $db->prepare($query_facturi_detalii);

    #Execute the query
    $facturi_detalii_statement->execute();

    #Return an array containing the query results
    $factura_detalii = $facturi_detalii_statement->fetchAll();

    #Allow new sql statements to execute
    $facturi_detalii_statement->closeCursor();

    function getTotal($id, &$factura_detalii){
        
        $total = 0;

        foreach($factura_detalii as $detalii){
            if($detalii['id'] == $id)
                $total += $detalii['val_totala'];
        }

        return $total;
    }
?>