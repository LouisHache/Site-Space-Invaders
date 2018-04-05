<?php
    include "redirection2.php";
    include "bdd.php";

    //Crée un mot

    if(!strpos($_POST["nom"], " "))
    AddMot(htmlspecialchars($_POST["nom"]), htmlspecialchars($_POST["definition"]), $_POST["createur"], $_POST["langue"]);
    
    else
    header("location: ../creerMot-page.php?error=car&langue=".$_POST["langue"]);
    
?>