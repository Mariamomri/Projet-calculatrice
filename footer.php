<!--il faudrait un footer avec 3 onglets : Home, Debug et Reset. -->

  </div> <!--fermeture de wrapper dans le header.php-->
    <footer>
    <div class="am">
      <p> &copy; 2025 Cfitech, Mariam Omri</p>
    </div>
      
      <div class="footerlink am">
        
        <!-- home -->
          <a href="./index.php" class="nav-item <?php if ($nav === "index"): ?> active<?php endif ?>">Home</a>

        <!-- debug -->
        <a href="./sessionActuelle" class="nav-item <?php if ($nav === "sessionActuelle"): ?> active<?php endif ?>">Debug</a>

        <!-- reset -->
        <a href="./resetSessions" class="nav-item <?php if ($nav === "resetSessions"): ?> active<?php endif ?>">Reset</a>
      </div>

      <div class="am">
        <?php
        date_default_timezone_set("Europe/Brussels"); // fuso orario
        ?>
        <p class="date"><?= date("d/m/Y H:i") ?></p>
      </div>

    </footer>
  </body>
</html>