<?php
    include "redirection2.php";
    include "bdd.php";

    // Supprime un synonyme
    DeleteSynonyme($_GET["motId"], $_GET["synonymeId"]);
    
    header("location: ../synonyme_explorer.php?langue=".$_GET["langue"]."&motId=".$_GET["motId"]);
?>