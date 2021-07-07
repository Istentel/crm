<?php
    #Get data
    $first_name = filter_input(INPUT_POST, "first_name");
    $last_name = filter_input(INPUT_POST, "last_name");
    $email = filter_input(INPUT_POST, "email");
    $phone = filter_input(INPUT_POST, "phone");
    $company = filter_input(INPUT_POST, "company");
    $task = filter_input(INPUT_POST, "task");

    #Check all data is entered
    if($first_name == null || $last_name == null || $email == null || $phone == null || $company == null || $task == null){
        $err_msg = "All Values Not Entered<br>";
        include('../error.php');
    } else {
        require_once('../connect.php');

        #Create query
        $query = 'INSERT INTO sellersagent(first_name, last_name, email, phone, company, task) VALUES(:first_name, :last_name, :email, :phone, :company, :task)';
        
        #Create a PDOStatement object
        $stm = $db->prepare($query);

        #Bind values to parameters in the prepared statement
        $stm->bindValue(':first_name', $first_name);
        $stm->bindValue(':last_name', $last_name);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':phone', $phone);
        $stm->bindValue(':company', $company);
        $stm->bindValue(':task', $task);

        #Execute query and store true or flase based on success
        $execute_success = $stm->execute();
        $stm->closeCursor();
        
        #If an error occurred print the error
        if(!$execute_success){
            print_r($stm->errorInfo()[2]);
        }

        #Close this page and redirect to index
        header("Location: index.html");
		exit;
    }

?>