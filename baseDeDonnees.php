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
<center><b>
    <h1>Welcome to the sal</h1>
  </b></center>

<?php
//La connexion à la base de données coursmysql
// $pdo = new PDO('mysql:dbname=coursmysql;host=localhost', "root", "");
//On utilise une méthode de la classe PDO qui permet de faire une 
//requête et qui reçoit donc une requête en paramètre. Cette méthode 
//retourne un objet de type PDOStatement qu'on mettra dans 
//une variable $resultat
// $resultat = $pdo->query('SELECT * from articles');
//On va ensuite utiliser une méthode de classe de PDOStatement 
//qui permet de récupérer le résultat sous forme de tableau. 
//On fait un vardump pour voir ce qu'il contient.


// var_dump($resultat->fetchAll()); //quando non specifichiamo il fetch mode di default è PDO::FETCH_BOTH

// usare questo tipo di var_dump per avere gli oggetti con le proprietà che corrispondono ai nomi delle colonne del db
// var_dump($resultat->fetchAll(PDO::FETCH_OBJ));



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

//exo 1 affichage user version tableau de tableau avec fetchall() et pas var_dump
try {
  $pdo = new PDO('mysql:dbname=coursmysql;host=localhost', "root", "");
  //On définit le mode d'erreur de PDO sur Exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo 'Connexion réussie';
  $resultat = $pdo->query('SELECT * from users');

  $tabUsers = $resultat->fetchAll();
} catch (PDOException $e) {
  die('Erreur : ' . $e->getMessage());
}

