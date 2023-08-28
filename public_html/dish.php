<?php
global$menuItems;
define("TITLE", "Menu | Franklin's Fine Dining");
include("../includes/header.php");

//prevents other developers to manipulate the query strings
function strip_bad_chars($input) {
    $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input );
    return $output;
}

// checks that the variable has been set
if (isset($_GET['item'])) {
    // assigns to $menuItem the value of the key in the $menuItems array
    $menuItem = strip_bad_chars( $_GET['item'] );
    // assigns to $dish the keys of the $menuItems array
    $dish = $menuItems[$menuItem];
}

// calculates a suggested stip based on the price
function suggestedTip($price, $tip) {

    $totalTip = $price * $tip;
    // $fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
    //echo $fmt->formatCurrency($totalTip, "USD").'\n';

    echo $totalTip;
}
?>

<div>

    <h1><?php echo $dish["title"]; ?> <span class="price"><sup>$</sup><?php echo $dish["price"]; ?></span></h1>
    <p><?php echo $dish["description"]; ?></p>

    <br>

    <p><strong>Suggested beverage: <?php echo $dish["drink"]; ?></strong></p>
    <p><em>Suggested tip: <sup>$</sup><?php suggestedTip($dish["price"], 0.20);?></em></p>

</div>

<a href="menu.php" class="button previous">Back to menu</a>



<?php include("../includes/footer.php"); ?>
