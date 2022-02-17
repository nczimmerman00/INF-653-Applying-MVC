<?php 
require_once("model/database.php");
require_once("model/db_functions.php");
$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
$title = filter_input(INPUT_POST, "title", FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, "description", FILTER_UNSAFE_RAW);
$items;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="view/main.css">
</head>
<header>ToDo List</header>
<body>
    <div class="add_container">
        <section class="add">
            <h2>Add Item</h2>
            <form action="add_items.php" method="POST" id="insertItem">
                <label for="title">Title: </label>
                <input type="text" id="title" name="title" required>
                <label for="description">Description: </label>
                <input type="text" id="description" name="description" required>
                <button type = "submit" name="action" value="addItem">Add Item</button>
            </form>
        </section>
    </div>
    <?php require_once("list_items.php");?>
</body>
</html>