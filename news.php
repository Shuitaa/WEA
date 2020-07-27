<!DOCTYPE html>
<html lang="fr">
<?php
require ("assets/function.php");
head('news' ,'front');
?>
<body>

    <?php 
        $stmt_param = $db -> prepare("SELECT titre_site, url_logo, url_compte_twitter FROM wea_parametre");
        $stmt_param -> execute();
        $data_param = $stmt_param -> fetch();

        $stmt_news = $db -> prepare("SELECT  id_news, image_id ,url_image, alt, titre_news, date_news, texte_news  FROM wea_news LEFT JOIN wea_image ON wea_news.image_id = wea_image.id_image ORDER BY id_news DESC");
        $stmt_news -> execute();
    ?>
    
    <main>
        <div class="container">
            <nav class="nav-menu">
                <div class="nav-menu-content">
                    <a href="index.php" class="link">Home</a>
                    <a href="" class="page-actuelle">News</a>
                    <a href="contact.php" class="link">Contact</a>
                    <a href="mentions-legales.php" class="link">Mentions légales</a>
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
            <h2 class="title title-page">News</h2>
            <?php
                if ( $data_param['url_compte_twitter'] !== NULL ){
                echo('<article class="twitter-container">
                        <div class="twitter-content">
                            <a class="twitter-timeline" href="'.$data_param['url_compte_twitter'].'?ref_src=twsrc%5Etfw" data-height="302"data-chrome="noheader nofooter noborders transparent"></a>
                        </div>
                        <div class="media-button">
                            <a href="">Contact</a>
                            <div class="fb-share-button" data-href="https://www.encyclopediedesfemmes.com/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.encyclopediedesfemmes.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>
                        </div>
                </article>');
                            }
            ?>
            <div class="news-container">

                <?php 

                while( $data_news = $stmt_news -> fetch() ) {
                    echo ('
                    <div class="news-content">
                    ');
                    if ($data_news['image_id'] !== NULL) {
                        echo('<div class="news-img-container">
                            <img src="'.$data_news['url_image'].'" alt="'.$data_news['alt'].'" class="news-img">
                        </div>
                        ');
                    }
                    if ($data_news['titre_news'] !== NULL) {
                        echo('
                            <h3 class="subtitle">'.$data_news['titre_news'].'</h3>
                        ');
                    }
                    if ($data_news['date_news'] !== NULL) {
                        echo('
                            <span class="news-date">'.$data_news['date_news'].'</span>
                        ');
                    }
                    if ($data_news['texte_news'] !== NULL) {
                        echo('
                            <div class="news-text">
                                '.$data_news['texte_news'].'
                            </div>
                        ');
                    }
                    echo('
                    </div>');
                    };
                
                ?>
            </div>
            <?php footer(); ?>
            
        </div>
    </main>

    <div id="fb-root"></div>
    <script src="assets/app.js"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v7.0" nonce="IfsXZddd"></script>
</body>
</html>