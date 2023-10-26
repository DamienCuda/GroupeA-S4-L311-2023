<!-- ERREUR : Include mal orthographié -->

<!-- Appel au fichier qui regroupe les fonctions du programme pour accès ici-->
<?php include 'inc/inc.functions.php'?>


<!DOCTYPE HTML>
<!--
	Story by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<!-- Pas d'attribut lang -->
<html lang="fr"> 
	<head>
		<title>Story by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<?php include 'inc/inc.css.php'; ?>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper" class="divided">
				<?php 
				// ERREUR : Fonction disponible dans le fichier inc/inc.functions.php mal orthographié s en trop
					getPageTemplate(
						// ERREUR : fonction php mal othographié
						// On passe soit le nom du template, soit null à la fonction
						array_key_exists('page', $_GET) ? $_GET['page'] : null
					); 
				?>
				<!-- ERREUR : nom de fichier mal orthographié -->
				<?php include 'inc/tpl-footer.php'; ?>
			</div>

		<!-- ERREUR : Include mal orthographié -->
		<?php include 'inc/inc.js.php'; ?>

	</body>
</html>