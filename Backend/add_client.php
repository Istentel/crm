<?php
    #Get data
    $first_name = filter_input(INPUT_POST, "first_name");
    $last_name = filter_input(INPUT_POST, "last_name");
    $email = filter_input(INPUT_POST, "email");
    $adress = filter_input(INPUT_POST, "adress");
    $phone = filter_input(INPUT_POST, "phone");

    #Check all data is entered
    if($first_name == null || $last_name == null || $email == null || $adress == null || $phone == null){
        $err_msg = "All Values Not Entered<br>";
        include('error.php');
    }elseif(!preg_match("/[a-zA-Z]{3,30}$/", $first_name)){
        $err_msg = "First Name Not Valid<br>";
        include('error.php');
    }elseif(!preg_match("/[a-zA-Z]{3,30}$/", $last_name)){
        $err_msg = "Last Name Not Valid<br>";
        include('error.php');
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $err_msg = "Email Not Valid";
        include('error.php');
    }elseif(!preg_match("/^[A-Za-z0-9 ,#'\/.]{3,50}$/", $adress)){
        $err_msg = "Adress Not Valid";
        include('error.php');
    }elseif(!preg_match("/(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$/", $phone)){
        $err_msg = "Phone Not Valid<br>";
        include('error.php');
    }else{
        require_once('connect.php');

        #Create query
        $query = 'INSERT INTO clients (first_name, last_name, email, adress, phone) VALUES(:first_name, :last_name, :email, :adress, :phone)';

        #Create a PDOStatement object
        $stm = $db->prepare($query);

        #Bind values to parameters in the prepared statement
        $stm->bindValue(':first_name', $first_name);
        $stm->bindValue(':last_name', $last_name);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':adress', $adress);
        $stm->bindValue(':phone', $phone);

        #Execute query and store true or false based on success
        $execute_success = $stm->execute();
        $stm->closeCursor();

        #If an error occurred print the error
        if(!$execute_success){
            print_r($stm->errorInfo()[2]);
        }

        #Close this page and redirect to index
        header("Location: dummi.php");
		exit;
    }
?>