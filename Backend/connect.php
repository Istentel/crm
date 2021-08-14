<?php
    DEFINE ('DB_USER', 'home-pc');
    DEFINE ('DB_PASSWORD', 'test');

    //$dsn = 'mysql:host=192.168.100.56;dbname=crm';
    $dsn = 'mysql:host=192.168.0.117;dbname=crm'; //home ipv4

    try{
        $db = new PDO($dsn, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        $err_msg = $e->getMessage();
        include('error.php');
        exit();
    }
?>