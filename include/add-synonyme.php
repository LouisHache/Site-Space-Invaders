<?php

include "bdd.php";
include "redirection2.php";

//Ajoute un synonyme

AddSynonyme($_POST["mot"], $_POST["mot2"]);

?>