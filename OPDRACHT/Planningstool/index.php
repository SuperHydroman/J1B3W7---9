<?php
    require "includes/datalayer.php";

    $results = getPlannedGames();

    require "includes/header.php";
?>
</head>
<body>
    <header class="sticky-top">
        <h1 class="">Planningstool</h1>
        <a id="addNew" class="addbutton" href="pages/games.php"><i class="far fa-plus-square"></i> Toevoegen</a>
    </header>

<div class="container-fluid">
    <div class="row justify-content-center">
        <?php

        foreach ($results as $result) {
            $game = getSpecificGame($result['gameID']);
            echo '<div class="card col-2" style="width: 18rem;">',
                '<a href="pages/gameInfo.php?gameID='.$game['id'].'&id='.$result['id'].'"><i id="infoIcon" class="fas fa-info-circle"></i></a>',
                '<img src="resources/images/'.$game['image'].'" class="card-img-top" alt="'.$game['name'].'">',
            '<div class="card-body">',
                '<h5 class="card-title">'.$game['name'].'</h5>',
                '<div class="desc" style="height: 95px!important;">',
                    '<ul class="fa-ul pl-0">',
                        '<li><span class="fa-li"><i class="fas fa-users"></i></span> '.$result['players'].'</li>',
                        '<li><span class="fa-li"><i class="fas fa-book-reader"></i></span> '.$result['explainer'].'</li>',
                        '<li><span class="fa-li"><i class="far fa-clock"></i></span> '.$result['time'].' uur</li>',
                        '<li><span class="fa-li"><i class="fab fa-google-play"></i></span> '.$game['play_minutes'].' minuten</li>',
                    '</ul>',
                '</div>',
                '<a href="pages/update.php?gameID='.$game['id'].'&id='.$result['id'].'" class="btn btn-primary">Bewerken</a>',
                '<a href="pages/delete.php?gameID='.$game['id'].'&id='.$result['id'].'" class="btn btn-primary float-right">Verwijderen</a>',
            '</div>',
            '</div>';
        }
        ?>
    </div>
<?php
    require "includes/footer.php";
?>