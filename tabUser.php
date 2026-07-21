<?php

// EXO 10 
session_start(); //démarrage de la session
$title = "Tableau des utilisateurs"; //titre de la page
$nav = "tabUser"; //indique la page active dans la nav
require "header.php";

// même si vous tapez dans url vous renvoie vers la page de login 
if (!is_connected()) {
  header("Location: ./login.php");
}

?>

<center><b>
    <h1>Tableau des utilisateurs</h1>
  </b></center>


<?php
//questo in caso non si collega alla base di dati allora mostra un errore con funzioni native 
try {
  $pdo = new PDO('mysql:dbname=coursmysql;host=localhost', "root", ""); // Connessione al database
  //On définit le mode d'erreur de PDO sur Exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Attivi la modalità che mostra gli errori
  echo 'Connexion réussie';
  $resultat = $pdo->query('SELECT * from users'); //Significa: “dammi tutti gli utenti”
  $users = $resultat->fetchAll(PDO::FETCH_OBJ); //- Trasforma i risultati in oggetti. Così puoi fare $user->firstname.

} catch (PDOException $e) {
  die('Erreur : ' . $e->getMessage());
}



//version tableau d'objet
try {
  $pdo = new PDO('mysql:dbname=coursmysql;host=localhost', "root", "");
  //On définit le mode d'erreur de PDO sur Exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo 'Connexion réussie';
  $resultat = $pdo->query('SELECT * from users');
  $tabUsers = $resultat->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
  die('Erreur : ' . $e->getMessage());
}

foreach ($tabUsers as $user) {
  echo "<br>Prénom : " . $user->firstname . "<br>";
  echo "Nom : " . $user->lastname . "<br>";
  echo "Genre : " . $user->gender . "<br>";
  echo "Date de naissance : " . $user->date_of_birth . "<br>";
  echo "Ville : " . $user->city . "<br>";
  echo "Poids : " . $user->weight_kg . " Kg<br>";
}

// var_dump($tabUsers);


?>

<table border="1" cellpadding="10">
  <tr>
    <th>Prénom :</th>
    <th>Nom</th>
    <th>Genre</th>
    <th>Date de naissance</th>
    <th>Ville</th>
    <th>Poids</th>
  </tr>


  <!-- h) garde en memoire j'ai pas tue la session operations in logout-->
  <?php foreach ($tabUsers as $user) { ?>
    <tr>
      <td><?php echo  $user->firstname ?></td>
      <td><?php echo  $user->lastname ?></td>
      <td><?php echo $user->gender ?></td>
      <td><?php echo $user->date_of_birth ?></td>
      <td><?php echo $user->city ?></td>
      <td><?php echo $user->weight_kg ?></td>
    </tr>
  <?php } ?>

</table>

<?php

require "footer.php";
