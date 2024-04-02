<?php
    // Inclure le fichier de connexion à la base de données
    require_once MODELS.'includes/connexion-bd.php';

    class UtilisateurModel
    {
        private $connexion;

        public function __construct() 
        {
            // Initialiser la connexion à la base de données
            $this->connexion = connecterBD();
        }

        // Méthode pour connecter un utilisateur
        function seConnecter($data)
        {
            $connexion = $this->connexion;

            try {
                // Préparer et exécuter la requête SQL
                $requete = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = ? AND password = ?");
                $requete->bind_param('ss', $data['email'], $data['password']);
                $requete->execute();
                $resultat = $requete->get_result();

                if($resultat->num_rows > 0) {
                    if($ligne = $resultat->fetch_assoc()) {
                        $utilisateur = new Utilisateur();

                        $utilisateur->setId($ligne['id']);
                        $utilisateur->setNom($ligne['nom']);
                        $utilisateur->setPrenom($ligne['prenom']);
                        $utilisateur->setAdresse($ligne['adresse']);
                        $utilisateur->setTelephone($ligne['telephone']);
                        $utilisateur->setEmail($ligne['email']);
                        $utilisateur->setPassword($ligne['password']);

                        return $utilisateur;
                    }
                } else {
                    return null;
                }
            } catch (Exception $e) {
                // Gérer l'exception en affichant un message d'erreur approprié
                //echo "Erreur lors de la connexion : " . $e->getMessage();
                return null;
            }
        }

        // Méthode pour inscrire un nouvel utilisateur
        public function sInscrire($data)
        {
            $connexion = $this->connexion;

            try {
                // Préparer et exécuter la requête SQL d'insertion
                $requete = $connexion->prepare("INSERT INTO utilisateurs (id, nom, prenom, adresse, telephone, email, password) 
                                                VALUES (null, ?, ?, ?, ?, ?, ?)");
                $requete->bind_param('ssssss', $data['nom'], $data['prenom'], $data['adresse'], $data['telephone'], $data['email'], $data['password']);
                $requete->execute();
                $requete->close();
                return true;
            } catch (Exception $e) {
                // Gérer l'exception en affichant un message d'erreur approprié
                //echo "Erreur lors de l'inscription : " . $e->getMessage();
                return false;
            }
        }
        
        // Méthode pour obtenir un utilisateur par son ID
        public function getUtilisateurById($id) {
            $connexion = $this->connexion;
            
            try {
                // Préparer et exécuter la requête SQL
                $requete = $connexion->prepare("SELECT * FROM utilisateurs WHERE id = ?");
                $requete->bind_param('i', $id);
                $requete->execute();
                $resultat = $requete->get_result();

                if($resultat->num_rows > 0) {
                    if($ligne = $resultat->fetch_assoc()) {
                        $utilisateur = new Utilisateur();

                        $utilisateur->setId($ligne['id']);
                        $utilisateur->setNom($ligne['nom']);
                        $utilisateur->setPrenom($ligne['prenom']);
                        $utilisateur->setAdresse($ligne['adresse']);
                        $utilisateur->setTelephone($ligne['telephone']);
                        $utilisateur->setEmail($ligne['email']);
                        $utilisateur->setPassword($ligne['password']);

                        return $utilisateur;
                    }
                }
                
                return null;

            } catch (Exception $e) {
                // Gérer l'exception en affichant un message d'erreur approprié
                //echo "Erreur lors de la récupération de l'utilisateur par ID : " . $e->getMessage();
                return null;
            }
        }

        // Méthode pour obtenir un utilisateur par son email
        public function getUtilisateurByEmail($email) {
            $connexion = $this->connexion;
            
            try {
                // Préparer et exécuter la requête SQL
                $requete = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = ?");
                $requete->bind_param('s', $email);
                $requete->execute();
                $resultat = $requete->get_result();

                if($resultat->num_rows > 0) {
                    if($ligne = $resultat->fetch_assoc()) {
                        $utilisateur = new Utilisateur();

                        $utilisateur->setId($ligne['id']);
                        $utilisateur->setNom($ligne['nom']);
                        $utilisateur->setPrenom($ligne['prenom']);
                        $utilisateur->setAdresse($ligne['adresse']);
                        $utilisateur->setTelephone($ligne['telephone']);
                        $utilisateur->setEmail($ligne['email']);
                        $utilisateur->setPassword($ligne['password']);

                        return $utilisateur;
                    }
                }

                return null;
            } catch (Exception $e) {
                // Gérer l'exception en affichant un message d'erreur approprié
                //echo "Erreur lors de la récupération de l'utilisateur par email : " . $e->getMessage();
                return null;
            }
        }

        // Méthode statique pour vérifier si un utilisateur est connecté
        public static function estConnecter() {
            // Vérifie si l'utilisateur est connecté
            return isset($_SESSION['logged_in']) === true;
        }
    }
?>
