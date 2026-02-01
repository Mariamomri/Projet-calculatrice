<!-- Pour chacune des pages il faut un onglet bien entendu qui soit en surbrillance quand on est dessus
sauf pour Logout. -->


<!DOCTYPE html>
<html lang="en">

  <?php 
    require_once "functions/autentifications.php";
    ?>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Mariam Omri">
    <meta name="description" content="Projet php decembre 2025">
    <meta name="keywords" content="HTML, CSS, PHP Responsive">

      <!--questo se nel caso non c'è titolo metterà Calculatrice-->
    <title>
        <?php
        if(isset($title)):
            echo $title;
        else:
            echo "Calculatrice";
        endif
        ?>
    </title>

    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    
  </head>


  <body>
    <div class="wrapper">
      <header class="header">
        <div class="logo">
          <img src="assets/images/Ambigram-8-eight-math-2-1-5-rotation-mirror-high-resolution.gif" alt="logo-img" width="100px">
        </div>
        <div>
          <h1 class="titheader">Calculatrice</h1>
        </div>
        <div class="logo">
          <img src="assets/images/Ambigram-8-eight-math-2-1-5-rotation-mirror-high-resolution.gif" alt="logo-img" width="100px">
        </div>
      </header>



      <!-- navigation: home, calculatrice, mon profile sont dans page aside1 -->

      <!-- navigation: login et logout sont dans page aside2 -->


        
        
