<?php
    class Categorie
    {
        private $id;
        private $libelle_categorie;

        public function getId() {
            return $this->id;
        }

        public function getLibelleCategorie() {
            return $this->libelle_categorie;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setLibelleCategorie($libelle_categorie) {
            $this->libelle_categorie = $libelle_categorie;
        }
    }
?>