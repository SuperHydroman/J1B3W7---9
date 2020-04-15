<?php
    require "includes/datalayer.php";
    $amount = getCharAmount();
//    $results = retrieveCharacters("name", "ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<header>
    <h1>Alle <?= $amount['AMOUNT'] ?> characters uit de database</h1>
    <a class="locationsbutton" href="pages/locations.php"><i class="fas fa-map-marker-alt"></i> Locaties</a>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="type">Sorteer alle <?= $amount['AMOUNT'] ?> characters uit de database op </label>
        <select name="type" id="type">
            <option selected value="name">Naam</option>
            <option value="health">Levenskracht</option>
            <option value="attack">Aanvalskracht</option>
            <option value="defense">Verdediging</option>
        </select>
        <select name="order">
            <option selected value="ASC">van laag naar hoog</option>
            <option value="DESC">van hoog naar laag</option>
        </select>
        <input type="submit" value="Go!">
    </form>

</header>

<div id="container">
<?php
    include "includes/characterlist.php";
    include "includes/footer.php";
?>


