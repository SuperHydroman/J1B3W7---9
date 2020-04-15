<?php
require "../includes/datalayer.php";

$id = $_GET['id'];
$getGame = getSpecificGame($id);

require "../includes/header.php";
?>
    <link rel="stylesheet" href="../resources/css/add.css">
</head>
<body>
<header class="sticky-top">
    <h1 class="">Planningstool</h1>
</header>

<div class="container">
    <div>
        <div class="detail">
            <div class="left">
                <img class="avatar" src="../resources/images/spyfall.jpg">
                <div class="stats" style="background-color: #ffd2ab;">
                    <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fas fa-users"></i></span> Wie doen er mee?</li>
                        <li><span class="fa-li"><i class="fas fa-user-shield"></i></span> Wie legt het spel uit?</li>
                        <li><span class="fa-li"><i class="far fa-clock"></i></span> Hoelaat?</li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                    <div class="input">
                        <label for="players"><b>Spelers: </b></label>
                        <input name="players" placeholder="Wie spelen er mee?">
                    </div>

                    <div class="input">
                        <label for="explanator"><b>Uitlegger: </b></label>
                        <input name="explanator" placeholder="Wie legt het spel uit?">
                    </div>

                    <div class="input">
                        <label for="time"><b>Hoelaat: </b></label>
                        <input id="time" name="time" placeholder="Hoelaat?">
                    </div>

                    <div id="submit">
                        <input type="submit" value="Toevoegen">
                    </div>

                </form>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
<?php
require "../includes/footer.php";
?>