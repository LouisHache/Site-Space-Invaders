<?php
    include "redirection2.php";
    include "bdd.php";

        //Supprime un mot
        
    DeleteMot($_GET["motId"]);
    header("location: ../mot_explorer.php?langue=".$_GET["langue"]);
?>