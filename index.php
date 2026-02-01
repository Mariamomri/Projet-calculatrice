<!-- Une Page d’accueil avec comme titre Home avec une image, un titre et une petite
description. (N’importe quel sujet) -->

<?php
    session_start();
    $_SESSION['role']= "admin";
    $_SESSION['user']= [
      'firstname' => 'Mariam',
      'lastname' => 'Omri',
      'login' => 'mariamomri',
      'password' => 'cfitech'
    ];

    $title = "Home";
    $nav = "index";
    require "header.php";
?>


      <main class="main wrapper">
        <section>
          <img src="assets/images/operation-3-6637.gif" alt="operation" height="200px" width="600px">
          <h1>Bienvenue sur le site de calcul</h1>
          <br>
            <img src="assets/images/calculatrice.gif" alt="calculatrice" width="30%">
          <p class="textIndex">
            Ici, tu peux t’amuser à faire des calculs rigolos avec ta super calculatrice en ligne ! <br>
            Clique sur login pour te connecter et pour accéder à ton profil et sauvegarder tes résultats !
          </p>
          
        </section>

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