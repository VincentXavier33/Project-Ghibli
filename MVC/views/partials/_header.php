<header class="flex">
 
      <!-- logo -->
       <img class="logo" src="./public/img/logo.png">
       
      <!-- audio -->
      
      <figure class="figure">
      <figcaption><figcaption>
       <audio controls loop>
         <source src="./public/music/intro.mp3"  type="audio/mp3"/>
            Your browser does not support the
            <code>audio</code> element.
       </audio>
     </figure>
     
      <!-- hambuger -->
      <input type="checkbox" id="navi-toggle" class="checkbox"/>
      <label for="navi-toggle" class="button"><span class="icon">&nbsp;</span></label>
      <div class="background">&nbsp;</div>
      <nav class="nav">
      
          <ul class="ul">
              <li class="li"><a class="a" href="index.php?page=app_home">Home</a></li>
          </ul>
          <ul class="ul">
             <?php if (!$auth->isAuthenticated()) { ?> 
             
              <li class="li"><a class="a" href="index.php?page=user_inscription">Inscription</a></li>
              <li class="li"><a class="a" href="index.php?page=user_connexion">Connection</a></li>
              
             <?php } else { ?>
              
              <li><?= $auth->getUser()->getEmail(); ?></li>
              <li class="li"><a class="a"  href="index.php?page=user_profil">Profil</a></li>
              <li class="li"><a class="a"  href="index.php?page=user_logout">Déconnexion</a></li>
			  
              <?php } ?>
          </ul>    
          <ul class="ul">  
              <li class="li">
               <a class="a"  href="index.php?page=real_list">Films</a>
                       <ul>
                          <li class="li"><a class="a-mini"  href="index.php?page=film_list">Hayao Miyazaki</a></li>
                          <li class="li"><a class="a-mini"  href="index.php?page=film_list">Isao Takahata</a></li>
                          <li class="li"><a class="a-mini"  href="index.php?page=film_list">Autres Réalisateurs</a></li>
                      </ul>
              </li> 
          </ul>
          <ul class="ul">
              <li class="li"><a class="a" href="index.php?page=app_musee">Musée</a>
                      <ul>
                          <li class="li"><a class="a-mini"  href="index.php?page=musee_visite">Visite</a></li>
                          <li class="li"><a class="a-mini"  href="index.php?page=musee_y_aller">Y aller</a></li>
                          <li class="li"><a class="a-mini"  href="index.php?page=musee_expo_ephemere">Exposition éphémère</a></li>
                      </ul
              </li>
          </ul>
          <ul class="ul">
              <li class="li"><a class="a"  href="index.php?page=app_studio">Studio</a>
                       <ul>
                          <li class="li"><a class="a-mini" href="index.php?page=studio_historique">Historique</a></li>
                          <li class="li"><a class="a-mini"href="index.php?page=studio_visite_parc">Visite</a></li>
                          <li class="li"><a class="a-mini" href="index.php?page=studio_park">Parc</a></li>
                      </ul>
              </li>
          </ul>
          <ul class="ul">
              <li class="li"><a class="a"  href="index.php?page=app_contact">Contact</a></li>
          </ul>
     
    </nav> 

    </header>