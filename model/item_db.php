<?php

require_once("database.php");

function insertItem($title, $description, $category) {
    global $db;
    $query = 'INSERT INTO todoitems (Title, Description, categoryID) VALUES (:title, :description, :category)';
    $count = 0;
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':category', $category);
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
    $query = 'SELECT * FROM todoitems INNER JOIN categories ON categories.categoryID = todoitems.categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function listSearchItems($category) {
    global $db;
    $query = 'SELECT * FROM todoitems 
        INNER JOIN categories ON categories.categoryID = todoitems.categoryID
        WHERE todoitems.categoryID = :category';
    $statement = $db->prepare($query);
    $statement->bindValue(':category', $category);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

?>