<?php
session_start();

?>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HotDogs</title>

    <link rel="stylesheet" type="text/css" media="screen" href="css/coolblue.css"/>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.6.1.min.js"><\/script>')</script>

    <script src="js/scrollToTop.js"></script>

</head>

<body id="top">
<!--header -->
<div id="header-wrap">
    <header>

        <hgroup>
            <h1>Trouvez un partenaire pour votre chien</h1>
        </hgroup>

        <nav>
            <ul>
                <li><a href="index.php">Accueil</a><span></span></li>
                <li id="current"><a href="Connexion.php">Connexion</a><span></span></li>
                <li><a href="Annonces.php">Annonces</a><span></span></li>
                <li><a href="contact.php">Nous contacter</a><span></span></li>
            </ul>
        </nav>


        <!--/header-->
    </header>
</div>

<!-- content-wrap -->
<div id="content-wrap">

    <!-- content -->
    <div id="content" class="clearfix">

        <!-- main -->
        <div id="main">

            <article class="post">

                <div class="primary">


                    <div class="image-section">
                        <img src="images/hero-bg.jpg" alt="image post" height="206" width="498"/>


            </article>


        </div>


        <div id="main">

            <!-- Vérifie que l'on est connecté sinon, message d'erreur Vérifie que tous les champs sont remplis Transfert de la photo dans le dossier photo Insert le nom de la race dans race puis efface les doublons dans race (le même nom de race prenait des id différents)
        Insertion de tous les champs dans la table annonce en récupérant le login et le nom de la race dans les tables correspondantes. -->

            <?php
            if (isset($_SESSION["login"]) AND
                $_SESSION["login"] != "") {

                $connexion = mysqli_connect("localhost", "root", "", "hotdog");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect:" . mysqli_connect_error();
                }

                if ((!empty($_POST["nom"])) and (!empty($_POST["mail_post"])) and (!empty($_POST["nom_race"])) and (!empty($_POST["sexe"])) and (!empty($_POST["ville"]))) {
                    $nom = mysqli_real_escape_string($connexion, $_POST["nom"]);    //Utilisation de "mysqli_real_escape_string" pour plus de sécurité.
                    $mail_post = mysqli_real_escape_string($connexion, $_POST["mail_post"]);
                    $nom_race = mysqli_real_escape_string($connexion, $_POST["nom_race"]);
                    $sexe = mysqli_real_escape_string($connexion, $_POST["sexe"]);
                    $age = $_POST["age"];
                    $prix = $_POST["prix"];
                    $ville = mysqli_real_escape_string($connexion, $_POST["ville"]);
                    $login = $_SESSION["login"];

                    if ($_FILES['photo']['error'] > 0) {
                        echo 'erreur';
                    }

                    if (isset($_FILES['photo']['name']) && ($_FILES['photo']['error'] == UPLOAD_ERR_OK)) {
                        $chemin_destination = 'photo/';
                        move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_destination . $_FILES['photo']['name']);
                    }

                    $req = 'INSERT INTO race(nom_race) VALUES ("' . $nom_race . '")';
                    mysqli_query($connexion, $req);

                    $req3 = 'DELETE FROM race WHERE id_race NOT IN (SELECT MIN(id_race) FROM (SELECT * FROM race) AS something
 GROUP BY nom_race)';
                    mysqli_query($connexion, $req3);

                    $req2 = 'INSERT INTO annonce(nom, mail_post, sexe, age, prix, ville, id_race, id_user, photo) VALUES ("' . $nom . '", "' . $mail_post . '", "' . $sexe . '", "' . $age . '","' . $prix . '", "' . $ville . '", (SELECT id_race FROM race  WHERE 
nom_race = "' . $nom_race . '"), (SELECT id_user FROM user  WHERE login = "' . $login . '"), "' . $_FILES['photo']['name'] . '")';
                    mysqli_query($connexion, $req2);

                    Echo 'Annonce bien envoyée';
                    echo $req2;
                    mysqli_close($connexion);
                } else {
                    echo 'vous devez remplir tous les champs';
                }
            } else {
                echo 'vous devez vous connecter';
            }


            ?>


            <!-- /main -->
        </div>


        <!-- content -->
    </div>

    <!-- /content-out -->
</div>


<!-- extra -->
<div id="extra-wrap">
    <div id="extra" class="clearfix">


        <div class="col first">

            <h3>Informations</h3>

            <p>
                <strong>Phone: </strong>0600000000<br/>
            </p>

            <p><strong>Address: </strong>123 chemin du bois </p>
            <p><strong>E-mail: </strong>hotdogslove@gmailcom</p>
            <p>Plus d'informations ? <a href="contact.php">page contact</a></p>

            <h3>Nous suivre</h3>


            <ul class="subscribe-stuff">
                <li><a title="Twitter" href="https://twitter.com/hotdog53852273" rel="nofollow">
                        <img alt="Twitter" title="Twitter" src="images/social_twitter.png"/></a>

            </ul>
        </div>


        <div class="col">


            <div class="col">

                <h3>Credits</h3>

                <div class="footer-list">
                    <ul>
                        <li><a href="https://www.icone-png.com/animaux/chien/">
                                Icones gratuites
                            </a>
                        </li>
                        <li><a href="http://styleshout.com">
                                Free css templates
                            </a>

                    </ul>
                </div>

            </div>


            <div class="col">

                <h3>Qui sommes-nous ?</h3>

                <p>
                    <a href="nous.php"><img src="images/gravatar.jpg" width="42" height="42" alt="firefox"
                                            class="align-left"/></a>
                    Léonardo Da Silva étudiant en L3 MIASHS et Cassy Deplace étudiante en L3 MIASHS - Sciences
                    Cognitives. <a href="nous.php">En savoir plus...</a>
                </p>

            </div>


            <!-- /extra -->
        </div>
    </div>


    <!-- footer -->
    <footer>

        <p class="footer-left">
            &copy; 2011 Copyright Info &nbsp; &nbsp; &nbsp;
            Design by <a href="http://www.styleshout.com/">styleshout</a>
        </p>

        <p class="footer-right">
            <a href="index.html">Home</a>
            <a href="#top" class="back-to-top">Back to Top</a>
        </p>

        <!-- /footer -->
    </footer>

</body>
</html>
