<?php
    #Connect to the database
    require('../connect.php');

    #Get clients names
    #Define the querry
    $query_clients = 'SELECT * FROM firma_clienti WHERE id=:id';

    #Prepare statement to execute 
    #This creates a PDOStatement object
    $client_statement = $db->prepare($query_clients);

    $client_statement->bindValue(":id", $id);

    #Execute the query
    $client_statement->execute();

    #Return an array containing the query results
    $clients = $client_statement->fetchAll();

    #Allow new sql statements to execute
    $client_statement->closeCursor();
?>