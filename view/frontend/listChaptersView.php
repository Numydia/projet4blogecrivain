<?php $title = 'Billet simple pour l\'Alaska'; ?>

	

	<?php ob_start(); ?>

		<!-- Affichage des chapitres -->
	<section class="bg-light" id="listChapters">
    <div class="container">
      <div class="row">
        <div class="section-header col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Liste des chapitres</h2>
        </div>
      </div>
      	 <?php
				while ($data = $chapters->fetch())
				{
				    ?>
		<div class="background-listChapters-item row bg-white mb-4 pt-3 rounded-left">		    
	        <div class="col-md-4 col-sm-6 listChapters-item">
	          <a class="listChapters-link" href="index.php?action=chapter&amp;id=<?= $data['id'] ?>">
	            <div class="listChapters-hover">
	              <div class="listChapters-hover-content">
	                <i class="">LIRE CE CHAPITRE</i>
	              </div>
	            </div>
	            <img class="img-fluid" src="public/img/<?= $data['image'] ?>" alt="">
	          </a>
	        </div>
	        <div class="listChapters-caption col-md-8 col-sm-6">
	            <h4><?= htmlspecialchars($data['title']) ?></h4>
	            <p class="text-muted"><em>&nbsp;le <?= $data['creation_date_fr'] ?></em></p>
	            <p class="content content-listChapters text-justify"> <?= nl2br(html_entity_decode(substr($data['content'], 0, 490))) ?></p>
	            <div class="listChapters-link-bottom">
		            <a class="chapterLink fas fa-comment" href="index.php?action=chapter&amp;id=<?= $data['id'] ?>">&nbsp;0 commentaires</a>
					<a class="chapterLink float-right fas fa-long-arrow-alt-right" href="index.php?action=chapter&amp;id=<?= $data['id'] ?>">&nbsp;Voir le chapitre</a>
				</div>
	        </div>
        </div>  
        <?php
				} // Endwhile			 
			?>
	</div>		
    </section> 


	<?php $content = ob_get_clean(); ?>
	<?php require 'template.php'; ?>
				
