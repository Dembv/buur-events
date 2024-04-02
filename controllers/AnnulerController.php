<?php
    // Contrôleur pour l'annulation de réservation
    class AnnulerController
    {
        // Méthode pour annuler une réservation
        public function annuler($evenement)
        {
            // Instanciation du modèle d'utilisateur pour récupérer l'utilisateur actuellement connecté
            $utilisateurModel = new UtilisateurModel();
            $utilisateur = $utilisateurModel->getUtilisateurByEmail($_SESSION['utilisateur']);
            
            // Instanciation du modèle de réservation
            $reservationModel = new ReservationModel();

            // Appel de la méthode pour annuler la réservation en utilisant l'ID de l'utilisateur et l'ID de l'événement
            $reservationModel->annulerReservation($utilisateur->getId(), $evenement);

            // Récupération de la page active à partir de la session
            $pageActive = $_SESSION['page_active'];

            // Redirection vers la page active après l'annulation de la réservation
            header("Location: $pageActive");

            // Terminaison de l'exécution du script
            exit;
        }
    }
?>
