<!-- HERO SECTION -->
<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
	<div class="content">
		<h1>Mon [ blog ].</h1>
		<p class="major">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur porta tellus, quis auctor ante pulvinar non. Quisque aliquet lacus posuere purus vestibulum, eget rutrum turpis scelerisque.</p>
		<ul class="actions stacked">
			<li><a href="#first" class="button big wide smooth-scroll-middle">Consulter mes articles</a></li>
		</ul>
	</div>
	<div class="image">
		<img src="images/banner.jpg" alt="" />
	</div>
</section>
<!-- END HERO SECTION -->

<!-- ARTICLES SECTION -->
<?php 
	$_articles = getArticlesFromJson();

	if($_articles && count($_articles)){
		$compteur = 1;
		foreach($_articles as $article){
			// On utilise un compteur et la fonction de modulo pour affecter une classe left ou right si pair ou impair
			$classCss = ($compteur % 2 == 0 ? 'left' : 'right');
			$compteur++;//ERREUR : L'incrémentation du compteur était commenté
			?>
			<!-- OPTIMISATION : l'ID étant supposeé être unique on ne l'ajoute qu'au premier tour de la boucle (car elle sert d'ancre au bouton "CONSULTER MES ARTICLES") -->
				<section class="spotlight style1 orient-<?php echo $classCss;?>  content-align-left image-position-center onscroll-image-fade-in" <?= $compteur === 2 ? 'id="first"' : "" ?>>
					<div class="content">
						<h2><?php echo $article['titre'];?></h2>
						<p><?php echo $article['titre'];?></p>
						<ul class="actions stacked">
							<!-- Le href est construit afin de passer le template et l'id de l'article en argument GET -->
							<li><a href="?page=article&id=<?php echo $article['id'];?>" class="button">Lire la suite</a></li>
						</ul>
					</div>
					<div class="image">
						<img src="<?php echo $article['image'];?>" alt="" /><!-- ERREUR : Coquille variable -->
					</div>
				</section>

			<?php
		}
	}
?>
<!-- END ARTICLES SECTION -->