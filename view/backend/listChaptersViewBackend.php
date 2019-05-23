<?php
session_start();
if ((!isset($_SESSION['administrateur'])) || (empty($_SESSION['administrateur']))) {
    header ('Location: view/frontend/ErrorView');
}
?>

<?php $title = 'Panneau d\'administration'; ?>
	

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
	          <a class="listChapters-link" href="index.php?action=chapterBackend&amp;id=<?= $data['id'] ?>">
	            <div class="listChapters-hover">
	              <div class="listChapters-hover-content">
	                <i class="hover-read">LIRE CE CHAPITRE</i>
	              </div>
	            </div>
	            <img class="img-fluid" src="public/img/<?= $data['image'] ?>" alt="">
	          </a>
	        </div>
	        <div class="col-md-8 col-sm-6">
	        	<div class="row ml-auto">
	        		<div class="chapterTitle">
	        			<a class="" href="index.php?action=chapterBackend&amp;id=<?= $data['id'] ?>"><h4><?= htmlspecialchars($data['title']) ?></h4></a>
	        		</div>
	        		<div class="ml-auto mr-3">
	        			<a class="chapterLink-delete fas fa-ban" title="Supprimer le chapitre" href="index.php?action=deleteChapter&amp;id=<?= $data['id'] ?>">&nbsp;Supprimer</a>
	        		</div>
	        	</div>
	            <p class="text-muted"><em>&nbsp;le <?= $data['creation_date_fr'] ?></em></p>
	            <p class="content content-listChapters text-justify"> <?= nl2br(html_entity_decode(substr($data['content'], 0, 490))) ?></p>
	            <div class="listChapters-link-bottom">
		            <a class="chapterLink fas fa-comment" href="index.php?action=chapterBackend&amp;id=<?= $data['id'] ?>">&nbsp;0 commentaires</a>
					<a class="chapterLink float-right fas fa-edit" title="Editer le chapitre" href="index.php?action=adminUpdateChapter&amp;id=<?= $data['id'] ?>">Editer</a>
					<a class="chapterLink float-right fas fa-long-arrow-alt-right" title="Lire le chapitre" href="index.php?action=chapterBackend&amp;id=<?= $data['id'] ?>">&nbsp;Voir le chapitre&nbsp;|&nbsp;</a>
				</div>
	        </div>
        </div>  
        <?php
				} // Endwhile			 
			?>
	</div>		
    </section> 


	<?php $content = ob_get_clean(); ?>
	<?php require 'view/backend/template.php'; ?>


	
				
