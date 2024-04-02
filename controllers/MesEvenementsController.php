<?php
    // Contrôleur pour la gestion des événements de l'utilisateur connecté
    class MesEvenementsController
    {
        // Méthode pour afficher les événements de l'utilisateur
        public function index()
        {
            // Instanciation du middleware d'authentification
            $authMiddleware = new AuthMiddleware();

            // Définition de la page active dans la session
            $_SESSION['page_active'] = "mesevenements";
            
            // Appliquer le middleware d'authentification
            $authMiddleware->handle();

            // Vérification de la connexion de l'utilisateur
            $estConnecter = UtilisateurModel::estConnecter();

            // Récupération de l'utilisateur actuellement connecté
            $utilisateurModel = new UtilisateurModel();
            $utilisateur = $utilisateurModel->getUtilisateurByEmail($_SESSION['utilisateur']);
            
            // Récupération des événements appartenant à l'utilisateur
            $evenementModel = new EvenementModel();
            $evenements = $evenementModel->getEvenementsByProprietaire($utilisateur->getId());
            
            // Inclusion de la vue des événements de l'utilisateur
            include_once(VIEWS.'mes-evenements.php');
        }
    }
?>
