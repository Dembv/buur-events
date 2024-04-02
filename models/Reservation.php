<?php
    class Reservation
    {
        private $id;
        private $evenement;
        private $utilisateur;
        private $date_reservation;

        public function getId() {
            return $this->id;
        }

        public function getEvenement() {
            return $this->evenement;
        }

        public function getUtilisateur() {
            return $this->utilisateur;
        }

        public function getDateReservation() {
            return $this->date_reservation;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setEvenement($evenement) {
            $this->evenement = $evenement;
        }

        public function setUtilisateur($utilisateur) {
            $this->utilisateur = $utilisateur;
        }

        public function setDateReservation($date_reservation) {
            $this->date_reservation = $date_reservation;
        }
    }
?>