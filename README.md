# WEA
Application Web développée par Pierre Averty lors de son stage de première année en DUT MMI à Champs-sur-Marne.
Il s'agit d'un CMS d'une encyclopédie classée par lettre et fondée sur un document Word ajouté par l'utilisateur.
Ce CMS est inspiré du site https://www.encyclopediedesfemmes.com/

## INSTALLATION
Il est nécessaire que votre configuration dispose d'un serveur Apache, d'un serveur MySQL et de PHP (version 7 recommandée) avec la bibliothèque PDO.
Une installation de PhpMyAdmin est recommandée.

1. Renseigner à la ligne 3 du fichier .htaccess le chemin ABSOLU du fichier .htpasswd (https://matricule1902.com/trouver-chemin-absolu/).
2. Dans .htpasswd ajouter l'identifiant de ou des administrateur(s) du site ainsi que son mot de passe chiffré par exemple avec l'outil disponible à l'adresse http://www.infowebmaster.fr/outils/crypter-htpasswd.php (seul le mot de passe doit être crypté), en suivant le modèle :
identifiant:mot_de_passe_chiffré
3. Avec un éditeur de texte, modifier secret.php afin d'indiquer les informations de connexion à votre base de données.
4. Dans PhpMyAdmin, importer le fichier SQL contenu dans le dossier database.
5. Télécharger le dépôt https://github.com/gildas-lormeau/zip.js, ouvrir le fichier ZIP obtenu et extraire son contenu dans le dossier zip.js du dossier zip.js de WEA