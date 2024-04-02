<?php
// Middleware pour l'authentification des utilisateurs
class AuthMiddleware 
{
    // Méthode pour gérer l'authentification
    public function handle() 
    {

        // Vérifier si l'utilisateur est connecté en vérifiant s'il existe une clé 'logged_in' dans la session
        if (!isset($_SESSION['logged_in'])) {
            // Si l'utilisateur n'est pas connecté, le rediriger vers la page de connexion
            header("Location: connexion");
            
            exit; // Assure que le script s'arrête après la redirection pour éviter toute exécution supplémentaire
        }
    }
}
?>
