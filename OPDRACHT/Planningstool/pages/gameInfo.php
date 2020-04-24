<?php

require "../includes/datalayer.php";

$gameID = $_GET['gameID'];
$id = $_GET['id'];

$getGame = getSpecificGame($gameID);
$getPlannedGame = getSpecificPlannedGame($gameID);

$feedback = "Updaten";

require "../includes/header.php";
?>
    <link rel="stylesheet" href="../resources/css/info.css">
    </head>
    <body>
    <header class="sticky-top">
        <a id="goback" href="../index.php"><i class="fas fa-long-arrow-alt-left"></i> Go back</a>
        <h1 class="">Planningstool</h1>
    </header>

<div class="container">
    <div>
        <div class="detail">
            <div class="left">
                <img class="avatar" src="../resources/images/<?php echo $getGame["image"] ?>">
                <div class="stats" style="background-color: #ffd2ab;">
                    <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fas fa-user-minus"></i></span> Minimum spelers: <?= $getGame['min_players'] ?></li>
                        <li><span class="fa-li"><i class="fas fa-user-plus"></i></span> Maximum spelers: <?= $getGame['max_players'] ?></li>
                        <li><span class="fa-li"><i class="fab fa-google-play"></i></span> Speeltijd: <?= $getGame['play_minutes'] ?> minuten</li>
                        <li><span class="fa-li"><i class="fas fa-user-clock"></i></span> Uitlegtijd: <?= $getGame['explain_minutes'] ?> minuten</li>
                    </ul>
                </div>
            </div>
            <div id="info" class="right">
                <h2 class="gameTitle"><?=  $getGame['name'] ?></h2>
                <div class="gameInfo">
                    <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fas fa-users"></i></span> <?= $getPlannedGame['players']?></li>
                        <li><span class="fa-li"><i class="fas fa-book-reader"></i></span> <?= $getPlannedGame['explainer']?></li>
                        <li><span class="fa-li"><i class="far fa-clock"></i></span> <?= $getPlannedGame['time']?></li>
                    </ul>
                </div>
                <div class="gameDesc">
                    <h5>Description: </h5>
                    <?= $getGame['description'] ?>
                    <h5>Expansions: </h5>
                    <?php
                        if ($getGame['expansions'] != null) {
                            echo $getGame['expansions'];
                        }
                        else {
                            echo "There are currently no expansions for this game.";
                        }
                    ?>
                    <h5>Buy here: </h5>
                    Click<a target="_blank" href="<?= $getGame['url'] ?>"> here </a>to view this products website
                    <h5>Short video: </h5>
                    <?= $getGame['youtube'] ?>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
<?php
require "../includes/footer.php";
?>