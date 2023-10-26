<?php 
	$message = null;
	// ERREUR : Coquille REQUEST
	// Si la methode est POST
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// On vérifie que les login et password est bien existe et ne sont pas vide
	    if(array_key_exists('login', $_POST) && array_key_exists('password', $_POST)){
	    	if(!empty($_POST['login']) && !empty($_POST['password'])){
				// ERREUR : variable GET au lieu de POST pour login

				// On passe les variable à la fonction qui les vérifie
	    		$_SESSION['User'] = connectUser($_POST['login'], $_POST['password']);

				// Si la fonction à renvoyer autre chose que null on revoit vers l'accueil
	    		if(!is_null($_SESSION['User'])){
	    			header("Location:index.php");
	    		}else{
					// sinon on renvoie un message
	    			$message = "Mauvais login ou mot de passe";
	    		}
	    	}
	    }
	}	
?>

<section class="wrapper style1 align-center">
	<div class="inner">
		<div class="index align-left">
			<section>
				<header>
					<h3>Se connecter</h3>
					<a href="index.php" class="button big wide smooth-scroll-middle">Revenir à l'accueil</a></li>
				</header>
				<div class="content">
					<!-- Si la variable $message n'est pas null on affiche son contenu -->
					<?php echo (!is_null($message) ? "<p>".$message."</p>" : '');?>
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<label for="login">Nom d'utilisateur</label>
								<input type="text" name="login" id="login" value="" />
							</div>
							<div class="field half">
								<label for="password">Mot de passe</label>
								<input type="password" name="password" id="password" value="" />
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" name="submit" id="submit" value="Se connecter" /></li>
						</ul>
					</form>
				</div>
			</section>
		</div>
	</div>
</section>