<?php $title = 'Panneau d\'administration'; ?>
	
<?php ob_start(); ?>


<section class="" id="editChapter">
    <div class="container ">
      <div class="row">
        <div class="section-header col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Editer un chapitre</h2>
        </div>
      </div>					
        <form action="index.php?action=updateChapter&amp;id=<?= $chapter['id'] ?>" method="post">			            		
        	<div class="form-group">
                <label for="title"><strong>Titre</strong></label><br>
                <input type="text" class="form-control" name="title" id="title" placeholder="Titre du chapitre" value="<?= $chapter['title'] ?>">
			</div>
			<div class="form-group">
                <label for="content"><strong>Contenu</strong></label> 
                <textarea id="content" name="content" placeholder="content" rows="25" cols="150"> <?= $chapter['content'] ?></textarea>
        	</div>
        	<input type="submit" name="submit" class="btn btn-primary">            
		</form>
	</div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'view/backend/template.php'; ?>	