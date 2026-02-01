<!-- Une page Soustraction avec comme titre Soustraction qui aura un formulaire qui fera une
soustraction entre 2 nombres introduis au clavier et qui affichera la réponse. Attention on ne
pourra introduire que des numéros. Je veux que le résultat de la soustraction soit
sauvegardé. -->

<?php
    session_start();
    $title = "Soustraction";//titre de la page
    $nav = "soustraction";//indique la page active dans la nav      
    require "header.php";
    require "functions/functionsMath.php";
    

    // g) même si vous tapez dans url vous renvoie vers la page de login
    if(!is_connected()) {
        header("Location: ./login.php"); 
    } 
?>


<!-- main -->
<main class="main">

  <!-- questo per rimanere sulla stessa pagina -->
  <form action="/coursphp/mariamphpdecembre/soustractions.php" method="post">

    <h2>Soustraction</h2>

    <div class="operations">
      <label for="nombre1">Entrez le premier nombre :</label><br>
      <input type="text" name="nombre1" placeholder="nombre 1"/> <!--ecrire required dans l’input sert à dire qu’on doit entrer uniquement des nombres, donc on peut éviter de vérifier si les champs sont vides ou s’il s’agit bien de nombres. Il y a aussi le type="number", qui bloque la saisie des lettres. Demande à Julien si c’est correct. -->

      <br>

      <img src="assets/images/menopink.png" alt="Icona più" width="50px">

      <br>

      <label for="nombre2">Entrez le deuxième nombre :</label><br>
      <input type="text" name="nombre2" placeholder="nombre 2"/>
      <br>
      <br>
      <button type="submit" class="btn-form">Soustraire</button>
    </div>

  </form>

<?php

  //da error se:
  $error = false;

  //vérifier si le méthode est post
  if ( $_SERVER["REQUEST_METHOD"] == "POST" ){
    $nombre1 = $_POST["nombre1"];
    $nombre2 = $_POST["nombre2"];

      //vérifier si les champs sont vides
      // if (empty($nombre1) || empty($nombre2)) { *** il consider "0" comme champ vide
      if ($nombre1 === "" || $nombre2 === "") {
      echo " <p class='textError'> Entrez des nombre dans les deux champs </p>";
      $error = true;
      }

      //vérifier si ce sont bien des nombres
      else if( !is_numeric($nombre1) || !is_numeric($nombre2) ){
        echo " <p class='textError'> Entrez seulment des nombres! </p>";
      $error = true;
      }

      else {
      $totale= soustraction($nombre1, $nombre2);

      
      //mostrare il risultato
      echo "<p class='calcul-result' > $nombre1 <img src='assets/images/menopink.png' alt='Icona più' width='50px' height='50px'> $nombre2  <img src='assets/images/egal.png' alt='Icona più' width='50px' height='50px'> $totale</p>";


       // b) sauvegarder la dernière soustraction
      $_SESSION['dernier-'] = " <p class='textop'> Votre dernière soustraction faite, est : $nombre1 soustract à $nombre2 donne $totale</p>";

      /* un tableau vide pour stocke les opérations dans une session pour l'afficher dans la page de mon profil*/
      $_SESSION['operations'][] = [
            "type" => "Soustraction",
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

<?php
    require "footer.php";
?>