foreach ($tabUsers as $user) { //Scorre tutti gli utenti e mostra le loro proprietà
  echo "<br>Prénom : " . $user['firstname'] . "<br>";
  echo "Nom : " . $user['lastname'] . "<br>";
  echo "Genre : " . $user['gender'] . "<br>";
  echo "Date de naissance : " . $user['date_of_birth'] . "<br>";
  echo "Ville : " . $user['city'] . "<br>";
  echo "Poids : " . $user['weight_kg'] . " Kg<br>";
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

// //exo 2 version SQL
// try {
//   $pdo = new PDO('mysql:dbname=coursmysql;host=localhost', "root", "");
//   //On définit le mode d'erreur de PDO sur Exception
//   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo 'Connexion réussie';
//   $resultat = $pdo->query('SELECT article_name, UPPER(CONCAT(firstname, " ",lastname)) as auteur from articles INNER JOIN users ON id_user = id_user_article');
//   $tabRes = $resultat->fetchAll(PDO::FETCH_OBJ);
// } catch (PDOException $e) {
//   die('Erreur : ' . $e->getMessage());
// }

// foreach ($tabRes as $articleAuteur) {
//   echo "<br>Nom de l'article : " . $articleAuteur->article_name . "<br>";
//   echo "Auteur : " . $articleAuteur->auteur . " <br>";
// }


// //version PHP
// try {
//   $pdo = new PDO('mysql:dbname=coursmysql;host=localhost', "root", "");
//   //On définit le mode d'erreur de PDO sur Exception
//   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo 'Connexion réussie';
//   $resultat = $pdo->query('SELECT article_name, firstname, lastname from articles INNER JOIN users ON id_user = id_user_article');
//   $tabRes = $resultat->fetchAll(PDO::FETCH_OBJ);
// } catch (PDOException $e) {
//   die('Erreur : ' . $e->getMessage());
// }

// // var_dump($tabRes);
// foreach ($tabRes as $articleAuteur) {
//   echo "<br>Nom de l'article : " . $articleAuteur->article_name . "<br>";
//   echo "Auteur : " . strtoupper($articleAuteur->firstname . " " . $articleAuteur->lastname) . " <br>";
// }

// $titre = "Ajouter un article en BD via PHP 2";
// $description = "Blablablabla";
// $datetime = new DateTime();
// $date = $datetime->format('Y-m-d H:i:s');
// $id_auteur = 12;

// try {
//   $pdo = new PDO('mysql:dbname=coursmysql;host=localhost', "root", "");
//   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo 'Connexion réussie';
//   //voici comment ajouter un enregistrement en base de données
// $pdo->exec('INSERT into articles VALUES (NULL,"' . $titre . '","' . $description . '","' . $date . '","' . $date . '" ,"' . $id_auteur . '" )');
//   $resultat = $pdo->query('SELECT article_name, created_at, id_user_article from articles ORDER BY id_article DESC');
//   $tabArticles = $resultat->fetchAll(PDO::FETCH_OBJ);
// } catch (PDOException $e) {
//   die('Erreur : ' . $e->getMessage());
// }
// var_dump($tabArticles);

/***********************************fin 3 fevrier ***********/

// $titre = "Ajout d'un article en BD via PHP avec prepare et execute 2";
// $description = "Blablablabla";
// $datetime = new DateTime();
// $date = $datetime->format('Y-m-d H:i:s');
// $id_auteur = 3;

// try {
//   $pdo = new PDO('mysql:dbname=coursmysql;host=localhost', "root", "");
//   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo 'Connexion réussie';

//   $req = $pdo->prepare('INSERT INTO articles VALUES(:id_article, :article_name, :description, :createdAt, :updatedAt, :id_user_article)');
//   $req->execute([
//     'id_article' => NULL,
//     'article_name' => $titre,
//     'description' => $description,
//     'createdAt' => $date,
//     'updatedAt' => $date,
//     'id_user_article' => $id_auteur
//   ]);
//   echo "<br>Article créé " . $titre;
// } catch (PDOException $e) {
//   die('Erreur : ' . $e->getMessage());
// }

// /*****************/

// $titre = "Ajouter Try/Catch un article avec prepare et execute";
// $description = "Blablablabla";
// $datetime = new DateTime();
// $date = $datetime->format('Y-m-d H:i:s');
// $id = 3;
// try {
//   $pdo = new PDO('mysql:dbname=coursmysql;host=localhost', "root", "");
//   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo 'Connexion réussie';
//   $req = $pdo->prepare('INSERT INTO articles VALUES(:id_article, :article_name, :description, :createdAt, :updatedAt, :id_user_article)');
//   $req->execute(array(
//     'id_article' => NULL,
//     'article_name' => $titre,
//     'description' => $description,
//     'createdAt' => $date,
//     'updatedAt' => $date,
//     'id_user_article' => $id
//   ));
//   echo "Un nouvel article a été ajouté";
// } catch (PDOException $e) {
//   echo "Erreur : " . $e->getMessage();
// }

// /***************** */

// //modification
// try {
//   $req = $pdo->prepare("UPDATE articles SET article_name = 'Black dess' WHERE id_article = 36");
//   $req->execute();
//   echo "Modification réussi !<br>";
// } catch (PDOException $e) {
//   die('Erreur : ' . $e->getMessage());
// }

// //suppression
// try {
//   $req = $pdo->prepare("DELETE FROM articles WHERE id_article = 36");
//   $req->execute();
//   echo "Suppression réussi !<br>";
// } catch (PDOException $e) {
//   die('Erreur : ' . $e->getMessage());
// }
// /********************/


// // 6) Essayez de rajouter un utilisateur à la table users.
// //exo6
// $firstname = "Gin";
// $lastname = "Handrick's";
// $gender = "M";
// $date_of_birth = "1995-05-03";
// $city = "Ayrshire";
// $weight_kg = 10; //Sta semplicemente preparando i dati che vuoi inserire nella tabella users.

// try {
//   $pdo = new PDO('mysql:dbname=coursmysql;host=localhost', "root", ""); //Connessione al database
//   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Attivi la modalità che mostra gli errori
//   echo 'Connexion réussie<br>';
//   $req = $pdo->prepare('INSERT INTO users VALUES(:id_user, :firstname, :lastname, :gender, :date_of_birth, :city, :weight_kg)'); // inserire un nouvo user nella tabella user.
//   $req->execute(array( //Esegue la query con i dati specificati
//     'id_user' => NULL,
//     'firstname' => $firstname,
//     'lastname' => $lastname,
//     'gender' => $gender,
//     'date_of_birth' => $date_of_birth,
//     'city' => $city,
//     'weight_kg' => $weight_kg,
//   ));
//   echo "L'utilisateur " . $firstname . " " . $lastname . " a été ajouté<br>"; //Stampa un messaggio di conferma dell'inserimento dell'utente.
// } catch (PDOException $e) {
//   echo "Erreur : " . $e->getMessage();
// };



// // 7) Essa ez de m'afficher le prénom et âge de tous les hommes.
// //exo7
// try {
//   $pdo = new PDO('mysql:dbname=coursmysql5;host=localhost', "root", "");
//   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   $resultat = $pdo->query('SELECT firstname, date_of_birth, gender FROM users WHERE gender = "M"');
//   $tabUsers = $resultat->fetchAll(PDO::FETCH_OBJ);
// } catch (PDOException $e) {
//   die('Erreur : ' . $e->getMessage());
// }

// $aujourdhui = new DateTime();
// foreach ($tabUsers as $user) {
//   echo "<br>Prénom : " . $user->firstname . "<br>";
//   echo "Genre : " . $user->gender . "<br>";
//   // echo "Age : " . $user->date_of_birth. "<br>";
//   $dateNaiss = new DateTime($user->date_of_birth);
//   $age = $aujourdhui->diff($dateNaiss);
//   echo "Age : " .  $age->y . " ans<br>";
// }

// 8) Essayez de modifier le prénom de l'utilisateur 5 de la table users.
try {
  $resultat = $pdo->query('SELECT id_user FROM users LIMIT 4,1'); // facciamo la richiesta 
  $id = $resultat->fetch(); // guardiamo se l'uttilisateur 5 esiste
  if (isset($id[0])) { // se esiste allora facciamo la modifica questo mostra in php 
    $req = $pdo->prepare("UPDATE users SET firstname = 'Eden' WHERE id_user = " . $id[0] . " LIMIT 1"); // concateno sql e php non utilizzo i guimmet simple perche id è un numero e non una stringa
    $req->execute();
    echo "<br>Modification du prénom du 5 ème utilisateur !<br>";
  } else { // se non esiste mostriamo un messaggio di errore
    echo "<br>Utilisateur pas trouvé<br>";
  }
} catch (PDOException $e) { // se c'è un errore nella connessione o nella query mostriamo un messaggio di errore
  die('Erreur : ' . $e->getMessage());
}


// // 9) Essayez de supprimer l'avant dernier article de votre table articles.

try {
  $resultat = $pdo->query('SELECT id_article FROM articles ORDER BY id_article DESC LIMIT 1,1'); // facciamo la richiesta per prendere l'id dell'avant dernier article
  $id = $resultat->fetch(); // guardiamo se l'article esiste
  if (isset($id[0])) { // se esiste allora facciamo la modifica questo mostra in php
    $req = $pdo->prepare("DELETE FROM articles WHERE id_article = " . $id[0] . " LIMIT 1"); // concateno sql e php non utilizzo i guimmet simple perche id è un numero e non una stringa");
    $req->execute();
    echo "Suppression de l'avant dernier article réussi !<br>";
  }
} catch (PDOException $e) {
  die('Erreur : ' . $e->getMessage());
}

// 10) Essayez de créer une page qui permet de voir sous forme de tableau la table user.

// fatto in tabUser.php 


// 11) Essayez de créer une page qui permet de rajouter un utilisateur, via à un formulaire,
// à la table users.





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