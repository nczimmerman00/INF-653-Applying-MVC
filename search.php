<?php 
$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
$category = filter_input(INPUT_POST, "category", FILTER_UNSAFE_RAW);

require_once("model/category_db.php");
require_once("model/item_db.php");

if ($action == "deleteItem") {
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
<body>
    <div id="page-container">
        <div id="content-container">
            <?php include("view/header.php");
                require_once("model/item_db.php");
                require_once("model/category_db.php");
                $items = listSearchItems($category); ?>
                <div class="add_container">
                    <section class="add">
                        <div id="category_link"> 
                            <a href="index.php">Click Here to go back.</a>
                        </div>
                        <div id="search-form">
                            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="searchQuery">
                                <label for="category">Search By Category: </label>
                                <select name="category" id="category">
                                    <?php require("view/category_list.php"); ?>
                                </select>
                                <button type = "submit" name="action" value="search">Search</button>
                            </form>
                        </div>
                    </section>
                </div>
                <?php
                if (!$items) { ?>
                <div id="no-items">
                    <h4>There are no to-do items for this category!</h4>
                    <p>Either you're done for the day, or you forgot to add something :)</p>
                </div>
            <?php } else { ?>
                
            <?php foreach($items as $item) : ?>
                <div class="list-item">
                    <h4><?php echo $item['Title'] ?></h4>
                    <h5><?php echo $item['categoryName'] ?></h5>
                    <p><?php echo $item['Description'] ?></p>
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="deleteItem">
                        <input type="hidden" name="id" id="id" value="<?php echo $item['ItemNum']; ?>">
                        <button class="remove" type="submit" name="action" value="deleteItem">Remove</button>
                    </form>
                </div>
            <?php endforeach ; } ?>
        </div>
        <?php include("view/footer.php") ?>
    </div>
</body>
</html>
