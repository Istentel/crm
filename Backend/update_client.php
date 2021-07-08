<?php
    #Get data
    //$id = filter_input(INPUT_POST, "id");
    $id = 1;
    $first_name = filter_input(INPUT_POST, "first_name");
    $last_name = filter_input(INPUT_POST, "last_name");
    $email = filter_input(INPUT_POST, "email");
    $adress = filter_input(INPUT_POST, "adress");
    $phone = filter_input(INPUT_POST, "phone");

    if($first_name == null || $last_name == null || $email == null || $adress == null || $phone == null){
        echo $first_name;
        $err_msg = "All Values Not Entered<br>";
        include('error.php');
    } else {
        require_once('connect.php');

        $query = 'UPDATE clients SET first_name = :first_name, last_name = :last_name, email = :email, adress = :adress, phone = :phone WHERE id = :id';

        #Create a PDOStatement object
        $stm = $db->prepare($query);

        #Bind values to parameters in the prepared statement
        $stm->bindValue(':first_name', $first_name);
        $stm->bindValue(':last_name', $last_name);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':adress', $adress);
        $stm->bindValue(':phone', $phone);
        $stm->bindValue(':id', $id);

        #Execute query and store true or flase based on success
        $execute_success = $stm->execute();
        $stm->closeCursor();

        #If an error occurred print the error
        if(!$execute_success){
            print_r($stm->errorInfo()[2]);
        }

        header("Location: dummi.php");
		exit;
    }
?>