<?php
    class Utilisateur
    {
        private $id;
        private $nom;
        private $prenom;
        private $adresse;
        private $telephone;
        private $email;
        private $password;

        public function getId() {
            return $this->id;
        }

        public function getNom() {
            return $this->nom;
        }

        public function getPrenom() {
            return $this->prenom;
        }

        public function getAdresse() {
            return $this->adresse;
        }

        public function getTelephone() {
            return $this->telephone;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setNom($nom) {
            $this->nom = $nom;
        }

        public function setPrenom($prenom) {
            $this->prenom = $prenom;
        }
        
        public function setAdresse($adresse) {
            $this->adresse = $adresse;
        }

        public function setTelephone($telephone) {
            $this->telephone = $telephone;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setPassword($password) {
            $this->password = $password;
        }
    }
?>