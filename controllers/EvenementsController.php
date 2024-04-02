<?php
    // Contrôleur pour la gestion des événements
    class EvenementsController
    {
        // Méthode pour afficher la liste des événements
        public function index()
        {
            // Instanciation du modèle de catégorie pour récupérer les catégories disponibles
            $categorieModel = new CategorieModel();
            $categories = $categorieModel->getCategories();
            
            // Instanciation du modèle d'événement pour récupérer les événements récents
            $evenementModel = new EvenementModel();
            $evenements = $evenementModel->getEvenements(6);

            // Vérification de la connexion de l'utilisateur
            $estConnecter = UtilisateurModel::estConnecter();
            
            // Définition de la page active dans la session
            $_SESSION['page_active'] = "evenements";
            
            // Inclusion de la vue des événements
            include_once(VIEWS.'evenements.php');
        }
    }
?>
