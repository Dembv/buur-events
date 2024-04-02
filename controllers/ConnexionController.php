<?php
    // Contrôleur pour la gestion de la connexion utilisateur
    class ConnexionController
    {
        // Méthode pour afficher le formulaire de connexion
        public function index()
        {
            // Vérification de la connexion de l'utilisateur
            $estConnecter = UtilisateurModel::estConnecter();
            
            // Inclusion de la vue du formulaire de connexion
            include_once(VIEWS.'connexion.php');
        }

        // Méthode pour gérer la tentative de connexion
        public function connexion($data)
        {
            // Instanciation du modèle d'utilisateur
            $utilisateurModel = new UtilisateurModel();
            
            // Tentative de connexion de l'utilisateur avec les données fournies
            $utilisateur = $utilisateurModel->seConnecter($data);

            if (!$utilisateur) {
                // Redirection vers la page de connexion en cas d'échec de connexion
                //header("Location: connexion");
                echo json_encode(array('success' => false, 'message' => 'Nom d\'utilisateur ou mot de passe incorrect'));
                // Terminaison de l'exécution du script
                //exit;
            } else {
                // Début de la session utilisateur et enregistrement des informations de connexion
                $_SESSION['logged_in'] = true;
                $_SESSION['utilisateur'] = $utilisateur->getEmail();
                
                // Redirection vers la page active avant la connexion
                $pageActive = $_SESSION['page_active'];
                echo json_encode(array('success' => true, 'message' => $pageActive));
                //header("Location: $pageActive");

                // Terminaison de l'exécution du script
                //exit();
            }
        }

        // Méthode pour gérer la déconnexion de l'utilisateur
        public function deconnexion()
        {
            // Vérification de la connexion de l'utilisateur et de l'existence de son email dans la session
            if($_SESSION['logged_in'] === true && !empty($_SESSION['utilisateur'])) {
                // Réinitialisation de l'état de connexion et suppression des informations de l'utilisateur de la session
                $_SESSION['logged_in'] = false;
                unset($_SESSION['utilisateur']);
            }

            // Destruction de la session
            session_destroy();
            
            // Redirection vers la page d'accueil après la déconnexion
            header("Location: accueil");

            // Terminaison de l'exécution du script
            exit();
        }
    }
?>
