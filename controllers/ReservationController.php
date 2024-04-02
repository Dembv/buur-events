<?php
    // Contrôleur pour la gestion des réservations d'événements
    class ReservationController
    {
        // Méthode pour gérer la réservation d'un événement
        public function index($id)
        {
            // Instanciation du middleware d'authentification
            $authMiddleware = new AuthMiddleware();

            // Définition de la page active dans la session avec l'ID de l'événement réservé
            $_SESSION['page_active'] = "details-$id";
            
            // Appliquer le middleware d'authentification
            $authMiddleware->handle();

            // Récupération de l'utilisateur actuellement connecté
            $utilisateurModel = new UtilisateurModel();
            $utilisateur = $utilisateurModel->getUtilisateurByEmail($_SESSION['utilisateur']);

            // Instanciation du modèle de réservation pour ajouter la réservation de l'utilisateur pour l'événement spécifié
            $reservationModel = new ReservationModel();
            if($reservationModel->ajouterReservation($id, $utilisateur->getId())) {
                // Redirection vers la page des réservations de l'utilisateur après avoir effectué la réservation
                header("Location: mesreservations");

                exit;
            } else {
                $pageActive = $_SESSION['page_active'];
                header("Location: $pageActive");

                exit;
            }
        }
    }
?>
