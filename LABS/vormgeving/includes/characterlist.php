<?php

$result = retrieveCharacters($_POST['type'], $_POST['order']);
$tests = getLocations();

foreach ($result as $item) {
    printf('<a class="item" href="pages/character.php?id=%u&locationID=%u">', $item['id'], $item['location']);
    echo '<div class="left">',
        '<img class="avatar" src="resources/images/' . $item['avatar'] . '">',
    '</div>',
    '<div class="right">',
        '<h2>' . $item['name'] . '</h2>',
    '<div class="stats">',
    '<ul class="fa-ul">',
        '<li><span class="fa-li"><i class="fas fa-heart"></i></span> ' . $item['health'] . '</li>',
        '<li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> ' . $item['attack'] . '</li>',
        '<li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> ' . $item['defense'] . '</li>';

    foreach ($tests as $test) {
        if ($test['id'] == $item['location']) {
            echo '<li><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span> ' . $test['name'] . '</li>';
        }
    }

    echo '</ul>',
         '</div>',
         '</div>',
         '<div class="detailButton"><i class="fas fa-search"></i> bekijk</div>',
         '</a>';
}
?>


<!-- URL Parameters toevoegen voor character pagina -->

