<aside class="aside aside-2">
      <section class="wrapper">
        
          <img src="assets/images/girl.png" alt="login" width="100%">
        
        
        <!-- a) login/logout -->
        <nav>
          <?php if(!is_connected()): ?> <!--si è connesso mostrare la linguetta login se no mostra logout  -->
          <a href="login.php" class="nav-item log <?php if ($nav === "login"): ?> active <?php endif ?>">Login</a> 
          <?php else : ?> 
          <a class="nav-item log" href="./logout">Logout</a> 
          <?php endif; ?>
        </nav>
      </section>
        <br>
      
    </aside>