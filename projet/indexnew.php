<?php
require 'Session.php';
Session::start();
Session::set('name', array(
    'name' => 'jesse',
    'number' => 911
));

echo Session::get('name');

Session::display();
?>
<html>
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
                <li id="current"><a href="index.php">Accueil</a><span></span></li>
                <li><a href="Connexion.php">Connexion</a><span></span></li>
                <li><a href="Annonces.php">Annonces</a><span></span></li>
                <li><a href="contact.php">Nous contacter</a><span></span></li>
            </ul>

        </nav>

        <div class="sidemenu">


            <ul>
                <li>
            </ul>

        </div>
        <!--/header-->
    </header>
</div>

<!-- content-wrap -->
<div id="content-wrap">

    <!-- content -->
    <div id="content" class="clearfix">

        <!-- main -->
        <div id="main">

            <!-- un 'article' pour chaque partie de l'index pour mieux agencer -->

            <article class="post">

                <div class="primary">


                    <h2>Bienvenue ! !</h2>


                    <div class="image-section">
                        <img src="images/hero-bg.jpg" alt="image post" height="206" width="498"/>
                    </div>

                    <p> Bienvenue sur HotDogs, un site de rencontre canin entièrement gratuit vous permettant de trouver
                        le partenaire idéal pour votre petit compagnon !
                    </p>

                    <!-- affichage du déconnexion seulement si connecté -->

                    <p><a class="more" href="inscription.php">Inscription &raquo;</a></p>
                    <?php
                    if (isset($_SESSION["login"]) AND
                        $_SESSION["login"] != "") {
                        $var = $_SESSION["login"];
                        Echo '<p><a class="more" href="deconnexion.php">Deconnexion &raquo; </a></p>';
                    }
                    ?>

                </div>

                <aside>

                    <!-- affcihage de la date, du pseudo et de l'heure -->

                    <?php
                    $date = date("d");
                    $mois = date("M");
                    echo '<p class="dateinfo">' . $mois . '<span>' . $date . '</span></p>'
                    ?>

                    <div class="post-meta">
                        <ul>
                            <?php
                            if (isset($_SESSION["login"]) AND
                                $_SESSION["login"] != "") {
                                Echo '<li class="user">' . $_SESSION["login"] . ' </li>';
                            } ?>

                            <?php
                            $heure = date("H:i");
                            echo '<li class="time">' . $heure . '</li>'
                            ?>


                        </ul>
                    </div>

                </aside>

            </article>


            <article class="post">

                <div class="primary">

                    <h2>3, 2, 1, Cherchez ! !</h2>


                    <div class="image-section">
                        <img src="images/phone.gif" height="200" width="200"/>
                    </div>

                    <p> A la recherche d'un chien de race pour accouplement ?
                        Il n’est pas toujours évident de trouver ce que l'on cherche.
                        Sur Hot Dogs, les profils sont très détaillés. Trouvez ceux qui vous correspondent
                        avec la recherche par race.
                    </p>

                </div>

            </article>


            <article class="post">

                <div class="primary">

                    <h2>Rencontrez des propriétaires de chien près de chez vous !</h2>


                    <div class="image-section">
                        <img src="images/map.png" height="200" width="200"/>
                    </div>

                    <p> A Toulouse, Lyon, Montpellier....
                        Où que vous soyez, des rencontres vous attendent ! Inscrivez-vous et voyez par vous-même.
                    </p>

                </div>

            </article>


            <article class="post">

                <div class="primary">

                    <h2>Identifiez les membres les plus sérieux rapidement.</h2>


                    <div class="image-section">
                        <img src="images/pouce.png" height="200" width="200"/>
                    </div>

                    <p> Décernées par les autres membres, les notes positives sont le signe distinctif des propriétaires
                        sérieux. Attribuez 1, 2 ou 3 os selon la qualité et
                        l'utilité de l'annonce.
                    </p>


                </div>

            </article>


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
                </li>
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
