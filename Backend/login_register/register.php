<?php
    if(isset($_POST["submit"])){
        #Get data
        $first_name = filter_input(INPUT_POST, "fname");
        $last_name = filter_input(INPUT_POST, "lname");
        $email = filter_input(INPUT_POST, "email");
        $phone = filter_input(INPUT_POST, "phone");
        $password = filter_input(INPUT_POST, "password");
        $passwordC = filter_input(INPUT_POST, "passwordC");

        if(!($password == $passwordC)){
            $err_msg = "Password doesn't match!";
            include('../error.php');
        }

        #Check all data is entered
        if($first_name == null || $last_name == null || $email == null || $phone == null || $password == null){
            $err_msg = "All Values Not Entered<br>";
            include('../error.php');
        }elseif(!preg_match("/[a-zA-Z]{3,50}$/", $first_name)){
            $err_msg = "Numele nu este valid<br>";
            include('../error.php');
        }elseif(!preg_match("/[a-zA-Z]{3,50}$/", $last_name)){
            $err_msg = "Prenumele nu este valid<br>";
            include('../error.php');
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $err_msg = "Email Not Valid";
            include('../error.php');
        }elseif(!preg_match("/(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$/", $phone)){
            $err_msg = "Telefonul nu este valid<br>";
            include('error.php');
        }else{
            require_once('../connect.php');

            #Check if email already exists in db
            $query_email = 'SELECT email FROM accounts';

            #Create a PDOStatement object
            $stm = $db->prepare($query_email);

            $execute_success = $stm->execute();
            $emails = $stm->fetchAll();
            $stm->closeCursor();

            foreach($emails as $em){
                if($em['email'] == $email){
                    $err_msg = "Exista deja un cont cu acest email!";
                    include('../error.php');
                }
            }

            #Create query for insertion
            $query = 'INSERT INTO accounts (nume, prenume, email, telefon, password) VALUES (:nume, :prenume, :email, :telefon, :password)';

            #Create a PDOStatement object
            $stm = $db->prepare($query);

            #Hash password
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);

            #Bind values to parameters in the prepared statement
            $stm->bindValue(':nume', $first_name);
            $stm->bindValue(':prenume', $last_name);
            $stm->bindValue(':email', $email);
            $stm->bindValue(':telefon', $phone);
            $stm->bindValue(':password', $pass_hash);

            #Execute query and store true or false based on success
            $execute_success = $stm->execute();
            $stm->closeCursor();

            #If an error occurred print the error
            if(!$execute_success){
                print_r($stm->errorInfo()[2]);
            }

            #Start session
            session_start();

            #Set variables
            $_SESSION["account_type"] = $db_data[0]["account_type"];
            $_SESSION["nume"] = $db_data[0]["nume"];
            $_SESSION["prenume"] = $db_data[0]["prenume"];
            $_SESSION["email"] = $db_data[0]["email"];

            #Close this page and redirect to index
            header("Location: ../../Frontend/Html/index.php");
            exit;
        }
    }else{
        header("Location: register.html");
        exit;
    }
?>