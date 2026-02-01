<!-- Une page Addition avec comme titre Addition qui aura un formulaire qui fera une addition
entre 2 nombres introduis au clavier et qui affichera la réponse. Attention on ne pourra
introduire que des numéros. Je veux que le résultat de l’addition soit sauvegardé. -->


<?php
session_start();
$title = "Addition"; //titre de la page
$nav = "addition"; //indique la page active dans la nav      
require "header.php";
require "functions/functionsMath.php";

// g) même si vous tapez dans url vous renvoie vers la page de login
if (!is_connected()) {
  header("Location: ./login.php");
}
?>


<!-- main -->
<main class="main">

  <!-- questo per rimanere sulla stessa pagina -->
  <form action="/coursphp/mariamphpdecembre/addition.php" method="post">

    <h2>Addition</h2>

    <div class="operations">
      <label for="nombre1">Entrez le premier nombre :</label><br>
      <input type="text" name="nombre1" placeholder="nombre 1" /> <!--ecrire required dans l’input sert à dire qu’on doit entrer uniquement des nombres, donc on peut éviter de vérifier si les champs sont vides ou s’il s’agit bien de nombres. Il y a aussi le type="number", qui bloque la saisie des lettres. Demande à Julien si c’est correct. -->

      <br>

      <img src="assets/images/piu.png" alt="Icona più" width="50px">

      <br>

      <label for="nombre2">Entrez le deuxième nombre :</label><br>
      <input type="text" name="nombre2" placeholder="nombre 2" />
      <br>
      <br>
      <button type="submit" class="btn-form">Additionner</button>
    </div>

  </form>

  <?php

  //da error se:
  $error = false;


  //vérifier si le méthode est post
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre1 = $_POST["nombre1"];
    $nombre2 = $_POST["nombre2"];

    //vérifier si les champs sont vides
    if (!isset($nombre1) || !isset($nombre2)) {  // da tenere un altro modo per fare l'exo
      // if ($nombre1 === "" || $nombre2 === "") {
      echo " <p class='textError'> Entrez des nombre dans les deux champs </p>";
      $error = true;
    }

    //vérifier si ce sont bien des nombres
    else if (!is_numeric($nombre1) || !is_numeric($nombre2)) {
      echo " <p class='textError'> Entrez seulment des nombres! </p>";
      $error = true;
    } else {
      $totale = somma($nombre1, $nombre2);


      //mostrare il risultato
      echo "<p class='calcul-result' > $nombre1 <img src='assets/images/piu.png' alt='Icona più' width='50px' height='50px'> $nombre2  <img src='assets/images/egal.png' alt='Icona più' width='50px' height='50px'> $totale</p>";


      // b) sauvegarder la dernière addition 
      $_SESSION['dernier+'] = " <p class='textop'> Votre dernière addition faite, est : $nombre1 aditioné à $nombre2 donne $totale</p>";

      /* un tableau vide pour stocke les opérations dans une session pour l'afficher dans la page de mon profil*/
      $_SESSION['operations'][] = [
        "type" => "Addition",
        "nombre1" => $nombre1,
        "nombre2" => $nombre2,
        "totale" => $totale
      ];

      // Incrémenter le compteur total des opérations
      isset($_SESSION['compteur']) ? $_SESSION['compteur']++ : $_SESSION['compteur'] = 1;
    }
  }

  ?>

</main>

<!-- navigation: home, calculatrice, mon profile sont dans page aside1 -->
<?php
require "aside1.php" ?>


<!-- navigation: login et logout sont dans page aside2 -->
<?php
require "aside2.php" ?>

</div>

<?php
require "footer.php";
?>