<html>
<?php

	/* include */
    include "include/head.php";
	
?>
    <div class="container">
		<!-- Présentation du site -->
		<div class="bg-faded p-4 my-4">
			<hr class="divider">
			<h2 class="text-center text-lg text-uppercase my-0"> <strong>La kinect </strong></h2>
			<hr class="divider"><br>
			<div class="row">
				<div class="col-lg-6">
					<img src="https://compass-ssl.xbox.com/assets/89/a6/89a6cdd2-28f5-4b62-a4cd-88d910954d7e.jpg?n=X1-Kinect-Sensor_Feature-1400_Voice-Commands_800x450.jpg" 
					class="img-fluid center" alt="image de la kinect V2">
					<p><strong>Kinect V2</strong></p>
				</div>
				<div class="col-lg-6">
					<p>
					<strong>La Kinect V2 est le capteur que nous utilisons pour capter les mouvements de la tête des deux joueurs.</strong><br/><br/>
					Elle dispose d'une caméra et de plusieurs capteurs infrarouge. 
					La librairie fournit avec de Microsoft nous permet de traiter les données de ces capteurs afin d'obtenir les positions dans l'espace des joueurs. 
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<strong>Nous utilisons les angles d'Euler pour décrire les mouvements de la tête.</strong></br></br>
					La librairie de Microsoft nous donne la position de la tête sous la forme d'un Quaternion que nous convertissons en angle d'Euler afin
					de rentre les données plus simple à manipuler.
				</div>
				<div class="col-lg-6">
					<img src="https://www.researchgate.net/profile/Alberto_Fernandez21/publication/309543534/figure/fig3/AS:423204863909902@1477911310995/Head-pose-can-be-decomposed-in-pitch-yaw-and-roll-angles.png" 
					class="img-fluid center" alt="Mouvement de la tête (yaw roll pitch)">
					<p>
					<strong>Mouvement de la tête</strong>
					</p>
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