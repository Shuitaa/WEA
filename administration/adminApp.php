<?php require ("../assets/secret.php");
    chmod('../img', 0777);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {;
    // print_r($_FILES);
    // move_uploaded_file($_FILES['url_logo']['tmp_name'], '../img/'.$_FILES['url_logo']['name']);
    // echo $_FILES['url_logo']['tmp_name'], '../img/'.$_FILES['url_logo']['name'];
    $uploaddir = '../img/';
    $uploadfile = $uploaddir . basename($_FILES['url_logo']['name']);
    $verif = $_FILES['url_logo']['tmp_name'];
    var_dump ($verif);
    $url_logo = NULL;
    if ( move_uploaded_file($_FILES['url_logo']['tmp_name'], $uploadfile)) {
        echo "Le fichier est valide, et a été téléchargé
               avec succès. Voici plus d'informations :\n";
        $url_logo = 'img/'. basename($_FILES['url_logo']['name']);
    } else {
        echo "Attaque potentielle par téléchargement de fichiers.
              Voici plus d'informations :\n";
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
        echo("cc ".$url_logo);
        $stmt_global = $db -> prepare("UPDATE wea_parametre SET titre_site = :nom_site, email = :email, url_compte_twitter = :url_compte_twitter, url_logo = :url_logo");
        $stmt_global -> execute(array(":nom_site" => $nom_site, ":email" => $email, ":url_compte_twitter" => $url_compte_twitter, ":url_logo" => $url_logo));
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
       
    }
    if(isset($_GET['form']) AND $_GET['form'] === 'ml'){
        $texte_ml = NULL;
        if (isset($_POST['editor-mt']) AND $_POST['editor-mt'] !== '') {
            $texte_ml = $_POST['editor-mt'];
        }
        echo $texte_ml;
        $stmt_home = $db -> prepare("UPDATE wea_parametre SET texte_mentions_legales = :texte_ml");
        $stmt_home -> execute(array(":texte_ml" => $texte_ml));
    }

} else if(isset($_GET['form']) AND $_GET['form'] === 'news_suppr'){
    $stmt_suppr_article = $db -> prepare("DELETE FROM wea_news WHERE id_news = :id");
    $stmt_suppr_article -> execute(array(":id" => $_GET['id']));
} else {
    http_response_code(500);
}

?>