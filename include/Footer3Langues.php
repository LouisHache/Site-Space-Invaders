<?php
	
	// Affiche la description d'une langue
	function DescriptionLangue($langue){ 
		
		$id = GetLangueId($langue);
		$desc = "";

		$desc = $desc."créateur : ";
		$desc = $desc.GetLangueCreateur($id);
		$desc = $desc."<br>";

		$desc = $desc."administrateur : ";
		$desc = $desc.GetLangueAdmin($id);
		$desc = $desc."<br>";

		$desc = $desc."date de création : ";
		$desc = $desc.GetLangueDate($id);
		$desc = $desc."<br>";

		
		return $desc;
	}
	
	// Ecrit la description et le lien d'une langue 
	function DescriptionLangueIndex($langue){
		$desc = DescriptionLangue($langue);
		print
		'<h2><a href = "langue_explorer.php?langue='.$langue.'&search=%">'.$langue.'</a></h2>
		'.$desc;
	}

	// Ecrit le footer avec les trois langues (index.php)
	function Footer3Langues(){

		include "bdd.php";
		print '
		<div class="container main">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">';
					
					$langues = GetRandomNLangues(3);
					
					for ($i = 0; $i < count($langues); $i++){
						
						print '<div class="col-sm-4 center-text">';
						DescriptionLangueIndex($langues[$i]);
						print '</div>';
					}
						print '
					
				</div>
			</div>
		<div>';
	}

	function GetRandomNLangues($nbLangues){
		$res = GetLangues();
		$langues = array();
		for ($i = 0; $i<$nbLangues; $i++){
			$length = count($res);
			$rand = rand(0, $length - 1);
			$langues[$i] = $res[$rand];
		}
		return $langues;
	}
?>