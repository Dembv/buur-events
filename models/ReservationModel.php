<?php
    // Inclure le fichier de connexion à la base de données
    require_once MODELS.'includes/connexion-bd.php';

    class ReservationModel
    {
        private $connexion;

        public function __construct() 
        {
            // Initialiser la connexion à la base de données
            $this->connexion = connecterBD();
        }

        // Ajouter une réservation
        function ajouterReservation($evenement, $utilisateur)
        {
            $connexion = $this->connexion;

            try {
                // Préparer et exécuter la requête SQL d'insertion
                $requete = $connexion->prepare("INSERT INTO reservations (id, evenement, utilisateur) 
                                                VALUES (null, ?, ?)");
                $requete->bind_param('ii', $evenement, $utilisateur);
                $requete->execute();

                return true;
            } catch (Exception $e) {
                // Gérer l'exception en affichant un message d'erreur approprié
                //echo "Erreur lors de l'ajout de la réservation : " . $e->getMessage();
                return false;
            }
        }

        // Annuler une réservation
        function annulerReservation($utilisateur, $evenement)
        {
            $connexion = $this->connexion;

            try {
                // Préparer et exécuter la requête SQL de suppression
                $requete = $connexion->prepare("DELETE FROM reservations 
                                                WHERE utilisateur = ?
                                                AND evenement = ?");
                $requete->bind_param('ii', $utilisateur, $evenement);
                $requete->execute();

                return true;
            } catch (Exception $e) {
                // Gérer l'exception en affichant un message d'erreur approprié
                //echo "Erreur lors de l'annulation de la réservation : " . $e->getMessage();
                return false;
            }
        } 

        // Récupérer les réservations par utilisateur
        function getReservationsByUtilisateur($utilisateur)
        {
            $connexion = $this->connexion;

            try {
                // Préparer et exécuter la requête SQL
                $requete = $connexion->prepare("SELECT id, evenement, utilisateur, date_reservation
                            FROM reservations
                            WHERE utilisateur = ?");
                $requete->bind_param('i', $utilisateur);
                $requete->execute();
                $resultat = $requete->get_result();

                $lignes = null;

                // Parcourir les résultats et créer des objets de réservation
                while($ligne = $resultat->fetch_assoc()) {
                    $reservation = new Reservation();

                    $reservation->setId($ligne['id']);
                    $reservation->setEvenement($ligne['evenement']);
                    $reservation->setUtilisateur($ligne['utilisateur']);
                    $reservation->setDateReservation($ligne['date_reservation']);

                    $lignes[] = $reservation;
                }

                return $lignes;
            } catch (Exception $e) {
                // Gérer l'exception en affichant un message d'erreur approprié
                //echo "Erreur lors de la récupération des réservations : " . $e->getMessage();
                return null;
            }
        }  
        
        // Récupérer les utilisateurs ayant réservé pour un évènement
        function getReservationsByEvenement($id){
            $connexion = $this->connexion;

            try{
                // Executer la requete sql
                $requete = $connexion->prepare("SELECT *
                FROM reservations
                WHERE evenement = ?");
                $requete->bind_param('i', $id);
                $requete->execute();
                $resultat = $requete->get_result();

                $lignes = null;

                while($ligne = $resultat->fetch_assoc()) {
                    $reservation = new Reservation();

                    $reservation->setId($ligne['id']);
                    $reservation->setEvenement($ligne['evenement']);
                    $reservation->setUtilisateur($ligne['utilisateur']);
                    $reservation->setDateReservation($ligne['date_reservation']);

                    $lignes[] = $reservation; 
                }

                return $lignes;
            }
            catch (Exception $e) {
                    // Gérer l'exception en affichant un message d'erreur approprié
                    //echo "Erreur lors de la récupération des réservations : " . $e->getMessage();
                    return null;
            }
        }
    }
?>
