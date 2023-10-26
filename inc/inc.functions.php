<?php
    // Démarrage de la session PHP
    session_start();

    // Définition des variables constantes
    define('TL_ROOT', dirname(__DIR__));
    define('LOGIN', 'UEL311');
    define('PASSWORD', 'U31311');
    define('DB_ARTICLES', TL_ROOT.'/db/articles.json'); // DEBUG 26/10/2023 (JL) - "dbal" au lieu de "db"

    /**
    * Méthode connectUser : Connecte l'utilisateur en fonction des infos entrées et des constantes ci-dessus
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
    * Fonction  setDiconnectUser : Déconnecte l'utilisateur
    * @return void
    */
    function setDisconnectUser(){
        if(isset($_SESSION['User'])) unset($_SESSION['User']);

        // DEBUG 26/10/2023 (JL) - sessions_destroy au lieu de session_destroy
        session_destroy();
    }

    /**
    * Méthode isConnected : Retourne l'état de la connexion utilisateur (vrai/faux)
    * @return bool : État de la connexion utilisateur
    */
    function isConnected(){
        if(array_key_exists('User', $_SESSION) 
                && !is_null($_SESSION['User'])
                    && !empty($_SESSION['User'])){
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
        $fichier = TL_ROOT.'/pages/'.(is_null($page) ? 'index.php' : $page.'.php');

        if(!file_exists($fichier)){
            // DEBUG 26/10/2023 (JL) - Il manquait le "u" à "include" (+ mise en forme)
            include(TL_ROOT.'/pages/index.php');
        }else{
            // MISE EN FORME 26/10/2023 (JL) - Parenthèses ajoutées
            include $fichier;
        }
    }


    /**
    * Méthode getArticlesFromJson : Récupère les articles à partir du fichier JSON en variable constante (DB_ARTICLES)
    * @return object|null : Objet JSON si le fichier existe, null sinon 
    */
    function getArticlesFromJson(){
        // DEBUG 26/10/2023 (JL) - "file_exist" au lieu de "file_exists" | "DB_ARTICLE" au lieu de "DB_ARTICLES"
        if(file_exists(DB_ARTICLES)) {
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
    // DEBUG 26/10/2023 (JL) - Paramètre: "==" au lieu de "="
    // DEBUG 26/10/2023 (JL) - "DB_ARTICLE" au lieu de "DB_ARTICLES"
    function getArticleById($id_article = null){
       if(file_exists(DB_ARTICLES)) {
            $contenu_json = file_get_contents(DB_ARTICLES);
            $_articles    = json_decode($contenu_json, true);

            foreach($_articles as $article){
                if($article['id'] == $id_article){
                    return $article;
                }
            }
        }

        return null;
    }
