<!DOCTYPE html> <!--  -->
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="Author" content="Jérôme Darmont"/>
    <meta name="Keywords" content="Programmation,Web,PHP,MariaDB"/>
    <meta name="Description" content="PHPobjet Base de données Templates"/>
    <title>Interrogation de base de données</title>
    <link rel="stylesheet" type="text/css" href="tableau.css"/>
</head>
<body>
<?php
require("connect.inc.php");
require("Annonces.class.php");
try {
    // Connexion
    $c = new PDO("mysql:host=$host;dbname=$dbname", $login,
        $password);
    echo "<p>Connexion réussie.</p>\n";
    $c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Liste des matières
    $qmat = new Requete($c,
        "annonce",
        "SELECT * FROM annonce N, user U, race R WHERE U.id_user = N.id_user AND N.id_race = R.id_race",
        array("id_annonce", "nom", "mail_post", "sexe", "age", "prix", "ville", "id_race", "id_user")
    );
    $qmat->executer();
    $qmat->afficherTab();

} catch (PDOException $erreur) {
    echo "<p>Erreur : " . $erreur->getMessage() . "</p>\n";
}
?>
<p>Validation <a href="http://validator.w3.org/check/referer">HTML</a> |
    <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a></p>
</body>
</html> 

