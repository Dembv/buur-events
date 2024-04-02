<?php
    // Activer l'affichage des erreurs
    ini_set('display_errors', 'on');
    // Définir le niveau de rapport d'erreurs à E_ALL (rapporter toutes les erreurs)
    error_reporting(E_ALL);

    // Classe MyAutoload responsable du chargement automatique des classes
    class MyAutoload
    {
        // Méthode pour initialiser le chargement automatique des classes
        public static function start()
        {
            // Enregistrer la méthode "autoload" de cette classe comme fonction d'autoload
            spl_autoload_register(array(__CLASS__, 'autoload'));

            // Définir les constantes pour les chemins racine de l'application
            $chemin_principal = '/M1-Info/complements-web/projet-web/'; //Chemin du répértoire dans lequel se trouve le projet 
            $root = $_SERVER['DOCUMENT_ROOT']; // Chemin racine du serveur web
            $host = $_SERVER['HTTP_HOST']; // Nom d'hôte de la requête     

            // Définir les constantes pour les chemins racine de l'application
            define ('CHEMIN', $chemin_principal); // Chemin du répértoire dans lequel se trouve le projet 
            define('HOST', 'http://' . $host . CHEMIN); // URL de base de l'application
            define('ROOT', $root . CHEMIN); // Chemin absolu de base de l'application      

            // Définir les constantes pour les répertoires spécifiques de l'application
            define('MODELS', ROOT . 'models/'); // Répertoire des modèles
            define('VIEWS', ROOT . 'views/'); // Répertoire des vues
            define('CONTROLLERS', ROOT . 'controllers/'); // Répertoire des contrôleurs
            define('CLASSES', ROOT . 'classes/'); // Répertoire des classes
            define('ASSETS', HOST . 'assets/'); // URL des ressources statiques (CSS, JavaScript, images, etc.)

            // Définir les constantes pour les informations relatives à la base de données
            define('DB_HOST', 'localhost'); // Nom du serveur MySQL
            define('DB_USER', 'root'); // Nom d'utilisateur MySQL
            define('DB_PASSWORD', ''); // Mot de passe MySQL
            define('DB_NAME', 'projet-web');  // Nom de la base de données
        }

        // Méthode d'autoload pour charger automatiquement les classes
        public static function autoload($class)
        {
            // Vérifier si le fichier de la classe existe dans les répertoires spécifiés
            if (file_exists(MODELS . $class . '.php')) {
                include_once MODELS . $class . '.php';
            } else if (file_exists(CLASSES . $class . '.php')) {
                include_once CLASSES . $class . '.php';
            } else if (file_exists(CONTROLLERS . $class . '.php')) {
                include_once CONTROLLERS . $class . '.php';
            }
        }
    }
?>
