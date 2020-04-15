<?php
    require "../includes/datalayer.php";
    require "../includes/header.php";
?>
<header>
    <h1>Een locatie toevoegen</h1>
    <a class="backbutton" href="locations.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a>
</header>
<div id="container">

    <form action="added.php" method="POST">
        <input required name="locationName" class="addInput" type="text" placeholder="Hoe heet uw nieuwe locatie?">
<!--        <span style="color: red;"> * --><?php //echo $locationNameErr ?><!--</span>-->
        <input type="submit" value="Toevoegen">
    </form>

<?php
    include "../includes/footer.php"
?>