<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>L'encyclopédie des femmes - <?php echo strtoupper($_GET['mot']) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../assets/app.css">
    <link rel="stylesheet" media="screen and (max-width:940px)" href= ../assets/940app.css>
    <link rel="stylesheet" media="screen and (max-width:600px)" href= ../assets/600app.css>
    <?php require ("../assets/secret.php");?>
</head>

<body>

    <?php

    $get_mot = htmlspecialchars($_GET['mot'],ENT_HTML5);

    if(isset($get_mot) AND !empty($get_mot)) {
        $stmt_param = $db -> prepare("SELECT titre_site, url_logo FROM wea_parametre");
        $stmt_param -> execute();
        $data_param = $stmt_param -> fetch();

        $stmt_mot = $db -> prepare("SELECT id_mot, lettre_id, mot, `description` FROM wea_mot WHERE mot = ?");
        $stmt_mot -> execute(array($get_mot));
        $data_mot = $stmt_mot -> fetch();

        $stmt_definition = $db -> prepare("SELECT titre, texte, source, commentaire FROM wea_definition, wea_mot WHERE id_mot = mot_id AND mot = ?");
        $stmt_definition -> execute(array($get_mot));
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
                <h2 class="title "><?php echo $data_mot['mot'] ?></h2>
                <?php
                if($data_mot['description'] !== NULL ){ 
                    echo('
                        <h3 class="description-lettre">'.$data_mot['description'].'</h3>
                    ');
                }
                ?>
            </div>
            <div class="list-container definition">
                    <ul>
                        <?php
                            while($data_definition = $stmt_definition -> fetch()) { 
                                echo ('
                                    <div class="defintion-container">');
                                            if($data_definition['titre'] !== NULL) {
                                                echo('
                                                <div class="definition-title-container">
                                                    <h2 class="definition-title">'.$data_definition['titre'].'</h2>
                                                </div>
                                                ');
                                            }
                                            if($data_definition['texte'] !== NULL){
                                                echo('
                                                <p class="definition-text">'.$data_definition['texte'].'</p>
                                                ');
                                            }
                                            if($data_definition['source'] !== NULL){
                                                echo('
                                                    <p class="definition-source">'.$data_definition['source'].'</p>
                                                ');
                                            }
                                            if($data_definition['commentaire'] !== NULL){
                                                echo('
                                                    <p class="definition-comment">'.$data_definition['commentaire'].'</p>
                                                ');
                                            }
                                            echo('
                                    </div>
                                ');
                            }
                        ?>
                    </ul>
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
                        <a href="" class="link">Connexion</a>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <script src="../assets/app.js"></script>
</body>

</html>