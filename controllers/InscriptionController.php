<?php
    // Contrôleur pour la gestion de l'inscription des utilisateurs
    class InscriptionController
    {
        // Méthode pour afficher le formulaire d'inscription
        public function index()
        {
            // Vérification de la connexion de l'utilisateur
            $estConnecter = UtilisateurModel::estConnecter();
            
            // Définition de la page active dans la session
            $_SESSION['page_active'] = "inscription";
            
            // Inclusion de la vue du formulaire d'inscription
            include_once(VIEWS.'inscription.php');
        }

        // Méthode pour gérer le processus d'inscription
        public function inscription($data)
        {
            // Instanciation du modèle d'utilisateur pour enregistrer les informations d'inscription
            $utilisateurModel = new UtilisateurModel();

             // Vérifie si l'inscription a échoué en appelant la méthode sInscrire du modèle UtilisateurModel avec les données fournies
            if(!$utilisateurModel->sInscrire($data)) {
                $pageActive = $_SESSION['page_active'];
                //header("Location: $pageActive");
                //exit;

                echo json_encode(array('success' => false, 'message' => 'Le numéro de téléphone ou l\'email est déjà pris'));
            } else {
                echo json_encode(array('success' => true, 'message' => 'connexion'));
            }
            
            // Redirection vers la page de connexion après l'inscription réussie
            //header("Location: connexion");
            //exit;
        }
    }
?>
