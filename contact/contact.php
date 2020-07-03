<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'encyclopédie des femmes - Contact</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/app.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <?php require ("../assets/secret.php");?>
</head>
<body>

    <?php 
        $stmt_param = $db -> prepare("SELECT titre_site, url_logo FROM wea_parametre");
        $stmt_param -> execute();
        $data_param = $stmt_param -> fetch();
    ?>
    
    
    <main>
        <div class="container">
            <nav class="nav-menu">
                <div class="nav-menu-content">
                    <a href="../index.php" class="link">Home</a>
                    <a href="../news/news.php" class="link">News</a>
                    <a href=""  class="page-actuelle">Contact</a>
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
            <h2 class="title title-page">Contact</h2>
            <div class="form-container">
                    <form action="" method="GET" class="form-content">
                        <label for="nom" class="subtitle label">Nom *</label>
                        <input type="text" name="nom" id="nom" required class="form-input input">
                        <label for="mail" class="subtitle label">Adresse Email *</label>
                        <input type="text" name="mail" id="mail" required class="form-input input">
                        <label for="message" class="subtitle label">Message *</label>
                        <textarea name="message" id="message" cols="50" rows="100" class="form-input textarea"></textarea>
                        <!-- <button class="g-recaptcha" data-sitekey="6Ld_i6wZAAAAAGkBmrKQiwm4kSKIDqlybpZgHcqp" data-callback='onSubmit'
                            data-action='submit'>Submit</button> -->
                        <button class="form-button subtitle">ENVOYER</button>
                    </form>
                
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
                        <a href="" class="link">Connexion</a>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <script src="../assets/app.js"></script>
    <script>
        function onSubmit(token) {
          document.getElementById("demo-form").submit();
        }
      </script>
</body>
</html>