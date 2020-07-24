<?php require ("../assets/secret.php"); 

    $stmt_lettre_reset = $db -> prepare("TRUNCATE TABLE `wea_lettre`");
    $stmt_mot_reset = $db -> prepare("TRUNCATE TABLE `wea_mot`");
    $stmt_definition_reset = $db -> prepare("TRUNCATE TABLE `wea_definition`");

    $stmt_lettre = $db -> prepare("INSERT INTO wea_lettre(lettre) VALUES (:lettre)");
    $stmt_mot = $db -> prepare("INSERT INTO wea_mot(lettre_id, mot) VALUES (:lettre_id, :mot) ");
    $stmt_definition = $db -> prepare("INSERT INTO wea_definition(mot_id, titre, texte) VALUES (:mot_id, :titre, :texte)");

    $stmt_lettre_reset -> execute();
    $stmt_mot_reset -> execute();
    $stmt_definition_reset -> execute();

    $stmt_lettre -> execute(':lettre' => $_GET('lettre'));
    $stmt_mot -> execute(array(':lettre_id' => $_GET('lettre_id'),':mot' => $_GET('mot')));
    $stmt_definition -> execute(array(':mot_id' => $_GET('mot_id'), ':titre' => $_GET('titre'), ':texte' => $_GET('texte')));

?>