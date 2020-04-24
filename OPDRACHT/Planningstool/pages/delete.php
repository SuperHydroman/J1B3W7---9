<?php

require "../includes/datalayer.php";

$gameID = $_GET['gameID'];
$id = $_GET['id'];

$getGame = getSpecificGame($gameID);
$getPlannedGame = getSpecificPlannedGame($gameID);

$feedback = "Verwijderen";

require "../includes/header.php";

$players = $explainer = $time = $gameID = "";
$playersErr = $explainerErr = $timeErr = $gameIDErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["players"])) {
        $playersErr = "This field is required";
    } else {
        $players = test_input($_POST["players"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z, ]*$/", $players)) {
            $playersErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["explainer"])) {
        $explainerErr = "This field is required";
    } else {
        $explainer = test_input($_POST["explainer"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $explainer)) {
            $explainerErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["time"])) {
        $timeErr = "This field is required";
    } else {
        $time = test_input($_POST["time"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $time)) {
            $timeErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["gameID"])) {
        $gameIDErr = "This field is required";
    } else {
        $gameID = test_input($_POST["gameID"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $gameID)) {
            $gameIDErr = "Only letters and white space allowed";
        }
    }

    if(empty($playersErr) && empty($explainerErr) && empty($timeErr) && empty($gameIDErr)) {
        $feedback = "Successfully deleted!";
        deleteGame($id);
        header("refresh:3;url=../index.php");
    }
    else {
        $feedback = "Oops! Something went wrong!";
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
    <link rel="stylesheet" href="../resources/css/form.css">
    <link rel="stylesheet" href="../resources/css/delete.css">
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
                        <li><span class="fa-li"><i class="fas fa-users"></i></span> Wie doen er mee?</li>
                        <li><span class="fa-li"><i class="fas fa-book-reader"></i></span> Wie legt het spel uit?</li>
                        <li><span class="fa-li"><i class="far fa-clock"></i></span> Hoelaat?</li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <h2 class="gameTitle"><?=  $getGame['name'] ?></h2>
                <h1 class="areUSure">ARE YOU SURE?</h1>
                <div id="form">
                    <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]), "?gameID=".$getPlannedGame['gameID']."&id=".$getPlannedGame['id'];?>">
                        <div class="form-group row">
                            <label for="players" class="col-sm-2 col-form-label">Players</label>
                            <div class="col-sm-10">
                                <input readonly name="players" type="text" class="form-control" id="players" placeholder="Wie spelen er mee?" value="<?= $getPlannedGame['players'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="explainer" class="col-sm-2 col-form-label">Explainer</label>
                            <div class="col-sm-10">
                                <input readonly name="explainer" type="text" class="form-control" id="explainer" placeholder="Wie legt het spel uit?" value="<?= $getPlannedGame['explainer'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-sm-2 col-form-label">Time</label>
                            <div class="col-sm-10">
                                <input readonly name="time" type="time" class="form-control" id="time" placeholder="Hoelaat?" value="<?= $getPlannedGame['time'] ?>">
                            </div>
                        </div>

                        <div class="form-group row d-none">
                            <label for="gameID" class="col-sm-2 col-form-label">gameID</label>
                            <div class="col-sm-10">
                                <input readonly name="gameID" type="text" class="form-control" id="gameID" value="<?= $getPlannedGame['gameID'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary"><?= $feedback ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
<?php
require "../includes/footer.php";
?>