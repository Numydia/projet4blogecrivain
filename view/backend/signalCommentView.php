<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

<section class="" id="editChapter">
    <div class="container ">
      <div class="row">
        <div class="section-header col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Commentaires signalés</h2>
        </div>
      </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Chapitre</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Commentaire</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($comment = $comments->fetch()): ?>
           
                    <form action="index.php?action=approveComment&amp;id=<?= $comment['id'] ?> " method="post">    
                        <tr>
                            <th scope="row"><?= htmlspecialchars($comment['title']) ?></th>
                            <td><?= htmlspecialchars($comment['author']) ?></td>
                            <td><?= htmlspecialchars($comment['comment']) ?></td>
                            <td><?= htmlspecialchars($comment['comment_date_fr']) ?></td>                   
                            <td><button type="submit" class="btn btn-sm btn-primary">Autoriser</button></td>
                    </form>
                    <form action="index.php?action=deleteCommentReport&amp;id=<?= $comment['id'] ?> " method="post">
                            <td><button type="submit" class="btn btn-sm btn-danger">Supprimer</button></td>     
                        </tr>
                    </form>  
                </tbody>
                <?php endwhile; ?>
            </table>
            </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'view/backend/template.php'; ?>