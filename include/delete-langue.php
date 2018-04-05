<?php
    include "bdd.php";

    //Supprime une langue

    DeleteLangue($_GET["langue"]);
    header("location: ../langue_explorer.php");
?>