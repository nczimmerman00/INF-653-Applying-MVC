<?php 
require_once("model/db_functions.php");
    $items = listItems();
    if (!$items) { ?>
        <h4>There are no to-do items!</h4>
        <p>Either you're done for the day, or you forgot to add something :)</p>
<?php } else {
    foreach($items as $item) : ?>
        <li class="list-item">
            <h4><?php echo $item['Title'] ?></h4>
            <p><?php echo $item['Description'] ?></p>
            <form action="remove_items.php" method="POST" id="deleteItem">
            <input type="hidden" name="itemnum" id="itemnum" value="<?php echo $item['ItemNum']; ?>">
            <button class="remove" type="submit" name="action" value="deleteItem">Remove</button>
            </form>
        </li>
    <?php endforeach ; } ?>