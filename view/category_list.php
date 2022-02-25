<?php 
require_once("model/category_db.php");
    $itemsC = listCategories(); 
    if ($itemsC) { 
        foreach($itemsC as $item) : ?>
            <option value="<?php echo $item['categoryID']; ?>">
            <?php echo $item['categoryName']?></option>
    <?php endforeach ; } ?>