<?php

session_start(); //démarrage de la session
$title = "BD"; //titre de la page
$nav = "baseDeDonnees"; //indique la page active dans la nav
require "header.php";
?>

<!-- même si vous tapez dans url vous renvoie vers la page de login -->
<?php
if (!is_connected()) {
  header("Location: ./login.php");
}

?>

<?php
//La connexion à la base de données coursmysql
$pdo = new PDO('mysql:dbname=coursmysql;host=localhost', "root", "");
//On utilise une méthode de la classe PDO qui permet de faire une 
//requête et qui reçoit donc une requête en paramètre. Cette méthode 
//retourne un objet de type PDOStatement qu'on mettra dans 
//une variable $resultat
$resultat = $pdo->query('SELECT * from articles');
//On va ensuite utiliser une méthode de classe de PDOStatement 
//qui permet de récupérer le résultat sous forme de tableau. 
//On fait un vardump pour voir ce qu'il contient.


// var_dump($resultat->fetchAll()); //quando non specifichiamo il fetch mode di default è PDO::FETCH_BOTH

// usare questo tipo di var_dump per avere gli oggetti con le proprietà che corrispondono ai nomi delle colonne del db
var_dump($resultat->fetchAll(PDO::FETCH_OBJ));





?>

<!-- navigation: home, calculatrice, mon profile sont dans page aside1 -->
<?php
require "aside1.php" ?>


<!-- navigation: login et logout sont dans page aside2 -->
<?php
require "aside2.php" ?>
<?php
require "footer.php";
?>