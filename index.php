<?php 
$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);

$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
$title = filter_input(INPUT_POST, "title", FILTER_UNSAFE_RAW);
$category = filter_input(INPUT_POST, "category", FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, "description", FILTER_UNSAFE_RAW);
$items;

require_once("model/category_db.php");
require_once("model/item_db.php");

if ($action == "addItem") {
    if ($title == null || $description == null || $category == null) {
        $error = "Invalid item data. Check all fields and try again.";
        include("view/error.php");
    }
    else {
        require_once("model/item_db.php");
        insertItem($title, $description, $category);
    }
}
else if ($action == "deleteItem") {
    if ($id == null) {
        $error = "Removal Error. Item ID not found.";
        include("view/error.php");
    } else {
        deleteItem($id);
    }
}
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
<div id="page-container">
    <div id="content-container">
        <?php include("view/header.php") ?>
        <body>
            <div class="add_container">
                <section class="add">
                    <h2>Add Item</h2>
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="insertItem">
                        <label for="title">Title: </label>
                        <input type="text" id="title" name="title" required>
                        <label for="category">Category: </label>
                        <select name="category" id="category">
                            <?php require_once("view/category_list.php"); ?>
                        </select>
                        <label for="description">Description: </label>
                        <input type="text" id="description" name="description" required>
                        <button type = "submit" name="action" value="addItem">Add Item</button>
                    </form>
                </section>
                <div id="category_link">Do you want to add a category? <br>Or remove one from the list? 
                    <a href="categories.php">Click Here</a></div>
            </div>
        <?php require_once("view/item_list.php");?>
        </body>
    </div>
    <?php include("view/footer.php") ?>
</div>
</html>