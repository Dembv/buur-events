<?php
    // Contrôleur pour la page d'ajout d'événement
    class AjouterController
    {
        // Méthode pour afficher le formulaire d'ajout d'événement
        public function index()
        {
            // Instanciation du middleware d'authentification
            $authMiddleware = new AuthMiddleware();

            // Définition de la page active dans la session
            $_SESSION['page_active'] = "ajouter";

            // Appliquer le middleware d'authentification pour vérifier si l'utilisateur est connecté
            $authMiddleware->handle();

            // Instanciation du modèle de catégorie pour récupérer les catégories disponibles
            $categorieModel = new CategorieModel();
            $categories = $categorieModel->getCategories();
            
            // Vérification de la connexion de l'utilisateur
            $estConnecter = UtilisateurModel::estConnecter();
            
            // Inclusion de la vue du formulaire d'ajout d'événement
            include_once(VIEWS.'ajouter.php');
        }

        // Méthode pour ajouter un nouvel événement
        public function ajouter($data)
        {
            // Instanciation du modèle d'événement
            $evenementModel = new EvenementModel();

            // Instanciation du modèle d'utilisateur pour récupérer l'utilisateur actuellement connecté
            $utilisateurModel = new UtilisateurModel();
            $utilisateur = $utilisateurModel->getUtilisateurByEmail($_SESSION['utilisateur']);

            // Ajout de l'événement en utilisant les données du formulaire et l'ID de l'utilisateur
            $evenementModel->ajouterEvenement($data, $utilisateur->getId());

            // Redirection vers la liste des événements après l'ajout
            header("Location: evenements");
        }
    }
?>
