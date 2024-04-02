<?php
    require_once MODELS.'includes/connexion-bd.php';

    class EvenementModel
    {
        private $connexion;

        public function __construct() 
        {
            // Établir la connexion à la base de données lors de la création de l'objet
            $this->connexion = connecterBD();
        }

        function ajouterEvenement($data, $utilisateur)
        {
            $connexion = $this->connexion;

            try {
                // Préparer la requête SQL d'insertion
                $requete = $connexion->prepare("INSERT INTO evenements (id, titre, description, proprietaire, lieu, date, heure, categorie, capacite, image) 
                                                VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                // Lier les paramètres et exécuter la requête
                $requete->bind_param('ssissssis', $data['titre'], $data['description'], $utilisateur, $data['lieu'], $data['date'], $data['heure'], $data['categorie'], $data['capacite'], $data['image']);
                $requete->execute();

                return true;
            } catch (Exception $e) {
                // Gérer l'exception en affichant un message d'erreur approprié
                //echo "Erreur lors de l'ajout de l'événement : " . $e->getMessage();
                return false;
            }
        }

        function modifierEvenement($data, $id)
        {
            $connexion = $this->connexion;

            try {
                if (isset($data['image'])) {
                    $requete = $connexion->prepare("UPDATE evenements SET titre = ?, evenements.description = ?, lieu = ?, evenements.date = ?, heure = ?, categorie = ?, capacite = ?, evenements.image = ?
                                                    WHERE id = ?");
                    // Lier les paramètres et exécuter la requête
                    $requete->bind_param('sssssiisi', $data['titre'], $data['description'], $data['lieu'], $data['date'], $data['heure'], $data['categorie'], $data['capacite'], $data['image'], $id);
                } else {
                    $requete = $connexion->prepare("UPDATE evenements SET titre = ?, evenements.description = ?, lieu = ?, evenements.date = ?, heure = ?, categorie = ?, capacite = ? 
                                                    WHERE id = ?");
                    // Lier les paramètres et exécuter la requête
                    $requete->bind_param('sssssiii', $data['titre'], $data['description'], $data['lieu'], $data['date'], $data['heure'], $data['categorie'], $data['capacite'], $id);
                }
                // Préparer la requête SQL de modification
                
                $requete->execute();

                return true;
            } catch (Exception $e) {
                // Gérer l'exception en affichant un message d'erreur approprié
                //echo "Erreur lors de la modification de l'événement : " . $e->getMessage();
                return false;
            }
        }

        function supprimerEvenement($id)
        {
            $connexion = $this->connexion;

            try {
                // Préparer la requête SQL de suppression
                $requete = $connexion->prepare("DELETE FROM evenements 
                                                WHERE id = ?");
                // Lier le paramètre et exécuter la requête
                $requete->bind_param('i', $id);
                $requete->execute();

                return true;
            } catch (Exception $e) {
                // Gérer l'exception en affichant un message d'erreur approprié
                //echo "Erreur lors de la suppression de l'événement : " . $e->getMessage();
                return false;
            }
        }   

        public function getEvenementById($id)
        {
            $connexion = $this->connexion;

            try {
                // Préparer la requête SQL de sélection de l'événement par son ID
                $requete = $connexion->prepare("SELECT id, titre, date, heure, lieu, description, proprietaire, image, categorie, capacite, date_creation
                            FROM evenements
                            WHERE id = ?");
                // Lier le paramètre et exécuter la requête
                $requete->bind_param('i', $id);
                $requete->execute();
                // Récupérer le résultat
                $resultat = $requete->get_result(); 
                if ($resultat->num_rows > 0) {
                    // Si un événement est trouvé, le récupérer et le retourner
                    if ($ligne = $resultat->fetch_assoc()) {
                        $evenement = new Evenement();

                        // Remplir les propriétés de l'objet Evenement avec les données de la ligne
                        $evenement->setId($ligne['id']);
                        $evenement->setTitre($ligne['titre']);
                        $evenement->setDate($ligne['date']);
                        $evenement->setHeure($ligne['heure']);
                        $evenement->setLieu($ligne['lieu']);
                        $evenement->setDescription($ligne['description']);
                        $evenement->setProprietaire($ligne['proprietaire']);
                        $evenement->setImage($ligne['image']);
                        $evenement->setCategorie($ligne['categorie']);
                        $evenement->setCapacite($ligne['capacite']);
                        $evenement->setDateCreation($ligne['date_creation']);

                        return $evenement;
                    }

                    return null;
                }
            } catch (Exception $e) {
                // Gérer l'exception en affichant un message d'erreur approprié
                //echo "Erreur lors de la récupération de l'événement par ID : " . $e->getMessage();
                return null;
            }
        }

        public function getEvenementsByProprietaire($utilisateur)
        {
            $connexion = $this->connexion;

            try {
                // Préparer la requête SQL de sélection des événements par propriétaire
                $requete = $connexion->prepare("SELECT id, titre, date, heure, lieu, description, proprietaire, image, categorie, capacite, date_creation
                            FROM evenements
                            WHERE proprietaire = ?
                            ORDER BY date DESC");
                // Lier le paramètre et exécuter la requête
                $requete->bind_param('i', $utilisateur);
                $requete->execute();
                // Récupérer le résultat
                $resultat = $requete->get_result(); 
                $lignes = null; // Initialiser un tableau pour stocker les événements

                // Parcourir chaque ligne de résultat
                while ($ligne = $resultat->fetch_assoc()) {
                    $evenement = new Evenement();

                    // Remplir les propriétés de l'objet Evenement avec les données de la ligne
                    $evenement->setId($ligne['id']);
                    $evenement->setTitre($ligne['titre']);
                    $evenement->setDate($ligne['date']);
                    $evenement->setHeure($ligne['heure']);
                    $evenement->setLieu($ligne['lieu']);
                    $evenement->setDescription($ligne['description']);
                    $evenement->setProprietaire($ligne['proprietaire']);
                    $evenement->setImage($ligne['image']);
                    $evenement->setCategorie($ligne['categorie']);
                    $evenement->setCapacite($ligne['capacite']);
                    $evenement->setDateCreation($ligne['date_creation']);

                    // Ajouter l'événement à la liste des événements
                    $lignes[] = $evenement;
                }

                // Retourner le tableau d'événements
                return $lignes;
            } catch (Exception $e) {
                // Gérer l'exception en affichant un message d'erreur approprié
                //echo "Erreur lors de la récupération des événements par propriétaire : " . $e->getMessage();
                return null;
            }
        }

        function getEvenements($limit)
        {
            $connexion = $this->connexion;

            try {
                // Executer la requete sql
                $requete = $connexion->prepare("SELECT id, titre, evenements.date, heure, lieu, evenements.description, proprietaire, evenements.image, categorie, capacite, date_creation
                    FROM evenements
                    ORDER BY evenements.date DESC
                    LIMIT ?");
                
                if (!$requete) {
                    throw new Exception("Erreur de préparation de la requête SQL");
                }

                $requete->bind_param('i', $limit);
                $requete->execute();

                $resultat = $requete->get_result(); 
                
                if (!$resultat) {
                    throw new Exception("Erreur lors de l'exécution de la requête SQL");
                }

                $lignes = null;

                while($ligne = $resultat->fetch_assoc()) {
                    $evenement = new Evenement();

                    // Affecter les valeurs de la ligne à l'objet Evenement
                    $evenement->setId($ligne['id']);
                    $evenement->setTitre($ligne['titre']);
                    $evenement->setDate($ligne['date']);
                    $evenement->setHeure($ligne['heure']);
                    $evenement->setLieu($ligne['lieu']);
                    $evenement->setDescription($ligne['description']);
                    $evenement->setProprietaire($ligne['proprietaire']);
                    $evenement->setImage($ligne['image']);
                    $evenement->setCategorie($ligne['categorie']);
                    $evenement->setCapacite($ligne['capacite']);
                    $evenement->setDateCreation($ligne['date_creation']);

                    $lignes[] = $evenement;
                }
                
                // Retourner le résultat
                return $lignes;
            } catch (Exception $e) {
                // Gérer l'exception : retourner une valeur par défaut ou logguer l'erreur
                //echo "Erreur dans la fonction getEvenements: " . $e->getMessage();
                return null;
            }
        }

        function getEvenementsAVenir($limit)
        {
            // Récupération de la connexion à la base de données depuis l'objet courant
            $connexion = $this->connexion;

            try {
                // Préparation de la requête SQL avec un paramètre pour le nombre limite d'événements
                $requete = $connexion->prepare("SELECT id, titre, evenements.date, heure, lieu, evenements.description, proprietaire, evenements.image, categorie, capacite, date_creation
                FROM evenements
                WHERE evenements.date >= current_timestamp() 
                ORDER BY evenements.date DESC
                LIMIT ?");

                // Vérification de la préparation de la requête
                if (!$requete) {
                    throw new Exception("Erreur de préparation de la requête SQL.");
                }

                // Liaison du paramètre pour la limite de résultats à la requête
                $requete->bind_param('i', $limit);

                // Exécution de la requête
                $requete->execute();

                // Récupération des résultats
                $resultat = $requete->get_result();

                // Tableau pour stocker les événements
                $lignes = null;

                // Parcours des résultats et création des objets Evenement
                while ($ligne = $resultat->fetch_assoc()) {
                    $evenement = new Evenement();

                    // Remplissage des propriétés de l'objet Evenement
                    $evenement->setId($ligne['id']);
                    $evenement->setTitre($ligne['titre']);
                    $evenement->setDate($ligne['date']);
                    $evenement->setHeure($ligne['heure']);
                    $evenement->setLieu($ligne['lieu']);
                    $evenement->setDescription($ligne['description']);
                    $evenement->setProprietaire($ligne['proprietaire']);
                    $evenement->setImage($ligne['image']);
                    $evenement->setCategorie($ligne['categorie']);
                    $evenement->setCapacite($ligne['capacite']);
                    $evenement->setDateCreation($ligne['date_creation']);

                    // Ajout de l'événement au tableau
                    $lignes[] = $evenement;
                }

                // Retourner le tableau d'événements
                return $lignes;

            } catch (Exception $e) {
                // Gestion des erreurs : affichage d'un message d'erreur ou journalisation, par exemple
                //echo "Une erreur s'est produite : " . $e->getMessage();
                return null;
            }
        }

        function getEvenementsByRecherche($recherche, $limit)
        {
            // Récupération de la connexion à la base de données depuis l'objet courant
            $connexion = $this->connexion;

            try {
                // Préparation de la requête SQL avec deux paramètres pour la recherche et la limite
                $requete = $connexion->prepare("SELECT id, titre, evenements.date, heure, lieu, evenements.description, proprietaire, evenements.image, categorie, capacite, date_creation
                FROM evenements
                where categorie = ?
                ORDER BY evenements.date DESC
                LIMIT ?");

                // Vérification de la préparation de la requête
                if (!$requete) {
                    throw new Exception("Erreur de préparation de la requête SQL.");
                }

                // Liaison des paramètres à la requête
                $requete->bind_param('si', $recherche, $limit);

                // Exécution de la requête
                $requete->execute();

                // Récupération des résultats
                $resultat = $requete->get_result(); 

                // Tableau pour stocker les événements
                $lignes = null;

                // Vérification s'il y a des résultats
                if ($resultat->num_rows > 0) {
                    // Parcours des résultats et création des objets Evenement
                    while ($ligne = $resultat->fetch_assoc()) {
                        $evenement = new Evenement();

                        // Remplissage des propriétés de l'objet Evenement
                        $evenement->setId($ligne['id']);
                        $evenement->setTitre($ligne['titre']);
                        $evenement->setDate($ligne['date']);
                        $evenement->setHeure($ligne['heure']);
                        $evenement->setLieu($ligne['lieu']);
                        $evenement->setDescription($ligne['description']);
                        $evenement->setProprietaire($ligne['proprietaire']);
                        $evenement->setImage($ligne['image']);
                        $evenement->setCategorie($ligne['categorie']);
                        $evenement->setCapacite($ligne['capacite']);
                        $evenement->setDateCreation($ligne['date_creation']);

                        // Ajout de l'événement au tableau
                        $lignes[] = $evenement;
                    }
                }

                // Retourner le tableau d'événements
                return $lignes;

            } catch (Exception $e) {
                // Gestion des erreurs : affichage d'un message d'erreur ou journalisation, par exemple
                //echo "Une erreur s'est produite : " . $e->getMessage();
                return null; // Retourner null en cas d'erreur
            }
        }
    }
?>