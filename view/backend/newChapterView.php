<?php $title = 'Panneau d\'administration'; ?>

<?php ob_start(); ?>

<section class="" id="editChapter">
    <div class="container ">
      <div class="row">
        <div class="section-header col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Ajouter un chapitre</h2>
        </div>
      </div>
        <form action="index.php?action=addChapter" method="post">
            <div class="form-group">
                <label for="image"><strong>Image</strong></label>
                <input type="text" class="form-control" name="image" id="image" placeholder="Nom de l'image">
            </div>
        	<div class="form-group">
                <label for="title"><strong>Titre</strong></label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Titre du chapitre">
			</div>
			<div class="form-group">
                <label for="content"><strong>Contenu</strong></label> 
                <textarea id="content" name="content" rows="25" cols="150"></textarea>
        	</div>
        	<input type="submit" name="submit" class="btn btn-primary">            
		</form>
	</div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'view/backend/template.php'; ?>	