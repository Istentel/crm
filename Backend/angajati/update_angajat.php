<?php
if(isset($_POST["submit"])){
    #Get data
    $id = filter_input(INPUT_POST, "id");
    $nume = filter_input(INPUT_POST, "nume");
    $prenume = filter_input(INPUT_POST, "prenume");
    $email = filter_input(INPUT_POST, "email");
    $telefon = filter_input(INPUT_POST, "telefon");
    $salariu = filter_input(INPUT_POST, "salariu");
    $nivel = filter_input(INPUT_POST, "nivel_angajat");
    $valoare_angajat = filter_input(INPUT_POST, "valoare_angajat");
    $departament = filter_input(INPUT_POST, "departament");
    $data_angajare = filter_input(INPUT_POST, "data");

    #Acte data
    $cnp = filter_input(INPUT_POST, "cnp");
    $seria = filter_input(INPUT_POST, "seria");
    $nr = filter_input(INPUT_POST, "nr");
    $sex = filter_input(INPUT_POST, "sex");
    $cetatenie = filter_input(INPUT_POST, "cetatenie");
    $loc_nastere = filter_input(INPUT_POST, "loc_nastere");
    $adresa = filter_input(INPUT_POST, "adresa");

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
        include('../error.php');
    } elseif(!filter_var($salariu, FILTER_VALIDATE_FLOAT)){
        $err_msg = "Salariul nu este corect!<br>";
        include('../error.php');
    } elseif(!($valoare_angajat === '0') && !filter_var($valoare_angajat, FILTER_VALIDATE_FLOAT)){
        $err_msg = "Valoarea angajat este incorecta!<br>";
        include('../error.php');
    } else {
        require_once('../connect.php');

        #Create query
        $query = 'UPDATE angajati SET nume = :nume, prenume = :prenume, email = :email, telefon = :telefon, activ = :activ, salariu = :salariu, nivel_angajat = :nivel_angajat, valoare_angajat = :valoare_angajat, departament = :departament, data_angajare = :data_angajare WHERE id = :id';        
        #Create a PDOStatement object
        $stm = $db->prepare($query);

        #Bind values to parameters in the prepared statement
        $stm->bindValue(':id', $id);
        $stm->bindValue(':nume', $nume);
        $stm->bindValue(':prenume', $prenume);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':telefon', $telefon);
        $stm->bindValue(':activ', true);
        $stm->bindValue(':salariu', $salariu);
        $stm->bindValue(':nivel_angajat', $nivel);
        $stm->bindValue(':valoare_angajat', $valoare_angajat);
        $stm->bindValue(':departament', $departament);
        $stm->bindValue(':data_angajare', $data_angajare);

        #Execute query and store true or flase based on success
        $execute_success = $stm->execute();
        $stm->closeCursor();
        
        #If an error occurred print the error
        if(!$execute_success){
            print_r($stm->errorInfo()[2]);
        }
    }

    if($id == null || $cnp == null || $seria == null || $nr == null || $sex == null || $cetatenie == null || $loc_nastere == null || $adresa == null){
        $err_msg = "All Values Not Entered<br>";
        include('../error.php');
    } elseif(!preg_match("/[0-9]$/", $id)){
        $err_msg = "id invalid<br>";
        include('../error.php');
    } elseif(!preg_match("/[0-9]{13,15}$/", $cnp)){
        $err_msg = "cnp incorect<br>";
        include('../error.php');
    } elseif(!preg_match("/[a-zA-Z]{2,5}$/", $seria)){
        $err_msg = "seria incorect<br>";
        include('../error.php');
    } elseif(!preg_match("/[0-9]{6,10}$/", $nr)){
        $err_msg = "cnp incorect<br>";
        include('../error.php');
    } elseif(!preg_match("/[a-zA-Z -.]{2,20}$/", $cetatenie)){
        $err_msg = "seria incorect<br>";
        include('../error.php');
    } elseif(!preg_match("/[a-zA-Z -.]{2,20}$/", $loc_nastere)){
        $err_msg = "seria incorect<br>";
        include('../error.php');
    } elseif(!preg_match("/[a-zA-Z -.,#'\/]{2,40}$/", $adresa)){
        $err_msg = "seria incorect<br>";
        include('../error.php');
    } else {
        require_once('../connect.php');

        $query = 'UPDATE acte SET cnp = :cnp, seria = :seria, nr = :nr, sex = :sex, cetatenie = :cetatenie, loc_nastere = :loc_nastere, adresa = :adresa WHERE id_angajat = :id';

        $stm = $db->prepare($query);

        $stm->bindValue(':id', $id);
        $stm->bindValue(':cnp', $cnp);
        $stm->bindValue(':seria', $seria);
        $stm->bindValue(':nr', $nr);
        $stm->bindValue(':sex', $sex);
        $stm->bindValue(':cetatenie', $cetatenie);
        $stm->bindValue(':loc_nastere', $loc_nastere);
        $stm->bindValue(':adresa', $adresa);

        $execute_success = $stm->execute();
        $stm->closeCursor();
        

        if(!$execute_success){
            print_r($stm->errorInfo()[2]);
        }


        header("Location: ../../Frontend/Html/Angajati.php");
        exit;
    }
}