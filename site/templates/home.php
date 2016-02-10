<?php snippet('header') ?>

	<main id="main" class="fadein">

		<table class="projects">
		  <tr>
		    <th>Project</th>
		    <th>Description</th>
		    <th>Type</th>
		    <th class="row-year">Year</th>
		  </tr>

		<?php foreach($page->children()->visible() as $article): ?>

		  <tr class="project">

			    <td><a href="<?php echo $article->url() ?>"><?php echo $article->title()->html() ?></a></td>
			    <td class="td-description"><a href="<?php echo $article->url() ?>"><?php echo kirbytext($article->text()) ?></a></td>
			    <td><a href="<?php echo $article->url() ?>"><?php echo kirbytext($article->type()) ?></a></td>
			    <td class="margin-row"><a href="<?php echo $article->url() ?>"><?php echo kirbytext($article->year()) ?></a></td>
		  </tr>

		  <?php endforeach ?>

		</table>

  	</main>

<?php snippet('footer') ?>
