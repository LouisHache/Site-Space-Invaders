<?php
    if(!session_id())session_start();
    $_SESSION["logged"] = 0;
    $_SESSION["id"] = "";

    //Déconnecte l'utilisateur
    
    header("location: ../index.php");
    exit;
?>