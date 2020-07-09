<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WEA - ESPACE D'ADMINISTRATION</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../node_modules/trumbowyg/dist/ui/trumbowyg.min.css">
    <?php require ("../assets/secret.php");?>
</head>

<body class="bg-light">

    <?php 
                $stmt_param = $db -> prepare("SELECT titre_site, email, url_compte_twitter FROM wea_parametre");
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
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Globaux <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="administration-home/administrationHome.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="administration-news/administrationNews.php">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="administration-ml/administrationMl.php">Mentions légales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="administration-contact/administrationContact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <form action="adminApp.php?form=global" method="POST">
            <div class="shadow-sm p-3 mb-5 bg-white rounded mt-4">
                <h1 class="d-flex justify-content-center">Paramètres globaux</h1>
            </div>
            <div class="shadow-sm p-3 mb-5 bg-white rounded mt-4">
                <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Nom du site</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="nom_site" <?php echo ('value="'.$data_param['titre_site'].'"');?>>
                    </div>
                </div>

                <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Logo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01" name="url_logo">
                            <label class="custom-file-label" for="inputGroupFile01">Choisir votre logo</label>
                        </div>
                    </div>
                </div>

                <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Adresse Mail</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="email" <?php echo ('value="'.$data_param['email'].'"'); ?>>
                    </div>
                </div>

                <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">URL compte twitter</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="url_compte_twitter" <?php echo ('value="'.$data_param['url_compte_twitter'].'"'); ?>>
                    </div>
                </div>

                <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Token reCaptcha</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="url_captcha">
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3 ">
                    <button class="btn btn-light shadow-sm">Valider</button>
                </div>

            </div>
            </div>
        </form>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>