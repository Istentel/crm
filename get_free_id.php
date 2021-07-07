<?php
     function getFreeId(){
        require('connect.php');

        $query_id = 'SELECT id FROM clients';
        $id_statement = $db->prepare($query_id);

        $id_statement->execute();

        $ids = $id_statement->fetchAll();

        $i = 1;

        foreach($id as $ids){
            echo $id;
        }

        $id_statement->closeCursor();

        return $i;
    }
?>