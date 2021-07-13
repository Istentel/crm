<?php
    #Get data 
    $fi_nume = filter_input(INPUT_POST, "fi_nume");
    $fi_nr_ord_reg_com = filter_input(INPUT_POST, "fi_nr_ord_reg_com");
    $fi_cif = filter_input(INPUT_POST, "fi_cif");
    $fi_adresa = filter_input(INPUT_POST, "fi_adresa");
    $fi_telefon = filter_input(INPUT_POST, "fi_telefon");
    $fi_email = filter_input(INPUT_POST, "fi_email");
    $fi_site = filter_input(INPUT_POST, "fi_site"); 

    $c_cumparator = filter_input(INPUT_POST, "c_cumparator");
    $c_nr_ord_reg_com = filter_input(INPUT_POST, "c_nr_ord_reg_com");
    $c_cif = filter_input(INPUT_POST, "c_cif");
    $c_adresa = filter_input(INPUT_POST, "c_adresa");
    $c_banca = filter_input(INPUT_POST, "c_banca");
    $c_iban = filter_input(INPUT_POST, "c_iban");
    $c_telefon = filter_input(INPUT_POST, "c_telefon");
    $c_email = filter_input(INPUT_POST, "c_email");
    $c_site = filter_input(INPUT_POST, "c_site");

    $f_seria_nr_fac = filter_input(INPUT_POST, "f_seria_nr_fac");
    $f_data = filter_input(INPUT_POST, "f_data");
    $f_termen = filter_input(INPUT_POST, "f_termen");

    require_once('../connect.php');

    $query = 'INSERT INTO facturi (fi_nume, fi_nr_ord_reg_com, fi_cif, fi_adresa, fi_telefon, fi_email, fi_site, c_cumparator, c_nr_ord_reg_com, c_cif, c_adresa, c_banca, c_iban, c_telefon, c_email, c_site, f_seria_nr_fac, f_data, f_termen) VALUES(:fi_nume, :fi_nr_ord_reg_com, :fi_cif, :fi_adresa, :fi_telefon, :fi_email, :fi_site, :c_cumparator, :c_nr_ord_reg_com, :c_cif, :c_adresa, :c_banca, :c_iban, :c_telefon, :c_email, :c_site, :f_seria_nr_fac, :f_data, :f_termen)';

    #Create a PDOStatement object
    $stm = $db->prepare($query);

    #Bind values to parameters in the prepared statement
    $stm->bindValue(':fi_nume', $fi_nume);
    $stm->bindValue(':fi_nr_ord_reg_com', $fi_nr_ord_reg_com);
    $stm->bindValue(':fi_cif', $fi_cif);
    $stm->bindValue(':fi_adresa', $fi_adresa);
    $stm->bindValue(':fi_telefon', $fi_telefon);

    $stm->bindValue(':fi_email', $fi_email);
    $stm->bindValue(':fi_site', $fi_site);
    $stm->bindValue(':c_cumparator', $c_cumparator);
    $stm->bindValue(':c_nr_ord_reg_com', $c_nr_ord_reg_com);
    $stm->bindValue(':c_cif', $c_cif);

    $stm->bindValue(':c_adresa', $c_adresa);
    $stm->bindValue(':c_banca', $c_banca);
    $stm->bindValue(':c_iban', $c_iban);
    $stm->bindValue(':c_telefon', $c_telefon);
    $stm->bindValue(':c_email', $c_email);

    $stm->bindValue(':c_site', $c_site);
    $stm->bindValue(':f_seria_nr_fac', $f_seria_nr_fac);
    $stm->bindValue(':f_data', $f_data);
    $stm->bindValue(':f_termen', $f_termen);

    #Execute query and store true or flase based on success
    $execute_success = $stm->execute();
    $stm->closeCursor();

    #If an error occurred print the error
    if(!$execute_success){
        print_r($stm->errorInfo()[2]);
    }

    #Close this page and redirect to index
    header("Location: index.php");
    exit;
?>