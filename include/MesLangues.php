<?php

    include "bdd.php";

    //Sur le profil affiche les langues dont vous êtes le créateur, l'administrateur ou un collaborateur

    function AfficherMesLangues(){
        print "
        <div class='row'>
            <div class='col-md-4'>
                Créateur
                <hr class='line'>
                <br>";
                $languesCrea = array();
                $languesCrea = GetLanguesWhereParamEqualsX("createur_l", $_SESSION['id']);
                AfficherLanguesProfil($languesCrea);
                print "
                <br>
            </div>
            <div class='col-md-4'>
                Administrateur
                <hr class='line'>
                <br>";
                $languesAdmin = array();
                $languesAdmin = GetLanguesWhereParamEqualsX("admin_l", $_SESSION['id']);
                AfficherLanguesProfil($languesAdmin);
                print "
                <br>
            </div>
            <div class='col-md-4'>
                Collaborateur
                <hr class='line'>
                <br>";
                $languesCollab = array();
                $languesCollab = GetLanguesCollab();
                AfficherLanguesProfil($languesCollab);
                print "
                <br>
            </div>
        </div>";
    }

    // Pour chaque sous-partie affiche une liste avec les langues
    function AfficherLanguesProfil($langues){
		for($i = 0; $i<count($langues); $i++){
			print "<a href ='langue_explorer.php?langue=".$langues[$i]."&search=%'>".$langues[$i]."</a><br><br>";
		}
    }
    
    // Renvoie toutes les langues dont vous êtes un collaborateur
    function GetLanguesCollab(){
        $bdd = get_bdd();
        $requete = "SELECT DISTINCT LangueId FROM `collab` WHERE `UserId` = :id";
        $sth = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        if($sth->execute(array(":id"=>$_SESSION['id']))){
            $res = array();
            $c = 0;
            while($row = $sth->fetch()){
                $temp = GetLanguesWhereParamEqualsX('id', $row["LangueId"]);
                $res[$c] = $temp[0];
                $c++;
                
            }
            return $res;
        }
        else {
            return "error";
        }
    }

    // Renvoie toutes les langue où le paramètre $param vaut $search
    function GetLanguesWhereParamEqualsX($param, $search){
        $bdd = get_bdd();
        $requete = "SELECT DISTINCT nom FROM `langue` WHERE ".$param." = :search";
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

?>