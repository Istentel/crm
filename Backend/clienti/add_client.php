<?php
if(isset($_POST["submit"])){
    #Get data
    $id = filter_input(INPUT_POST, "id");
    $nume = filter_input(INPUT_POST, "nume");
    $prenume = filter_input(INPUT_POST, "prenume");
    $email = filter_input(INPUT_POST, "email");
    $telefon = filter_input(INPUT_POST, "telefon");
    $pozitie = filter_input(INPUT_POST, "pozitie");
    $activ = filter_input(INPUT_POST, "activ");

    #Check all data is entered
    if($nume == null || $prenume == null || $email == null || $telefon == null || $pozitie == null){
        $err_msg = "All Values Not Entered<br>";
        include('error.php');
    }elseif(!preg_match("/[a-zA-Z]{3,30}$/", $nume)){
        $err_msg = "Numele nu este valid<br>";
        include('error.php');
    }elseif(!preg_match("/[a-zA-Z]{3,30}$/", $prenume)){
        $err_msg = "Prenumele nu este vaild<br>";
        include('error.php');
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $err_msg = "Email Not Valid";
        include('error.php');
    }elseif(!preg_match("/^[A-Za-z0-9 ,#'\/.]{3,50}$/", $pozitie)){
        $err_msg = "Pozitia nu este valida!<br>";
        include('error.php');
    }elseif(!preg_match("/(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$/", $telefon)){
        $err_msg = "Telefonul nu este valid<br>";
        include('error.php');
    }else{
        require_once('../connect.php');

        $companie = getNumeFirma($id, $db);

        #Create query
        $query = 'INSERT INTO firma_clienti (id, nume, prenume, email, companie, telefon, pozitie, activ) VALUES(:id, :nume, :prenume, :email, :companie, :telefon, :pozitie, :activ)';

        #Create a PDOStatement object
        $stm = $db->prepare($query);

        #Bind values to parameters in the prepared statement
        $stm->bindValue(':id', $id);
        $stm->bindValue(':nume', $nume);
        $stm->bindValue(':prenume', $prenume);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':companie', $companie);
        $stm->bindValue(':telefon', $telefon);
        $stm->bindValue(':pozitie', $pozitie);
        $stm->bindValue(':activ', true);

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

function getNumeFirma($id, $db){

    $query = 'SELECT companie FROM firme WHERE id=:id';

    #Create a PDOStatement object
    $stm = $db->prepare($query);

    #Bind values to parameters in the prepared statement
    $stm->bindValue(':id', $id);

    #Execute query and store true or false based on success
    $stm->execute();

    $nume = $stm->fetchAll();

    $stm->closeCursor();

    return $nume[0]['companie'];
}
?>