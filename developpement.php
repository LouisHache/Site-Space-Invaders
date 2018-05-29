<html>
<?php

	/* include */
    include "include/head.php";
	
?>
    <div class="container">
		<!-- Présentation du site -->
		<div class="bg-faded p-4 my-4">
			<hr class="divider">
			<h2 class="text-center text-lg text-uppercase my-0"> <strong>Head Tracking </strong></h2>
			<hr class="divider"><br>
			<div class="row">
				<div class="col-lg-6">
					<img src="https://compass-ssl.xbox.com/assets/89/a6/89a6cdd2-28f5-4b62-a4cd-88d910954d7e.jpg?n=X1-Kinect-Sensor_Feature-1400_Voice-Commands_800x450.jpg" 
					class="img-fluid center" alt="image de la kinect V2">
					<p><strong>Kinect V2</strong></p>
				</div>
				<div class="col-lg-6">
					<strong>La Kinect V2 est le capteur que nous utilisons pour capter les mouvements de la tête des deux joueurs.</strong><br/><br/>
					Elle dispose d'une caméra et de plusieurs capteurs infrarouge. 
					La librairie fournit avec de Microsoft nous permet de traiter les données de ces capteurs afin d'obtenir les positions dans l'espace des joueurs. 
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<strong>Nous utilisons les angles d'Euler pour décrire les mouvements de la tête.</strong></br></br>
					La librairie de Microsoft nous donne la position de la tête sous la forme d'un Quaternion que nous convertissons en angle d'Euler afin
					de rendre les données plus simple à manipuler.
				</div>
				<div class="col-lg-6">
					<img src="https://www.researchgate.net/profile/Alberto_Fernandez21/publication/309543534/figure/fig3/AS:423204863909902@1477911310995/Head-pose-can-be-decomposed-in-pitch-yaw-and-roll-angles.png" 
					class="img-fluid center" alt="Mouvement de la tête (yaw roll pitch)">
					<p>
					<strong>Mouvement de la tête</strong>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Projection_orthogonale_point_sur_droite_dans_plan_proprietes.svg/220px-Projection_orthogonale_point_sur_droite_dans_plan_proprietes.svg.png" 
					class="img-fluid center" alt="Projection d'un point sur un plan">
					<p>
					<strong>Projection de la tête sur le plan de l'écran</strong>
					</p>
				</div>
				<div class="col-lg-6">
					<strong>Nous obtenons l'endroit où la personne regarde à l'écran.</strong></br></br>
					On cherche la normal au plan qui passe par le point centrale de la tête de la personne.
					Puis à l'aide de la position angulaire de la tête, nous obtenons là où regarde la personne sur l'écran.
				</div>
			</div>
		</div>
		
		<div class="bg-faded p-4 my-4">
			<hr class="divider">
			<h2 class="text-center text-lg text-uppercase my-0"> <strong>Le jeu </strong></h2>
			<hr class="divider"><br>
			<p>
			Nous avons séparé le développement du jeu en 4 modules :
			<ul>
				<li>Gestion de la génération des ennemis</li>
				<li>Gestion de la prise de dégats</li>
				<li>Gestion du score</li>
				<li>Gestion des canons et des balles</li>
			</ul>
			</p>
				<p>
					<div class="col-lg-6">
						<strong>Gestion de la génération des ennemis</strong> : <br/>
						Nous avons crée 3 scripts permettant la génération d'ennemis : <br>
							un permettant la génération aléatoire des dits ennemis<br>
							un permettant la génération et l'enregistrement des positions de spawn générées<br>
							un permet la génération d'ennemis à partir d'un script
					</div>
				</p>
				<p>
					<div class="col-lg-6">
						<strong>Gestion de la prise de dégat</strong> : <br/>
							L'ennemis alpha est supprimé dès qu'il entre en contact avec une balle.<br>
							L'ennemi beta est éliminé dès lors qu'il est touché par 2 balles provenant de chaque joueur dans un intervalle de temps restreint<br>
					</div>
				</p>
				
				<p>
					<div class="col-lg-6">
						<strong>Gestion du score</strong> : <br/>
							Conformément au protocole nous avons mis en place deux scores : 
							<ul>
								<li>Un score de motivation, visible par les joueurs. Il augmente lorsqu'ils éliminent des ennemis et diminue lorsqu'ils les laissent passer.</li>
								<li>Un score caché, qui mesure leur collaboration selon des scénarios préétablis.</li>
							</ul>
					</div>
				</p>
				
				<p>
					<div class="col-lg-6">
						<strong>Gestion du canons et des balles</strong> : <br/>
						Les canons sont dirigés vers la zone d'attention de chaque joueur, et donc contrôlés par leurs têtes.
						Ils tirent des balles en permanence, à intervalle régulier.
					</div>
				</p>
				
			</div>
