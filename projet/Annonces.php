<?php // td56.php    

require("connect.inc.php");
require("template.class.php");
require("Annonces.class.php");
require("annoncecontroleur.class.php");

try {
    // Connexion
    $c = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
    $c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $c->exec("set names utf8");
    // Moteur de l'application

    $accmat = new AccesMatiere($c);
    $appli = new Appli($c);
    $appli->moteur($accmat);

} catch (PDOException $erreur) {
    echo "<p>Erreur : " . $erreur->getMessage() . "</p>\n";
}

?>