<?php
global$menuItems;
define("TITLE", "Menu | Franklin's Fine Dining");
include("../includes/header.php");

?>

<div class="menu">

    <h1>Our delicious menu</h1>
    <p>
        Like our team, our menu is very small - but dang, does it ever pack a punch!
    </p>
    <p>
        <em>Click any menu item to learn more about it ;-)</em>
    </p>

    <ul>
        <?php
        // accessing the key and value pairs in the menuItems array
        foreach ($menuItems as $dish => $item) {
        ?>
            <li><a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item["title"]; ?></a><span class="price"><sup>$</sup><?php echo $item["price"];  ?></span></li>


        <?php } ?>
    </ul>

</div>

<?php
include("../includes/footer.php");
?>
