<!-- Une page Mon profile qui aura comme titre Mon Profile, qui si vous êtes connecté il vous
dira bienvenu votre prénom dans votre page de profile. Si vous n’êtes pas connecté il vous
renverra vers la page de login. -->

<!-- (Difficile) Je veux que vous reteniez en mémoire pour chaque opération mathématique, les
2 nombres que vous aurez introduit et le résultat. Et que quand vous faites une addition
et/ou une soustraction et/ou une division et/ou une multiplication. On voit dans votre page
de profile ces résultats avec comme titre à chaque fois :
Exemple : Votre dernière division faite, est : nb1 divisé par nb2 donne résultat. Etc… -->


<?php
    
    $title = "Mon Profil";
    $nav = "monProfil";
    // require "functions/authentification.php"; *deja dans header.php pas besoin
    require "header.php";
    
    if(!is_connected()) {
        //si tu n'es pas connecté
        //en gros tu n'as pas le droit d'acceder à cette page
        //du coup on te redirige vers login, pour mettre le bon pseudo et mot de passe
        header("Location: ./login.php"); 
    } 

?>
    <main class="main">
        <section class="monProfil">
            <section class="smain">
                <img src="assets/images/1af8d3b487b77085d5288814f151e1de_w200.webp" alt="coriandoli" class="coriandoli">
                <h1>Bienvenue <?php echo $_SESSION['pseudo']; ?> <br>dans votre  page de profil</h1>
                <img src="assets/images/profilf.png" alt="profil" width="150px" class="img-profil">
            </section>
            <section>
                <img src="assets/images/math-removebg-preview.png" alt="math"  width="400px">
            </section>
            <section>
                <h2>Dernières opérations :</h2>

                <ul>
                    <?php if(isset($_SESSION['dernier+'])): ?>
                        <li><?php echo $_SESSION['dernier+'] ?></li>
                    <?php endif; ?>

                    <?php if(isset($_SESSION['dernier-'])): ?>
                        <li><?php echo $_SESSION['dernier-'] ?></li>
                    <?php endif; ?>

                    <?php if(isset($_SESSION['dernier*'])): ?>
                        <li><?php echo $_SESSION['dernier*'] ?></li>
                    <?php endif; ?>

                    <?php if(isset($_SESSION['dernier/'])): ?>
                        <li><?php echo $_SESSION['dernier/'] ?></li>
                    <?php endif; ?>
                </ul>

                <h2>Total opérations faites : <?php if (isset($_SESSION['compteur'])) {
                    echo $_SESSION['compteur'];
                } else {
                    echo 0;
                }
                ?></h2>

                <h2>Toutes les opérations :</h2>

                <table border="1" cellpadding="10">
                    <tr>
                        <th>Opérations</th>
                        <th>Nombre 1</th>
                        <th>Nombre 2</th>
                        <th>Résultat</th>
                    </tr>

                    <!-- h) garde en memoire j'ai pas tue la session operations in logout-->
                    <?php if(isset($_SESSION['operations'])): ?>
                        <?php foreach($_SESSION['operations'] as $op): ?>
                            <tr>
                                <td><?= $op['type'] ?></td>
                                <td><?= $op['nombre1'] ?></td>
                                <td><?= $op['nombre2'] ?></td>
                                <td><?= $op['totale'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </section>
        </section>
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