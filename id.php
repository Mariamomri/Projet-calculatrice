 <!-- 12) Essayez de créer une page dans laquelle on écrit un ID dans un formulaire et qui affiche l'utilisateur qui a cet ID dans un formulaire. S'il ne trouve pas l'ID il doit afficher un message. -->

 <?php
  $title = "id User";
  $nav = "id";
  require "header.php";
  if (!is_connected()) {
    header("location: ./login.php");
  }

  ?>
 <center><b>
     <h1>ID User</h1>
   </b></center>
 <div align="center">
   <div class="col-6">

     <?php


      if (!empty($_POST['id_user'])):

        $id_user = $_POST['id_user'];

        try {
          $req = $pdo->prepare('SELECT * FROM users WHERE id_user = :id_user');
          $req->execute(array(
            'id_user' => $id_user,
          ));
          $user = $req->fetch();
          if ($user) {
            echo "L'utilisateur avec l'ID " . $id_user . " est : " . $user['firstname'] . " " . $user['lastname'] . "<br>";
          } else {
            echo "Aucun utilisateur trouvé avec l'ID " . $id_user . "<br>";
          }
        } catch (PDOException $e) {
          echo "Erreur : " . $e->getMessage();
        }

      else:
        echo "Veuillez remplir le champ ID correctement";

      endif;
