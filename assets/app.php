<?php require ("../assets/secret.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "INSERT INTO wea_contact (nom, mail, `message`) VALUES (?, ?, ?)"; 
    $stmt = $db->prepare($sql);
    $stmt -> execute(array($_GET['nom'],$_GET['mail'],$_GET['message']));
    $db = null;

    header('Location: ../contact/contact.php?success=true'); //redirection vers la page contact.php en revoyant succes = true
  } else {
    http_response_code(500);
  }
?>