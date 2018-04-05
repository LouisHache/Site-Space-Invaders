<html>
<?php
	/* Session */
    if(!session_id())session_start();
    $_SESSION["page"] = "accueil";

	/* include */
    include "include/head.php";
	
?>
    <div class="container-fluid">
		<!-- Présentation du site -->
        <?php
			include "include/Logo.php";
		?>

        <div class="container main">
			<div class="row">

					<h1 class="center-text"> Créez votre propre langue !</h1>
					<br>
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2">
							<img src="images/tolkien.png" alt="elfique" class="img-center">
						</div>
						<div class="col-sm-5 col-sm-offset-1">
							<h3>Comme Tolkien !</h3>
							Vous avez toujours admiré Tolkien ou G R.R. Martin pour avoir réussi à créer
							entièrement des langues ? Bientôt vous aussi en serez capables !
						</div>
					</div>
					<br>
					<hr class="line center-line">
					<br>
					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<h3>Un outil extraordinaire!</h3>
							Grâce à Cha Ba Da !, vous pouvez créer une langue de toutes pièces, de la grammaire
							au vocabulaire en passant par les conjugaisons et déclinaisons !
						</div>
						<div class="col-sm-2 ">
							<img src="images/language-brain.JPG" alt="Beauty of Language" class="img-center">
						</div>
					</div>
				
			</div>
            <!-- Exemple de langues -->
        </div>

		<?php
		include "include/Footer3Langues.php";
		Footer3Langues();
		?>
		
		</div>
    </div>
	<br><br>

<?php
    include "include/footer.php";
?>