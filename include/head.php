<!DOCTYPE html>
<html lang="fr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts-->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="lib/css/bootstrap.min.css" rel="stylesheet">
    <script src="lib/js/jquery.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>

    

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">

  </head>

  <?php
  //Initialisation des variables de session
  ?>

  <body id="page-top">    
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavBar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand" href="index.php">SPACE INVADERS</a>
            </div>
            
            <div class="collapse navbar-collapse" id="myNavBar">
                <!--Partie gauche de la navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    print "<li class=".(($_SESSION["page"] == "accueil")?'active':'')."><a href='index.php'>Accueil</a></li>";
                    print "<li class=".(($_SESSION["page"] == "parcourir")?'active':'')."><a href='langue_explorer.php'>Page 1</a></li>";

                    print "<li class=".(($_SESSION["page"] == "cree")?'active':'')."><a href='creerLangue-page.php'>Page 2</a></li>";
                    ?>
                </ul>


                <!--Partie droite de la navbar-->
                
            </div>
        </div>
    </nav>
</html>