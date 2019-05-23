<?php $title = 'Panneau d\'administration'; ?>
	
<?php ob_start(); ?>


	<section class="" id="editComment">
    <div class="container">
      <div class="row">
        <div class="section-header col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Editer un commentaire</h2>
        </div>
      </div>
			<form class="form-group col-sm-8" action="index.php?action=updateComment&amp;chapter_id=<?= $_GET['chapter_id']; ?>&amp;id=<?= $_GET['id']; ?>" method="post">
				<div class="form-group">
					<label for="author">Nom</label>
					<input type="text" class="form-control" name="author" id="author" placeholder="Nom" value="<?= $comment['author'] ?>">
				</div>	
				<div class="form-group">
					<textarea id="comment" name="comment" id="comment" class="form-control" rows="5"><?= $comment['comment'] ?></textarea>
				</div>	
					<button type="submit" name="submit" class="btn btn-success form-group">Editer le commentaire</button>
			</form>
		</div>
	</section>


<?php $content = ob_get_clean(); ?>
<?php require 'view/backend/template.php'; ?>		