<?php
    include('../connect.php');

    $id = $_POST['id'];
    $activ = $_POST['activ'];

    $query_toggle = 'UPDATE angajati SET activ=:activ WHERE id=:id';

    $toggle_stm = $db->prepare($query_toggle);

    $toggle_stm->bindValue(":activ", !$activ);
    $toggle_stm->bindValue(":id", $id);

    $toggle_stm->execute();

    $toggle_stm->closeCursor();
?>