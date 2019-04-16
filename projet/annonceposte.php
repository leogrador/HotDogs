m

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
			<li id="current"><a href="index.html">Accueil</a><span></span></li>
			<li><a href="Connexion.html">Connexion</a><span></span></li>
			<li><a href="Annonces.php">Annonces</a><span></span></li>
			<li><a href="contact.html">Nous contacter</a><span></span></li>
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

		  
			
			
			
			
			
			
<?php		
			
				
$connexion=mysqli_connect("localhost","root","");
mysqli_select_db($connexion,"hotdogs");
$req = 'SELECT nom FROM annonce WHERE nom="'.$nom.'" AND mail_post ="'.$mail_post.'" AND nom_race ="'.$nom_race.'" AND sexe ="'.$sexe.'"  AND age ="'.$age.'" AND prix ="'.$prix.'" AND ville ="'.$ville.'";';
$res = mysqli_query($connexion,$req);
if (mysqli_num_rows($res) == 1){
	echo 'Vous êtes bien connecté';
$_SESSION['nom'] = $nom; 
$_SESSION['mail_post'] = $mail_post;
$_SESSION['nom_race'] = $nom_race;
$_SESSION['sexe'] = $sexe;
$_SESSION['age'] = $age;		//J'ai enlevé desciption pour l'instant pour ne pas gerer un grand texte (ça peux causer probleme)
$_SESSION['prix'] = $prix;		//Il reconnait très bien les variables et je pense que la transition de base à bien été faite. (à premier vu tout marche)
$_SESSION['ville'] = $ville;

}

mysqli_close($connexion); }}
?>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		         </div>
				 
				 


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
      	        <li><a title="Facebook" href="index.html" rel="nofollow">
				<img alt="Facebook" title="Facebook" src="images/social_facebook.png" /></a>
			    </li>
			    <li><a title="Twitter" href="index.html" rel="nofollow">
				<img alt="Twitter" title="Twitter" src="images/social_twitter.png" /></a>
			    </li>
            </ul>
	    </div>
		
		
		
		
		
		
		
		
		

	    <div class="col">


        <div class="col">

            <h3>Credits</h3>

            <div class="footer-list">
			    <ul>
				    <li><a href="http://jasonlarose.com/blog/110-free-classy-social-media-icons">
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
                Léonardo Da Silva étudiant en L3 MIASHS  et Cassy Deplace étudiante en L3 MIASHS - Sciences Cognitives. <a href="nous.php">En savoir plus...</a>
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