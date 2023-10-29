<?php

    // Ouverture de session le fichier étant appelé dès le chargement de la page index.php
    // la session est automatiquement initialisée 
    session_start();

    // Definition des variables constantes
    define('TL_ROOT', dirname(__DIR__));
    define('LOGIN', 'UEL311');
    define('PASSWORD', 'U31311');
    define('DB_ARTICLES', TL_ROOT.'/db/articles.json'); //ERREUR : "dbal" au lieu de "db"

    
    /**
    * Fonction connectUser : Connecte l'utilisateur en fonction des infos entrées et des constantes ci-dessus
    * @param string $login : Nom d'utilisateur
    * @param string $password : Mot de passe
    * @return array|null : Tableau login & password si existant et corrects, null sinon
    */
    function connectUser($login = null, $password = null){
        if(!is_null($login) && !is_null($password)){
            if($login === LOGIN && $password === PASSWORD){
                return array(
                    'login'    => LOGIN,
                    'password' => PASSWORD
                );
            }
        }
        return null;
    }

    /**
    * Fonction setDiconnectUser : Déconnecte l'utilisateur
    * @return void
    */
    function setDisconnectUser(){
        // On efface la variable de session
         unset($_SESSION['User']);
        //  On réinitialise la session
         session_destroy(); //ERREUR : coquille fonction
    }


    /**
    * Fonction isConnected : Retourne l'état de la connexion utilisateur (vrai/faux)
    * @return bool : État de la connexion utilisateur
    */
    function isConnected(){
        if(array_key_exists('User', $_SESSION)  && !is_null($_SESSION['User'])  && !empty($_SESSION['User'])){
            return true;
        }
        return false;
    }

    /**
    * Fonction getPageTemplate : Include un fichier à partir du répertoire "pages" 
    * @param string $page : Page recherchée
    * @return void
    */
    function getPageTemplate($page = null){
        // On récupère soit le fichier index.php soit la page passée en argument
        $fichier = TL_ROOT.'/pages/'.(is_null($page) ? 'index.php' : $page.'.php');

        if(!file_exists($fichier)){
            // Si la page n'existe pas dans les templates on charge le template de la page d'accueil
            include TL_ROOT.'/pages/home.php'; // ERREUR : Include mal orthographié
        }else{
            include $fichier;
        }
    }

    /**
    * Fonction getArticlesFromJson : Récupère les articles à partir du fichier JSON en variable constante (DB_ARTICLES)
    * @return object|null : Objet JSON si le fichier existe, null sinon 
    */
    function getArticlesFromJson(){
        // Si le fichier qui sert de BDD existe bien on récupère dans une variable, décode le json et le retourne
        if(file_exists(DB_ARTICLES)) { // ERREUR : fonction file_exists et constante DB_ARTICLES mal orthographiées
            $contenu_json = file_get_contents(DB_ARTICLES);
            return json_decode($contenu_json, true);
        }

        return null;
    }

    /**
    * Méthode getArticleById : Récupère un article à partir de son identifiant
    * @param int $id_article  : Identifiant de l'article recherché
    * @return object|null : Objet JSON si le fichier existe et l'article rehcerché est trouvé, null sinon
    */
    function getArticleById($id_article = null){ // ERREUR Paramètre: "==" au lieu de "="
        // Si le fichier qui sert de BDD existe, on récupère dans une variable, décode le json et le retourne
       if(file_exists(DB_ARTICLES)) { // ERREUR : Constante DB_ARTICLES mal orthographiée
            $contenu_json = file_get_contents(DB_ARTICLES);
            $_articles    = json_decode($contenu_json, true);

            // On récupère l'article que l'on souhaite en fonction de son ID en bouclant sur le résultat précédent
            foreach($_articles as $article){
                if($article['id'] == $id_article){
                    return $article;
                }
            }
        }

        return null;
    }
