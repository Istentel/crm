<?php
if(isset($_POST["submit"])){
    #Get data
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $cnp = filter_input(INPUT_POST, "cnp");
    $seria = filter_input(INPUT_POST, "seria");
    $nr = filter_input(INPUT_POST, "nr");
    $sex = filter_input(INPUT_POST, "sex");
    $cetatenie = filter_input(INPUT_POST, "cetatenie");
    $loc_nastere = filter_input(INPUT_POST, "loc_nastere");
    $adresa = filter_input(INPUT_POST, "adresa");


    #Check all data is entered
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

        #Create query
        $query = 'INSERT INTO acte(id_angajat, cnp, seria, nr, sex, cetatenie, loc_nastere, adresa) VALUES(:id_angajat, :cnp, :seria, :nr, :sex, :cetatenie, :loc_nastere, :adresa)';
        
        #Create a PDOStatement object
        $stm = $db->prepare($query);

        #Bind values to parameters in the prepared statement
        $stm->bindValue(':id_angajat', $id);
        $stm->bindValue(':cnp', $cnp);
        $stm->bindValue(':seria', $seria);
        $stm->bindValue(':nr', $nr);
        $stm->bindValue(':sex', $sex);
        $stm->bindValue(':cetatenie', $cetatenie);
        $stm->bindValue(':loc_nastere', $loc_nastere);
        $stm->bindValue(':adresa', $adresa);

        #Execute query and store true or flase based on success
        $execute_success = $stm->execute();
        $stm->closeCursor();
        
        #If an error occurred print the error
        if(!$execute_success){
            print_r($stm->errorInfo()[2]);
        }

    #Close this page and redirect to index
    header("Location: ../../Frontend/Html/Angajati.php");
    exit;
    }
}