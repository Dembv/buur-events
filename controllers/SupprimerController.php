<?php
// Contrôleur pour la suppression d'événements
class SupprimerController
{
    // Méthode pour supprimer un événement
    public function supprimer($id)
    {
        // Instanciation du modèle d'événement pour supprimer l'événement avec l'ID spécifié
        $evenementModel = new EvenementModel();

        // Appel de la méthode de suppression d'événement avec l'ID de l'événement à supprimer
        $evenementModel->supprimerEvenement($id);

        // Récupération de la page active à partir de la session
        $pageActive = $_SESSION['page_active'];

        // Redirection vers la page active après la suppression de l'événement
        header("Location: $pageActive");

        // Arrêt de l'exécution du script
        exit;
    }
}
?>
