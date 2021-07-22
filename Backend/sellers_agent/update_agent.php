<?php
if(isset($_POST["submit"])){
    #Get data
    $id = $_POST["id"];
    $account_id = $_POST["account_id"];
    $first_name = filter_input(INPUT_POST, "name");
    $last_name = filter_input(INPUT_POST, "prenume");
    $email = filter_input(INPUT_POST, "email");
    $phone = filter_input(INPUT_POST, "phone");
    $company = filter_input(INPUT_POST, "companie");
    $grup = filter_input(INPUT_POST, "grup");
    $prod_vandute = filter_input(INPUT_POST, "prod_vandute");
    $data_angajare = filter_input(INPUT_POST, "data");

    #Check all data is entered
    if($first_name == null || $last_name == null || $email == null || $phone == null || $company == null || $prod_vandute == null){
        $err_msg = "All Values Not Entered<br>";
        include('../error.php');
    } elseif(!preg_match("/[a-zA-Z .-]{3,40}$/", $first_name)){
        $err_msg = "Nume incorect<br>";
        include('../error.php');
    } elseif(!preg_match("/[a-zA-Z .-]{3,40}$/", $last_name)){
        $err_msg = "Prenume incorect<br>";
        include('../error.php');
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $err_msg = "Email-ul nu este valid";
        include('error.php');
    } elseif(!preg_match("/^[A-Za-z0-9 ,#'\/.]{3,50}$/", $company)){
        $err_msg = "Compania este invalida!<br>";
        include('error.php');
    } elseif(!preg_match("/^[A-Za-z0-9 ,#'\/.]{3,50}$/", $grup)){
        $err_msg = "Grupul este invalida!<br>";
        include('error.php');
    } elseif(!filter_var($prod_vandute, FILTER_VALIDATE_INT)){
        $err_msg = "Valoare introdusa este invalida!<br>";
        include('error.php');
    }else {
        require_once('../connect.php');

        #Create query
        $query = 'UPDATE sellersagent SET id=:id, first_name=:first_name, last_name=:last_name, email=:email, phone=:phone, firme_asociate=:firme_asociate, grupuri=:grupuri, activ=:activ, prod_vandute=:prod_vandute, data_angajare=:data_angajare WHERE account_id=:account_id AND id=:id';
        
        #Create a PDOStatement object
        $stm = $db->prepare($query);

        #Bind values to parameters in the prepared statement
        $stm->bindValue(':id', $id);
        $stm->bindValue(':account_id', $account_id);
        $stm->bindValue(':first_name', $first_name);
        $stm->bindValue(':last_name', $last_name);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':phone', $phone);
        $stm->bindValue(':firme_asociate', $company);
        $stm->bindValue(':grupuri', $grup);
        $stm->bindValue(':activ', true);
        $stm->bindValue(':prod_vandute', $prod_vandute);
        $stm->bindValue(':data_angajare', $data_angajare);

        #Execute query and store true or flase based on success
        $execute_success = $stm->execute();
        $stm->closeCursor();
        
        #If an error occurred print the error
        if(!$execute_success){
            print_r($stm->errorInfo()[2]);
        }

    #Close this page and redirect to index
    header("Location: ../../Frontend/Html/AgentVanzari.php");
    exit;
    }
}