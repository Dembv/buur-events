<?php
    class Evenement
    {
        private $id;
        private $titre;
        private $date;
        private $heure;
        private $lieu;
        private $description;
        private $proprietaire;
        private $image;
        private $categorie;
        private $capacite;
        private $date_creation;

        public function getId() {
            return $this->id;
        }

        public function getTitre() {
            return $this->titre;
        }

        public function getDate() {
            return $this->date;
        }

        public function getHeure() {
            return $this->heure;
        }

        public function getLieu() {
            return $this->lieu;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getProprietaire() {
            return $this->proprietaire;
        }

        public function getImage() {
            return $this->image;
        }

        public function getCategorie() {
            return $this->categorie;
        }

        public function getCapacite() {
            return $this->capacite;
        }

        public function getDateCreation() {
            return $this->date_creation;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setTitre($titre) {
            $this->titre = $titre;
        }

        public function setDate($date) {
            $this->date = $date;
        }

        public function setHeure($heure) {
            $this->heure = $heure;
        }

        public function setLieu($lieu) {
            $this->lieu = $lieu;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function setProprietaire($proprietaire) {
            $this->proprietaire = $proprietaire;
        }

        public function setImage($image) {
            $this->image = $image;
        }

        public function setCategorie($categorie) {
            $this->categorie = $categorie;
        }

        public function setCapacite($capacite) {
            $this->capacite = $capacite;
        }

        public function setDateCreation($date_creation) {
            $this->date_creation = $date_creation;
        }
    }
?>