<?php
    #Connect to the database
    require('../connect.php');

    #Get clients names
    #Define the querry
    $query_agenti = 'SELECT * FROM sellersagent WHERE id=:id';

    #Prepare statement to execute 
    #This creates a PDOStatement object
    $agenti_statement = $db->prepare($query_agenti);

    $agenti_statement->bindValue(":id", $account_id);

    #Execute the query
    $agenti_statement->execute();

    #Return an array containing the query results
    $agenti_data = $agenti_statement->fetchAll();

    #Allow new sql statements to execute
    $agenti_statement->closeCursor();
?>