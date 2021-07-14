<?php
    if(isset($_POST["submit"])){
        $companie = filter_input(INPUT_POST, "companie");
        $telefon = filter_input(INPUT_POST, "telefon");
        $grup = filter_input(INPUT_POST, "grup");

        if($companie == null || $telefon == null){
            $err_msg = "All Values Not Entered<br>";
            include('../error.php');
        }elseif(!preg_match("/[a-zA-Z .-]{3,30}$/", $companie)){
            $err_msg = "Companie lipsa<br>";
            include('../error.php');
        }elseif(!preg_match("/(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$/", $telefon)){
            $err_msg = "Phone Not Valid<br>";
            include('../error.php');
        }else{
            require_once('../connect.php');

            #Create query
            $query = 'INSERT INTO firme (companie, telefon, activ, grupuri) VALUES (:companie, :telefon, :activ, :grupuri)';

            #Create a PDOStatement object
            $stm = $db->prepare($query);

            #Bind values to parameters in the prepared statement
            $stm->bindValue(':companie', $companie);
            $stm->bindValue(':telefon', $telefon);
            $stm->bindValue(':activ', true);
            $stm->bindValue(':grupuri', $grup);

            #Execute query and store true or false based on success
            $execute_success = $stm->execute();
            $stm->closeCursor();

            #If an error occurred print the error
            if(!$execute_success){
                print_r($stm->errorInfo()[2]);
            }

            #Close this page and redirect to index
            header("Location: index.php");
            exit;
        }
    }
?>