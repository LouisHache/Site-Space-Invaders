<?php
include "redirection2.php";
include "bdd.php";

//Edite un mot ou sa définition

if(!strpos($_POST["nom"], " "))
    UpdateMot($_POST["motId"], $_POST["nom"], $_POST["def"]);

else
    header("location: ../edit-mot-page.php?error=car&langue=".GetLangueInfo(GetMotInfo($_POST["motId"], "langue_m"), "nom")."&motId=".$_POST["motId"]);
?>