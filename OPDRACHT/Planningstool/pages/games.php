<?php
require "../includes/datalayer.php";

$results = getGames();

require "../includes/header.php";
?>
    </head>
    <body>
    <header class="sticky-top">
        <a id="goback" href="../index.php"><i class="fas fa-long-arrow-alt-left"></i> Go back</a>
        <h1 class="">Planningstool</h1>
    </header>

<div class="container-fluid">
    <div class="row justify-content-center">
        <?php
        foreach ($results as $result) {
            echo '<div class="card col-2" style="width: 18rem;">',
                '<img src="../resources/images/'.$result['image'].'" class="card-img-top" alt="'.$result['name'].'">',
            '<div class="card-body">',
                '<h5 class="card-title">'.$result['name'].'</h5>',
                '<div class="desc">'.$result['description'].'</div>',
                '<a href="add.php?id='.$result['id'].'" class="btn btn-primary">Toevoegen</a>',
            '</div>',
            '</div>';
        }
        ?>
    </div>
<?php
require "../includes/footer.php";
?>