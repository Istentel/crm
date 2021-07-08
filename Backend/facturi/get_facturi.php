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
?>