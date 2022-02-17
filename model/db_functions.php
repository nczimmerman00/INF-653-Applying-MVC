<?php 
    function insertItem($title, $description) {
        global $db;
        $query = 'INSERT INTO todoitems (Title, Description) VALUES (:title, :description)';
        $count = 0;
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        if($statement->execute()) {
            $count = $statement->rowCount();
        }
        $statement->closeCursor();
        return $count;
    }

    function deleteItem($id) {
        global $db;
        $query = 'DELETE FROM todoitems WHERE ItemNum = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        if ($success = $statement->execute()) {
            $count = $statement->rowCount();
        }
        $statement->closeCursor();
        return $count;
    }

    function listItems() {
        global $db;
        $query = 'SELECT * FROM todoitems';
        $statement = $db->prepare($query);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }
?>