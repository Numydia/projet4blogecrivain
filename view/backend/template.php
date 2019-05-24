<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- TinyMCE -->
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=kylf2xug6qc1egm47b2xiw47ivoya0qnw0474m28znxymjtg"></script>
    <script>tinymce.init({ selector:'#content',
                       plugings: '',
                       toolbar: 'forecolor backcolor'});</script>

    <!-- Fonts files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">                   
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="public/css/template.css">
    <link rel="stylesheet" type="text/css" href="public/css/index.css">
    <link rel="stylesheet" type="text/css" href="public/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="public/css/listChapters.css">
    <link rel="stylesheet" type="text/css" href="public/css/chapter.css">
    
  </head>
  <body>
    <header>

    <!-- Navigation
    ======================================================= --> 
      <nav class="navbar navbar-expand-lg navbar-light">
        <li class="nav-item logo mt-2">
            <a class="navbar-brand" href="#">Jean Forteroche</a>
          </li>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mt-2">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=listChaptersBackend">Chapitre</a>
          </li>
        </ul>
    

        <form class="form-inline my-2 my-lg-0">
          <a class="btn btn-outline-dark my-2 my-sm-0 ml-2" href="index.php?action=connexion">Backend</a>
        </form>
      </div>
      </nav> 
    </header>

      <?= $content ?>


    <!-- jQuery -->
    
    <!-- Javascript de Bootstrap
    ======================== -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


  </body>
</html>