<?php 
    $id = filter_input(INPUT_POST, "itemnum", FILTER_UNSAFE_RAW);
    if ($id == null) {
        $error = "Removal Error. Item ID not found.";
        include("error.php");
    } else {
        require_once("model/database.php");
        require_once("model/db_functions.php");
        deleteItem($id);
    }
    include("index.php");
?>