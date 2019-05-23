<?php $title = 'Administration'; ?>

<?php  ob_start(); ?>


<section class="h-100">
  <div class="modal-dialog">
  <div class="modal-content">
          <h1 class="text-center mt-3">Login</h1>
      <div class="modal-body">
          <form class="form col-md-12 center-block" name="password" id="password" action="index.php?action=login" method="post">
            <div class="form-group">
              <input type="text" name="login" class="form-control input-lg" placeholder="Pseudo">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Mot de passe">
            </div>
            <div class="form-group">
              <button name="connexion" type="submit" value="connexion" class="btn btn-dark btn-lg btn-block">Se connecter</button>
            </div>
          </form>
      </div>
  </div>
  </div>
</section>
<div class="margin-form">
</div>

<?php  $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>