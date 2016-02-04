<?php snippet('header') ?>

  <main class="main" role="main">

    <div id="about">
      <div class="about-intro"><?php echo $page->intro()->kirbytext() ?></div>
      <?php echo $page->about()->kirbytext() ?>
      <ul>
          <li><a href="https://dribbble.com/robinandersen">Dribbble</a></li>
          <li><a href="https://twitter.com/robin_an">Twitter</a></li>
      </ul>
    </div>

  </main>

<?php snippet('footer') ?>
