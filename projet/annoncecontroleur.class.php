<?php // td56controleur.class.php 
class Appli
{
    private function formulaire($suivant,
                                $nom = "",
                                $mail_post = "",
                                $sexe = "",
                                $age = "",
                                $prix = "",
                                $ville = "",
                                $nom_race = "",
                                $login = "",
                                $photo = "")
    {
        // Définition du gabarit
        $gab = new Template("./");
        $gab->set_filenames(array("body" => "postera.html"));
        // Assignation des valeurs des champs
        $gab->assign_vars(array("cible" => $_SERVER["PHP_SELF"],
            "suivant" => $suivant,
            "nom" => $nom,
            "mail_post" => $mail_post,
            "sexe" => $sexe,
            "age" => $age,
            "prix" => $prix,
            "ville" => $ville,
            "nom_race" => $nom_race,
            "login" => $login,
            "photo" => $photo));
        // Affichage du gabarit
        $gab->pparse('body');
    }

    public function moteur($accmat)
    {
        if (isset($_GET["suivant"]))
            $action = $_GET["suivant"];
        else $action = "";
        switch ($action) {
            case "form_ajout":
                // Formulaire d'ajout
                $this->formulaire("ajout");
                break;
            case "ajout"; // Ajout
                $accmat->ajouterMatiere(
                    $_GET["nom"],
                    $_GET["mail_post"],
                    $_GET["sexe"],
                    $_GET["age"],
                    $_GET["prix"],
                    $_GET["ville"],
                    $_GET["nom_race"],
                    $_GET["login"],
                    $_GET["photo"]
                );
                $accmat->liste();
                break;
            default:
                // Liste des matières
                $accmat->liste();

                break;
        }
    }
}


?>