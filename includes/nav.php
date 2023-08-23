
<div class="navbar">
    <ul>

        <?php
        global$navbar;
        foreach ($navbar as $navLink) {
            echo "<li><a href=\"$navLink[url]\">$navLink[title]</a></li>";
        }
        ?>

    </ul>

</div>
