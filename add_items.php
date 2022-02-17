<?php 
//$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
$title = filter_input(INPUT_POST, "title", FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, "description", FILTER_UNSAFE_RAW);

if ($title == null || $description == null) {
    $error = "Invalid item data. Check all fields and try again.";
    include("error.php");
}
else {
    require_once("model/database.php");
    require_once("model/db_functions.php");
    insertItem($title, $description);
}
include("index.php");
?>