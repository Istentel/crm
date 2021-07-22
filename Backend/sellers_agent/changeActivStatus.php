<?php
    include('../connect.php');
    $account_id = $_POST['account_id'];
    $id = $_POST['id'];
    $activ = $_POST['activ'];

    $query_toggle = 'UPDATE sellersagent SET activ=:activ WHERE account_id=:account_id AND id=:id';

    $toggle_stm = $db->prepare($query_toggle);

    $toggle_stm->bindValue(":activ", !$activ);
    $toggle_stm->bindValue(":account_id", $account_id);
    $toggle_stm->bindValue(":id", $id);

    $toggle_stm->execute();

    $toggle_stm->closeCursor();
?>