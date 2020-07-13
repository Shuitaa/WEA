<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WEA - ESPACE D'ADMINISTRATION</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../node_modules/trumbowyg/dist/ui/trumbowyg.min.css">
    <?php require ("../../assets/secret.php");?>
</head>
<body  class="bg-light">

    <?php 
            $stmt_param = $db -> prepare("SELECT titre_home_presentation, home_presentation FROM wea_parametre");
            $stmt_param -> execute();
            $data_param = $stmt_param -> fetch();
    ?>

<div class="container">
    <h1 class="shadow-sm p-3 mb-5 bg-white rounded text-center mt-4">Interface d'administration de
        WEA</h1>
    <div class="shadow-sm p-3 mb-5 bg-white rounded text-center mt-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">WEA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../administration.php">Globaux</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../administration-news/administrationNews.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../administration-ml/administrationMl.php">Mentions légales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../administration-contact/administrationContact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <form action="../adminApp.php?form=home" method="POST" enctype="multipart/form-data">
        <div class="shadow-sm p-3 mb-5 bg-white rounded mt-4">
            <h1 class="d-flex justify-content-center">Paramètres de la page Home</h1>
        </div>
        <div class="shadow-sm p-3 mb-5 bg-white rounded mt-4">
            <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Titre de la
                            présentation</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" name="titre_presentation"<?php echo ('value="'.$data_param['titre_home_presentation'].'"'); ?> >
                </div>
            </div>

            <div class="container shadow-sm p-3 mb-5 bg-light rounded mt-4">
                <h1 class="pl-2 input-group-text">Présentation du site :</h1>
                <div id="editor-home">
                </div>

            </div>
            <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Images accueil</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01" multiple name="image[]">
                        <label class="custom-file-label" for="inputGroupFile01">Choisir une/des image(s)</label>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3 ">
                <button class="btn btn-light shadow-sm" id="home">Valider</button>
            </div>
        </div>
        </div>
    </form>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../node_modules/trumbowyg/dist/trumbowyg.min.js"></script>
<?php
    echo("
    <script>
        $(function () {
            $('#editor-home').trumbowyg();
            $('#editor-home').trumbowyg('html', `".$data_param["home_presentation"]."`)
        });
    </script>
    ");
?>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
</body>

</html>