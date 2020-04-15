<?php
    require "../includes/datalayer.php";
    addLocation($_POST['locationName']);

    require "../includes/header.php";
?>
    <header>
        <h1>Locatie succesvol toegevoegd!</h1>
    </header>
    <div id="container">
        <img src="../resources/images/succes.jpg" alt="succes">

<?php
    include "../includes/footer.php";
    header("refresh:3;url=locations.php");
?>