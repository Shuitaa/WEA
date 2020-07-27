<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'encyclopédie des femmes - Mentions légales</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../assets/app.css">
    <link rel="stylesheet" media="screen and (max-width:940px)" href= ../assets/940app.css>
    <link rel="stylesheet" media="screen and (max-width:600px)" href= ../assets/600app.css>
    <?php require ("../assets/secret.php");?>
</head>

<body>

    <?php 
        $stmt_param = $db -> prepare("SELECT titre_site, url_logo, texte_mentions_legales FROM wea_parametre");
        $stmt_param -> execute();
        $data_param = $stmt_param -> fetch();
    ?>

    <main>
        <div class="container">
            <nav class="nav-menu">
                <div class="nav-menu-content">
                    <a href="../index.php" class="link">Home</a>
                    <a href="../news/news.php" class="link">News</a>
                    <a href="../contact/contact.php" class="link">Contact</a>
                    <a href="" class="page-actuelle">Mentions légales</a>
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
            <h2 class="title title-page">Mentions légales</h2>
            <!-- mt=Mentions légales -->
            <div class="mt-container">
                <div class="mt-content">
                    <?php
                        echo($data_param['texte_mentions_legales']);
                    ?>
                </div>
            </div>

            <footer>
                <div class="footer-content">
                    <div class="footer-content-left">
                        <div>
                            <a href="javascript:window.print();" class="link">Version imprimable</a>
                            <span>|</span>
                            <a href="" class="link">Plan du site</a>
                        </div>
                        <div>
                            <span class="footer-content-left-bottom">© L´Encyclopédie des Femmes</span>
                        </div>
                    </div>
                    <div class="footer-content-right">
                        <a href="../administration/administration.php" class="link">Connexion</a>
                    </div>
                </div>
            </footer>

        </div>
    </main>

    <script src="assets/app.js"></script>
</body>

</html>