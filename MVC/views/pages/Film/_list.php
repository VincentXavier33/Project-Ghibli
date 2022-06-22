<h1>Listes des longs métrages</h1>



<?php
/*var_dump($data['films']);*/


foreach ($data['films'] as $film){ ?>

              
              <?php echo $film->getName(); ?>
           
  <a class="a" href="index.php?page=film_show&id=<?= $film->getId()?>">
   <img src="<?= $film->getPicture(); ?>" alt="Films">
  </a>

  
 <?php  
 
 } 

 ?>


