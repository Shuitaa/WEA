<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'encyclopédie des femmes - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/app.css">
    <?php $db = new PDO ("mysql:host=localhost;dbname=wea_demo_db", "root", "" , array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));?>
</head>
<body>

    <?php
        $stmt_param = $db -> prepare("SELECT titre_site, url_logo, titre_home_presentation, home_presentation FROM wea_parametre");
        $stmt_param -> execute();
        $data_param = $stmt_param -> fetch();

        $stmt_img = $db -> prepare("SELECT * FROM wea_image WHERE accueil=1");
        $stmt_img -> execute();

    ?>

    <main>
        <div class="container">
            <nav class="nav-menu">
                <div class="nav-menu-content">
                    <a href="" class="page-actuelle">Home</a>
                    <a href="news/news.php" class="link">News</a>
                    <a href="contact/contact.php" class="link">Contact</a>
                    <a href="mentions-legales/mentions-legales.php" class="link">Mentions légales</a>
                </div>
            </nav>
            <header>
                <div class="header-content">
                <?php
                    echo('<img src="'.$data_param['url_logo'].'" alt="logo" class="logo">');
                     echo('<h1 class="titre-home-presentation title">'.$data_param['titre_site'].'</h1>');
                     ?>
                </div>
            </header>
            <nav class="nav-lettre-container">
                <div class="nav-lettre nav-lettre-content-1">
                    <a href="" class="lettre link">A</a>
                    <a href="" class="lettre link">B</a>
                    <a href="" class="lettre link">C</a>
                    <a href="" class="lettre link">D</a>
                    <a href="" class="lettre link">E</a>
                    <a href="" class="lettre link">F</a>
                    <a href="" class="lettre link">G</a>
                    <a href="" class="lettre link">H</a>
                    <a href="" class="lettre link">I</a>
                    <a href="" class="lettre link">J</a>
                    <a href="" class="lettre link">K</a>
                    <a href="" class="lettre link">L</a>
                    <a href="" class="lettre link">M</a>
                    <a href="" class="lettre link">N</a>
                    <a href="" class="lettre link">O</a>
                    <a href="" class="lettre link">P</a>
                    <a href="" class="lettre link">Q</a>
                    <a href="" class="lettre link">R</a>
                    <a href="" class="lettre link">S</a>
                    <a href="" class="lettre link">T</a>
                    <a href="" class="lettre link">U</a>
                    <a href="" class="lettre link">V</a>
                    <a href="" class="lettre link">W</a>
                </div>
                <div class="nav-lettre nav-lettre-content-2">
                    <a href="" class="lettre link">X</a>
                    <a href="" class="lettre link">Y</a>
                    <a href="" class="lettre link">Z</a>
                </div>
            </nav>
            <section class="img-container">
                <div class="img-content">
                    <?php 
                        while ($data_img = $stmt_img -> fetch()) {
                            echo ('<img class="img" alt="'.$data_img['alt'].'" src="'.$data_img['url_image'].'">');
                        }
                    
                    ?>
                </div>
            </section>
            <div class="home-presentation-container">
                <div class="home-presentation-content">
                    <?php echo('<h3 class="subtitle home-presentation-subtitle">'.$data_param['titre_home_presentation'].'</h3>'); 
                    echo('<span class="text home-presentation-text">
                            '.$data_param['home_presentation'].'
                          </span>');
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
                            <?php echo('<span class="footer-content-left-bottom">© '.$data_param['titre_site'].'</span>');?>
                        </div>
                    </div>
                    <div class="footer-content-right">
                        <a href="" class="link">Connexion</a>
                    </div>
                </div>
            </footer>

        </div>
    </main>

    <script src="assets/app.js"></script>
</body>
</html>