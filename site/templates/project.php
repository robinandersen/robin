<?php snippet('header') ?>
<main id="main">

  <article>

    <section style="background-color:<?php echo $page->color()->html() ?>" class="fadein">
      
      <h1 class="fadeinup"><?php echo $page->title()->html() ?></h1>
      <p class="fadeinup"><?php echo $page->intro()->html() ?></p>

    </section>
  
  </article>

</main>

<?php snippet('footer') ?>