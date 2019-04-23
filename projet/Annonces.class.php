<?php // td56modele.class.php 

require_once 'coeur/init.php';


 
    class Requete {

	private $pdo;   // Identifiant de connexion         
	private $nom;   // Nom de la requête        
	private $req;   // Requête à exécuter         
	private $res;   // Résultat de la requête       
	private $atts;  // Attributs à afficher                
	private $user;
	
	
	function __construct($param_pdo, $param_nom, $param_req, $param_atts) {
	    $this->user = new User();
	$this->pdo = $param_pdo;
	$this->nom = $param_nom;             
	$this->req = $param_req;             
	$this->atts = $param_atts;         
	}                  
	
	
	
	public function executer() {             
	$this->res = $this->pdo->prepare($this->req);             
	$this->res->execute();         
	}                  
	
	
	
	public function afficherTab() {             
	// Définition du gabarit             
	$gab = new Template("./");             
	$gab->set_filenames(array("body" => "Annonces.tpl.html"));              
       
	// Données             
	foreach ($this->res as $ligne) {                      
	$gab->assign_block_vars("ligne",                                          
	array("nom" => $ligne["nom"], 
	"id_annonce" => $ligne["id_annonce"], 	
	"mail_post" => $ligne["mail_post"],  
	"sexe" => $ligne["sexe"],	
	"age" => $ligne["age"], 
	"prix" => $ligne["prix"],
	"ville" => $ligne["ville"],	
	"nom_race" => $ligne["nom_race"],
	"login" => $ligne["login"],
	"photo" => $ligne["photo"]) );                 
	  }                
	// Lien nouvelle matière            
	$gab->assign_vars(array("cible" => $_SERVER["PHP_SELF"]));            
	// Affichage du gabarit             
	$gab->pparse('body');        
	}
    
	}          
	
	
	class AccesMatiere {         
	private $pdo;   // Identifiant de connexion          
	private $qmat;  // Requête fixe liste des matières

	
	function __construct($param_pdo) {            
	$this->pdo = $param_pdo;            
	$this->qmat = new Requete($this->pdo,                                       
	"Liste des annonces",                                        
	"SELECT * FROM annonce INNER JOIN user as t1 ON annonce.id_user = t1.id_user 
	INNER JOIN race as t2 ON annonce.id_race = t2.id_race ORDER by id_annonce",     	
	array("nom", "mail_post", "sexe", "age", "prix", "ville","nom_race", "photo")            
	);             
	}
	
	
	public function liste() {               
	$this->qmat->executer();             
	$this->qmat->afficherTab();    
}         
	public function listep() {               
	$this->qmatp->executer();             
	$this->qmatp->afficherTab();    
}       
 
 
 
    public function ajouterMatiere($nom, $mail_post, $sexe, $age, $prix, $ville, $id_race, $id_user, $photo) { 
	if($this->user->isLoggedIn()) {
        $this->user = $this->find($login);
		$res = $this->pdo->prepare('
		INSERT INTO annonce (nom, mail_post, sexe, age, prix, ville, id_race, id_user, photo) VALUES(?, ?, ?, ?, ?, ?, (SELECT id_race FROM race WHERE nom_race = ?), (SELECT id_user FROM user WHERE login = ?),? )');   	
		$res->execute([$nom, $mail_post, $sexe, $age, $prix, $ville, $id_race, $id_user, $photo]);  
	} else {
		echo'Veuillez vous connecter avant d entrer une annonce';
	}
	} 
	} 
	
	?>
	
	