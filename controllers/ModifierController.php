<?php
    // Contrôleur pour la modification d'événements
    class ModifierController
    {
        // Méthode pour afficher le formulaire de modification d'un événement
        public function index($id)
        {
            // Instanciation du middleware d'authentification
            $authMiddleware = new AuthMiddleware();

            // Définition de la page active dans la session avec l'ID de l'événement à modifier
            $_SESSION['page_active'] = "modifier-$id";
            
            // Appliquer le middleware d'authentification
            $authMiddleware->handle();            

            // Récupération de l'événement à modifier en fonction de son ID
            $evenementModel = new EvenementModel();
            $evenement = $evenementModel->getEvenementById($id);

            // Récupération de l'utilisateur propriétaire de l'événement
            $utilisateurModel = new UtilisateurModel();
            $utilisateur = $utilisateurModel->getUtilisateurById($evenement->getProprietaire());

            // Récupération des catégories disponibles
            $categorieModel = new CategorieModel();
            $categories = $categorieModel->getCategories();

            // Vérification de la connexion de l'utilisateur
            $estConnecter = UtilisateurModel::estConnecter();

            // Inclusion de la vue du formulaire de modification d'événement
            include_once(VIEWS.'modifier.php');
        }

        // Méthode pour gérer la modification d'un événement
        public function modifier($data, $id)
        {
            // Instanciation du modèle d'événement pour effectuer la modification
            $evenementModel = new EvenementModel();

            // Appel de la méthode de modification d'événement avec les nouvelles données et l'ID de l'événement
            $evenementModel->modifierEvenement($data, $id);

            // Redirection vers la page des événements de l'utilisateur après la modification réussie
            header("Location: mesevenements");
        }
    }
?>
