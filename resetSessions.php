<!-- Une page Reset Sessions avec comme titre RESET qui servira d’arrêter toutes les sessions. -->


<?php
    session_start(); //démarrage de la session
    $title = "Reset";//titre de la page
    $nav = "resetSessions";//indique la page active dans la nav

     //detruit toutes les sessions 
    session_unset();

    //redirection vers login.php
    header("Location: ./login.php");
?>