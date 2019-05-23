<?php $title = 'Billet pour l\'Alaska'; ?>

<?php ob_start(); ?>

<section>
	<div class="container">
		  <div class="row">
			<div class="section-header col-lg-12 text-center">
	  			<h2 class="section-heading text-uppercase">Commentaire</h2>
			</div>
			<div class="col-lg-12 text-center">
				<p>Ce commentaire est actuellement en attente de modération.</p>
			</div>	
			<div class="footer-bottom"></div>
	  	  </div>
	</div>
</section>	        


<?php $content = ob_get_clean(); ?>
<?php require'template.php'; ?>