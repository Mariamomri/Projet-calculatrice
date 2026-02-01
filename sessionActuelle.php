<!-- Une page Session Actuelle avec comme titre DEBUG qui servira à montrer toutes les sessions
en mode debug. -->


<?php
    session_start(); //démarrage de la session
    $title = "Debug";//titre de la page
    $nav = "sessionActuelle";//indique la page active dans la nav
    require "header.php";
?>

    <main class="main" class="wrapper">
        <h2>Debug</h2>
        <p><?php var_dump($_SESSION); ?></p>

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