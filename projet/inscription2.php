
<?php
session_start();

?>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HotDogs</title>

    <link rel="stylesheet" type="text/css" media="screen" href="css/coolblue.css" />

    <!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.6.1.min.js"><\/script>')</script>

    <script src="js/scrollToTop.js"></script>

</head>

<body id="top">

<!--header -->
<div id="header-wrap"><header>

 	<hgroup>
        <h1>Trouvez un partenaire pour votre chien</h1>
    </hgroup>

    <nav>
		<ul>
			<li><a href="index.php">Accueil</a><span></span></li>
			<li  id="current"><a href="Connexion.php">Connexion</a><span></span></li>
			<li><a href="Annonces.php">Annonces</a><span></span></li>
			<li><a href="contact.php">Nous contacter</a><span></span></li>
		</ul>
	</nav>


<!--/header-->
</header></div>
	
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
	<!-- Affiche message si déjà connecté. Vérifie que les champs sont remplis et que les mots de passes correspondent. Si tout est bon on envoie dans la table user. Sinon message d'erreur -->
<?php 

if(isset($_SESSION["login"]) AND
        $_SESSION["login"] != "")
        {
            Echo 'Vous êtes déjà connecté(e) en tant que'.$_SESSION["login"].' !';
		} 
else {
	if ((!empty ($_POST["login"])) and (!empty($_POST["mdp"])) and (!empty($_POST["confirmpass"]))  and (!empty($_POST["email"]))) {
	$login = $_POST["login"];
	$mdp = crypt($_POST['mdp'],'static_salt');	//mot de passe crypter pour plus de sécurité.
	$confirmpass = crypt($_POST['confirmpass'],'static_salt'); //On l'affiche juste pour montrer qu'il est bien crypté.
	$email = $_POST["email"];
	
	
	if (($_POST["mdp"]) == ($_POST["confirmpass"])) {
	echo 'Votre login est '.$login.' avec le mot de passe '.$mdp.' et votre adresse mail est '.$email.'.';
	$_SESSION["login"] = $login;
	
	$connexion=mysqli_connect("localhost","root","");
	mysqli_select_db($connexion,"hotdog");
	
	$req = 'INSERT INTO user (login, mdp, email) VALUES ("'.$login.'","'.$mdp.'", "'.$email.'");';
	mysqli_query($connexion,$req);
	
	mysqli_close($connexion);
	
	}
	else{
		die("Vos 2 mots de passe ne sont pas identiques !");
	}
}
else {
die("Il manque un ou plusieurs éléments pour vous inscrire !"); }
}
?>






        <!-- /main -->
        </div>


    <!-- content -->
	</div>

<!-- /content-out -->
</div>


		
<!-- extra -->
<div id="extra-wrap"><div id="extra" class="clearfix">


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
				<img alt="Twitter" title="Twitter" src="images/social_twitter.png" /></a>
			
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
		        <a href="nous.php"><img src="images/gravatar.jpg" width="42" height="42" alt="firefox" class="align-left" /></a>
                Léonardo Da Silva étudiant en L3 MIASHS  et Cassy Deplace étudiante en L3 MIASHS - Sciences Cognitives.  <a href="nous.php">En savoir plus...</a>
			    </p>

            </div>


<!-- /extra -->
</div></div>




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
