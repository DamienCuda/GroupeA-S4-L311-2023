<!-- Footer -->
<footer class="wrapper style1 align-center">
	<div class="inner">	
		<p>Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
	</div>
</footer>

<!-- Sticky -->
<!-- <?php
// Le bouton se connecter n'apparait pas si l'on est sur la page de connection
 if(!isset($_GET['page']) || ($_GET['page'] != 'login')){ ?> -->
	<span class="sticky">
		<?php 
			if(!isConnected()){		// si déconnecté
				?>
					<a class="button fit" href="?page=login" title="Se connecter à l'administration du blog">
						<span class="logo icon fa-arrow-alt-circle-right">Se connecter</span>
					</a>
				<?php
			}else{					// si connecté
				?>
					<a class="button fit" href="?page=disconnect" title="Se déconnecter de l'administration du blog">
						<span class="logo icon fa-arrow-alt-circle-right">Se déconnecter</span>
					</a>
					
				<?php
			}	
		?>
	</span>
	<?php
}
?>