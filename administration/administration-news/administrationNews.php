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

<body class="bg-light">

    <?php 
        $stmt_news = $db -> prepare("SELECT  id_news, image_id ,url_image, alt, titre_news, date_news, texte_news  FROM wea_news LEFT JOIN wea_image ON wea_news.image_id = wea_image.id_image ORDER BY id_news DESC");
        $stmt_news -> execute();
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
                        <li class="nav-item">
                            <a class="nav-link" href="../administration-home/administrationHome.php">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">News <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../administration-ml/administrationMl.php">Mentions légales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../administration-contact/administrationContact.php">Contact</a>
                        </li>
                    </ul>
                </div>
        </div>
        </nav>
        <div class="shadow-sm p-3 mb-1 bg-white rounded mt-4">
            <h1 class="d-flex justify-content-center">Paramètres de la page News</h1>
        </div>

        <form action="../adminApp.php?form=news_add" method="post">
            <div class="shadow-sm p-3 mb-1 bg-white rounded mt-4">
                <h1 class="d-flex justify-content-center">Ajouter une actualité</h1>

                <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Titre de l'actualité :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="titre_news">
                    </div>
                </div>

                <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Date de l'actualité :</span>
                        </div>
                        <input type="date" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="date_news">
                    </div>
                </div>

                <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Image</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01" name="image">
                            <label class="custom-file-label" for="inputGroupFile01">Choisir votre image</label>
                        </div>
                    </div>
                </div>

                <div class="container shadow-sm p-3  bg-light rounded mt-4">
                    <h1 class="pl-2 input-group-text">Texte :</h1>
                    <div id="editor-news">
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3 ">
                    <button class="btn btn-light shadow-sm">Valider</button>
                </div>
            </div>
        </form>

        <div class="shadow-sm p-3 mb-1 bg-white rounded mt-4 mb-5">
            <h1 class="d-flex justify-content-center">Modifier/supprimer une actualité</h1>
            <?php
                while( $data_news = $stmt_news -> fetch() ) {
                echo('
                <ul class="nav nav-pills shadow-sm rounded mb-3 mt-5 p-2 bg-light" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home-'.$data_news['id_news'].'" role="tab"
                        aria-controls="pills-home" aria-selected="true">Actualité</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile-'.$data_news['id_news'].'" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Modifier</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-danger" href="../adminApp.php?form=news_suppr&id='.$data_news['id_news'].'" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Supprimer</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent1">
                <div class="tab-pane fade show active" id="pills-home-'.$data_news['id_news'].'" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                        <div class="input-group">

                            <div class="container shadow-sm p-3 mb-1 bg-white rounded mt-4" >

                                <img style="float : right;" src="../../'.$data_news['url_image'].'">
                                <h1 id="title-memo-'.$data_news['id_news'].'">'.$data_news['titre_news'].'</h1>
                                <h2 id="date-memo-'.$data_news['id_news'].'">'.$data_news['date_news'].'</h2>
                                <div id="news-'.$data_news['id_news'].'"><p>'.$data_news['texte_news'].'</p></div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile-'.$data_news['id_news'].'" role="tabpanel" aria-labelledby="pills-profile-tab">
                
                
                <form method="POST" action="../adminApp.php?form=news_modif&id_article='.$data_news['id_news'].'">    
                <div class="shadow-sm p-3 mb-1 bg-white rounded mt-4">
                        <h1 class="d-flex justify-content-center">Modifier une actualité</h1>

                        <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Titre de l\'actualité
                                        :</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" name="titre_news_modif" id="text-input-'.$data_news['id_news'].'">
                            </div>
                        </div>

                        <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Date de l\'actualité
                                        :</span>
                                </div>
                                <input type="date" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" name="date_news_modif">
                            </div>
                        </div>

                        <div class="container shadow-sm p-3 mb-1 bg-light rounded mt-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Image</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" name="url_image">
                                    <label class="custom-file-label" for="inputGroupFile01">Choisir votre logo</label>
                                </div>
                            </div>
                        </div>

                        <div class="container shadow-sm p-3  bg-light rounded mt-4">
                            <h1 class="pl-2 input-group-text">Texte :</h1>
                            <div class="editor" id="editor-news-modif-'.$data_news['id_news'].'">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 ">
                        <button class="btn btn-light shadow-sm">Valider</button>
                    </div>

        
                    </div>
                </div>
                </form>
            </div>
        
            ');
        }
            ?>

        </div>


    </div>
    </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../node_modules/trumbowyg/dist/trumbowyg.min.js"></script>
    <script>
        $(function () {
            $('#editor-news').trumbowyg();
            let i = 1;
            $('div').each(function () {
                let newsContent = $(`#news-${i}`).html();
                let title = $(`#title-memo-${i}`).html();
                $(`#text-input-${i}`).attr('value', ''+title+'');
                let date = $(`#date-memo-${i}`).html();
                $(`#date-input-${i}`).attr('value', ''+date+'');
                $(`#editor-news-modif-${i}`).trumbowyg();
                $(`#editor-news-modif-${i}`).trumbowyg(`html`, `${newsContent}`);
     
                i++;
            });
            $('#pills-profile-tab').click(function(){
                $('.editor').trigger('click');
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>