<<<<<<< HEAD
=======

			<div class="bg-faded p-4 my-4">
>>>>>>> c6a7f9c0d183461690bd80dd5b0e1e2e04e8a71f
		</div>

		<div class="bg-faded p-4 my-4">
			<hr class="divider">
			<h2 class="text-center text-lg text-uppercase my-0"> <strong>Scriptage d'une partie </strong></h2>
			<hr class="divider"><br>
			<p>
				Méthode : 
					génération aléatoire d'une partie pendant une certaine durée  et enregistrement des positions générée pour toutes les vagues dans un fichier texte<br>
					ajout des évenements scriptés à la main <br>
					réalisation du symetrique à ajouter à la fin du fichier texte<br>
				Le script de génération des ennemis est prêt à etre utiliser.<br>
				Nous avions prévus au départ dans le protocole de réaliser des partie de 10 minutes (20 minutes au total pour les 2 configurations). Nous nous sommes vite rendu compte que cela etait beaucoup trop long, nous avons donc divisé ce temps par 2.<br>
				<div class = "row">
				<div class="col-lg-6">
				<strong>Les évenements scriptés </strong><br> De manière reguliere nous declenchons les evenements suivants :<br>
				- apparition de l'ennemi beta a gauche(*2)<br>
				- apparition de l'ennemi beta a droite  (*2)<br>
				- apparition de l'ennemi beta au centre<br>
				- surcharge à droite (*2)<br>
				- surcharge à gauche (*2)<br>
				</div>
				<div class="col-lg-6">
				<img src="images/script.png" alt="screenshot" class="img-center img-fluid">
				</div>
				</div>

			</p>
		</div>

		<div class="bg-faded p-4 my-4">
			<hr class="divider">
			<h2 class="text-center text-lg text-uppercase my-0"> <strong>Sauvegarde des données </strong></h2>
			<hr class="divider"><br>
			<div class="row">
				<p class="center-text">
					<strong>Les données sont enregistrées dans différents fichiers.</strong></br></br>
					La nomenclature du dossier de sauvegarde est "NuméroEquipe_Modalité".
					Ce dossier est séparé en différent sous dossier : un par type de donnée.
					Chaque fichier correspond à une donnée.
				</p>
			</div>
			<p class="center-text"><strong>Les différentes données</strong></p></br></br>
			<div class="row">
				<div class="col-lg-6">
				<img src="images/PA.png" 
					class="img-fluid center" alt="Point d'attention">
				</div>
				<div class="col-lg-6">
					<strong>Coordonnées du point d'attention</strong></br></br>
					Nous enregistrons les positions des points d'attentions dans 4 fichiers différents:</br>
					Un par joueur et un par composante (x et y).</br>
					Ces données sont du type réel.
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<strong>Mort des ennemis</strong></br></br>
					Nous enregistrons le point où l'ennemi a été tué, le temps auquelle il a été tué, le type d'ennemi (alpha et beta),
					le joueur qui l'as tué (joueur 1, joueur 2 ou lorsqu'il arrive en bas, on met le nombre 0).					
				</div>
				<div class="col-lg-6">
				<img src="images/alien.png" 
					class="img-fluid center" alt="Alien">				
				</div>
			</div>
		</div>
		<div class="bg-faded p-4 my-4">
			<hr class="divider">
			<h2 class="text-center text-lg text-uppercase my-0"> <strong>Premier test utilisateur </strong></h2>
			<hr class="divider"><br/>
			<div class="row">
				<div class="col-lg-6">
					Au cours de premiers tests utilisateurs nous avons pu identifié quelques problèmes :<br>
					- 	expliquer qu'il faut viser avec sa tete et non en bougeant tout son corps<br>
					-	diminuer la vitesse des ennemis<br>
					-	retirer les ennemis sur les cotés <br>
					-	donner une petite persiode d'adaptation avant de commencer le test <br>
				</div>
			</div>
		</div>
    </div>
	<br><br>

<?php
    include "include/footer.php";
?>