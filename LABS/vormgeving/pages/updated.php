<?php
    require "../includes/datalayer.php";
    updateLocation($_GET['id'], $_GET['charID']);

    require "../includes/header.php";
?>
<header><h1>Location has been updated succesfully</h1></header>

</header>
<div id="container">
    <img src="../resources/images/succes.jpg" alt="Succes!">
<?php
    include "../includes/footer.php";
    header( "refresh:3;url=../index.php");
?>