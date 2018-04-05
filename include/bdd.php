<?php

    // Renvoie la base de données
    function get_bdd(){
        try
        {
            return new PDO('mysql:host=localhost;dbname=chabada;charset=utf8', 'chabada_user', 'secret');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    }



    //REnvoie l'info $info sur l'utilisateur $pseudo
    function GetUserInfo($pseudo, $info){
        $bdd = get_bdd();
        $requete = "SELECT ".$info." FROM `usr` WHERE `pseudo` =  :pseudo";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array( ":pseudo"=> $pseudo));  
        return $sth->fetch()[$info];
    }

    //Renvoie tous les collaborateurs de la langue d'identifiant $id
    function GetUsersCollabLangue($id, $search = "%"){
        $bdd = get_bdd();
        $requete = "SELECT DISTINCT UserId FROM `collab` WHERE `LangueId` = :id AND UserId LIKE :search ";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        if($sth->execute(array( ":id"=> $id, ":search"=>$search))){
            $res = array();
            $c = 0;
            while($row = $sth->fetch()){
                
                $res[$c] = $row["UserId"];
                $c++;
                
            }
            return $res;
        }
        else {
            return "error";
        }
        
    }

    

    //Renvoie tous les utilisateurs dont le pseudo ressemble à la recherche
    function GetUsers($search = "%"){
        $bdd = get_bdd();
        $requete = "SELECT `pseudo` FROM `usr` WHERE `pseudo` LIKE :search";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        if($sth->execute(array( ":search"=>$search))){
            $res = array();
            $c = 0;
            while($row = $sth->fetch()){
                $res[$c] = $row["pseudo"];
                $c++;
                
            }
            return $res;
        }
        else {
            return "error";
        }
        
    }

    //Renvoie 1 si les identifiants correspondent à un compte existant
    function user_connection($user_login, $user_mdp){
        $bdd = get_bdd();
        $requete = "SELECT COUNT(*) AS 'nb' FROM `usr` WHERE `pseudo`= :login AND `mdp` = :mdp ;";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":login"=> $user_login, ":mdp" => $user_mdp));
        $ligne = $sth->fetch();

        if($ligne['nb'] == 0)
        {
            return 0;
        }
        else{
            return 1;
        }
    }

    //Renvoie 1 si l'utilisatreur de pseudo $user_login existe
    function user_exist($user_login){
                $bdd = get_bdd();
                $requete = "SELECT Count(*) AS 'nb' FROM `usr` WHERE `pseudo`= :login;";
                $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":login"=> $user_login));
                $ligne = $sth->fetch();
        
                if($ligne['nb'] == 0)
                {
                    return 0;
                }
                else{
                    return 1;
                }
    }
    
    //Crée un nouvel utilisateur avec ces identifiants
    function new_user($user_login, $user_mdp){
        $bdd = get_bdd();
        $requete = "INSERT INTO `usr` (`pseudo`, `mdp`) VALUES (:login, :mdp);";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array( ":login"=> $user_login, ":mdp" => $user_mdp));
    }

    //Change le pseudo d'un utilisateur (inutilisé pour le moment)
    function SetPseudo($pseudo, $newPseudo){
        if(user_exist($pseudo)){
            $bdd = get_bdd();
            $requete = "UPDATE `usr` SET `pseudo` = :newPseudo WHERE `usr`.`pseudo` = :pseudo;";
            $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array( ":newPseudo"=> $newPseudo, ":pseudo" => $pseudo));
        }

    }

    //Change le mot de passe d'un utilisateur (inutilisé également)
    function SetMDP($pseudo, $mdp, $newMDP){
        if(user_connection($pseudo, $mdp)){
            $bdd = get_bdd();
            $requete = "UPDATE `usr` SET `mdp` = :newMDP WHERE `usr`.`pseudo` = :pseudo;";
            $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array( ":newMDP"=> $newPseudo, ":pseudo" => $pseudo));
        }
    }

    //Renvoie l'identifiant de la langue $nom
    function GetLangueId($nom){
        $bdd = get_bdd();
        $requete = "SELECT id FROM `langue` WHERE `nom` =  :nom";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array( ":nom"=> $nom));
        return $sth->fetch()["id"];

    }

    //Renvoie les mots de la langue d'id $langue_id ressemblant à la recherche
    function GetMots($langue_id, $search="%"){
        $bdd = get_bdd();
        $requete = "SELECT DISTINCT mot FROM `mot` WHERE `langue_m` = :id AND mot LIKE :search ";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        if($sth->execute(array( ":id"=> $langue_id, ":search"=>$search))){
            $res = array();
            $c = 0;
            while($row = $sth->fetch()){
                $res[$c] = $row["mot"];
                $c++;
                
            }
            return $res;
        }
        else {
            return "error";
        }
        
    }

    //Renvoie les identifiants des mots de la langue d'id $langue_id ressemblant à la recherche
    function GetMotsId($langue_id, $search="%"){
        $bdd = get_bdd();
        $requete = "SELECT id FROM `mot` WHERE `langue_m` = :id AND mot LIKE :search ";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        if($sth->execute(array( ":id"=> $langue_id, ":search"=>$search))){
            $res = array();
            $c = 0;
            while($row = $sth->fetch()){
                $res[$c] = $row["id"];
                $c++;
                
            }
            return $res;
        }
        else {
            return "error";
        }
        
    }

    //Renvoie l'identifiant du mot $mot
    function GetMotId($mot){
        $bdd = get_bdd();
        $requete = "SELECT id FROM `mot` WHERE `mot` =  :mot";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        if($sth->execute(array( ":mot"=> $mot))){
            $res = array();
            $c = 0;
            while($row = $sth->fetch()){
                $res[$c] = $row["id"];
                $c++;  
            }
            return $res;
        }
        else {
            return "error";
        }
    }

    //Renvoie la définition d'un mot
    function GetMotDefinition($id){
        return GetMotInfo($id, "definition_mot");
    }

    //Renvoie le créateur d'un mot
    function GetMotCreateur($id){
        return GetMotInfo($id, "createur_m");
    }

    //Renvpie la date de création d'un mot
    function GetMotDate($id){
        return GetMotInfo($id, "date_crea");
    }

    //Renvoie la langue dont est issu un mot
    function GetMotLangue($id){
        return GetMotInfo($id, "langue_m");
    }

    //Renvoie le mot d'identifiant $id
    function GetMot($id){
        return GetMotInfo($id, "mot");
    }

    //Renvoie l'information $info du mot d'id $id
    function GetMotInfo($id, $info){
        $bdd = get_bdd();
        $requete = "SELECT ".$info." FROM `mot` WHERE `id` =  :id";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array( ":id"=> $id));  
        return $sth->fetch()[$info];
    }


    //Renvoie les langues dont le nom est semblable à la recherche
    function GetLangues($search="%"){
        $bdd = get_bdd();
        $requete = "SELECT DISTINCT nom FROM `langue` WHERE nom LIKE :search ";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        if($sth->execute(array(":search"=>$search))){
            $res = array();
            $c = 0;
            while($row = $sth->fetch()){
                $res[$c] = $row["nom"];
                $c++;
                
            }
            return $res;
        }
        else {
            return "error";
        }
        
    }
    
    //Renvoie l'info $info de la langue d'id $id
    function GetLangueInfo($id, $info){
        $bdd = get_bdd();
        $requete = "SELECT ".$info." FROM `langue` WHERE `id` =  :id";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array( ":id"=> $id));  
        return $sth->fetch()[$info];
    }

    //Renvoie le créateur d'une langue
    function GetLangueCreateur($id){
        return GetLangueInfo($id, "createur_l");
    }

    //Renvoie l'admin d'une langue
    function GetLangueAdmin($id){
        return GetLangueInfo($id, "admin_l");
    }

    //Renvoie la date de création d'une langue
    function GetLangueDate($id){
        return GetLangueInfo($id, "date_crea");
    }

    //Renvoie le nom d'une langue
    function GetLanguenom($id){
        return GetLangueInfo($id, "nom");
    }

    //Ajoute une nouvelle langue
    function AddLangue($nom, $createur){
        date_default_timezone_set("Europe/Paris");
        $date = GetCurrentTime();
        $createur = $createur;
        $id = GetNextId("langue");

        if(!LangueExist($nom)){
            $bdd = get_bdd();
            $requete = "INSERT INTO `langue` (`id`, `nom`, `date_crea`, `createur_l`, `admin_l`) VALUES (:id, :nom, :cd, :user, :user)";
            $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $res = $sth->execute(array( ":id"=> $id, ":nom" => $nom, ":cd" => (string)$date, ":user" => $createur));
            if($res){
                header("location: ../langue_explorer.php");
            }
            else{
                print $id;
                print $nom;
                print $date;
                print $createur;
                print "error";
            }
            
        }
        else{
            header("location: ../creerLangue-page.php?error=nom");
        }

        
    }

    //REnvoie la date et l'heure actuelle
    function GetCurrentTime(){
        date_default_timezone_set("Europe/Paris");
        return date("Y-m-d G:i:s");
    }

    //Renvoie l'id libre suivant
    function GetNextId($table){
        $bdd = get_bdd();
        $requete = "SELECT MAX(`id`) AS 'maxId' FROM ".$table." ";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();  
        $res =  $sth->fetch()["maxId"];
        return $res + 1;
    }

    //Renvoie 1 si la langue de nom $nom existe
    function LangueExist($nom){
        $bdd = get_bdd();
        $requete = "SELECT COUNT(*) AS 'nb' FROM `langue` WHERE `nom` = :nom ";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":nom" => $nom));
        $res = $sth->fetch()["nb"];
        return $res != 0;
    }

    //Supprime la langue de nom $nom
    function DeleteLangue($nom){
        DeleteMotsLangue(GetLangueId($nom));

        $id = GetLangueId($nom);
        $bdd = get_bdd();
        $requete = "DELETE FROM `langue` WHERE `langue`.`id` = :id";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":id" => $id));



    }

    /* Renvoie si l'utilisateur (pseudo = $pseudo) est collaborateur de la langue (nom = $langue) */
    function IsLangueCollab($pseudo, $langue){
        $bdd = get_bdd();
        $requete = "SELECT Count(*) AS 'nb' FROM `collab` WHERE `UserId` = :pseudo AND `LangueId`= :langue ";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":pseudo" => $pseudo, ":langue" => GetLangueId($langue)));
        if($sth->fetch()["nb"] != 0){
            return TRUE;
        }
        else{
            return FALSE;
        }

    }

    /* Modifier nom de la langue (id = $id) */
    function SetNomLangue($id, $nom){
        $bdd = get_bdd();
        $requete = "UPDATE `langue` SET `nom` = :nom WHERE `langue`.`id` = :id ";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":id" => $id, ":nom" => $nom));
    }

    /* Ajouter un collaborateur (pseudo = $pseudo) à une langue (id = $id) */
    function AddLangueCollab($id, $pseudo){
        $bdd = get_bdd();
        $requete = "INSERT INTO `collab` (`UserId`, `LangueId`) VALUES (:pseudo, :id)";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $res = $sth->execute(array(":id" => $id, ":pseudo" => $pseudo));
        if($res){
            header("location: ../collab_viewer.php?langue=".GetLangueInfo($id, "nom"));
        }
        else{
            print $id;
            print $pseudo;
        }
        
    }

    /* Supprimmer un collaborateur (pseudo = $pseudo) de la langue (id = $id) */
    function DeleteCollab($id, $pseudo){
        $bdd = get_bdd();
        $requete = "DELETE FROM `collab` WHERE `collab`.`UserId` = :pseudo AND `collab`.`LangueId` = :id ";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":id" => $id, ":pseudo" => $pseudo));
    }

    /* Supprimer les collaborateurs de la langue (id = $id) */
    function DeleteCollabsLangue($id){
        $pseudos = GetUsersCollabLangue($id);
        foreach($pseudo as $pseudo){
            DeleteCollab($id, $pseudo);
        }
    }

    /* Ajouter un mot à une langue (nom = $langue) */
    function AddMot($nom, $def, $createur, $langue){
        $date = GetCurrentTime();
        $id = GetNextId("mot");

        $bdd = get_bdd();
        $requete = "INSERT INTO `mot` (`id`, `mot`, `definition_mot`, `date_crea`, `createur_m`, `langue_m`) 
        VALUES (:id, :mot, :def, :cd, :user, :langue)";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $res = $sth->execute(array( ":id"=> $id, ":mot" => $nom, ":def" => $def,  ":cd" => (string)$date
        , ":user" => $createur, ":langue" => GetLangueId($langue)));
        if($res){
            header("location: ../mot_explorer.php?langue=".$langue);
        }
        else{
            print $nom;
            print $def;
            print $createur;
            print $langue;
            print $date;
            print $id;
            print "error";
        }
            

    }

    /* supprimmer le mot (id = $id) */
    function DeleteMot($id){
        $synonymes = GetSynonymes($id);
        foreach($synonymes as $syn){
            DeleteSynonyme($id, $syn);
        }

        $bdd = get_bdd();
        $requete = "DELETE FROM `mot` WHERE `id` = :id";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":id" => $id));
    }

    /* supprimer les mots d'une langue */
    function DeleteMotsLangue($id){
        $ids = GetMotsId($id);
        foreach($ids as $i){
            DeleteMot($i);
        }
    }

    /* éditer le mot (id = $id) */
    function UpdateMot($id, $nom, $def){
        $date = GetCurrentTime();

        $bdd = get_bdd();
        $requete = "UPDATE `mot` SET `mot` = :mot, `definition_mot` = :def WHERE `mot`.`id` = :id ";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $res = $sth->execute(array( ":id"=> $id, ":mot" => $nom, ":def" => $def));
        if($res){
            header("location: ../mot_explorer.php?langue=".GetLangueInfo(GetMotInfo($id, "langue_m"), "nom"));
        }
        else{
            print $nom;
            print $def;
            print $createur;
            print $langue;
            print $date;
            print $id;
            print "error";
        }
            

    }

    /* Obtenir le synonyme du mot (id = $id) avec le filtre $search */
    function GetSynonymes($id,$search="%"){
        $bdd = get_bdd();
        $requete = "SELECT DISTINCT `Mot2Id` FROM `synonyme` WHERE `Mot1Id` = :id AND `Mot2Id` IN (SELECT id FROM `mot` WHERE mot LIKE :search)";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        if($sth->execute(array(":search"=>$search, ":id" => $id))){
            $res = array();
            $c = 0;
            while($row = $sth->fetch()){
                $res[$c] = $row["Mot2Id"];
                $c++;
                
            }
            return $res;
        }
        else {
            return "error";
        }
        
    }

    /* Supprimer le synonyme (id = $id_synonyme) du mot (id = $id_mot) */
    function DeleteSynonyme($id_mot, $id_synonyme){
        $bdd = get_bdd();
        $requete = "DELETE FROM `synonyme` WHERE `synonyme`.`Mot1Id` = :id1 AND `synonyme`.`Mot2Id` = :id2";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":id1" => $id_mot, ":id2" => $id_synonyme));
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":id2" => $id_mot, ":id1" => $id_synonyme));
    }

    /* Ajouter un synonyme (id = $synonyme) au mot (id = $mot) */
    function AddSynonyme($mot, $synonyme){
        $bdd = get_bdd();
        $requete = "INSERT INTO `synonyme` (`Mot1Id`, `Mot2Id`) 
        VALUES (:mot, :synonyme)";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $res = $sth->execute(array( ":mot" => $mot, ":synonyme" => $synonyme));
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $res = $sth->execute(array( ":mot" => $synonyme, ":synonyme" =>  $mot));
        if($res){
            header("location: ../synonyme_explorer.php?langue=".GetLangueInfo(GetMotLangue($synonyme), "nom")."&motId=".$synonyme);
        }
        else{
            print "error";
        }
            

    }
	
?>