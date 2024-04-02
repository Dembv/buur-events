<?php
    // Contrôleur pour la page d'accueil
    class AccueilController
    {
        // Méthode pour afficher la page d'accueil
        public function index()
        {
            // Instanciation du modèle d'événement
            $evenementModel = new EvenementModel();

            // Récupération des prochains événements à venir
            $evenements = $evenementModel->getEvenementsAVenir(6);

            // Vérification de la connexion de l'utilisateur
            $estConnecter = UtilisateurModel::estConnecter();

            // Définition de la page active dans la session
            $_SESSION['page_active'] = "accueil";
            
            // Inclusion de la vue de la page d'accueil
            include_once(VIEWS.'accueil.php');
        }
    }
?>
