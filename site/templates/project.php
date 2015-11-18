<?php snippet('header') ?>
<main id="main">

  <article>

    <section style="background-color:<?php echo $page->color()->html() ?>" class="fadein">
      
      <h1 class="fadeinup"><?php echo $page->title()->html() ?></h1>
      <?php echo $page->intro()->kirbytext() ?>

      

    </section>

    <section class="case">

    	<?php echo $page->project()->kirbytext() ?>

		 	<h4>Credits</h4>
		 	<table class="details">
			  	<tr>
			    	<th>Client</th>
			    	<td>Intersport</td>
			  	</tr>
			  	<tr>
			  		<th>Agency</th>
			    	<td>Jimmyroyal</td>
			  	</tr>
			  	<tr>
			  		<th>Role</th>
			    	<td>Designer</td>
			  	</tr>
			  	<tr>
			  		<th>Development</th>
			    	<td>Void</td>
			  	</tr>
			  	<tr>
			  		<th>Development</th>
			    	<td>Void</td>
			  	</tr>
			</table>
    	
    </section>
  </article>

</main>

<?php snippet('footer') ?>