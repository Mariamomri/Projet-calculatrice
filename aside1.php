<!-- aside navation left -->
<aside class="aside aside-1">

  <nav>

    <!-- home -->
    <a href="./index.php" class="nav-item <?php if ($nav === "index"): ?> active<?php endif ?>">Home</a>

    <!-- f) is connected calculatrice  -->
    <?php if (is_connected()): ?> <!--si è connesso mostrare la linguetta  -->
      <a href="./calculatrice.php" class="nav-item dropdown <?php if ($nav === "calculatrice"): ?> active<?php endif ?>">Calculatrice</a>

      <!-- e) -->
      <nav>
        <a href="./addition.php" class="nav-item ongle2 <?php if ($nav === "addition"): ?>active<?php endif ?>">Addition</a>


        <a href="./multiplication.php" class="nav-item ongle2 <?php if ($nav === "multiplication"): ?>active<?php endif ?>">Multiplication</a>


        <a href="./division.php" class="nav-item ongle2 <?php if ($nav === "division"): ?>active<?php endif ?>">Division</a>


        <a href="./soustractions.php" class="nav-item ongle2 <?php if ($nav === "soustraction"): ?>active<?php endif ?>">Soustraction</a>
      </nav>

      <!-- base de donnees -->
      <a href="./baseDeDonnees" class="nav-item <?php if ($nav === "baseDeDonnees"): ?> active<?php endif ?>">Base de Données</a>

    <?php endif ?>

    <!-- monProfile  -->
    <?php if (is_connected()): ?> <!--si è connesso mostrare la linguetta  -->
      <a href="./monProfil.php" class="nav-item <?php if ($nav === "monProfil"): ?> active<?php endif ?>">Mon Profil</a>
      <!-- fa vedere la linguetta se non è connesso nel menu -->
    <?php else : ?>
      <a href="./monProfil.php" class="nav-item <?php if ($nav === "monProfil"): ?> active<?php endif ?>">Mon Profil</a>
    <?php endif ?> <!--controllo per vedere se l'utente è connesso per far vedere il link monProfile-->


    <!-- debug -->
    <a href="./sessionActuelle" class="nav-item <?php if ($nav === "sessionActuelle"): ?> active<?php endif ?>">Debug</a>

    <!-- reset -->
    <a href="./resetSessions" class="nav-item <?php if ($nav === "resetSessions"): ?> active<?php endif ?>">Reset</a>
  </nav>

  <section class="wrapper">
    <section>
      <img src="assets/images/gifrosa.webp" alt="deco" width="70%">
    </section>
  </section>
</aside>