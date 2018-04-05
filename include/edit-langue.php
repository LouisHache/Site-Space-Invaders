<?php
    include "redirection2.php";
    include "bdd.php";

    //Edite le nom d'une langue

    if(htmlspecialchars($_POST["nom"])!="" && !LangueExist($_POST['nom']) && !strpos($_POST["nom"], " ")){
        SetNomLangue(GetLangueId($_POST["langue"]), htmlspecialchars($_POST["nom"]));
        header("location: ../langue_explorer.php");      
    }

    else if(strpos($_POST["nom"], " ") != 0){
        header("location: ../edit-langue-page.php?error=car&langue=".$_POST["langue"]);
    }
    
    else{
        header("location: ../edit-langue-page.php?error=nom&langue=".$_POST["langue"]);
    }
        
?>