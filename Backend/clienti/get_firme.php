<?php
#Connect to the database
require('../connect.php');

#Define the querry
$query_firme = 'SELECT * FROM firme ORDER BY id';

#Prepare statement to execute 
#This creates a PDOStatement object
$firme_statement = $db->prepare($query_firme);

#Execute the query
$firme_statement->execute();

#Return an array containing the query results
$firme = $firme_statement->fetchAll();

#Allow new sql statements to execute
$firme_statement->closeCursor();

function getFirmaData($id, $db)
{

    $query = 'SELECT * FROM firma_clienti WHERE id=:id';

    $stm = $db->prepare($query);

    $stm->bindValue(":id", $id);

    $stm->execute();

    $data = $stm->fetchAll();

    $stm->closeCursor();

    if (!empty($data)) {
        return $data[0];
    } else {
        $data = array("nume" => "Nu exista client principal", "prenume" => "", "email" => "Nu exista emial principal");

        return $data;
    }
}
