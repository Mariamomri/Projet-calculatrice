<!-- Une page Logout pour vous déconnecter. Si vous n’êtes pas connecté, elle vous redirigera vers la page de login. -->


<!--c) Quand vous vous déconnectez il faut supprimer uniquement les opérations faites. -->

<?php
    session_start();
    //detruit toutes les sessions 
    // session_unset();

    unset($_SESSION['connected']);
    unset($_SESSION['pseudo']);

    header('Location: ./index');

    // c) supprimer uniquement les opérations faites
    unset($_SESSION['dernier+']);
    unset($_SESSION['dernier-']);
    unset($_SESSION['dernier/']);
    unset($_SESSION['dernier*']);
    
    ?>