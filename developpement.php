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
			<p>A rédiger par Younès et Salomé
			</p>
		</div>
    </div>
	<br><br>

<?php
    include "include/footer.php";
?>