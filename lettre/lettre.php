<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>L'encyclopédie des femmes - <?php echo strtoupper($_GET['lettre']) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../assets/app.css">
    <link rel="stylesheet" media="screen and (max-width:940px)" href= ../assets/940app.css>
    <link rel="stylesheet" media="screen and (max-width:600px)" href= ../assets/600app.css>
    <?php require ("../assets/secret.php");?>
</head>

<body>

    <?php

        $get_lettre = htmlspecialchars($_GET['lettre'],ENT_HTML5);

        if(isset($get_lettre) AND !empty($get_lettre)) {
            $stmt_param = $db -> prepare("SELECT titre_site, url_logo FROM wea_parametre");
            $stmt_param -> execute();
            $data_param = $stmt_param -> fetch();

            $stmt_letter = $db -> prepare("SELECT lettre, description_lettre FROM wea_lettre WHERE lettre = ?");
            $stmt_letter -> execute(array($get_lettre));
            $data_letter = $stmt_letter -> fetch();

            $stmt_mot = $db -> prepare("SELECT mot FROM wea_lettre, wea_mot WHERE id_lettre = lettre_id AND lettre = ?");
            $stmt_mot -> execute(array($get_lettre));
        }
    ?>

    <main>
        <div class="container">
            <nav class="nav-menu">
                <div class="nav-menu-content">
                    <a href="../index.php" class="link">Home</a>
                    <a href="../news/news.php" class="link">News</a>
                    <a href="../contact/contact.php" class="link">Contact</a>
                    <a href="../mentions-legales/mentions-legales.php" class="link">Mentions légales</a>
                </div>
            </nav>
            <header>
                <div class="header-content">
                    <?php
                if( $data_param['url_logo'] !== NULL AND $data_param['titre_site'] !== NULL) {
                     echo('<img src="../'.$data_param['url_logo'].'" alt="logo" class="logo">');
                     echo('<h1 class="titre-home-presentation-left title">'.$data_param['titre_site'].'</h1>');
                } else if( $data_param['url_logo'] === NULL ) {
                      echo('<h1 class="titre-home-presentation-center title">'.$data_param['titre_site'].'</h1>');
                } else if ($data_param['titre_site'] === NULL) {
                    echo('<img src="../'.$data_param['url_logo'].'" alt="logo" class="logo">');
                };
                     ?>
                </div>
            </header>
            <nav class="nav-lettre-container">
                <div class="nav-lettre nav-lettre-content-1">
                    <a href="../lettre/lettre.php?lettre=a" class="lettre link">A</a>
                    <a href="../lettre/lettre.php?lettre=b" class="lettre link">B</a>
                    <a href="../lettre/lettre.php?lettre=c" class="lettre link">C</a>
                    <a href="../lettre/lettre.php?lettre=d" class="lettre link">D</a>
                    <a href="../lettre/lettre.php?lettre=e" class="lettre link">E</a>
                    <a href="../lettre/lettre.php?lettre=f" class="lettre link">F</a>
                    <a href="../lettre/lettre.php?lettre=g" class="lettre link">G</a>
                    <a href="../lettre/lettre.php?lettre=h" class="lettre link">H</a>
                    <a href="../lettre/lettre.php?lettre=i" class="lettre link">I</a>
                    <a href="../lettre/lettre.php?lettre=j" class="lettre link">J</a>
                    <a href="../lettre/lettre.php?lettre=k" class="lettre link">K</a>
                    <a href="../lettre/lettre.php?lettre=l" class="lettre link">L</a>
                    <a href="../lettre/lettre.php?lettre=m" class="lettre link">M</a>
                    <a href="../lettre/lettre.php?lettre=n" class="lettre link">N</a>
                    <a href="../lettre/lettre.php?lettre=o" class="lettre link">O</a>
                    <a href="../lettre/lettre.php?lettre=p" class="lettre link">P</a>
                    <a href="../lettre/lettre.php?lettre=q" class="lettre link">Q</a>
                    <a href="../lettre/lettre.php?lettre=r" class="lettre link">R</a>
                    <a href="../lettre/lettre.php?lettre=s" class="lettre link">S</a>
                    <a href="../lettre/lettre.php?lettre=t" class="lettre link">T</a>
                    <a href="../lettre/lettre.php?lettre=u" class="lettre link">U</a>
                    <a href="../lettre/lettre.php?lettre=v" class="lettre link">V</a>
                    <a href="../lettre/lettre.php?lettre=w" class="lettre link">W</a>
                </div>
                <div class="nav-lettre nav-lettre-content-2">
                    <a href="../lettre/lettre.php?lettre=x" class="lettre link">X</a>
                    <a href="../lettre/lettre.php?lettre=y" class="lettre link">Y</a>
                    <a href="../lettre/lettre.php?lettre=z" class="lettre link">Z</a>
                </div>
            </nav>
            <div class="title-page">
                <h2 class="title "><?php echo strtoupper($data_letter['lettre']) ?></h2>
                <?php
                if($data_letter['description_lettre'] !== NULL ){ 
                    echo('
                        <h3 class="description-lettre">'.$data_letter['description_lettre'].'</h3>
                    ');
                }
                ?>
            </div>
            <div class="list-container">
                <div class="list-content">
                    <ul>
                        <?php
                            while($data_mot = $stmt_mot -> fetch()) { 
                                echo ('<li class="list"><a href="../mot/mot.php?mot='.$data_mot['mot'].'" class="list-a">'.$data_mot['mot'].'</a></li>');
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <footer>
                <div class="footer-content">
                    <div>
                        <div>
                            <a href="javascript:window.print();" class="link">Version imprimable</a>
                            <span>|</span>
                            <a href="" class="link">Plan du site</a>
                        </div>
                        <div>
                            <?php 
                            if($data_param['titre_site'] !== NULL) {
                                echo('<span class="footer-content-left-bottom">© '.$data_param['titre_site'].'</span>');
                            }
                            ?>
                        </div>
                    </div>
                    <div>
                        <a href="../administration/administration.php" class="link">Connexion</a>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <script src="../assets/app.js"></script>
</body>

</html>