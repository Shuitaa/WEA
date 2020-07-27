<!DOCTYPE html>
<html lang="en">

<?php
require ("assets/function.php");
head('mentions-légales' ,'front');
?>

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
                    <a href="index.php" class="link">Home</a>
                    <a href="news.php" class="link">News</a>
                    <a href="contact.php" class="link">Contact</a>
                    <a href="" class="page-actuelle">Mentions légales</a>
                </div>
            </nav>
            <header>
                <div class="header-content">
                <?php
                if( $data_param['url_logo'] !== NULL AND $data_param['titre_site'] !== NULL) {
                     echo('<img src="'.$data_param['url_logo'].'" alt="logo" class="logo">');
                     echo('<h1 class="titre-home-presentation-left title">'.$data_param['titre_site'].'</h1>');
                } else if( $data_param['url_logo'] === NULL ) {
                      echo('<h1 class="titre-home-presentation-center title">'.$data_param['titre_site'].'</h1>');
                } else if ($data_param['titre_site'] === NULL) {
                    echo('<img src="'.$data_param['url_logo'].'" alt="logo" class="logo">');
                };
                     ?>
                </div>
            </header>
            <nav class="nav-lettre-container">
                <div class="nav-lettre nav-lettre-content-1">
                    <a href="lettre.php?lettre=a" class="lettre link">A</a>
                    <a href="lettre.php?lettre=b" class="lettre link">B</a>
                    <a href="lettre.php?lettre=c" class="lettre link">C</a>
                    <a href="lettre.php?lettre=d" class="lettre link">D</a>
                    <a href="lettre.php?lettre=e" class="lettre link">E</a>
                    <a href="lettre.php?lettre=f" class="lettre link">F</a>
                    <a href="lettre.php?lettre=g" class="lettre link">G</a>
                    <a href="lettre.php?lettre=h" class="lettre link">H</a>
                    <a href="lettre.php?lettre=i" class="lettre link">I</a>
                    <a href="lettre.php?lettre=j" class="lettre link">J</a>
                    <a href="lettre.php?lettre=k" class="lettre link">K</a>
                    <a href="lettre.php?lettre=l" class="lettre link">L</a>
                    <a href="lettre.php?lettre=m" class="lettre link">M</a>
                    <a href="lettre.php?lettre=n" class="lettre link">N</a>
                    <a href="lettre.php?lettre=o" class="lettre link">O</a>
                    <a href="lettre.php?lettre=p" class="lettre link">P</a>
                    <a href="lettre.php?lettre=q" class="lettre link">Q</a>
                    <a href="lettre.php?lettre=r" class="lettre link">R</a>
                    <a href="lettre.php?lettre=s" class="lettre link">S</a>
                    <a href="lettre.php?lettre=t" class="lettre link">T</a>
                    <a href="lettre.php?lettre=u" class="lettre link">U</a>
                    <a href="lettre.php?lettre=v" class="lettre link">V</a>
                    <a href="lettre.php?lettre=w" class="lettre link">W</a>
                </div>
                <div class="nav-lettre nav-lettre-content-2">
                    <a href="lettre.php?lettre=x" class="lettre link">X</a>
                    <a href="lettre.php?lettre=y" class="lettre link">Y</a>
                    <a href="lettre.php?lettre=z" class="lettre link">Z</a>
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

            <?php footer();?>

        </div>
    </main>


</body>

</html>