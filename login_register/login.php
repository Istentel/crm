<?php
    #1.Get data from site
     $email = filter_input(INPUT_POST, "email");
     $password = filter_input(INPUT_POST, "password");

    #2.Get data from database
    require('../connect.php');

    #Define query
    $query_password = 'SELECT password FROM accounts';

    #Prepare statement to execute 
    #This creates a PDOStatement object
    $account_statement = $db->prepare($query_password);

    #Execute the query
    $account_statement->execute();

    #Return the password
    $passwordDB = $account_statement->fetchAll();

    #Allow new sql statements to execute
    $account_statement->closeCursor();

    #3.Compare data

    if($password == $passwordDB[0]["password"]){
        header("Location: ../dummi.php");
		exit;
    }else{
        $err_msg = "Password doesn't match!";
        include('../error.php');
    }

?>