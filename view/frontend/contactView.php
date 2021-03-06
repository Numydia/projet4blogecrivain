<?php $title = 'Billet pour l\'Alaska'; ?>

<?php ob_start(); ?>



<section id="contact">
      <div class="container">
      	<div class="row">
        	<div class="section-header col-lg-12 text-center">
	  			<h2 class="section-heading text-uppercase">Contact</h2>
			</div>
		</div>	

        <div class="row contact-info mt-4">
          <div class="col-md-4">
            <div class="contact-address">
              <i class="contact-button fas fa-map-marker-alt"></i>
              <h3>Adresse</h3>
              <address>Lorem ipsum dolor sit amet</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="contact-button fas fa-phone"></i>
              <h3>Numéro de téléphone</h3>
              <p><a href="tel:0102030405">01 02 03 04 05</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="contact-button fas fa-at"></i>
              <h3>Email</h3>
              <p><a href="mailto:romaindeleuzepro@gmail.com">romaindeleuzepro@gmail.com</a></p>
            </div>
          </div>
        </div>

        <div class="form">
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nom">
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Objet">
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
            </div>
            <div class="text-center"><button type="submit">Envoyer</button></div>
          </form>
        </div>

      </div>
    </section>


<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>