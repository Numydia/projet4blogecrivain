<?php $title = 'Panneau d\'administration'; ?>

	
	<?php ob_start(); ?>

	<header>
	  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	    <div class="carousel-inner" role="listbox">
	      <div class="carousel-item active" style="background-image: url('public/img/<?= $chapter['image'] ?>')">	        
	      </div>
	    </div>
	  </div>
	</header>

		<!-- ========================
		================ Chapters -->
		<section class="bg-white" id="chapter">
	    	<div class="container">
	      	  <div class="row">
	        		<div class="section-header-chapter col-lg-12 text-center">
	          			<h2 class="section-heading text-uppercase"><?= $chapter['title'] ?></h2>
	        		</div>
	        </div>
				<div class="container col-xl-8 col-lg-10 col-md-12">
						<p class="first-letter"> <?= $chapter['content'] ?></p>
					<div class="listChapters-link-bottom">
						<a class="chapterLink fas fa-long-arrow-alt-left" href="index.php?action=listChaptersBackend">&nbsp;Retour à la liste des chapitres</a>
						<a class="chapterLink-delete float-right fas fa-ban" title="Supprimer ce chapitre" href="index.php?action=deleteChapter&amp;id=<?= $chapter['id'] ?>">&nbsp;Supprimer</a>
						<a class="chapterLink float-right fas fa-edit" title="Editer ce chapitre" href="index.php?action=adminUpdateChapter&amp;id=<?= $chapter['id'] ?>">Editer&nbsp;|&nbsp;</a>
					</div>
				</div>
			  </div>
		</section>

		<!-- =======================
		=============== Comments -->	

		<section class="comment">
			<h2 class="chapter-comment container col-xl-8 col-lg-10 col-md-10">Commentaires</h2>
				<div class="container col-xl-8 col-lg-12 col-md-12">
					<hr class="mt-3">
				<form class="form-group pt-3" action="index.php?action=addCommentBackend&amp;id=<?= $chapter['id'] ?>" method="post">
					<div class="form-group">
						<label for="author">Nom</label>
						<input type="text" class="form-control" name="author" id="author">
					</div>	
					<div class="form-group">
						<label for="comment">Commentaire</label>
						<textarea id="comment" name="comment" id="comment" class="form-control" rows="4"></textarea>
					</div>	
						<button type="submit" name="submit" class="btn btn-dark form-group">Envoyer!</button>
				</form>
				</div>

			<div class="container-page mt-4">
					<div class="container style-container col-xl-8 col-lg-10 col-md10">
						<?php while ($comment = $comments->fetch()): ?>
							<div class="row">
								<p class="author_comment text-uppercase font-weight-bold"><?= htmlspecialchars($comment['author']) ?></p>
								<p class="author_date text-muted"><em>&nbsp;le <?= $comment['comment_date_fr'] ?></em></p>&nbsp;</p>
								<div class="ml-auto mr-3">
									<a class="chapterLink-delete float-right fas fa-ban pt-1" title="Supprimer ce commentaire" href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>">&nbsp;Supprimer</a>		
									<a class="chapterLink float-right fas fa-edit pt-1" title="Editer ce commentaire" href="index.php?action=adminUpdateComment&amp;chapter_id=<?= $chapter['id']; ?>&amp;id=<?= $comment['id']; ?>">Editer&nbsp;</a>
									
								</div>
							</div>	
							
							<p class="comment"> <?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
						<?php endwhile; ?>	
					</div>	
				</div>		
		</section>


	<?php $content = ob_get_clean(); ?>
	<?php require 'view/backend/template.php'; ?>
