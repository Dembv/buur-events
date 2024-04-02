<?php
    // Contrôleur pour la gestion des réservations de l'utilisateur connecté
    class MesReservationsController
    {
        // Méthode pour afficher les réservations de l'utilisateur
        public function index()
        {
            // Définition de la page active dans la session
            $_SESSION['page_active'] = "mesreservations";

            // Instanciation du middleware d'authentification
            $authMiddleware = new AuthMiddleware();
            
            // Appliquer le middleware d'authentification
            $authMiddleware->handle();
            
            // Vérification de la connexion de l'utilisateur
            $estConnecter = UtilisateurModel::estConnecter();

            // Récupération de l'utilisateur actuellement connecté
            $utilisateurModel = new UtilisateurModel();
            $utilisateur = $utilisateurModel->getUtilisateurByEmail($_SESSION['utilisateur']);

            // Récupération des réservations de l'utilisateur
            $reservationModel = new ReservationModel();
            $reservations = $reservationModel->getReservationsByUtilisateur($utilisateur->getId());

            // Récupération des détails des événements réservés par l'utilisateur
            $evenementModel = new EvenementModel();
            $evenements = null; // Initialisation du tableau d'événements réservés

            if ($reservations) {
                // Si l'utilisateur a des réservations
                foreach($reservations as $reservation) {
                    // Pour chaque réservation, récupérer les détails de l'événement correspondant
                    $evenement = $evenementModel->getEvenementById($reservation->getEvenement());
                    $evenements[] = $evenement; // Ajouter l'événement à la liste des événements réservés
                }
            }

            // Inclusion de la vue des réservations de l'utilisateur
            include_once(VIEWS.'mes-reservations.php');
        }
    }
?>
