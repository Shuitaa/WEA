<?php
require ("secret.php");
function head($nomPage ,$typePage) {
    global $db;
    $stmt_param = $db -> prepare("SELECT titre_site, url_logo, titre_home_presentation, home_presentation FROM wea_parametre");
    $stmt_param -> execute();
    $data_param = $stmt_param -> fetch();

    if($typePage === 'front') {
        echo ("
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>".$data_param["titre_site"]." - ".$nomPage."</title>
            <link href='https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400;1,500&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='assets/app.css'>
            <link rel='stylesheet' media='screen and (max-width:940px)' href= 'assets/940app.css'>
            <link rel='stylesheet' media='screen and (max-width:600px)' href= 'assets/600app.css'>
        </head>
        ");

    }
}
function footer() {
    echo("
    <footer>
    <div class='footer-content'>
        <div class='footer-content-left'>
            <div>
                <a href='javascript:window.print();' class='link'>Version imprimable</a>
                <span>|</span>
                <a href='' class='link'>Plan du site</a>
            </div>
            <div>
                <span class='footer-content-left-bottom'>© ".$data_param["titre_site"]."</span>
            </div>
        </div>
        <div class='footer-content-right'>
            <a href='administration/administration.php' class='link'>Connexion</a>
        </div>
    </div>
    </footer>
    ");
}
?>