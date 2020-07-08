<?php require ("../assets/secret.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_site = NULL;
    if (isset($_POST['nom_site']) AND $_POST['nom_site'] !== NULL) {
        $nom_site = $_POST['nom_site'];
    }
    $email = NULL;
    if (isset($_POST['email']) AND $_POST['email'] !== NULL) {
        $email = $_POST['email'];
    }
    $url_compte_twitter = NULL;
    if (isset($_POST['url_compte_twitter']) AND $_POST['url_compte_twitter'] !== NULL) {
        $url_compte_twitter = $_POST['url_compte_twitter'];
    }
    $stmt_global = $db -> prepare("UPDATE wea_parametre SET titre_site = :nom_site, email = :email, url_compte_twitter = :url_compte_twitter");
    $stmt_global -> execute(array(":nom_site" => $nom_site, ":email" => $email, ":url_compte_twitter" => $url_compte_twitter));

    $titre_presentation = NULL;
    if (isset($_POST['titre_presentation']) AND $_POST['titre_presentation'] !== NULL) {
        $titre_presentation = $_POST['titre_presentation'];
    }
    $texte_presentation = NULL;
    if (isset($_POST['editor-home']) AND $_POST['editor-home'] !== NULL) {
        $texte_presentation = $_POST['editor-home'];
    }
    $stmt_home = $db -> prepare("UPDATE wea_parametre SET titre_home_presentation = :titre_presentation, home_presentation = :texte_presentation");
    $stmt_home -> execute(array(":titre_presentation" => $titre_presentation, ":texte_presentation" => $texte_presentation));

} else {
    http_response_code(500);
}

?>