<h1>Description du film</h1>



<!--films vu pour tous-->
           <h3><?= $data['film']->getName() ?></h3>
          
           <h2><?= $data['film']->getReal()->getFirst_name() ?> <?= $data['film']->getReal()->getLast_name() ?></h2>
           
           
           
   <article>
      
      <img src="<?= $data['film']->getPicture() ?>">
      <p><?= $data['film']->getYear()->format('Y') ?></p>
      <section><?= $data['film']->getSynopsis() ?></section>
      <iframe width="100%" src="<?= $data['film']->getTrailer() ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
   </article>    
   
<!--Changement pour admin -->
          <input type="text" name="commentaire"/>
          <input type="submit" value="comment_add"/>
          
          <a href="comment_edit"></a>
          <a href="comment_delete"></a>
          
<!--Commentaire pour users-->
  <commentaire>
      <form>
          <input type="text" name="commentaire"/>
          <input type="submit" value="comment_add"/>
          
          <a href="comment_edit"></a>
          <a href="comment_delete"></a>
      </form>
  </commentaire>      
      