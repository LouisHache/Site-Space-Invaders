<?php
    include "bdd.php";
    include "redirection2.php";

    //Ajoute un collaborateur 

    if(empty($_GET["langue"]) || empty($_POST["user"])){
        print "error";
    }
    else{
        AddLangueCollab(GetLangueID($_GET["langue"]),htmlspecialchars($_POST["user"]));
    }
    


    
?>