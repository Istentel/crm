<?php
    session_destroy();
    if(isset($_POST["submit"])){
        #1.Get data from site
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password");

        #2.Get data from database
        require('../connect.php');

        #Define query
        try{
            $query_data = 'SELECT * FROM accounts WHERE email=:email';

            #Prepare statement to execute

            #This creates a PDOStatement object
            $account_statement = $db->prepare($query_data);

            #Bind email to the query
            $account_statement->bindValue(':email', $email);

            #Execute the query
            $account_statement->execute();
        }catch(PDOException $e){
            $err_msg = $e->getMessage();
            include('../error.php');
            exit;
        }

        #Return the password
        $db_data = $account_statement->fetchAll();
        
        #Allow new sql statements to execute
        $account_statement->closeCursor();

        #Check if there is data 
        if(!$db_data){
           $err_msg = "Email or password are invalid!";
            include('../error.php');
            exit;
        }

        #3.Compare data

        if(password_verify($password, $db_data[0]["password"])){
            #Start session
            session_start();

            #Set variables
            $_SESSION["account_id"] = $db_data[0]["account_id"];
            $_SESSION["fname"] = $db_data[0]["fname"];
            $_SESSION["lname"] = $db_data[0]["lname"];
            $_SESSION["email"] = $db_data[0]["email"];

            #Exist this page and redirect to new page
            header("Location: ../../Frontend/Html/index.php");
            exit;
        }else{
            $err_msg = "Password doesn't match!";
            include('../error.php');
        }
    }else{
        header("Location: login.html");
        exit;
    }

?>