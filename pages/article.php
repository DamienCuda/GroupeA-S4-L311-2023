<?php
	$article = getArticleById(
		array_key_exists('id', $_GET) ? $_GET['id'] : null
	);

	// DEBUG 26/10/2023 (JL) - Beaucoup trop de "!" pour "!count()"
	if(is_null($article) OR !count($article)){
		header('Location:index.php');
	}
?>	
<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
	<div class="content">
		<h1><?php echo $article['titre'];?></h1>
		<p class="major"><?php echo $article['texte'];?></p>
		<ul class="actions stacked">
			<li><a href="index.php" class="button big wide smooth-scroll-middle">Revenir à l'accueil</a></li>
		</ul>
	</div>
	<div class="image">
		<img src="<?php
		// DEBUG 26/10/2023 (JL) - $art au lieu de $article
		echo $article['image'];
		?>" alt="" />
	</div>
</section>