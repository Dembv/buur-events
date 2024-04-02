<?php
    // Classe Routeur pour gérer les routes de l'application
    class Routeur
    {
        // Tableau pour stocker les routes par méthode HTTP (GET, POST, PUT, etc.)
        public $routes = [];

        // Méthode pour définir une route GET
        public function get($url, $controllerAction)
        {
            $this->routes['GET'][$url] = $controllerAction;
        }

        // Méthode pour définir une route POST
        public function post($url, $controllerAction) 
        {
            $this->routes['POST'][$url] = $controllerAction;
        }

        // Méthode pour définir une route PUT
        public function put($url, $controllerAction) 
        {
            $this->routes['PUT'][$url] = $controllerAction;
        }

        // Méthode pour démarrer le routage
        public function demarrer() 
        {
            // Récupérer l'URL demandée et la méthode HTTP utilisée
            $url = $_SERVER['REQUEST_URI'];
            $method = $_SERVER['REQUEST_METHOD'];

            // Supprimer le préfixe du chemin de base de l'URL
            $url = str_replace(CHEMIN, "", $url);
            $url = str_replace("accueil", "", $url);

            $id = null; // Initialiser l'ID à null

            // Vérifier s'il y a un identifiant dans l'URL
            if(strpos($url, "-")) {
                list($url, $id) = explode('-', $url, 2);
            }

            // Vérifier si la route demandée existe dans les routes définies
            if (array_key_exists($url, $this->routes[$method])) {
                $controllerAction = $this->routes[$method][$url];
                list($controllerName, $action) = explode('@', $controllerAction);

                // Vérifier si la classe du contrôleur existe
                if (class_exists($controllerName)) {
                    $controller = new $controllerName();

                    // Capturer les données POST si la méthode HTTP est POST
                    if ($method === 'POST') {
                        $data = $_POST;

                        // Traitement des fichiers téléchargés s'il y en a
                        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                            // Récupérer les informations sur le fichier
                            $nomFichier = $_FILES['image']['name'];
                            $cheminTemporaire = $_FILES['image']['tmp_name'];

                            // Définir le dossier de destination
                            $dossierDestination = ROOT.'assets/images/uploads/';

                            // Déplacer le fichier téléchargé vers le dossier de destination
                            if (move_uploaded_file($cheminTemporaire, $dossierDestination.$nomFichier)) {
                                $data['image'] = $nomFichier;
                            } else {
                                $data['image'] = null;
                            }
                        }

                        // Appeler l'action du contrôleur avec les données appropriées
                        if($id == null) {
                            $controller->$action($data);
                        } else {
                            $controller->$action($data, intval($id));
                        }
                    } else {
                        // Si la méthode n'est pas POST, appeler simplement l'action du contrôleur
                        if($id == null) {
                            $controller->$action();
                        } else {
                            $controller->$action(intval($id));
                        }
                    }
                } else {
                    // Gérer le cas où la classe du contrôleur n'existe pas
                    echo "Controller class not found";
                }
            } else {
                // Gérer le cas où la route demandée n'est pas trouvée
                echo "Route not found ".$url.' '.$method;
            }
        }
    }
?>
