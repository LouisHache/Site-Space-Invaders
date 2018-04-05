<?php
    include "redirection2.php";
    include "bdd.php";

    //Retire un collaborateur
    
    DeleteCollab(GetLangueId($_GET["langue"]), $_GET["collab"]);

    header("location: ../collab_viewer.php?langue=".$_GET["langue"]);
?>