<?php
if(isset($_POST["submit"])){
    $id = filter_input(INPUT_POST, "id");
    $denumire = filter_input(INPUT_POST, "denumire");
    $um = filter_input(INPUT_POST, "um");
    $cantitate = filter_input(INPUT_POST, "cantitate");
    $pret_unitar = filter_input(INPUT_POST, "pret_unitar");
    $cota_tva = filter_input(INPUT_POST, "cota_tva");

    if($denumire == null || $um == null || $cantitate == null || $pret_unitar == null || $cota_tva == null){
        $err_msg = "All Values Not Entered<br>";
        include('../error.php');
    }elseif(!preg_match("/[a-zA-Z0-9 ,#'\/.]{3,30}$/", $denumire)){
        $err_msg = "Denumirea Invalida<br>";
        include('../error.php');
    }elseif(!preg_match("/[a-zA-Z,#'\/.]{1,30}$/", $um)){
        $err_msg = "UM Invalid<br>";
        include('../error.php');
    }elseif(!filter_var($cantitate, FILTER_VALIDATE_FLOAT)){
        $err_msg = "Cantitate Invalida<br>";
        include('../error.php');
    }elseif(!filter_var($pret_unitar, FILTER_VALIDATE_FLOAT)){
        $err_msg = "Pret Unitar Invalida<br>";
        include('../error.php');
    }elseif(!filter_var($cota_tva, FILTER_VALIDATE_FLOAT)){
        $err_msg = "Cota TVA Invalida<br>";
        include('../error.php');
    }else{
        require_once('../connect.php');

        #Create query
        $query = 'INSERT INTO facturi_detalii(denumire, um, cant, pret_unitar, valoare, cota_tva, val_tva, val_totala, id) VALUES(:denumire, :um, :cant, :pret_unitar, :valoare, :cota_tva, :val_tva, :val_totala, :id)';

        $valoare = $cantitate * $pret_unitar;
        $val_tva = $valoare / 100 * $cota_tva;
        $val_totala = $valoare + $val_tva;

        #Create a PDOStatement object
        $stm = $db->prepare($query);

        #Bind values to parameters in the prepared statement
        $stm->bindValue(':denumire', $denumire);
        $stm->bindValue(':um', $um);
        $stm->bindValue(':cant', $cantitate);
        $stm->bindValue(':pret_unitar', $pret_unitar);
        $stm->bindValue(':valoare', $valoare);
        $stm->bindValue(':cota_tva', $cota_tva);
        $stm->bindValue(':val_tva', $val_tva);
        $stm->bindValue(':val_totala', $val_totala);
        $stm->bindValue(':id', $id);

        #Execute query and store true or false based on success
        $execute_success = $stm->execute();
        $stm->closeCursor();

        #If an error occurred print the error
        if(!$execute_success){
            print_r($stm->errorInfo()[2]);
        }

        #Close this page and redirect to index
        header("Location: detalii.php?id=" . $id);
		exit;
    }
}
?>