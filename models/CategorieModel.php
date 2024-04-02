<?php
// Inclure le fichier de connexion à la base de données
require_once MODELS.'includes/connexion-bd.php';

class CategorieModel
{
    private $connexion;

    public function __construct() 
    {
        // Établir la connexion à la base de données lors de la création de l'objet
        $this->connexion = connecterBD();
    }

    function getCategories()
    {
        // Récupérer la connexion à la base de données
        $connexion = $this->connexion;

        // Initialiser un tableau pour stocker les catégories
        $lignes = null;

        try {
            // Exécuter la requête SQL pour récupérer toutes les catégories
            $sql = "SELECT * FROM categories";
            $resultat = $connexion->query($sql);

            // Parcourir chaque ligne de résultat
            while($ligne = $resultat->fetch_assoc())
            {
                // Créer un objet Categorie pour chaque ligne de résultat
                $categorie = new Categorie();

                // Définir l'ID et le libellé de la catégorie
                $categorie->setId($ligne['id']);
                $categorie->setLibelleCategorie($ligne['libelle_categorie']);

                // Ajouter la catégorie à notre tableau
                $lignes[] = $categorie;
            }
    
            // Retourner le tableau de catégories
            return $lignes;
        } catch (Exception $e) {
            // Gérer l'exception s'il y a une erreur lors de l'exécution de la requête SQL
            //echo "Une erreur est survenue lors de la récupération des catégories : " . $e->getMessage();
            // Retourner null
            return null;
        }
    }

    function getCategorieById($id)
    {
        // Récupérer la connexion à la base de données
        $connexion = $this->connexion;

        try {
            // Préparer la requête SQL pour récupérer une catégorie par son ID
            $requete = $connexion->prepare("SELECT * FROM categories WHERE id = ?");
            $requete->bind_param('i', $id);
            $requete->execute();
            $resultat = $requete->get_result();

            // Vérifier s'il y a des résultats
            if($resultat->num_rows > 0) {
                // Récupérer la première ligne de résultat
                if($ligne = $resultat->fetch_assoc()) {
                    // Créer un objet Categorie avec les données récupérées
                    $categorie = new Categorie();

                    // Définir l'ID et le libellé de la catégorie
                    $categorie->setId($ligne['id']);
                    $categorie->setLibelleCategorie($ligne['libelle_categorie']);

                    // Retourner la catégorie
                    return $categorie;
                }
            }

            // Si aucune catégorie n'a été trouvée, retourner null
            return null;
        } catch (Exception $e) {
            // Gérer l'exception s'il y a une erreur lors de l'exécution de la requête SQL
            //echo "Une erreur est survenue lors de la récupération de la catégorie : " . $e->getMessage();
            // Retourner null
            return null;
        }
    }
}
?>
