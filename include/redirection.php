<?php

$redirection = "location: index.php";

//Redirection de sécurité pour toutes les pages dans la racine

if($_SESSION["logged"] == 0){
    header($redirection);
}

?>