<?php require ("../assets/secret.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {;
    $format = array('.jpg','.png','.gif','.jpeg');
    $uploaddir = '../img/';
    if (isset($_FILES['url_logo']) && $_FILES["url_logo"]["error"] === 0) {
        $files_format = '.'. strtolower(substr(strrchr($_FILES['url_logo']['name'], '.'),1));
        $uploadfile = $uploaddir . basename($_FILES['url_logo']['name']);
        if (!in_array($files_format, $format)) {
            echo("Le fichier n'est pas une image");
            die;
        }
        if ( move_uploaded_file($_FILES['url_logo']['tmp_name'], $uploadfile)) {
             $url_logo = 'img/'. basename($_FILES['url_logo']['name']);
         } else {
             echo "Attaque potentielle par téléchargement de fichiers.
                   Voici plus d'informations :\n";
         }
    }
    
    $nb_fichiers = count($_FILES['image']['name']);
    if ($nb_fichiers > 1) {
        for ( $i=0; $i<$nb_fichiers; $i++ ) {
            if (isset($_FILES['image']) && $_FILES["image"]["error"][$i] === 0) {
                $files_format = '.'. strtolower(substr(strrchr($_FILES['image']['name'][$i], '.'),1));
                $uploadfile = $uploaddir . basename($_FILES['image']['name'][$i]);
                if (!in_array($files_format, $format)) {
                    echo("Le fichier n'est pas une image");
                    die;
                }
                if ( move_uploaded_file($_FILES['image']['tmp_name'][$i], $uploadfile)) {
                    $image = 'img/'. basename($_FILES['image']['name'][$i]);
                    $accueil = 0;
                    if (isset($_GET['form']) AND $_GET['form'] === 'home') {
                        $accueil = 1;
                    }
                    echo ("Nom : ".$_FILES['image']['name'][$i]." Url : ".$image." Accueil : ".$accueil);
                    $stmt_image = $db -> prepare("INSERT INTO wea_image(nom, url_image, accueil) VALUES (:nom, :url_image, :accueil)");
                    $stmt_image -> execute(array(":nom" => $_FILES['image']['name'][$i], ":url_image" => $image ,":accueil" => $accueil));
                } else {
                    echo "Attaque potentielle par téléchargement de fichiers.
                        Voici plus d'informations :\n";
                    die;
                }
            }
        }
    }
    if(isset($_GET['form']) AND $_GET['form'] === 'global'){
        $nom_site = NULL;
        if (isset($_POST['nom_site']) AND $_POST['nom_site'] !== '') {
            $nom_site = $_POST['nom_site'];
        }
        $email = NULL;
        if (isset($_POST['email']) AND $_POST['email'] !== '') {
            $email = $_POST['email'];
        }
        $url_compte_twitter = NULL;
        if (isset($_POST['url_compte_twitter']) AND $_POST['url_compte_twitter'] !== '') {
            $url_compte_twitter = $_POST['url_compte_twitter'];
        }
        $stmt_global = $db -> prepare("UPDATE wea_parametre SET titre_site = :nom_site, email = :email, url_compte_twitter = :url_compte_twitter, url_logo = :url_logo");
        $stmt_global -> execute(array(":nom_site" => $nom_site, ":email" => $email, ":url_compte_twitter" => $url_compte_twitter, ":url_logo" => $url_logo));
        header("Location : administration.php");
    }
    if(isset($_GET['form']) AND $_GET['form'] === 'home'){
        $titre_presentation = NULL;
        if (isset($_POST['titre_presentation']) AND $_POST['titre_presentation'] !== '') {
            $titre_presentation = $_POST['titre_presentation'];
        }
        $texte_presentation = NULL;
        if (isset($_POST['editor-home']) AND $_POST['editor-home'] !== '') {
            $texte_presentation = $_POST['editor-home'];
        }
        $stmt_home = $db -> prepare("UPDATE wea_parametre SET titre_home_presentation = :titre_presentation, home_presentation = :texte_presentation");
        $stmt_home -> execute(array(":titre_presentation" => $titre_presentation, ":texte_presentation" => $texte_presentation));
        header("Location : /administration-home/administrationHome.php");
    }
    if(isset($_GET['form']) AND $_GET['form'] === 'news_add'){
        $titre_news = NULL;
        if (isset($_POST['titre_news']) AND $_POST['titre_news'] !== '') {
            $titre_news = $_POST['titre_news'];
        }
        $date_news = NULL;
        if (isset($_POST['date_news']) AND $_POST['date_news'] !== '') {
            $date_news = $_POST['date_news'];
        }
        $texte_news = NULL;
        if (isset($_POST['editor-news']) AND $_POST['editor-news'] !== '') {
            $texte_news = $_POST['editor-news'];
        }
        $stmt_home = $db -> prepare("INSERT INTO wea_news(titre_news, date_news, texte_news) VALUES (:titre_news, :date_news, :texte_news)");
        $stmt_home -> execute(array(":titre_news" => $titre_news, ":date_news" => $date_news, ":texte_news" => $texte_news));
        header("Location : /administration-news/administrationNews.php");
    }
    if(isset($_GET['form']) AND $_GET['form'] === 'news_modif'){
        $id_news = (int) $_GET['id_article'];
        $titre_news_modif = NULL;
        if (isset($_POST['titre_news_modif']) AND $_POST['titre_news_modif'] !== '') {
            $titre_news_modif = $_POST['titre_news_modif'];
        }
        $date_news = NULL;
        if (isset($_POST['date_news_modif']) AND $_POST['date_news_modif'] !== '') {
            $date_news_modif = $_POST['date_news_modif'];
        }
        $texte_news_modif = NULL;
        if (isset($_POST['editor-news-modif-'.$id_news.'']) AND $_POST['editor-news-modif-'.$id_news.''] !== '') {
            $texte_news_modif = $_POST['editor-news-modif-'.$id_news.''];
        }
        echo $titre_news_modif;
        $stmt_home = $db -> prepare("UPDATE wea_news SET titre_news = :titre_news_modif, date_news = :date_news_modif, texte_news = :texte_news_modif WHERE id_news = :id_news");
        $stmt_home -> execute(array(":titre_news_modif" => $titre_news_modif, ":date_news_modif" => $date_news_modif, ":texte_news_modif" => $texte_news_modif, "id_news" => $id_news));
        header("Location : /administration-news/administrationNews.php");
    }
    if(isset($_GET['form']) AND $_GET['form'] === 'ml'){
        $texte_ml = NULL;
        if (isset($_POST['editor-mt']) AND $_POST['editor-mt'] !== '') {
            $texte_ml = $_POST['editor-mt'];
        }
        echo $texte_ml;
        $stmt_home = $db -> prepare("UPDATE wea_parametre SET texte_mentions_legales = :texte_ml");
        $stmt_home -> execute(array(":texte_ml" => $texte_ml));
        header("Location : /administration-ml/administrationMl.php");
    }

} else if(isset($_GET['form']) AND $_GET['form'] === 'news_suppr'){
    $stmt_suppr_article = $db -> prepare("DELETE FROM wea_news WHERE id_news = :id");
    $stmt_suppr_article -> execute(array(":id" => $_GET['id']));
    header("Location : /administration-news/administrationNews.php");
} else {
    http_response_code(500);
}

?>