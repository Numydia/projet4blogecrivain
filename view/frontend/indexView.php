<?php $title = 'Billet pour l\'Alaska'; ?>

<?php ob_start(); ?>


	<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('public/img/header3.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="display-4">Billet pour l'Alaska</h3>
          <p class="lead">Une nouvelle forme d'écriture, dans l'air moderne</p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('public/img/header2.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="display-4">Jean Forteroche</h3>
          <p class="lead">Ecrivain et auteur</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
</header>


  <section id="about" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-4 col-xs-12">
          <div class="section-title">
            <h2 class="head-title lg-line">Qui-est Jean<br>Forteroche ?</h2>
            <hr class="bottom-left-line">
            <p class="sec-para text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqu.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis exercitationem modi reiciendis, dignissimos culpa sequi eveniet ab nesciunt commodi soluta, quia ipsum reprehenderit vero magnam, tempora aut atque neque perferendis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente hic reprehenderit placeat, tenetur fugiat deleniti, doloribus. Perferendis non unde numquam maxime fugit suscipit nesciunt repudiandae. Maxime officia aspernatur beatae tenetur?</p>
          </div>
        </div>
        <div class="col-md-7 col-sm-8 col-xs-12">
          <div class="col-sm-12 more-features-box">
            <div class="more-features-box-text">
              <div class="more-features-box-text-icon"> <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i> </div>
              <div class="more-features-box-text-description">
                <h3>Découvrez une autre façon de lire un roman.</h3>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci itaque alias ex facilis enim, accusantium voluptatum ipsam qui animi illo dolorem perferendis ea saepe sit in laudantium voluptate ipsum optio!</p>
              </div>
            </div>
            <div class="more-features-box-text">
              <div class="more-features-box-text-icon"> <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i> </div>
              <div class="more-features-box-text-description">
                <h3>Plongez-vous dans mon univers.</h3>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim accusantium voluptatum ipsam qui animi ad minim veniam, quis nostrud.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>	


	<!-- =================================
	=============== Derniers chapitres -->


	<section class="bg-light" id="chapter">
    <div class="container">
      <div class="row">
        <div class="section-header col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Derniers chapitres</h2>
        </div>
      </div>
      <div class="row">
      	 <?php
				while ($data = $chapter->fetch())
				{
				    ?>
        <div class="col-md-4 col-sm-6 chapter-item">
          <a class="chapter-link" href="index.php?action=chapter&amp;id=<?= $data['id'] ?>">
            <div class="chapter-hover">
              <div class="chapter-hover-content">
                <i class="">LIRE CE CHAPITRE</i>
              </div>
            </div>
            <img class="img-fluid" src="public/img/<?= $data['image'] ?>" alt="">
          </a>
          <div class="chapter-caption">
            <h4><?= htmlspecialchars($data['title']) ?></h4>
            <p class="text-muted"><em>&nbsp;le <?= $data['creation_date_fr'] ?></em></p>
          </div>
        </div>
        <?php
				} // Endwhile			 
			?>
      </div>
	</div>
    </section>    


<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>