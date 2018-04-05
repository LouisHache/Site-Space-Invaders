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
        if(empty($_SESSION["logged"]) && $_SESSION["logged"]!=1)
        {
            $_SESSION["logged"] = 0;
        }

        if(empty($_SESSION["id"])){
            $_SESSION["id"] = "";
        }
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
                <a class="navbar-brand" href="index.php"> ChaBaDa</a>
            </div>
            
            <div class="collapse navbar-collapse" id="myNavBar">
                <!--Partie gauche de la navbar -->
                <ul class="nav navbar-nav">
                    <?php
                    print "<li class=".(($_SESSION["page"] == "accueil")?'active':'')."><a href='index.php'>Accueil</a></li>";
                    print "<li class=".(($_SESSION["page"] == "parcourir")?'active':'')."><a href='langue_explorer.php'>Parcourir langue</a></li>";

                    if($_SESSION["logged"]==1)
                    {
                        print "<li class=".(($_SESSION["page"] == "cree")?'active':'')."><a href='creerLangue-page.php'>Créer une langue</a></li>";
                    }
                    ?>
                </ul>


                <!--Partie droite de la navbar-->
                <ul class="nav navbar-nav navbar-right">

                    <?php

                    if($_SESSION["logged"]==0){ // si l'utilisateur n'est pas connecté
                        ?>
                        <li><a href="signin-page.php"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></li>
                        <li><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Se connecter <span class="caret"></a>
                            <ul class="dropdown-menu">
                                <form method="POST" action="include/login.php">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputEmail1" placeholder="Identifiant" name="email" maxlength="15">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="inputPassword1" placeholder="Mot de passe" name="password" maxlength="15">
                                    </div>
                                    <div class="form-group center">
                                        <button type="submit" class="btn btn-default">Se Connecter</button>
                                    </div>
                                </form>
                            </ul>
                        </li>
                        <?php
                    }
                    else{ // s'il est connecté
                        print '<li><a href= profil.php>'.$_SESSION['id']."</a></li>";
                        ?>
                            <li><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Compte <span class="caret"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="profil.php">Paramètres</a></li>
                                    <li><a href="include/logout.php">Se Déconnecter</a></li>
                                </ul>
                            </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</html>