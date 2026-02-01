<?php 
  session_start(); //démarrage de la session
    $title = "Calculatrice";//titre de la page
    $nav = "calculatrice";//indique la page active dans la nav      
require "header.php";

  // g) même si vous tapez dans url vous renvoie vers la page de login
    if(!is_connected()) {
        header("Location: ./login.php"); 
    } 
?>

    <main class="main cal1">
        <ul > 
            <!-- addition -->
            <div class="alineamentoCalc">
                <img src="assets/images/plus2.png" alt="+" width="80px" >
                <li class="nav-item <?php if($nav === "addition" ): ?>active <?php endif ?>">
                    <a class="nav-link cal" href="./addition.php">Addition</a>
                </li> 
            </div>

            <!-- multiplication -->
            <div class="alineamentoCalc">
                <li class="nav-item <?php if($nav === "multiplication" ): ?>active <?php endif ?>">
                    <a class="nav-link cal" href="./multiplication">Multiplication</a>  
                </li>
                <img src="assets/images/per.png" alt="*" width="90px" >
            </div>

            <!-- division -->
            <div class="alineamentoCalc">
                <img src="assets/images/divisione.png" alt="/" width="120px" >
                <li class="nav-item <?php if($nav === "division" ): ?>active <?php endif ?>">
                    <a class="nav-link cal" href="./division">Division</a>
                </li>
            </div>

            <!-- soustraction -->
            <div class="alineamentoCalc">
                <li class="nav-item <?php if($nav === "soustraction" ): ?>active <?php endif ?>">
                    <a class="nav-link cal" href="./soustractions">Soustraction</a>
                </li>
                <img src="assets/images/menopink.png" alt="-" width="100px" >
            </div>
        </ul>
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