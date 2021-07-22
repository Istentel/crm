<?php
    #Get data
    session_start();
    $id = $_GET['id'];
    $account_id = $_SESSION["account_id"];
    
    if($id == null){
        $err_msg = "All Values Not Entered";
        include('../error.php');
    } else {
        require_once('../connect.php');

        #Create query
        $query = 'DELETE FROM sellersagent WHERE account_id=:account_id AND id = :id';

        #Create a PDOStatement object
        $stm = $db->prepare($query);

        #Bind values
        $stm->bindValue(':account_id', $account_id);
        $stm->bindValue(':id', $id);

        #Execute query and store true or false

        $execute_success = $stm->execute();
        $stm->closeCursor();

        if(!$execute_success){
            print_r($stm->errorInfo()[2]);
        }

        header("Location: ../../Frontend/Html/AgentVanzari.php");
		exit;
    }
?>