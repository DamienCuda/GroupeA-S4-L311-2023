<!-- Appel au fichier qui regroupe les fonctions du programme pour accès ici-->
<?php include 'inc/inc.functions.php'?> <!-- ERREUR : Include mal orthographié -->


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
					getPageTemplate( // ERREUR : Fonction disponible dans le fichier inc/inc.functions.php mal orthographié s en trop
						// On passe soit le nom du template, soit null à la fonction
						array_key_exists('page', $_GET) ? $_GET['page'] : null // ERREUR : fonction php mal othographié
					); 
				?>

				<!-- FOOTER -->
				<?php include 'inc/tpl-footer.php'; ?> <!-- ERREUR : nom de fichier mal orthographié -->

			</div>

		<!-- SCRPTS JS -->
		<?php include 'inc/inc.js.php'; ?> <!-- ERREUR : Include mal orthographié -->

	</body>
</html>