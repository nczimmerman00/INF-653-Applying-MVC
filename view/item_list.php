<?php 
$category = filter_input(INPUT_POST, "category", FILTER_UNSAFE_RAW);

require_once("model/item_db.php");
    $items = listItems();
    if (!$items) { ?>
        <div id="no-items">
            <h4>There are no to-do items!</h4>
            <p>Either you're done for the day, or you forgot to add something :)</p>
        </div>
<?php } else { ?>
    <div id="search-form">
        <form action="search.php" method="POST" id="searchQuery">
            <label for="category">Search By Category: </label>
            <select name="category" id="category">
            <?php require("category_list.php"); ?>
            </select>
            <button type = "submit" name="action" value="search">Search</button>
        </form>
    </div>
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