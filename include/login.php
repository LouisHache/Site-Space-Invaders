<html>
<?php
    include "bdd.php";

    $test = user_connection(htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["password"]));

    //Vérifie si les identifiants existent puis connecte ou non l'utilisateur

    if(!$test){
        header( "location: ../login-page.php?error_login=1");
    }
    else{
        if(!session_id())session_start();
        $_SESSION["logged"] = 1;
        $_SESSION["id"] = htmlspecialchars($_POST["email"]);
        header("location: ../index.php");
        exit;
    }


?>
</html>