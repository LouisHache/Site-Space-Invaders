<?php
    include "redirection2.php";
    include "bdd.php";

    //Crée une nouvelle langue 

    if(!strpos($_POST["nom"], " "))
    AddLangue(htmlspecialchars($_POST["nom"]), $_POST["createur"]);
    else
    header("location: ../creerLangue-page.php?error=car");
    
?>