<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'encyclopédie des femmes - Contact</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/app.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <? require "assets/secret.php" ?>
</head>
<body>
    
    <main>
        <div class="container">
            <nav class="nav-menu">
                <div class="nav-menu-content">
                    <a href="../index.php">Home</a>
                    <a href="../news/news.php">News</a>
                    <a href=""  class="page-actuelle">Contact</a>
                    <a href="../mentions-legales/mentions-legales.php">Mentions légales</a>
                </div>
            </nav>
            <header>
                <div class="header-content">
                    <img src="../img/logo.jpg" alt="logo" class="logo">
                    <h1 class="titre-home-presentation title">L'encyclopédie des femmes</h1>
                </div>
            </header>
            <nav class="nav-lettre-container">
                <div class="nav-lettre nav-lettre-content-1">
                    <a href="" class="lettre">A</a>
                    <a href="" class="lettre">B</a>
                    <a href="" class="lettre">C</a>
                    <a href="" class="lettre">D</a>
                    <a href="" class="lettre">E</a>
                    <a href="" class="lettre">F</a>
                    <a href="" class="lettre">G</a>
                    <a href="" class="lettre">H</a>
                    <a href="" class="lettre">I</a>
                    <a href="" class="lettre">J</a>
                    <a href="" class="lettre">K</a>
                    <a href="" class="lettre">L</a>
                    <a href="" class="lettre">M</a>
                    <a href="" class="lettre">N</a>
                    <a href="" class="lettre">O</a>
                    <a href="" class="lettre">P</a>
                    <a href="" class="lettre">Q</a>
                    <a href="" class="lettre">R</a>
                    <a href="" class="lettre">S</a>
                    <a href="" class="lettre">T</a>
                    <a href="" class="lettre">U</a>
                    <a href="" class="lettre">V</a>
                    <a href="" class="lettre">W</a>
                </div>
                <div class="nav-lettre nav-lettre-content-2">
                    <a href="" class="lettre">X</a>
                    <a href="" class="lettre">Y</a>
                    <a href="" class="lettre">Z</a>
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
                            <a href="javascript:window.print();">Version imprimable</a>
                            <span>|</span>
                            <a href="">Plan du site</a>
                        </div>
                        <div>
                            <span class="footer-content-left-bottom">© L´Encyclopédie des Femmes</span>
                        </div>
                    </div>
                    <div class="footer-content-right">
                        <a href="">Connexion</a>
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