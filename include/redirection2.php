<?php

if(!session_id())session_start();

$redirection = "location: ../index.php";

//Redirection de sécurité pour toutes les pages dans le include

if($_SESSION["logged"] == 0){
    header($redirection);
}

?>