<?php 
$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
$category = filter_input(INPUT_POST, "category", FILTER_UNSAFE_RAW);

require_once("model/category_db.php");
require_once("model/item_db.php");

if ($action == "addCategory") {
    if ($category == null) {
        $error = "Invalid category data. Check all fields and try again.";
        include("view/error.php");
    }
    else {
        addCategory($category);
    }
} else if ($action == "removeCategory") {
    if ($category == null) {
        $error = "Removal Error. Category ID not found.";
        include("view/error.php");
    } else {
        removeCategory($category);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="view/main.css">
</head>
<div id="page-container">
    <div id="content-container">
        <?php include("view/header.php") ?>
        <body>
            <div class="add_container">
                <section class="add">
                    <h2>Add Category</h2>
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="insertItem">
                        <label for="category">Category Name: </label>
                        <input type="text" id="category" name="category" required>
                        <button type = "submit" name="action" value="addCategory">Add Category</button>
                    </form>
                </section>
                <div class="add_container">
                <section class="add">
                    <h2>Remove Category</h2>
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="removeCategory">
                        <label for="title">Category Name: </label>
                        <select name="category" id="category">
                            <?php require_once("view/category_list.php"); ?>
                        </select>
                        <button type = "submit" name="action" value="removeCategory">Remove Category</button>
                    </form>
                </section>
                <div id="category_link"> 
                    <a href="index.php">Click Here </a>
                    to return to the ToDo list.
                </div>
            </div>
        </body>
    </div>
    <?php include("view/footer.php") ?>
</div>
</html>