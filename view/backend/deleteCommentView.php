<?php $title = 'Billet pour l\'Alaska'; ?>

<?php ob_start(); ?>

<div class="container commentaire">
    <div class="jumbotron jumbotron-fluid commentaire bg-white">
        <p>Commentaire supprimé.</p>
    </div>
    <a class="chapterLink fas fa-long-arrow-alt-left" href="index.php?action=listChaptersBackend">&nbsp;Retour à la liste des chapitres</a>
</div>

<?php $content = ob_get_clean(); ?>
<?php require'template.php'; ?>