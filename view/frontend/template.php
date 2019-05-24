<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>

    <!-- Bootstrap files -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Fonts files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="public/css/template.css">
    <link rel="stylesheet" type="text/css" href="public/css/index.css">
    <link rel="stylesheet" type="text/css" href="public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="public/css/listChapters.css">
    <link rel="stylesheet" type="text/css" href="public/css/chapter.css">
    <link rel="stylesheet" type="text/css" href="public/css/contact.css">
  </head>
  <body>

    <!-- ================== Navigation ========================
    ======================================================= --> 
      <nav class="navbar navbar-expand-lg navbar-light pb-2">
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
            <a class="nav-link" href="index.php?action=listChapters">Chapitre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=contact">Contact</a>
          </li>
        </ul>
    

        <form class="form-inline my-2 my-lg-0">
          <a class="btn btn-outline-dark my-2 my-sm-0 ml-2" href="index.php?action=connexion">Connexion</a>
        </form>
      </div>
      </nav>

      <!-- ================ Content ===========================
    ======================================================= --> 


      <?= $content ?>


    <!-- ================== Footer ========================
    ======================================================= -->  

<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mt-4">
          <span class="copyright">Copyright &copy; Deleuze Romain 2019</span>
        </div>
        <div class="col-md-6 mt-2">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a class="footer" href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="footer" href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="footer" href="#">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
</footer>


    <!-- jQuery -->
    
    <!-- Javascript de Bootstrap
    ======================== -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


  </body>
</html>