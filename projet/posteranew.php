<html>
<?php
 // Création de la classe
 class FormData {
 private $post_data;
 private $file_data;

 function __construct($post_param, $file_param) {
 $this->post_data = $post_param;
 $this->file_data = $file_param;
 }

 public function afficherChamps() {
 foreach($this->post_data as $champ => $valeur)
 echo "<tr> <td>$champ</td> <td>$valeur</td> </tr>\n";
 }
 
 public function uploaderPhoto() {
 $res = move_uploaded_file($this->file_data["tmp_name"],
 __DIR__ . "/upload/" . $this->file_data["name"]);
 if ($res) return "Photo téléchargée avec succès";
 else return "Erreur " . $this->file_data["error"];
 }

 public function afficherPhoto() {
 echo $this->file_data["name"] . "<br />" .
 $this->file_data["type"] . "<br />" .
 $this->file_data["size"] . "<br />" .
 $this->file_data["tmp_name"] . "<br />" .
 "<img src=\"upload/" . $this->file_data["name"] .
 "\" alt=\"Photo du véhicule\" />";
 }
 }
 // Instantiation de la classe
 $data = new FormData($_POST, $_FILES["photo"]);
 echo "<p>" . $data->uploaderPhoto() . "</p>\n";
 ?>
 <!-- Tableau des résultats -->
 <table>
 <caption>Données transférées</caption>
 <tr> <th>Champ</th> <th>Valeur</th> </tr>
 <?php
 $data->afficherChamps();
 ?>
 <tr> <td>Photo</td> <td>
 <?php
 $data->afficherPhoto();
 ?>
 </td> </tr>
 </table>
</html>