<?php 
// DEBUG 26/10/2023 (JL) - Il manquait le "e" de "include" (+ mise en forme)
include('inc/inc.functions.php');
?>
<!DOCTYPE HTML>
<!--
	Story by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Story by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<?php
		// MISE EN FORME 26/10/2023 (JL) - Parenthèses ajoutées
		include('inc/inc.css.php');
		?>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" class="divided">
				<?php 
					// DEBUG 26/10/2023 (JL) - "getPagesTemplate" au lieu de "getPageTemplate"
					// DEBUG 26/10/2023 (JL) - "array_key_exist" au lieu de "array_key_exists"
					getPageTemplate(
						array_key_exists('page', $_GET) ? $_GET['page'] : null
					); 
				?>
				<?php
				// DEBUG 26/10/2023 (JL) - "inc/tpls-footer.php" au lieu de "inc/tpl-footer.php"
				// MISE EN FORME 26/10/2023 (JL) - Parenthèses ajotuées
				include('inc/tpl-footer.php');
				?>
			</div>

		<?php
		// DEBUG 26/10/2023 (JL) - Il y avait un "s" en trop à "include"
		include('inc/inc.js.php');
		?>

	</body>
</html>