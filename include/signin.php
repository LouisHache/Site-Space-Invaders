<?php

include "bdd.php";

//Renvoie un message d'erreur si l'utilisateur existe déjà
if(user_exist(htmlspecialchars($_POST["email"])) == 1){
    header("location: ../signin-page.php?error=id");
    exit;
}

//Renvoie un message d'erreur si la recopie du mdp n'est pas valide
else if(htmlspecialchars($_POST["password"])!= htmlspecialchars($_POST["password2"])){
    header("location: ../signin-page.php?error=mdp");
    exit;
}

else{
    if(!strpos($_POST["email"], " ") && !strpos($_POST["password"], " ")){ 
        //Crée un nouvel utilisateur avec les identifiants donnés
        new_user(htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["password"]));
        
        print "<form method = 'POST' action='login.php' id='main'>
                    <input type='hidden' name='email' value=".$_POST['email'].">
                    <input type='hidden' name='password' value=".$_POST['password'].">
                </form>
                
                <script language='JavaScript' type='text/javascript'>
                    document.forms['main'].submit();
                </script>";
    
        exit;
    }
    else
    header("location: ../signin-page.php?error=car"); // Renvoie un message d'erreur si des caractères spéciaux sont inclus
}
?>