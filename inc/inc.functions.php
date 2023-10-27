<?php

    // Ouverture de session le fichier étant appelé dés le chargement de la page index.php
    // la session est automatiquement initialisée 
    session_start();

    // Definition des constantes
    define('TL_ROOT', dirname(__DIR__));
    define('LOGIN', 'UEL311');
    define('PASSWORD', 'U31311');
    define('DB_ARTICLES', TL_ROOT.'/db/articles.json');

    // Fonction de vérification des login et password
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

    // Fin de session à la deconnection
    function setDisconnectUser(){
        // On efface la variable de session
         unset($_SESSION['User']);
        //  On réinitialise la session
        //  ERREUR : coquille fonction
         session_destroy();
    }


    // La fonction verifie que la variable de SESSION User est instanciée, non null ou vide
    function isConnected(){
        if(array_key_exists('User', $_SESSION)  && !is_null($_SESSION['User'])  && !empty($_SESSION['User'])){
            return true;
        }
        return false;
    }

    // Fonction de récupération des templates de pages
    function getPageTemplate($page = null){
        // On récupère soit le fichier index.php soit la page passée en argument
        $fichier = TL_ROOT.'/pages/'.(is_null($page) ? 'index.php' : $page.'.php');

        if(!file_exists($fichier)){
            // ERREUR : Include mal orthographié
            // Si la page n'existe pas dans les templates on charge le template de la page d'accueil
            include TL_ROOT.'/pages/home.php';
        }else{
            include $fichier;
        }
    }

    // Fonction de récupération de tous les articles (ici format json)
    function getArticlesFromJson(){
        // ERREUR : fonction file_exists et constante DB_ARTICLES mal orthographiées
        // Si le fichier qui sert de BDD existe bien on récupère dans une variable, décode le json et le retourne
        if(file_exists(DB_ARTICLES)) {
            $contenu_json = file_get_contents(DB_ARTICLES);
            return json_decode($contenu_json, true);
        }

        return null;
    }

    // Fonction de récupération d'un article selon son ID(ici format json)
    function getArticleById($id_article = null){
        // ERREUR : Constante DB_ARTICLES mal orthographiée
        // Si le fichier qui sert de BDD existe bien on récupère dans une variable, décode le json et le retourne
       if(file_exists(DB_ARTICLES)) { 
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
