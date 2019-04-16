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

                    <h2>Bienvenue ! !</h2>

            
               	    <div class="image-section">
              		    <img src="images/hero-bg.jpg" alt="image post" height="206" width="498"/>
         	        </div>

					
					 <!-- affichage de l'inscription si non connecté, et déconnexion si connecté -->
					<?php
		if(isset($_SESSION["login"]) AND
        $_SESSION["login"] != "")
        {
         $var = $_SESSION["login"];
		 Echo '<p><a class="more" href="deconnexion.php">Deconnexion &raquo; </a></p>';
        } else { 
		Echo '<p><a class="more" href="inscription.php"> Inscription &raquo;</a></p>';}
		
		
		?>		

                </div>

                <aside>

 				
<?php
$date = date("d");
$mois = date("M");
echo '<p class="dateinfo">'.$mois.'<span>'.$date.'</span></p>'
?>

               	    <div class="post-meta">
                     	<ul>
                          <?php 
						   if(isset($_SESSION["login"]) AND
							$_SESSION["login"] != "")
							{
							Echo '<li class="user">'.$_SESSION["login"].' </li>';
							}?>
							
							<?php
							$heure = date("H:i");
                           echo '<li class="time">'.$heure.'</li>'	
						   ?>
											   

                        </ul>
					</div>

                </aside>

		    </article>
			
			
		         </div>
				 
				 
				 
				 <!-- formulaire de connexion -->

         <div class="post-bottom-section">

		    <h4>Connectes toi</h4>

            <div class="primary">

            	<form action="connexion2.php"method="POST">

               	    <div>
					    <label for="login">Login <span>*</span></label>
						<input id="login" name="login" value="" type="text" tabindex="1" />
					</div>
                    <div>
						<label for="mdp">Mot de passe<span>*</span></label>
						<input id="mdp" name="mdp" value="" type="password" tabindex="2" />
					</div>
                    <div class="no-border">
					    <input class="button" type="submit" value="Connexion" tabindex="5" />
					</div>

               </form>

            </div>

         </div>	
			
			
			
			
			
<!-- FINI -->
			
			
			
			




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
