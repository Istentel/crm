<?php
require_once('connect.php');

function getData($query){
    #Acces global variable db from connect.php file
    global $db;

    #Prepare statement to execute 
    #This creates a PDOStatement object
    $stm = $db->prepare($query);

    #Execute the query
    $stm->execute();

    #Return an array containing the query results
    $data = $stm->fetchAll();

    #Allow new sql statements to execute
    $stm->closeCursor();

    return $data;
}