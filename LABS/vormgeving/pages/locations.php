<?php
    require "../includes/datalayer.php";

    $amount = getLocationAmount();
    $locations = getLocations();

    require "../includes/header.php";
?>
<header>
    <h1>Alle <?= $amount['AMOUNT'] ?> locations uit de database</h1>
    <a class="backbutton" href="../index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a>
    <a class="addbutton" href="add.php"><i class="far fa-plus-square"></i> Toevoegen</a>
</header>

<div id="container">
    <table>
        <tr>
            <th>LOCATIONS: </th>
        </tr>
        <?php

            foreach($locations as $location) {
                echo '<tr>',
                        '<td>'.$location['name'].' <a href="remove.php?id='.$location['id'].'&name='.$location['name'].'"><i style="float: right; padding: 0px 10px 0px 0px;" class="fas fa-trash-alt"></i></a></td>',
                     '</tr>';
            }

        ?>
    </table>

<?php
    include "../includes/footer.php"
?>

