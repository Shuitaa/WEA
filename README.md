# WEA
Application Web développée par Pierre Averty lors de son stage de première année en DUT MMI à Champs-sur-marne.
Il s'agit d'un CMS d'une encyclopédie classée par lettre fondée sur un document Word ajouté par l'utilisateur.

## INSTALLATION

Il est nécessaire que votre configuration dispose d'un serveur Apache, un serveur MySQL et d'une installation PHPMyAdmin.

1. Renseigner à la ligne 3 du fichier .htaccess le chemin ABSOLU du fichier .htpasswd (https://matricule1902.com/trouver-chemin-absolu/).
2. Dans .htpasswd ajouter l'identifiant de ou des administrateur(s) du site ainsi que son mot de passe CRYPTÉ (http://www.infowebmaster.fr/outils/crypter-htpasswd.php) (seul le mot de passe doit être crypté) suivant le model :
login:motDePasseCrypté
3. Avec un éditeur de texte, modifier secret.php afin de le relier à votre base de données.
4. Dans PHPMyAdmin, importer le fichier SQL contenu dans le dossier database.