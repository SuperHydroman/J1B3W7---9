<?php

$result = retrieveSpecificCharacter($id);
$locations = getLocations();

    echo '<header><h1>'.$result['name'].'</h1>',
            '<a class="backbutton" href="../index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a></header>',
        '<div id="container">',
        '<div class="detail">',
            '<div class="left">',
                '<img class="avatar" src="../resources/images/'.$result['avatar'].'">',
                '<div class="stats" style="background-color: '.$result['color'].'">',
                    '<ul class="fa-ul">',
                        '<li><span class="fa-li"><i class="fas fa-heart"></i></span> '.$result['health'].'</li>',
                        '<li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> '.$result['attack'].'</li>',
                        '<li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> '.$result['defense'].'</li>',
                    '</ul>',
                    '<ul class="gear">',
                        '<li><b>Weapon</b>: '.$result['weapon'].'</li>',
                        '<li><b>Armor</b>: '.$result['armor'].'</li>',
                    '</ul>',
                '</div>',
            '</div>',
            '<div class="right">',
                '<p>',
                    $result['bio'],
                '</p>',
                '<form action="updated.php" method="GET">',
                    '<label><b>Huidige Locatie: </b></label>',
                    '<select name="id">';

                    foreach($locations as $location) {
                        echo '<option ';

                        if ($location['id'] === $result['location']) {
                            echo 'selected';
                        }

                        echo ' value="'.$location['id'].'">'.$location['name'].'</option>';
                    }

                    echo '</select>',
                    '<input style="display: none;" name="charID" type="text" value="'.$_GET['id'].'">',
                    '<input type="submit" value="Update">',
                '</form>',
            '</div>',
            '<div style="clear: both"></div>',
        '</div>';