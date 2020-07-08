<?php require ("../assets/secret.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // if ($_GET['nom_site'] === '') {
    //     $stmt_nom_site = $db -> prepare("UPDATE wea_parametre SET titre_site = ?");
    //     $stmt_nom_site -> execute(array(NULL));
    // } else {
    //     $stmt_nom_site = $db -> prepare("UPDATE wea_parametre SET titre_site = ?");
    //     $stmt_nom_site -> execute(array($_GET['nom_site']));
    // }
    // if ($_GET['email'] === '') {
    //     $stmt_nom_site = $db -> prepare("UPDATE wea_parametre SET email = ?");
    //     $stmt_nom_site -> execute(array(NULL));
    // } else {
    //     $stmt_nom_site = $db -> prepare("UPDATE wea_parametre SET email = ?");
    //     $stmt_nom_site -> execute(array($_GET['email']));
    // }
    // if ($_GET['url_compte_twitter'] === '') {
    //     $stmt_nom_site = $db -> prepare("UPDATE wea_parametre SET url_compte_twitter = ?");
    //     $stmt_nom_site -> execute(array(NULL));
    // } else {
    //     $stmt_nom_site = $db -> prepare("UPDATE wea_parametre SET url_compte_twitter = ?");
    //     $stmt_nom_site -> execute(array($_GET['url_compte_twitter']));
    // }

    // if ($_GET['titre_presentation'] === '') {
    //     $stmt_nom_site = $db -> prepare("UPDATE wea_parametre SET titre_home_presentation = ?");
    //     $stmt_nom_site -> execute(array(NULL));
    // } else {
    //     $stmt_nom_site = $db -> prepare("UPDATE wea_parametre SET titre_home_presentation = ?");
    //     $stmt_nom_site -> execute(array($_GET['titre_presentation']));
    // }
    // if ($_GET['editor-home'] === '') {
    //     $stmt_nom_site = $db -> prepare("UPDATE wea_parametre SET home_presentation = ?");
    //     $stmt_nom_site -> execute(array(NULL));
    // } else {
    //     $stmt_nom_site = $db -> prepare("UPDATE wea_parametre SET home_presentation = ?");
    //     $stmt_nom_site -> execute(array($_GET['editor-home']));
    // }

    $nom_site = $_POST['nom_site'];
    echo $nom_site;
    $stmt_nom_site = $db -> prepare("UPDATE wea_parametre SET titre_site = :nom_site");
    if (isset($_POST['nom_site']) AND $_POST['nom_site'] === NULL) {
        $stmt_nom_site -> execute(array(":nom_site" => NULL));
    } else {
        $stmt_nom_site -> execute(array(":nom_site" => $nom_site));
    }

} else {
    http_response_code(500);
}

?>