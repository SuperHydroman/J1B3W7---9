<?php
    require "../includes/datalayer.php";
    require "../includes/header.php";
?>
    <header>
        <?php

        if ($_GET['yes'] == "on") {
            deleteLocation($_GET['id']);
            echo '<h1>De locatie \''.$_GET['name'].'\' is verwijderd!</h1>';
        }
        else if ($_GET['no'] == "on") {
            echo '<h1>De locatie \''.$_GET['name'].'\' is niet verwijderd!</h1>';
        }

        ?>

    </header>
    <div id="container">
    <?php
        if ($_GET['yes'] == "on") {
            echo '<img src="../resources/images/succes.jpg" alt="success">';
            header("refresh:3;url=locations.php");
        }
        else if ($_GET['no'] == "on") {
            echo '<img src="../resources/images/cancelled.png" alt="cancelled">';
            header("refresh:3;url=locations.php");
        }
    ?>

<?php
    include "../includes/footer.php"
?>