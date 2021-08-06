<?php
if(isset($_POST["submit"])){
    #Get data
    $nume = filter_input(INPUT_POST, "nume");
    $prenume = filter_input(INPUT_POST, "prenume");
    $email = filter_input(INPUT_POST, "email");
    $telefon = filter_input(INPUT_POST, "telefon");
    $salariu = filter_input(INPUT_POST, "salariu");
    $nivel = filter_input(INPUT_POST, "nivel_angajat");
    $departament = filter_input(INPUT_POST, "departament");
    $data_angajare = filter_input(INPUT_POST, "data");

    #Check all data is entered
    if($nume == null || $prenume == null || $email == null || $telefon == null || $salariu == null){
        $err_msg = "All Values Not Entered<br>";
        include('../error.php');
    } elseif(!preg_match("/[a-zA-Z .-]{3,40}$/", $nume)){
        $err_msg = "Nume incorect<br>";
        include('../error.php');
    } elseif(!preg_match("/[a-zA-Z .-]{3,40}$/", $prenume)){
        $err_msg = "Prenume incorect<br>";
        include('../error.php');
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $err_msg = "Email-ul nu este valid";
        include('error.php');
    } elseif(!preg_match("/(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$/", $telefon)){
        $err_msg = "Telefonul nu este valid<br>";
        include('error.php');
    } elseif(!filter_var($salariu, FILTER_VALIDATE_FLOAT)){
        $err_msg = "Salariul nu este corect!<br>";
        include('error.php');
    } else {
        require_once('../connect.php');

        #Create query
        $query = 'INSERT INTO angajati(nume, prenume, email, telefon, activ, salariu, nivel_angajat, valoare_angajat, departament, data_angajare) VALUES(:nume, :prenume, :email, :telefon, :activ, :salariu, :nivel_angajat, :valoare_angajat, :departament, :data_angajare)';
        
        #Create a PDOStatement object
        $stm = $db->prepare($query);

        #Bind values to parameters in the prepared statement
        $stm->bindValue(':nume', $nume);
        $stm->bindValue(':prenume', $prenume);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':telefon', $telefon);
        $stm->bindValue(':activ', true);
        $stm->bindValue(':salariu', $salariu);
        $stm->bindValue(':nivel_angajat', $nivel);
        $stm->bindValue(':valoare_angajat', 0.0);
        $stm->bindValue(':departament', $departament);
        $stm->bindValue(':data_angajare', $data_angajare);

        #Execute query and store true or flase based on success
        $execute_success = $stm->execute();
        $stm->closeCursor();
        
        #If an error occurred print the error
        if(!$execute_success){
            print_r($stm->errorInfo()[2]);
        }

        ##########

        #Get id
        $query_last_id = 'SELECT id FROM angajati WHERE id=(SELECT LAST_INSERT_ID())';
        $id_stm = $db->prepare($query_last_id);
        $id_stm->execute();
        $id_data = $id_stm->fetchAll();
        $id_stm->closeCursor();

        $id = $id_data[0]['id'];

    #Close this page and redirect to index
    header("Location: ../../Frontend/Html/Acte_angajat.php?id=$id");
    exit;
    }
}