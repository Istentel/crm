<?php
    #Get data
    $first_name = filter_input(INPUT_POST, "fname");
    $last_name = filter_input(INPUT_POST, "lname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $passwordC = filter_input(INPUT_POST, "passwordC");

    if(!($password == $passwordC)){
        $err_msg = "Password does't match!";
        include('../error.php');
    }

    #Check all data is entered
    if($first_name == null || $last_name == null || $email == null || $password == null){
        $err_msg = "All Values Not Entered<br>";
        include('../error.php');
    }elseif(!preg_match("/[a-zA-Z]{3,30}$/", $first_name)){
        $err_msg = "First Name Not Valid<br>";
        include('../error.php');
    }elseif(!preg_match("/[a-zA-Z]{3,30}$/", $last_name)){
        $err_msg = "Last Name Not Valid<br>";
        include('../error.php');
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $err_msg = "Email Not Valid";
        include('../error.php');
    }else{
        require_once('../connect.php');

        #Create query
        $query = 'INSERT INTO accounts (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)';

        #Create a PDOStatement object
        $stm = $db->prepare($query);

        #Hash password
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);

        #Bind values to parameters in the prepared statement
        $stm->bindValue(':first_name', $first_name);
        $stm->bindValue(':last_name', $last_name);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':password', $pass_hash);

        #Execute query and store true or false based on success
        $execute_success = $stm->execute();
        $stm->closeCursor();

        #If an error occurred print the error
        if(!$execute_success){
            print_r($stm->errorInfo()[2]);
        }

        #Close this page and redirect to index
        header("Location: login.html");
	    exit;
    }
?>