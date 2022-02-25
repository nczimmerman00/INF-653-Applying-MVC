<?php 
    require_once("database.php");

    function listCategories() {
        global $db;
        $query = 'SELECT categoryName, categoryID FROM categories';
        $statement = $db->prepare($query);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }

    function addCategory($name) {
        global $db;
        $query = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryName', $name);
        $statement->execute();

    }

    function removeCategory($category) {
        global $db;
        $query = 'DELETE FROM todoitems WHERE categoryID = :category';
        $statement = $db->prepare($query);
        $statement->bindValue(':category', $category);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        }
        $statement->closeCursor();
        $query = 'DELETE FROM categories WHERE categoryID = :category';
        $statement = $db->prepare($query);
        $statement->bindValue(':category', $category);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        }
        return $count;
    }
?>