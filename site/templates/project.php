<?php snippet('header') ?>
<main id="main">

  <article>

    <section class="beginning fadein" style="background-color:<?php echo $page->color()->html() ?>" >
      <?php echo $page->cover()->kirbytext() ?>
    </section>

    <section class="case">
      <section class="case-intro">
        <div id="credits">
          <table>
            <tr>
              <th>Client</th>
              <td><?php echo $page->client()->html() ?></td>
            </tr>
            <tr>
              <th>Agency</th>
              <td><?php echo $page->agency()->html() ?></td>
            </tr>
            <tr>
              <th>Developer</th>
              <td><?php echo $page->developer()->html() ?></td>
            </tr>
            <tr>
              <th>Period</th>
              <td><?php echo $page->year()->html() ?></td>
            </tr>
        </table>
        </div>
        <div id="intro"><?php echo $page->intro()->kirbytext() ?></div>
      </section>

      <?php echo $page->project()->kirbytext() ?>


		<div id="pagnation">
			<?php if($page->hasPrevVisible()): ?>
				<a href="<?php echo $page->prevVisible()->url() ?>">Previous</a>
			<?php endif ?>

			<a class="middle-margin" href="<?php echo url('home') ?>">See all</a>

			<?php if($page->hasNextVisible()): ?>
				<a href="<?php echo $page->nextVisible()->url() ?>">Next</a>
			<?php endif ?>
		</div>

    </section>
  </article>

</main>

<?php snippet('footer') ?>
