<?php
require "../includes/datalayer.php";
require "../includes/header.php";
?>
    <header>
        <h1>Een locatie verwijderen</h1>
    </header>
    <div id="container">

    <form action="removed.php" method="GET">
        <h3>Weet u zeker dat u de locatie '<?= $_GET['name'] ?>' wilt verwijderen uit de database?</h3>
        <input style="display: none;" type="text" name="id" value="<?= $_GET['id'] ?>">
        <input style="display: none;" type="text" name="name" value="<?= $_GET['name'] ?>">
        <input type="radio" name="yes">Ja
        <br>
        <input type="radio" name="no">Nee
        <br>
        <br>
        <input type="submit" value="Confirm">
    </form>


<?php



    include "../includes/footer.php"
?>