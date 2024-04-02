<?php
    // Contrôleur pour afficher les détails d'un événement
    class DetailsController
    {
        // Méthode pour afficher les détails d'un événement
        public function index($id)
        {
            // Vérification de la connexion de l'utilisateur
            $estConnecter = UtilisateurModel::estConnecter();

            // Instanciation du modèle d'événement pour récupérer les détails de l'événement spécifié par son ID
            $evenementModel = new EvenementModel();
            $evenement = $evenementModel->getEvenementById($id);

            // Instanciation du modèle d'utilisateur pour récupérer les détails du propriétaire de l'événement
            $utilisateurModel = new UtilisateurModel();
            $utilisateur = $utilisateurModel->getUtilisateurById($evenement->getProprietaire());

            // Instanciation du modèle de catégorie pour récupérer les détails de la catégorie de l'événement
            $categorieModel = new CategorieModel();
            $categorie = $categorieModel->getCategorieById($evenement->getCategorie()); 

            // Définition de la page active dans la session avec l'ID de l'événement
            $_SESSION['page_active'] = "details-$id";

            // Inclusion de la vue des détails de l'événement
            include_once(VIEWS.'details.php');
        }
    }
?>
