<?php $title = 'Panneau d\'administration'; ?>
	
	<?php ob_start(); ?>
 

 <section id="dashboard">
      <div class="container">
      	<div class="row">
        	<div class="section-header col-lg-12 text-center">
	  			<h2 class="section-heading text-uppercase">Tableau de bord</h2>
			</div>
		</div>

			

        <div class="row dashboard mt-4">
          <div class="col-md-4 text-center">
          	<a class="manage-chapter-link" href="index.php?action=listChaptersBackend">
	            <div class="manage-chapter">
	              <i class="fas fa-book fa-2x"></i>
	              <h3>Gestion des chapitres</h3>
	              <p>Voir, éditer ou supprimer un chapitre</p>
	            </div>
        	</a>
          </div>

          <div class="col-md-4 text-center">
          	<a class="add-chapter-link" href="index.php?action=adminNewChapter">
	            <div class="add-chapter">
	              <i class="fas fa-plus fa-2x"></i>
	              <h3>Ajouter un chapitre</h3>
	              <p>Le titre parle de lui même !</p>
	            </div>
       	    </a>
          </div>

          <div class="col-md-4 text-center">
            <a class="signal-comments" href="index.php?action=commentSignal">
	            <div class="signal-comments">
	              <i class="fas fa-flag fa-2x"></i>
	              <h3>Commentaires signalés</h3>
	              <p>Supprimer tout ces méchants commentaires</p>
	            </div>
        	</a>
          </div> 
        </div>
       </div>
</section>       				



<?php $content = ob_get_clean(); ?>
<?php require 'view/backend/template.php'; ?>