<?php
    function connecterBD() {    
        // Connexion à la base de données
        $connexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
        // Vérifier la connexion
        if ($connexion->connect_error) {
            die("La connexion a échoué : " . $connexion->connect_error);
        }
    
        return $connexion; // Retourner l'objet de connexion
    }
    
    // Fonction pour fermer la connexion à la base de données
    function fermerBD($connexion) {
        // Fermer la connexion
        $connexion->close();
    }
?>