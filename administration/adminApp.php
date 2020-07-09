<?php require ("../assets/secret.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
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
        $stmt_global = $db -> prepare("UPDATE wea_parametre SET titre_site = :nom_site, email = :email, url_compte_twitter = :url_compte_twitter");
        $stmt_global -> execute(array(":nom_site" => $nom_site, ":email" => $email, ":url_compte_twitter" => $url_compte_twitter));
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

} else if(isset($_GET['form']) AND $_GET['form'] === 'news_suppr'){
    $stmt_suppr_article = $db -> prepare("DELETE FROM wea_news WHERE id_news = :id");
    $stmt_suppr_article -> execute(array(":id" => $_GET['id']));
} else {
    http_response_code(500);
}

?>